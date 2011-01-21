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
import sys
from pymongo.son_manipulator import SONManipulator


sys.path.append('..')
import configuration
settings = configuration.Settings()

from utils import utils
from database import db

class Transform(SONManipulator):
    def transform_incoming(self, son, collection):
        for (key, ds) in son.items():
            if isinstance(ds, Dataset):
                son[key] = ds.encode()
            #elif isinstance(value, dict): # Make sure we recurse into sub-docs
            #    son[key] = self.transform_incoming(value, collection)
        return son

    def transform_outgoing(self, son, collection):
        for (key, value) in son.items():
            if isinstance(value, dict):
                if "_type" in value and value["_type"] == "custom":
                    son[key] = decode_custom(value)
            else: # Again, make sure to recurse into sub-docs
                son[key] = self.transform_outgoing(value, collection)
        return son


class Data:
    def __hash__(self, date):
        #return hash(self.convert_date_to_epoch(date))
        return int(self.convert_date_to_epoch(date))

    def encode_to_bson(self):
        kwargs = dict([(str(key), value) for key, value in self.__dict__.iteritems()])
        for key, value in kwargs.iteritems():
            if isinstance(value, dict):
                d = dict([(str(k), v) for k, v in value.iteritems()])
                kwargs[key] = d


        kwargs['_type'] = self._type
        return kwargs
        #return {'_type': 'c', 'x': var.x()}

    def convert_seconds_to_date(self, secs):
        #return time.gmtime(secs)
        return datetime.datetime.fromtimestamp(secs)

    def convert_date_to_epoch(self, date):
        assert self.time_unit == 'year' or self.time_unit == 'month' \
        or self.time_unit == 'day'

        if self.time_unit == 'year':
            datum = datetime.datetime(date.year, 1, 1)
            return time.mktime(datum.timetuple())
        elif self.time_unit == 'month':
            datum = datetime.datetime(date.year, date.month, 1)
            return time.mktime(datum.timetuple())
        else:
            return time.mktime(date.timetuple())


class Observation(Data):
    def __init__(self, date, time_unit):
        assert isinstance(date, datetime.datetime)
        self.time_unit = time_unit
        self.t0 = self.set_start_date(date)
        self.t1 = self.set_end_date(date)
        self.hash = self.__hash__(date)
        self.data = {}
        self._type = 'observation'

    def __repr__(self):
        return '%s' % self.t1

    def __str__(self):
        return 'range: %s:%s' % (self.t0, self.t1)

    def __iter__(self):
        for obs in self.obs:
            yield self.obs[obs]

    def next(self):
        try:
            return len(self.data.keys()) + 1
        except IndexError:
            return 0

    def set_start_date(self, date):
        if self.time_unit == 'year':
            return datetime.datetime(date.year, 1, 1)
        elif self.time_unit == 'month':
            return datetime.datetime(date.year, date.month, 1)
        else:
            return datetime.datetime(date.year, date.month, date.day)

    def set_end_date(self, date):
        if self.time_unit == 'year':
            return datetime.datetime(date.year, 12, 31)
        elif self.time_unit == 'month':
            return datetime.datetime(date.year, date.month, calendar.monthrange(date.year, date.month)[1])
        else:
            return datetime.datetime(date.year, date.month, date.day)

    def add(self, value, update):
        if hasattr(value, '__iter__') == False:
            d = {}
            d[0] = value
            value = d
        assert type(value) == type({})
        x = self.next()
        for i, v in value.iteritems():
            self.data.setdefault(i, 0)
            if update:
                self.data[i] += v
            else:
                i += x
                self.data[i] = v


class Variable(Data):
    '''
    This class constructs a time-based variable and has some associated simple 
    statistical descriptives
    '''
    def __init__(self, name, time_unit, **kwargs):
        self.name = name
        self.obs = {}
        self.time_unit = time_unit
        self._type = 'variable'
        #self.stats = stats
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])

    def __str__(self):
        return self.name

    def __repr__(self):
        return self.name

    def __getitem__(self, key):
        return self.obs[key]

    def __iter__(self):
        dates = self.obs.keys()
        dates.sort()
        for date in dates:
            yield date


    def __len__(self):
        return [x for x in xrange(self.obs())]

    def obs(self):
        for date in self:
            for key in self.obs[date].data.keys():
                yield self.obs[date].data[key]

    def iteritems(self):
        for date in self:
            for value in self.obs[date].data.keys():
                yield (value, self.obs[date].data[value])

    def get_observation(self, date):
        key = self.__hash__(date)
        return self.obs.get(key, Observation(date, self.time_unit))

    def min(self):
        return min([obs for obs in self])
        #return min([self.obs[date].data[k]  for date in self.obs.keys() for k in self.obs[date].data.keys()])

    def max(self):
        return max([self.obs[date].data[k]  for date in self.obs.keys() for k in self.obs[date].data.keys()])

    def get_standard_deviation(self, number_list):
        mean = get_mean(number_list)
        std = 0
        n = len(number_list)
        for i in number_list:
            std = std + (i - mean) ** 2
        return math.sqrt(std / float(n - 1))


    def get_median(self, number_list):
        #print number_list
        if number_list == []: return '.'
        data = sorted(number_list)
        data = [float(x) for x in data]
        if len(data) % 2 == 1:
            return data[(len(data) + 1) / 2 - 1]
        else:
            lower = data[len(data) / 2 - 1]
            upper = data[len(data) / 2]
            #print upper, lower
        return (lower + upper) / 2


    def get_mean(self, number_list):
        #print number_list
        if number_list == []: return '.'
        float_nums = [float(x) for x in number_list]
        return sum(float_nums) / len(number_list)

    def summary(self):
        print 'Variable: %s' % self.name
        print 'Mean: %s' % self.get_mean(self)
        print 'Median: %s' % self.get_median(self)
        print 'Standard Deviation: %s' % self.get_standard_deviation(self)
        print 'Minimum: %s' % self.min()
        print 'Maximum: %s' % self.max()


    def add(self, date, value, update=True):
        data = self.get_observation(date)
        data.add(value, update)
        self.obs[data.hash] = data


class Dataset:
    '''
    This class acts as a container for the Variable class and has some methods
    to output the dataset to a csv file. 
    '''
    def __init__(self, name, vars=[{}]):
        self.name = '%s.csv' % name
        self.vars = []
        self.format = 'long'
        self._type = 'dataset'
        for kwargs in vars:
            name = kwargs.pop('name')
            setattr(self, name, Variable(name, **kwargs))
            self.vars.append(name)

    def __repr__(self):
        return 'Dataset contains %s variables' % (len(self.vars))

    def __iter__(self):
        for var in self.vars:
            yield getattr(self, var)

    def get_all_keys(self, data):
        all_keys = []
        for d in data:
            for key in d:
                if key not in all_keys:
                    all_keys.append(key)
        all_keys.sort()
        all_keys.insert(0, all_keys[-1])
        del all_keys[-1]
        return all_keys

    def make_data_rectangular(self, data, all_keys):
        for i, d in enumerate(data):
            for key in all_keys:
                if key not in d:
                    d[key] = 0
                data[i] = d
        return data

    def sort(self, data, all_keys):
        dates = [date['date'] for date in data]
        dates.sort()
        cube = []
        for date in dates:
            for i, d in enumerate(data):
                if d['date'] == date:
                    raw_data = d
                    del data[i]
                    break
            obs = []
            for key in all_keys:
                obs.append(raw_data[key])
            cube.append(obs)
        return cube

    def convert_dataset_to_lists(self):
        assert self.format == 'long' or self.format == 'wide'
        data, all_keys = [], []
        for var in self:
            for date in var.obs.keys():
                datum = var.convert_seconds_to_date(date)
                if self.format == 'long':
                    o = []
                else:
                    o = {}
                    o['date'] = datum

                for obs in var[date].data:
                    if self.format == 'long':
                        o.append([datum, obs, var.obs[date].data[obs]])
                        data.extend(o)
                        o = []
                    else:
                        o[obs] = var.obs[date].data[obs]
                        #o.append({obs:var.obs[date].data[obs]})
                if self.format == 'wide':
                    data.append(o)
        if self.format == 'wide':
            #Make sure that each variable / observation combination exists.
            all_keys = self.get_all_keys(data)
            data = self.make_data_rectangular(data, all_keys)
            data = self.sort(data, all_keys)
        return data, all_keys

    def write(self, format='csv'):
        if format == 'csv':
            self.to_csv()

    def to_csv(self):

        data, all_keys = self.convert_dataset_to_lists()
        headers = self.add_headers(all_keys)
        fh = file_utils.create_txt_filehandle(settings.dataset_location, self.name, 'w', settings.encoding)
        file_utils.write_list_to_csv(headers, fh, recursive=False, newline=True, format=self.format)
        file_utils.write_list_to_csv(data, fh, recursive=False, newline=True, format=self.format)
        fh.close()

    def add_headers(self, all_keys):
        assert self.format == 'long' or self.format == 'wide'
        headers = []
        if self.format == 'long':
            headers.append('date')
        for var in self:
            if self.format == 'long':
                headers.extend([var.time_unit, var.name])
            else:
                for key in all_keys:
                    header = '%s_%s' % (key, var.name)
                    headers.append(header)
        return headers

    def encode(self):
        bson = {}
        for var in self:
            dates = var.obs.keys()
            dates.sort()
            bson[var.name] = {}
            for date in dates:
                obs = var[date]
                key = str(obs.hash)
                bson[var.name][key] = obs.encode_to_bson()
                print bson
        return bson

    def encode_to_bson(self, var):
        return {'_type': 'dataset', 'x': var.x()}


    def decode_from_bson(self, document):
        assert document["_type"] == "custom"
        return self(document["x"])

def debug():
    mongo = db.init_mongo_db('enwiki')
    rawdata = mongo['test']
    mongo.add_son_manipulator(Transform())
    date = datetime.datetime.today()
    ds = Dataset('test', [{'name': 'count', 'time_unit': 'year'}])
    ds.count.add(date, 5)
    #ds.summary()
    #ds.write_to_csv()
    v = Variable('test', 'year')
    ds.encode()
    mongo.test.insert({'dataset': ds})

    #v.add(date , 5)
    #o = v.get_observation(date)

    #v.summary()
    print ds


if __name__ == '__main__':
    debug()
