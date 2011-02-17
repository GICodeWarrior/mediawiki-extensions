#!/usr/bin/python
# -*- coding: utf-8 -*-
'''
Copyright (C) 2010 by Diederik van Liere (dvanliere@gmail.com)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details, at
http://www.fsf.org/licenses/gpl.html
'''

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__email__ = 'dvanliere at gmail dot com'
__date__ = '2011-01-14'
__version__ = '0.1'

import calendar
import datetime
import time
import math
import operator
import sys
import hashlib
from pymongo.son_manipulator import SONManipulator
from multiprocessing import RLock, Array, Value
from texttable import Texttable
from datetime import timedelta


if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
settings = settings.Settings()

from utils import file_utils
from utils import data_converter
from database import db
from analyses import json_encoders
from classes import exceptions

class Transform(SONManipulator):
    '''
    This encoder transforms a Dataset to a MongoDB bson document. 
    To use this encoder initalize a mongo database instance and then add:
    mongo.add_son_manipulator(Transform())    
    '''
    def transform_incoming(self, son, collection):
        for (key, ds) in son.items():
            son[key] = {}
            for x, var in enumerate(ds):
                if isinstance(var, Variable):
                    son[key][var.name] = var.encode()
        for prop in ds.props:
            son[prop] = getattr(ds, prop)
        return son

    def transform_outgoing(self, son, collection):
        for (key, value) in son.items():
            if isinstance(value, dict):
                names = value.keys()
                for name in names:
                    var = Variable(name, None)
                    var.decode(value)
                    son['variables'][name] = var
            else: # Again, make sure to recurse into sub-docs
                son[key] = value
        name = son.pop('name', None)
        project = son.pop('project', None)
        collection = son.pop('collection', None)
        language_code = son.pop('language_code', None)
        variables = son.pop('variables', [])
        ds = Dataset(name, project, collection, language_code, **son)
        for var in variables:
            var = variables[var]
            ds.add_variable(var)
        return ds


class Data:
    '''
    Some generic functions that are required by the Observation, Variable, and
    Dataset classes. 
    '''
    def __hash__(self, vars):
        '''
        This is a generic hash function that expects a list of variables, used
        to lookup an Observation or Variable. 
        '''
        id = '_'.join([str(var) for var in vars])
        #return id
        m = hashlib.md5()
        m.update(id)
        #print id, m.hexdigest()
        return m.hexdigest()
        #return ''.join([str(var) for var in vars])

    def encode_to_bson(self, data=None):
        '''
        This function converts a Variable or Observation to a dictionary that 
        can be stored in Mongo.
        '''
        if data:
            kwargs = dict([(str(key), value) for key, value in data.__dict__.iteritems()])
        else:
            kwargs = dict([(str(key), value) for key, value in self.__dict__.iteritems()])
        for key, value in kwargs.iteritems():
            if isinstance(value, dict):
                d = {}
                for k, v in value.iteritems():
                    if isinstance(v, Observation):
                        v = self.encode_to_bson(v)
                    d[str(k)] = v
                kwargs[key] = d
        return kwargs

    def convert_date_to_epoch(self, date):
        '''
        Calculate the number of seconds since epoch depending on the time_unit
        of the date
        '''
        assert self.time_unit == 'year' or self.time_unit == 'month' \
        or self.time_unit == 'day', \
            'Time unit should either be year, month or day.'

        if self.time_unit == 'year':
            datum = datetime.datetime(date.year, 1, 1)
            return int(time.mktime(datum.timetuple()))
        elif self.time_unit == 'month':
            datum = datetime.datetime(date.year, date.month, 1)
            return int(time.mktime(datum.timetuple()))
        elif self.time_unit == 'day':
            return int(time.mktime(date.timetuple()))
        else:
            return date

    def set_date_range(self, date):
        '''
        Determine the width of a date range for an observation. 
        '''
        if self.time_unit == 'year':
            return datetime.datetime(date.year, 12, 31), \
                datetime.datetime(date.year, 1, 1)
        elif self.time_unit == 'month':
            day = calendar.monthrange(date.year, date.month)[1]
            return datetime.datetime(date.year, date.month, day), \
                datetime.datetime(date.year, date.month, 1)
        else:
            return datetime.datetime(date.year, date.month, date.day), \
                datetime.datetime(date.year, date.month, date.day)


class Observation(Data):
    '''
    The smallest unit, here the actual data is being stored. 
    Time_unit should either be 'year', 'month' or 'day'. 
    '''
    def __init__(self, date, time_unit, id, meta):
        assert isinstance(date, datetime.datetime), '''Date variable should be 
            a datetime.datetime instance.'''
        #self.lock = lock #Lock()
        self.date = date
        self.data = 0
        #self.data = Value('i', 0)
        self.time_unit = time_unit
        self.t1, self.t0 = self.set_date_range(date)
        self.id = id
        self.props = []
        self.count = 0
        for mt in meta:
            if isinstance(mt, float):
                raise Exception, '''Mongo does not allow a dot "." in the name 
                    of a key, please use an integer or string as key.'''
            elif not isinstance(mt, list):
                setattr(self, mt, meta[mt])
                self.props.append(mt)
        self._type = 'observation'

    def __repr__(self):
        return '%s' % self.date

    def __str__(self):
        return 'range: %s-%s-%s : %s-%s-%s' % (self.t0.month, self.t0.day, \
                                               self.t0.year, self.t1.month, \
                                               self.t1.day, self.t1.year)

    def __iter__(self):
        for obs in self.data:
            yield self.data[obs]

    def __getitem__(self, key):
        return getattr(self, key, [])

    def add(self, value):
        '''
        '''
        #self.lock.acquire()
        #try:
        if isinstance(value, list):
            if self.count == 0:
                self.data = []
                #self.data = Array('i', 0)
            self.data.append(value)
        else:
            self.data += value
            #self.data.value += value
        #finally:
        self.count += 1
        #self.lock.release()


    def get_date_range(self):
        return '%s-%s-%s:%s-%s-%s' % (self.t0.month, self.t0.day, self.t0.year, \
                                      self.t1.month, self.t1.day, self.t1.year)

class Variable(Data):
    '''
    This class constructs a time-based variable. 
    '''
    def __init__(self, name, time_unit, lock, **kwargs):
        self.name = name
        self.lock = lock
        self.obs = {}
        self.time_unit = time_unit
        self.groupbys = []
        self._type = 'variable'
        self.props = ['name', 'time_unit', '_type']
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])
            self.props.append(kw)

    def __str__(self):
        return '%s' % self.name

    def __repr__(self):
        return '%s' % self.name

    def __getitem__(self, key):
        return getattr(self, key, [])

    def __iter__(self):
        keys = self.obs.keys()
        for key in keys:
            yield key

    def __len__(self):
        return len(self.obs.keys())

    def items(self):
        for key in self.__dict__.keys():
            yield key, getattr(self, key)

    def itervalues(self):
        for key in self:
            yield self.obs[key].data

    def iteritems(self):
        for key in self:
            yield (key, self.obs[key])

    def get_data(self):
        return [o for o in self.itervalues()]

    def get_observation(self, id, date, meta):
        self.lock.acquire()
        try:
            obs = self.obs.get(id, Observation(date, self.time_unit, id, meta))
            #self.obs[id] = obs
            x = len(self.obs)
        finally:
            self.lock.release()
        return obs

    def add(self, date, value, meta={}):
        '''
        The add function is used to add an observation to a variable. An
        observation is always grouped by the combination of the date and 
        time_unit. Time_unit is a property of a Variable and indicates how 
        granular the observations should be grouped. For example, if 
        time_unit == year then all observations in a given year will be grouped. 
        When calling add you should supply at least two variables:
        1) date: when did the observation happen
        2) value: an integer or float that was observed on that date
        Optionally you can supply a dictionary for extra groupings. The key is
        the name of the extra grouping.
        For example, if you add {'experience': 3} as the meta dict when calling
        add then you will create an extra grouping called experience and all
        future observations who fall in the same date range and the same 
        exerience level, in this case 3, will be grouped by that particular 
        observation. You can use as many extra groupings as you want but 
        usually one extra grouping should be enough. 
        '''
        assert isinstance(meta, dict), '''The meta variable should be a dict 
            (either empty or with variables to group by.'''
        start, end = self.set_date_range(date)
        values = meta.values()
        values.insert(0, end)
        values.insert(0, start)
        id = self.__hash__(values)
        obs = self.get_observation(id, date, meta)
        obs.add(value)
        try:
            self.lock.acquire()
            self.obs[id] = obs
        finally:
            self.lock.release()
        #print date, id, meta.values(), obs.count, len(self.obs)

    def number_of_obs(self):
        n = 0
        for obs in self.obs:
            n += self.obs[obs].count
        return n

    def encode(self):
        bson = {}
        for prop in self.props:
            bson[prop] = getattr(self, prop)

        bson['obs'] = {}
        for obs in self:
            data = self.obs[obs]
            obs = str(obs)
            bson['obs'][obs] = data.encode_to_bson()
        return bson

    def decode(self, values):
        for varname in values:
            for prop in values[varname]:
                if isinstance(values[varname][prop], dict):
                    data = values[varname][prop]
                    for d in data:
                        date = data[d]['date']
                        obs = data[d]['data']
                        self.add(date, obs)
                else:
                    setattr(self, prop, values[varname][prop])
                    self.props.append(prop)

    def get_date_range(self):
        dates = [self.obs[key].date for key in self]
        first = min(dates)
        last = max(dates)
        return first, last


class Dataset:
    '''
    This class acts as a container for the Variable class and has some methods
    to output the dataset to a csv file, mongodb and display statistics. 
    '''

    def __init__(self, chart, rts, vars=None, **kwargs):
        self.encoder, chart, charts = json_encoders.get_json_encoder(chart)
        if self.encoder == None:
            raise exceptions.UnknownChartError(chart, charts)
        self.chart = chart
        self.name = 'Dataset to construct %s' % self.chart
        self.project = rts.project.name
        self.collection = rts.editors_dataset
        self.language_code = rts.language.code
        self.hash = self.name
        self._type = 'dataset'
        self.created = datetime.datetime.today()
        self.format = 'long'
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])
        self.props = self.__dict__.keys()

        self.variables = []
        if vars != None:
            for kwargs in vars:
                name = kwargs.pop('name')
                setattr(self, name, Variable(name, **kwargs))
                self.variables.append(name)
        #self.filename = self.create_filename()

    def __repr__(self):
        return 'Dataset contains %s variables' % (len(self.variables))

    def __iter__(self):
        for var in self.variables:
            yield getattr(self, var)

    def details(self):
        print 'Project: %s%s' % (self.language_code, self.project)
        print 'JSON encoder: %s' % self.encoder
        print 'Raw data was retrieved from: %s%s/%s' % (self.language_code,
                                                        self.project,
                                                        self.collection)

    def create_filename(self):
        '''
        This function creates a filename for the dataset by searching for shared
        properties among the different variables in the dataset. All shared 
        properties will be used in the filename to make sure that one analysis
        that's run with different parameters gets stored in separate files.
        '''
        common = {}
        props = set()
        for var in self.variables:
            s = set()
            var = getattr(self, var)
            for prop in var.props:
                if prop not in ['name', 'time_unit', '_type']:
                    s.add(prop)
                    props.add(prop)
            common[var.name] = s

        keys = []
        for prop in props:
            attrs = []
            for s in common.values():
                attrs.append(prop)
            if len(attrs) == len(common.values()):
                keys.append(prop)
        keys.sort()
        attrs = '_'.join(['%s=%s' % (k, getattr(var, k)) for k in keys])
        filename = '%s%s_%s_%s.csv' % (self.language_code,
                                       self.project,
                                       self.name,
                                       attrs)
        self.filename = filename


    def add_variable(self, var):
        '''
        Call this function to add a Variable to a dataset. 
        '''
        if isinstance(var, Variable):
            self.variables.append(var.name)
            setattr(self, var.name, var)
        else:
            raise TypeError('You can only add an instance of Variable to a dataset.')

    def write(self, format='csv'):
        '''
        This is the entry point for outputting data, either to csv or mongo.
        '''
        self.create_filename()
        if format == 'csv':
            self.to_csv()
        elif format == 'mongo':
            self.to_mongo()

    def to_mongo(self):
        dbname = '%s%s' % (self.language_code, self.project)
        mongo = db.init_mongo_db(dbname)
        coll = mongo['%s_%s' % (dbname, 'charts')]
        mongo.add_son_manipulator(Transform())
        coll.remove({'hash':self.hash, 'project':self.project,
                    'language_code':self.language_code})
        coll.insert({'variables': self})

    def to_csv(self):
        data = data_converter.convert_dataset_to_lists(self, 'manage')
        headers = data_converter.add_headers(self)
        fh = file_utils.create_txt_filehandle(settings.dataset_location, self.filename, 'w', settings.encoding)
        file_utils.write_list_to_csv(headers, fh, recursive=False, newline=True)
        file_utils.write_list_to_csv(data, fh, recursive=False, newline=True, format=self.format)
        fh.close()

    def encode(self):
        props = {}
        for prop in self.props:
            props[prop] = getattr(self, prop)
        return props

    def get_standard_deviation(self, number_list):
        mean = self.get_mean(number_list)
        std = 0
        n = len(number_list)
        for i in number_list:
            std = std + (i - mean) ** 2
        return math.sqrt(std / float(n - 1))

    def get_median(self, number_list):
        if number_list == []:
            return '.'
        data = sorted(number_list)
        data = [float(x) for x in data]
        if len(data) % 2 == 1:
            return data[(len(data) + 1) / 2 - 1]
        else:
            lower = data[len(data) / 2 - 1]
            upper = data[len(data) / 2]
        return (lower + upper) / 2

    def get_mean(self, number_list):
        if number_list == []:
            return '.'
        float_nums = [float(x) for x in number_list]
        return sum(float_nums) / len(number_list)

    def get_min(self, number_list):
        if number_list == []:
            return '.'
        else:
            return min(number_list)

    def get_max(self, number_list):
        if number_list == []:
            return '.'
        else:
            return max(number_list)

    def descriptives(self):
        for variable in self:
            data = variable.get_data()
            variable.mean = self.get_mean(data)
            variable.median = self.get_median(data)
            variable.sds = self.get_standard_deviation(data)
            variable.min = self.get_min(data)
            variable.max = self.get_max(data)
            variable.num_obs = variable.number_of_obs()
            variable.num_dates = len(variable)
            variable.first_obs, variable.last_obs = variable.get_date_range()

    def summary(self):
        self.descriptives()
        table = Texttable(max_width=0)
        vars = ['Variable', 'Mean', 'Median', 'SD', 'Minimum', 'Maximum',
                'Num Obs', 'Num of\nUnique Groups', 'First Obs', 'Final Obs']
        table.add_row([var for var in vars])
        table.set_cols_align(['r' for v in vars])
        table.set_cols_valign(['m' for v in vars])

        for x, variable in enumerate(self):
            table.add_row([variable.name, variable.mean, variable.median,
                            variable.sds, variable.min, variable.max,
                            variable.num_obs, variable.num_dates,
                            variable.first_obs, variable.last_obs])
        print table.draw()
        print self
        print self.details()


def debug():
    mongo = db.init_mongo_db('enwiki')
    rawdata = mongo['enwiki_charts']
    mongo.add_son_manipulator(Transform())

    d1 = datetime.datetime.today()
    d2 = datetime.datetime(2007, 6, 7)
#    ds = Dataset('histogram', rts, [{'name': 'count', 'time_unit': 'year'},
#                                   #{'name': 'testest', 'time_unit': 'year'}
#                                   ])
#    ds.count.add(d1, 10, {'exp': 3})
#    ds.count.add(d1, 135, {'exp': 3})
#    ds.count.add(d2, 1, {'exp': 4})
#    #ds.testest.add(d1, 135)
#    #ds.testest.add(d2, 535)
#    ds.summary()
#    ds.write(format='csv')
#
#    ds.encode()
    #name, time_unit, lock, **kwargs
    lock = RLock()
    v = Variable('test', 'year', lock)
    v.add(d1, 10, {'exp': 3, 'test': 10})
    v.add(d1, 135, {'exp': 3, 'test': 10})
    v.add(d2, 1, {'exp': 4, 'test': 10})
    v.add(d2, 1, {'exp': 4, 'test': 10})
    v.add(d2 , 1, {'exp': 3, 'test': 8})
    v.add(d2 , 1, {'exp': 2, 'test': 10})
    v.add(d2 , 1, {'exp': 4, 'test': 11})
    v.add(d2 , 1, {'exp': 8, 'test': 13})
    v.add(d2 , 1, {'exp': 9, 'test': 12})


#    v.add(d2 + timedelta(days=400), 1, {'exp': 4, 'test': 10})
#    v.add(d2 + timedelta(days=900), 1, {'exp': 3, 'test': 8})
#    v.add(d2 + timedelta(days=1200), 1, {'exp': 2, 'test': 10})
#    v.add(d2 + timedelta(days=1600), 1, {'exp': 4, 'test': 11})
#    v.add(d2 + timedelta(days=2000), 1, {'exp': 8, 'test': 13})
#    v.add(d2 + timedelta(days=2400), 1, {'exp': 9, 'test': 12})

    print len(v), v.number_of_obs()

 #   mongo.test.insert({'variables': ds})
if __name__ == '__main__':
    debug()
