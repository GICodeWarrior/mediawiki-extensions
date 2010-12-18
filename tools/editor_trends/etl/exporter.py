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

import os
import sys
import datetime
from dateutil.relativedelta import *
import calendar
import multiprocessing
from Queue import Empty



sys.path.append('..')
import configuration
settings = configuration.Settings()
from utils import models, utils
from database import db
from etl import shaper
from analyses import cohort_charts

try:
    import psyco
    psyco.full()
except ImportError:
    pass


class Variable(object):
    '''
    This class constructs a time-based variable and has some associated simple 
    statistical descriptives
    '''
    def __init__(self, var):
        self.name = var
        self.stats = ['n', 'avg', 'sd', 'min', 'max']
        self.time = shaper.create_datacontainer()
        self.time = shaper.add_months_to_datacontainer(getattr(self, 'time'), datatype='dict')

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
    '''
    This class acts as a container for the Variable class and has some methods
    to output the dataset to a csv file. 
    '''
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
                    if id not in ds.time[year][m] and obs[var][year][m] > 0:
                        ds.time[year][m][id] = obs[var][year][m]

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
                edits.append(obs[var][key])
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


def generate_long_editor_dataset(tasks, dbname, collection, **kwargs):
    mongo = db.init_mongo_db(dbname)
    editors = mongo[collection + '_dataset']
    vars = ['monthly_edits']
    name = dbname + '_long_editors.csv'
    #fh = utils.create_txt_filehandle(settings.dataset_location, name, 'w', settings.encoding)
    vars_to_expand = []
    keys = dict([(var, 1) for var in vars])
    ld = LongDataset(vars)
    while True:
        try:
            id = input_queue.get(block=False)
            if id == None:
                break
            print id
            obs = editors.find_one({'editor': id}, keys)
            ld.convert_to_longitudinal_data(id, obs, vars)
            #utils.write_list_to_csv(data, fh)
        except Empty:
            break
    ld.write_longitudinal_data()


def create_windows():
    years = (datetime.datetime.now().year + 1) - 2001
    p = [3, 6, 9]
    windows = [y * 12 for y in xrange(1, years)]
    windows = p + windows
    return windows


def generate_cohort_dataset_old(tasks, dbname, collection, **kwargs):
    mongo = db.init_mongo_db(dbname)
    editors = mongo[collection + '_dataset']
    windows = create_windows()
    data = shaper.create_datacontainer('dict')
    data = shaper.add_windows_to_datacontainer(data, windows)

    while True:
        id = tasks.get(block=False)
        tasks.task_done()
        if id == None:
            break
        obs = editors.find_one({'editor': id}, {'first_edit': 1, 'final_edit': 1})

        first_edit = obs['first_edit']
        last_edit = obs['final_edit']
        editor_dt = relativedelta(last_edit, first_edit)
        editor_dt = (editor_dt.years * 12) + editor_dt.months
        edits = []
        for year in xrange(2001, datetime.datetime.now().year + 1):
            if first_edit.year > year or last_edit.year < year:
                continue
            window_end = datetime.datetime(year, 12, 31)
            for window in windows:
                window_start = window_end - relativedelta(months=window)
                if window_start < datetime.datetime(2001, 1, 1):
                    window_start = datetime.datetime(2001, 1, 1)

                if editor_dt > 11:
                    if date_falls_in_window(window_start, window_end, first_edit):
                        edits.append(window)
                elif window > editor_dt:
                    data[year][window] += 1
                    break

            if edits != []:
                w = min(edits)
                data[year][w] += 1
                edits = []


    print 'Storing data as %s' % os.path.join(settings.binary_location, dbname + '_cohort_data.bin')
    utils.store_object(data, settings.binary_location, dbname + '_cohort_data.bin')
    cohort_charts.prepare_cohort_dataset(dbname)




def generate_cohort_dataset_forward(tasks, dbname, collection, **kwargs):
    mongo = db.init_mongo_db(dbname)
    editors = mongo[collection + '_dataset']
    windows = create_windows()
    data = shaper.create_datacontainer('dict')
    final_year = datetime.datetime.now().year + 1
    m1 = [1, 2, 3, 4, 5, 6]
    m2 = [7, 8, 9, 10, 11, 12]
    frames = [m1, m2]
    while True:
        id = tasks.get(block=False)
        if id == None:
            break
        obs = editors.find_one({'editor': id}, {'new_wikipedian': 1, 'monthly_edits': 1, 'final_edit':1})
        new_wikipedian = obs['new_wikipedian']
        last_edit = obs['final_edit']
        start_year = new_wikipedian.year
        last_year = last_edit.year + 1
        if new_wikipedian.month != 1:
            continue
        for year in xrange(start_year, last_year):
            if year not in data[start_year]:
                data[start_year][year] = {}
            for x, frame in enumerate(frames):
                if x not in data[start_year][year]:
                    data[start_year][year][x] = 0
                if 'n' not in data[start_year][year]:
                    data[start_year][year]['n'] = 0

                active = sum([obs['monthly_edits'][str(year)][str(m)] for m in frame])
                data[start_year][year]['n'] += 1
                if active > 0:
                    data[start_year][year][x] += 1
    filename = '%s_cohort_forward.csv' % dbname
    fh = utils.create_txt_filehandle(settings.dataset_location, filename, 'w', settings.encoding)
    frames.append('n')
    headers = ["%s_%s" % (year, frame[0]) for year in xrange(2001, final_year) for frame in enumerate(frames)]
    headers.insert(0, '\t')
    utils.write_list_to_csv(headers, fh)

    for obs_year in data:
        obs = '%s\t' % obs_year
        for year in xrange(2001, final_year):
            values = data[obs_year].get(year, None)
            if values != None:
                for value in values:
                    obs = '%s\t%s\t' % (obs, values[value])
            else:
                    obs = '%s\t.\t.\t.\t' % obs

        obs = '%s\n' % obs
        fh.write(obs)
    fh.close()



def generate_cohort_dataset_backward(tasks, dbname, collection, **kwargs):
    mongo = db.init_mongo_db(dbname)
    editors = mongo[collection + '_dataset']
    windows = create_windows()
    data = shaper.create_datacontainer('dict')
    data = shaper.add_windows_to_datacontainer(data, windows)

    while True:
        id = tasks.get(block=False)
        tasks.task_done()
        if id == None:
            break
        obs = editors.find_one({'editor': id}, {'first_edit': 1, 'final_edit': 1, 'edits_by_year': 1, 'last_edit_by_year': 1})
        first_edit = obs['first_edit']
        for year in xrange(2001, datetime.datetime.now().year + 1):
            year = str(year)
            if obs['edits_by_year'][year] > 0:
                last_edit = obs['last_edit_by_year'][year]
                editor_dt = relativedelta(last_edit, first_edit)
                editor_dt = (editor_dt.years * 12) + editor_dt.months
                for w in windows:
                    if w >= editor_dt:
                        data[int(year)][w] += 1
                        break
    print 'Storing data as %s' % os.path.join(settings.binary_location, dbname + '_cohort_data.bin')
    utils.store_object(data, settings.binary_location, dbname + '_cohort_data.bin')
    cohort_charts.prepare_cohort_dataset(dbname)




def date_falls_in_window(window_start, window_end, first_edit):
    if first_edit >= window_start and first_edit <= window_end:
        return True
    else:
        return False


def generate_wide_editor_dataset(tasks, dbname, collection, **kwargs):
    mongo = db.init_mongo_db(dbname)
    editors = mongo[collection + '_dataset']
    name = dbname + '_wide_editors.csv'
    fh = utils.create_txt_filehandle(settings.dataset_location, name, 'a', settings.encoding)
    x = 0
    vars_to_expand = ['edits', 'edits_by_year', 'articles_by_year']
    while True:
        try:
            id = input_queue.get(block=False)
            if id == None:
                break
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


def dataset_launcher(dbname, collection, target):
    if type(target) == type('str'):
        target = globals()[target]
    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')
    tasks = multiprocessing.JoinableQueue()
    #consumers = [multiprocessing.Process(target=target, args=(tasks, dbname, collection)) for i in xrange(settings.number_of_processes)]
    for editor in editors:
        tasks.put(editor)
    print 'The queue contains %s editors.' % tasks.qsize()
    tasks.put(None)
    target(tasks, dbname, collection)

    #for x in xrange(settings.number_of_processes):
    #    tasks.put(None)

    #for w in consumers:
    #    w.start()

    #tasks.join()


def debug(dbname, collection):
    editors = {
               '1':{'first_edit': datetime.datetime(2009, 10, 1), 'final_edit': datetime.datetime(2009, 11, 30)},
               '2':{'first_edit': datetime.datetime(2009, 12, 1), 'final_edit': datetime.datetime(2010, 2, 27)},
               '3':{'first_edit': datetime.datetime(2009, 3, 1), 'final_edit': datetime.datetime(2009, 11, 30)},
               '4':{'first_edit': datetime.datetime(2007, 1, 1), 'final_edit': datetime.datetime(2008, 4, 30)},
               '5':{'first_edit': datetime.datetime(2006, 5, 1), 'final_edit': datetime.datetime(2009, 7, 30)},
               '6':{'first_edit': datetime.datetime(2008, 11, 1), 'final_edit': datetime.datetime(2009, 6, 30)},
               '7':{'first_edit': datetime.datetime(2009, 1, 1), 'final_edit': datetime.datetime(2009, 10, 30)},
               '8':{'first_edit': datetime.datetime(2009, 7, 1), 'final_edit': datetime.datetime(2009, 7, 30)},
               '9':{'first_edit': datetime.datetime(2009, 12, 1), 'final_edit': datetime.datetime(2010, 11, 30)},
               '10':{'first_edit': datetime.datetime(2008, 5, 1), 'final_edit': datetime.datetime(2010, 11, 30)},
               '11':{'first_edit': datetime.datetime(2007, 2, 1), 'final_edit': datetime.datetime(2010, 3, 30)},
               '12':{'first_edit': datetime.datetime(2007, 2, 1), 'final_edit': datetime.datetime(2008, 2, 27)},
               '13':{'first_edit': datetime.datetime(2007, 2, 1), 'final_edit': datetime.datetime(2009, 4, 30)},
               }
    generate_cohort_dataset(editors, dbname, collection)


if __name__ == '__main__':
    dbname = 'enwiki'
    collection = 'editors'
    #debug(dbname, collection)
    dataset_launcher(dbname, collection, generate_cohort_dataset_forward)
    #dataset_launcher(dbname, collection, generate_long_editor_dataset)
    #dataset_launcher(dbname, collection, generate_wide_editor_dataset)
