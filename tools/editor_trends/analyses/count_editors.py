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
import os
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

def determine_project_year_range(dbname, collection, var):

    final_year = db.run_query(dbname, collection, var, 'max')
    final_year = final_year[var].year
    first_year = db.run_query(dbname, collection, var, 'min')
    first_year = first_year[var].year
    return first_year, final_year


def generate_chart_data(dbname, collection, func, unit='month'):
    '''
    This is the entry function to be called to generate data for creating charts.
    '''
    print 'Exporting data for chart: %s' % func.func_name
    print 'Project: %s, dataset: %s' % (dbname, collection)
    data, prop = loop_editors(dbname, collection, func, unit)
    file = '%s_%s.csv' % (dbname, func.func_name)
    print 'Storing dataset: %s' % os.path.join(settings.dataset_location, file)
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
    first_year, final_year = determine_project_year_range(dbname, '%s_dataset' % collection, 'new_wikipedian')
    print 'Number of editors: %s' % len(editors)
    mongo = db.init_mongo_db(dbname)
    dataset = mongo[collection + '_dataset']
    if unit == 'month':
        data = shaper.create_datacontainer(first_year, final_year, 'dict')
        data = shaper.add_months_to_datacontainer(data, 0)
    elif unit == 'year_list':
        data = shaper.create_datacontainer(first_year, final_year, 'list')
    elif unit == 'year_dict':
        data = shaper.create_datacontainer(first_year, final_year, 'dict')
        #data = shaper.add_years_to_datacontainer(data, 0)
    else:
        data = {}

    prop = None
    for editor in editors:
        editor = dataset.find_one({'editor': editor})
        data, prop = func(data, editor, prop, dbname=dbname, first_year=first_year, final_year=final_year)
    return data, prop


def cohort_dataset_forward_histogram(data, editor, prop, **kwargs):
    if prop == None:
        headers = ['year', 'edits']
        prop = ChartProperties(headers, False, 'long')
        prop.final_year = kwargs['final_year']

    new_wikipedian = editor['new_wikipedian']
    yearly_edits = editor['edits_by_year']
    for year in xrange(new_wikipedian.year, prop.final_year):
        data[new_wikipedian.year].append(yearly_edits[year])
    return data, prop


def cohort_dataset_backward_bar(data, editor, prop, **kwargs):

    mongo = db.init_mongo_db(dbname)
    editors = mongo[collection + '_dataset']
    windows = create_windows(break_down_first_year=False)
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
    filename = 'cohort_data_backward.bin'
    print 'Storing data as %s' % os.path.join(settings.binary_location, '%s_%s' % (dbname, filename))
    utils.store_object(data, settings.binary_location, '%s_%s' % (dbname, filename))
    cohort_charts.prepare_cohort_dataset(dbname, filename)



def cohort_dataset_forward_bar(data, editor, prop, **kwargs):
    if prop == None:
        first_year, final_year = kwargs['first_year'], kwargs['final_year']
        headers = ['experience'] + [y for y in xrange(first_year, final_year)]
        prop = ChartProperties(headers, True, 'wide')
        prop.final_year = final_year
        prop.cutoff_value = 5

    new_wikipedian = editor['new_wikipedian']
    last_edit = editor['final_edit']
    monthly_edits = editor['monthly_edits']
    yearly_edits = editor['edits_by_year']
    active = []
    for year in xrange(new_wikipedian.year, prop.final_year):
        max_edits = max(monthly_edits.get(str(year), {0:0}).values())
        if yearly_edits.get(str(year), 0) == 0 or max_edits < prop.cutoff_value:
            continue
        else:
            active.append(year)

    if active != []:
        year = max(active)
        exp = year - 2001
        if exp not in data[new_wikipedian.year]:
            data[new_wikipedian.year][exp] = 0
        data[new_wikipedian.year][exp] += 1
    return data, prop


def new_editor_count(data, editor, prop, **kwargs):
    '''
    Summary: This function generates an overview of the number of
    new_wikipedians for a given year / month combination. 
    Purpose: This data can be used to compare with Erik Zachte's
    stats.download.org to make sure that we are using the same numbers. 
    '''
    if prop == None:
        headers = ['year', 'month', 'count']
        prop = ChartProperties(headers, False, 'long')
    new_wikipedian = editor['new_wikipedian']
    data[new_wikipedian.year][new_wikipedian.month] += 1
    return data, prop


def active_editor_count(data, editor, prop, **kwargs):
    if prop == None:
        headers = ['%s-%s' % (m, k) for k in data.keys() for m in xrange(1, 13)]
        prop = ChartProperties(headers, False, 'long')

    first_year, final_year = kwargs['first_year'], kwargs['final_year']
    monthly_edits = editor['monthly_edits']
    for year in xrange(first_year, final_year):
        for month in xrange(1, 13):
            if monthly_edits[str(year)][str(month)] > 4:
                data[year][month] += 1
    return data, prop


def histogram_edits(data, editor, prop, **kwargs):
    if prop == None:
        headers = ['year', 'num_edits', 'frequency']
        prop = ChartProperties(headers, False, 'long')
    cnt = editor['edit_count']
    new_wikipedian = editor['new_wikipedian']
    data[new_wikipedian.year].append(cnt)
    return data, prop


def time_to_new_wikipedian(data, editor, prop, **kwargs):
    if prop == None:
        headers = ['year', 'time_to_new_wikipedian']
        prop = ChartProperties(headers, False, 'long')
    new_wikipedian = editor['new_wikipedian']
    first_edit = editor['first_edit']
    dt = new_wikipedian - first_edit
    data[new_wikipedian.year].append(dt.days)
    return data, prop


if __name__ == '__main__':
    generate_chart_data('enwiki', 'editors', cohort_dataset_forward_bar, unit='year_dict')
    #generate_chart_data('enwiki', 'editors', histogram_edits, unit='year_list')
    #generate_chart_data('enwiki', 'editors', time_to_new_wikipedian, unit='year_list')
