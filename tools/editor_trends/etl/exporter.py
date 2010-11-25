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
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-10-21'
__version__ = '0.1'

import sys
import datetime
from dateutil.relativedelta import *
import calendar
from multiprocessing import Queue
from Queue import Empty



sys.path.append('..')
import configuration
settings = configuration.Settings()
from utils import models, utils
from database import db
from etl import shaper
from utils import process_constructor as pc
import progressbar

try:
    import psyco
    psyco.full()
except ImportError:
    pass


class Variable(object):

    def __init__(self, var):
        setattr(self, 'name', var)
        self.stats = ['n', 'avg', 'sd', 'min', 'max']
        setattr(self, 'time', shaper.create_datacontainer())
        setattr(self, 'time', shaper.add_months_to_datacontainer(getattr(self, 'time'), datatype='dict'))

        for var in self.stats:
            setattr(self, var, shaper.create_datacontainer())
            setattr(self, var, shaper.add_months_to_datacontainer(getattr(self, var), datatype='list'))

    def __repr__(self):
        return self.name

    def descriptives(self):
        for year in self.time:
            for month in self.time[year]:
                data = [self.time[year][month][k] for k in self.time[year][month].keys()]
                self.avg[year][month] = shaper.get_mean(data)
                self.sd[year][month] = shaper.get_standard_deviation(data)
                self.min[year][month] = min(data)
                self.max[year][month] = max(data)
                self.n[year][month] = len(data)


class LongDataset(object):

    def __init__(self, vars):
        self.name = 'long_dataset.tsv'
        self.vars = []
        for var in vars:
            setattr(self, var, Variable(var))
            self.vars.append(var)

    def __repr__(self):
        return 'Dataset containing: %s' % (self.vars)

    def write_headers(self, fh):
        fh.write('_time\t')
        for var in self.vars:
            var = getattr(self, var)
            for stat in var.stats:
                fh.write('%s_%s\t' % (var.name, stat))
        fh.write('\n')

    def convert_to_longitudinal_data(self, id, obs, vars):
        for var in vars:
            ds = getattr(self, var)
            years = obs[var].keys()
            for year in years:
                months = obs[var][year].keys()
                for m in months:
                    #d = calendar.monthrange(int(year), int(m))[1] #determines the number of days in a given month/year
                    #date = datetime.date(int(year), int(m), d)
                    if id not in ds.time[year][m]:
                        ds.time[year][m][id] = 0
                    ds.time[year][m][id] = obs[var][year][str(m)]

    def write_longitudinal_data(self):
        fh = utils.create_txt_filehandle(settings.dataset_location, self.name, 'w', settings.encoding)
        self.write_headers(fh)
        dc = shaper.create_datacontainer()
        dc = shaper.add_months_to_datacontainer(dc)

        for var in self.vars:
            var = getattr(self, var)
            var.descriptives()
        years = dc.keys()
        years.sort()
        for year in years:
            months = dc[year].keys()
            months.sort()
            for month in months:
                d = calendar.monthrange(int(year), int(month))[1] #determines the number of days in a given month/year
                date = datetime.date(int(year), int(month), d)
                fh.write('%s\t' % date)
                for var in self.vars:
                    var = getattr(self, var)
                    #data = ['%s_%s\t' % (var.name, getattr(var, stat)[year][month]) for stat in var.stats]
                    fh.write(''.join(['%s\t' % (getattr(var, stat)[year][month],) for stat in var.stats]))
                fh.write('\n')
        fh.close()


def retrieve_editor_ids_mongo(dbname, collection):
    if utils.check_file_exists(settings.binary_location,
                               'editors.bin'):
        ids = utils.load_object(settings.binary_location,
                               'editors.bin')
    else:
        mongo = db.init_mongo_db(dbname)
        editors = mongo[collection]
        ids = editors.distinct('editor')
        utils.store_object(ids, settings.binary_location, retrieve_editor_ids_mongo)
    return ids


def expand_edits(edits):
    data = []
    for edit in edits:
        data.append(edit['date'])
    return data


def expand_observations(obs, vars_to_expand):
    for var in vars_to_expand:
        if var == 'edits':
            obs[var] = expand_edits(obs[var])
        elif var == 'edits_by_year':
            keys = obs[var].keys()
            keys.sort()
            edits = []
            for key in keys:
                edits.append(str(obs[var][key]))
            obs[var] = edits
    return obs



def expand_headers(headers, vars_to_expand, obs):
    for var in vars_to_expand:
        l = len(obs[var])
        pos = headers.index(var)
        for i in xrange(l):
            if var.endswith('year'):
                suffix = 2001 + i
            elif var.endswith('edits'):
                suffix = 1 + i
            headers.insert(pos + i, '%s_%s' % (var, suffix))
        headers.remove(var)
    return headers


def generate_long_editor_dataset(input_queue, vars, **kwargs):
    dbname = kwargs.pop('dbname')
    mongo = db.init_mongo_db(dbname)
    editors = mongo['dataset']
    name = dbname + '_long_editors.csv'
    #fh = utils.create_txt_filehandle(settings.dataset_location, name, 'w', settings.encoding)
    vars_to_expand = []
    keys = dict([(var, 1) for var in vars])
    ld = LongDataset(vars)
    while True:
        try:
            id = input_queue.get(block=False)
            print id
            obs = editors.find_one({'editor': id}, keys)
            ld.convert_to_longitudinal_data(id, obs, vars)
            #utils.write_list_to_csv(data, fh)
        except Empty:
            break
    ld.write_longitudinal_data()


def generate_cohort_analysis(input_queue, **kwargs):
    dbname = kwargs.get('dbname')
    pbar = kwargs.get('pbar')
    mongo = db.init_mongo_db(dbname)
    editors = mongo['dataset']
    year = datetime.datetime.now().year + 1
    begin = year - 2001
    p = [3, 6, 9]
    periods = [y * 12 for y in xrange(1, begin)]
    periods = p + periods
    data = {}
    while True:
        try:
            id = input_queue.get(block=False)
            obs = editors.find_one({'editor': id}, {'first_edit': 1, 'final_edit': 1})
            first_edit = obs['first_edit']
            last_edit = obs['final_edit']
            for y in xrange(2001, year):
                if y == 2010 and first_edit > datetime.datetime(2010, 1, 1):
                    print 'debug'
                if y not in data:
                    data[y] = {}
                    data[y]['n'] = 0
                window_end = datetime.datetime(y, 12, 31)
                if window_end > datetime.datetime.now():
                    now = datetime.datetime.now()
                    m = now.month - 1   #Dump files are always lagging at least one month....
                    d = now.day
                    window_end = datetime.datetime(y, m, d)
                edits = []
                for period in periods:
                    if period not in data[y]:
                        data[y][period] = 0
                    window_start = datetime.datetime(y, 12, 31) - relativedelta(months=period)
                    if window_start < datetime.datetime(2001, 1, 1):
                        window_start = datetime.datetime(2001, 1, 1)
                    if date_falls_in_window(window_start, window_end, first_edit, last_edit):
                        edits.append(period)
                if edits != []:
                    p = min(edits)
                    data[y]['n'] += 1
                    data[y][p] += 1
            #pbar.update(+1)
        except Empty:
            break
    utils.store_object(data, settings.binary_location, 'cohort_data')


def date_falls_in_window(window_start, window_end, first_edit, last_edit):
    if first_edit >= window_start and first_edit <= window_end:
        return True
    else:
        return False


def generate_wide_editor_dataset(input_queue, **kwargs):
    dbname = kwargs.pop('dbname')
    mongo = db.init_mongo_db(dbname)
    editors = mongo['dataset']
    name = dbname + '_wide_editors.csv'
    fh = utils.create_txt_filehandle(settings.dataset_location, name, 'a', settings.encoding)
    x = 0
    vars_to_expand = ['edits', 'edits_by_year', 'articles_by_year']
    while True:
        try:
            if debug:
                id = u'99797'
            else:
                id = input_queue.get(block=False)
            print input_queue.qsize()
            obs = editors.find_one({'editor': id})
            obs = expand_observations(obs, vars_to_expand)
            if x == 0:
                headers = obs.keys()
                headers.sort()
                headers = expand_headers(headers, vars_to_expand, obs)
                utils.write_list_to_csv(headers, fh)
            data = []
            keys = obs.keys()
            keys.sort()
            for key in keys:
                data.append(obs[key])
            utils.write_list_to_csv(data, fh)

            x += 1
        except Empty:
            break
    fh.close()


def retrieve_edits_by_contributor_launcher():
    pc.build_scaffolding(pc.load_queue, retrieve_edits_by_contributor, 'contributors')


def debug_retrieve_edits_by_contributor_launcher(dbname):
    kwargs = {'debug': False,
              'dbname': dbname,
              }
    ids = retrieve_editor_ids_mongo(dbname, 'editors')
    input_queue = pc.load_queue(ids)
    q = Queue()
    generate_editor_dataset(input_queue, q, False, kwargs)


def generate_editor_dataset_launcher(dbname):
    kwargs = {'nr_input_processors': 1,
              'nr_output_processors': 1,
              'debug': False,
              'dbname': dbname,
              'poison_pill':False,
              'pbar': True
              }
    ids = retrieve_editor_ids_mongo(dbname, 'editors')
    ids = list(ids)
    chunks = dict({0: ids})
    pc.build_scaffolding(pc.load_queue, generate_cohort_analysis, chunks, False, False, **kwargs)


def generate_editor_dataset_debug(dbname):
    ids = retrieve_editor_ids_mongo(dbname, 'editors')
    #ids = list(ids)[:1000]
    input_queue = pc.load_queue(ids)
    kwargs = {'nr_input_processors': 1,
              'nr_output_processors': 1,
              'debug': True,
              'dbname': dbname,
              }
    #generate_editor_dataset(input_queue, False, False, kwargs)
    vars = ['monthly_edits']
    generate_long_editor_dataset(input_queue, vars, **kwargs)

if __name__ == '__main__':
    #generate_editor_dataset_debug('test')
    #generate_editor_dataset_launcher('enwiki')
    generate_editor_dataset_debug('enwiki')
    #debug_retrieve_edits_by_contributor_launcher()
