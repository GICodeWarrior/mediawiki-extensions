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

from multiprocessing import Queue
from Queue import Empty
import datetime
from dateutil.relativedelta import *

import progressbar

import settings
from utils import models, utils
from database import db
from utils import process_constructor as pc

try:
    import psyco
    psyco.full()
except ImportError:
    pass


def retrieve_editor_ids_mongo(dbname, collection):
    if utils.check_file_exists(settings.BINARY_OBJECT_FILE_LOCATION,
                               'editors.bin'):
        ids = utils.load_object(settings.BINARY_OBJECT_FILE_LOCATION,
                               'editors.bin')
    else:
        mongo = db.init_mongo_db(dbname)
        editors = mongo[collection]
        ids = editors.distinct('editor')
        utils.store_object(ids, settings.BINARY_OBJECT_FILE_LOCATION, retrieve_editor_ids_mongo)
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

def write_longitudinal_data(id, edits, fh):
    years = edits.keys()
    years.sort()
    for year in years:
        months = edits[year].keys()
        months = [int(m) for m in months]
        months.sort()
        for m in months:
            date = datetime.date(int(year), int(m), 1)
            fh.write('%s\t%s\t%s\n' % (id, date, edits[year][str(m)]))


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


def generate_long_editor_dataset(input_queue, data_queue, pbar, **kwargs):
    debug = kwargs.pop('debug')
    dbname = kwargs.pop('dbname')
    mongo = db.init_mongo_db(dbname)
    editors = mongo['dataset']
    name = dbname + '_long_editors.csv'
    fh = utils.create_txt_filehandle(settings.DATASETS_FILE_LOCATION, name, 'a', settings.ENCODING)
    x = 0
    vars_to_expand = []
    while True:
        try:
            id = input_queue.get(block=False)
            obs = editors.find_one({'editor': id}, {'monthly_edits': 1})
            if x == 0:
                headers = obs.keys()
                headers.sort()
                headers = expand_headers(headers, vars_to_expand, obs)
                utils.write_list_to_csv(headers, fh)
            write_longitudinal_data(id, obs['monthly_edits'], fh)
            #utils.write_list_to_csv(data, fh)
            x += 1
        except Empty:
            break


def generate_cohort_analysis(input_queue, data_queue, pbar, **kwargs):
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
    utils.store_object(data, settings.BINARY_OBJECT_FILE_LOCATION, 'cohort_data')

def date_falls_in_window(window_start, window_end, first_edit, last_edit):
    if first_edit >= window_start and first_edit <= window_end:
        return True
    else:
        return False


def generate_wide_editor_dataset(input_queue, data_queue, pbar, **kwargs):
    dbname = kwargs.pop('dbname')
    mongo = db.init_mongo_db(dbname)
    editors = mongo['dataset']
    name = dbname + '_wide_editors.csv'
    fh = utils.create_txt_filehandle(settings.DATASETS_FILE_LOCATION, name, 'a', settings.ENCODING)
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
    input_queue = pc.load_queue(ids)
    kwargs = {'nr_input_processors': 1,
              'nr_output_processors': 1,
              'debug': True,
              'dbname': dbname,
              }
    generate_editor_dataset(input_queue, False, False, kwargs)


if __name__ == '__main__':
    #generate_editor_dataset_debug('test')
    generate_editor_dataset_launcher('enwiki')
    #debug_retrieve_edits_by_contributor_launcher()
