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
__date__ = '2010-12-10'
__version__ = '0.1'

import datetime
import multiprocessing
import calendar
import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()
from database import db
from etl import shaper
from utils import utils
from utils import messages


class ChartProperties:
    def __init__(self, headers, write_key, format):
        self.headers = headers
        self.write_key = write_key
        self.format = format


def generate_chart_data(dbname, collection, func, unit='month'):
    '''
    This is the entry function to be called to generate data for creating charts.
    '''
    print 'Exporting data for chart: %s' % func.func_name
    print 'Project: %s, dataset: %s' % (dbname, collection)
    data, prop = loop_editors(dbname, collection, func, unit)
    file = '%s_%s.csv' % (dbname, func.func_name)
    fh = utils.create_txt_filehandle(settings.dataset_location, file, 'w', settings.encoding)
    keys = data.keys()
    utils.write_list_to_csv(prop.headers, fh, recursive=False, newline=True)
    utils.write_dict_to_csv(data, fh, keys, write_key=prop.write_key, format=prop.format)
    fh.close()



def loop_editors(dbname, collection, func, unit):
    '''
    Generic loop function that loops over all the editors of a Wikipedia project
    and then calls the function that does the actual aggregation. 
    '''
    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')
    print 'Number of editors: %s' % len(editors)
    mongo = db.init_mongo_db(dbname)
    dataset = mongo[collection + '_dataset']
    if unit == 'month':
        data = shaper.create_datacontainer('dict')
        data = shaper.add_months_to_datacontainer(data, 0)
    elif unit == 'year_list':
        data = shaper.create_datacontainer('list')
    elif unit == 'year_dict':
        data = shaper.create_datacontainer('dict')
    else:
        data = {}

    start_year = 2001
    end_year = datetime.datetime.now().year + 1
    prop = None
    for editor in editors:
        editor = dataset.find_one({'editor': editor})
        data, prop = func(data, editor, prop)
    return data, prop


def new_editor_count(data, editor, prop):
    '''
    Summary: This function generates an overview of the number of
    new_wikipedians for a given year / month combination. 
    Purpose: This data can be used to compare with Erik Zachte's
    stats.download.org to make sure that we are using the same numbers. 
    '''
    if prop == None:
        headers = ['time', 'count']
        prop = ChartProperties(headers, False, 'long')
    new_wikipedian = editor['new_wikipedian']
    data[new_wikipedian.year][new_wikipedian.month] += 1
    return data, prop


def active_editor_count(data, editor, prop):
    if prop == None:
        headers = ['%s-%s' % (m, k) for k in data.keys() for m in xrange(1, 13)]
        prop = ChartProperties(headers, False, 'long')
    monthly_edits = editor['monthly_edits']
    for year in xrange(start_year, end_year):
        for month in xrange(1, 13):
            if monthly_edits[str(year)][str(month)] > 4:
                data[year][month] += 1
    return data, prop


def histogram_edits(data, editor, prop):
    if prop == None:
        headers = ['year', 'num_edits', 'frequency']
        prop = ChartProperties(headers, False, 'long')
    cnt = editor['edit_count']
    new_wikipedian = editor['new_wikipedian']
    data[new_wikipedian.year].append(cnt)
    return data, prop


def time_to_new_wikipedian(data, editor, prop):
    if prop == None:
        headers = ['year', 'time_to_new_wikipedian']
        prop = ChartProperties(headers, False, 'long')
    new_wikipedian = editor['new_wikipedian']
    first_edit = editor['first_edit']
    dt = new_wikipedian - first_edit
    data[new_wikipedian.year].append(dt.days)
    return data, prop



#def new_editor_count_launcher(dbname, collection):
#    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')
#    tasks = multiprocessing.JoinableQueue()
#    for editor in editors:
#        tasks.put(editor)
#    print 'The queue contains %s editors.' % messages.show(tasks.qsize)
#    tasks.put(None)
#    data = new_editor_count(tasks, dbname, collection)
#    headers = ['time', 'count']
#    file = '%s_aggrate_new_editor_count.csv' % dbname
#    keys = data.keys()
#    fh = utils.create_txt_filehandle(settings.dataset_location, file, 'w', settings.encoding)
#    utils.write_list_to_csv(headers, fh, recursive=False, newline=True)
#    utils.write_dict_to_csv(data, fh, keys, write_key=False, newline=False)
#    fh.close()
#
#
#def active_editor_count_launcher(dbname, collection):
#    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')
#    tasks = multiprocessing.JoinableQueue()
#    for editor in editors:
#        tasks.put(editor)
#    print 'The queue contains %s editors.' % messages.show(tasks.qsize)
#    tasks.put(None)
#    data = active_editor_count(tasks, dbname, collection)
#    keys = data.keys()
#    keys.sort()
#    headers = ['%s-%s' % (m, k) for k in keys for m in xrange(1, 13)]
#    file = '%s_aggrate_active_editor_count.csv' % dbname
#    fh = utils.create_txt_filehandle(settings.dataset_location, file, 'w', settings.encoding)
#    utils.write_list_to_csv(headers, fh, recursive=False, newline=True)
#    utils.write_dict_to_csv(data, fh, keys, write_key=False, newline=True)
#    fh.close()


if __name__ == '__main__':
    generate_chart_data('enwiki', 'editors', histogram_edits, unit='year_list')
    #generate_chart_data('enwiki', 'editors', time_to_new_wikipedian, unit='year_list')
