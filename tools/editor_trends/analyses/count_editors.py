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
__date__ = '2010-12-10'
__version__ = '0.1'

import datetime
import multiprocessing
import calendar
import sys
import os
import progressbar
import types
from dateutil.relativedelta import relativedelta

sys.path.append('..')

import configuration
settings = configuration.Settings()
from database import db
from etl import shaper
from utils import file_utils
from utils import timer
from utils import messages
from utils import log
import dataset

def available_analyses(caller='manage'):
    '''
    Generates a dictionary:
        key: name of analysis
        value: function that generates the dataset
        ignore: a list of functions that should never be called from manage.py,
        they are not valid entry points. 
    '''
    assert caller == 'django' or caller == 'manage'
    ignore = ['analyses', 'determine_project_year_range', 'create_windows',
              'generate_chart_data', 'loop_editors']
    functions = {}
    for func in globals():
        func = globals()[func]
        if isinstance(func, types.FunctionType) and func.func_name not in ignore:
            functions[func.func_name] = func
    if caller == 'manage':
        return functions
    elif caller == 'django':
        django_functions = []
        for function in functions:
            fancy_name = function.replace('_', ' ').title()
            django_functions.append((function, fancy_name))

        return django_functions


def determine_project_year_range(dbname, collection, var):
    '''
    Determine the first and final year for the observed data
    '''
    max_year = db.run_query(dbname, collection, var, 'max')
    max_year = max_year[var].year + 1
    min_year = db.run_query(dbname, collection, var, 'min')
    min_year = min_year[var].year
    return min_year, max_year


def create_windows(var, break_down_first_year=True):
    '''
    This function creates a list of months. If break_down_first_year = True then
    the first year will be split in 3, 6, 9 months as well. 
    '''
    years = var.max_year - var.min_year
    windows = [y * 12 for y in xrange(1, years)]
    if break_down_first_year:
        windows = [3, 6, 9] + windows
    return windows


def generate_chart_data(project, collection, language_code, func, **kwargs):
    '''
    This is the entry function to be called to generate data for creating charts.
    '''
    stopwatch = timer.Timer()
    dbname = '%s%s' % (language_code, project)
    print 'Exporting data for chart: %s' % func.func_name
    print 'Project: %s' % dbname
    print 'Dataset: %s' % collection
    ds = loop_editors(dbname, project, collection, language_code, func, **kwargs)
    file = '%s_%s.csv' % (dbname, func.func_name)
    print 'Storing dataset: %s' % os.path.join(settings.dataset_location, file)
    ds.write(format='csv')
    print 'Serializing dataset to %s_%s' % (dbname, 'charts')
    log.log_to_mongo(ds, 'chart', 'storing', stopwatch, event='start')
    ds.write(format='mongo')
    stopwatch.elapsed()
    log.log_to_mongo(ds, 'chart', 'storing', stopwatch, event='finish')

def loop_editors(dbname, project, collection, language_code, func, **kwargs):
    '''
    Generic loop function that loops over all the editors of a Wikipedia project
    and then calls the function that does the actual aggregation. 
    '''

    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')
    pbar = progressbar.ProgressBar(maxval=len(editors)).start()
    min_year, max_year = determine_project_year_range(dbname, collection, 'new_wikipedian')
    print 'Number of editors: %s' % len(editors)
    mongo = db.init_mongo_db(dbname)
    coll = mongo[collection]
    format = kwargs.pop('format')
    kwargs['min_year'] = min_year
    kwargs['max_year'] = max_year
    vars = []
    ds = dataset.Dataset(func.func_name, project, coll.name, language_code, vars, format=format)
    var = dataset.Variable('count', **kwargs)
#                           cutoff=cutoff,
#                           cum_cutoff=cum_cutoff,
#                           min_year=min_year,
#                           max_year=max_year)
    for editor in editors:
        editor = coll.find_one({'editor': editor})
        data = func(var, editor, dbname=dbname)
        pbar.update(pbar.currval + 1)

    ds.add_variable(var)
    return ds


def cohort_dataset_forward_histogram(var, editor, **kwargs):
#        headers = ['year', 'month', 'edits']
    new_wikipedian = editor['new_wikipedian']
    final_edit = editor['final_edit']
    yearly_edits = editor['edits_by_year']
    n = editor['edit_count']

    if n >= ds.count.cum_cutoff:
        for i, year in enumerate(xrange(new_wikipedian.year, final_edit.year)):
            edits = editor['monthly_edits'].get(str(year), {0:0})
            if year == new_wikipedian.year:
                start = new_wikipedian.month
            else:
                start = 1
            for month in xrange(start, 13):
                if edits.get(str(month), 0) >= ds.count.cutoff:
                    experience = i * 12 + (month - new_wikipedian.month)
                    var.add(new_wikipedian, {experience: 1})
    return var


def cohort_dataset_backward_bar(var, editor, **kwargs):
    #first_edit = editor['first_edit']
    new_wikipedian = editor['new_wikipedian']
    n = editor['edit_count']

    if n >= var.cum_cutoff:
        windows = create_windows(var, break_down_first_year=False)
        for year in xrange(new_wikipedian.year, var.max_year):
            year = str(year)
            if editor['edits_by_year'][year] >= var.cutoff:
                last_edit = editor['last_edit_by_year'][year]
                if last_edit != 0.0:
                    editor_dt = relativedelta(last_edit, new_wikipedian)
                    editor_dt = (editor_dt.years * 12) + editor_dt.months
                    for w in windows:
                        if w >= editor_dt:
                            datum = datetime.datetime(int(year), 12, 31)
                            var.add(datum, {w:1})
                            break
    return var


def cohort_dataset_forward_bar(var, editor, **kwargs):
    new_wikipedian = editor['new_wikipedian']
    last_edit = editor['final_edit']
    monthly_edits = editor['monthly_edits']
    yearly_edits = editor['edits_by_year']
    n = editor['edit_count']

    if n >= var.cum_cutoff:
        for year in xrange(new_wikipedian.year, var.max_year):
            max_edits = max(monthly_edits.get(str(year), {0:0}).values())
            if yearly_edits.get(str(year), 0) == 0 or max_edits < var.cutoff:
                continue
            else:
                experience = (year - new_wikipedian.year) + 1
                var.add(new_wikipedian, {experience: 1 })
    return var


def new_editor_count(var, editor, **kwargs):
    '''
    Summary: This function generates an overview of the number of
    new_wikipedians for a given year / month combination. 
    Purpose: This data can be used to compare with Erik Zachte's
    stats.download.org to make sure that we are using the same numbers. 
    '''
#   headers = ['year', 'month', 'count']
    new_wikipedian = editor['new_wikipedian']
    var.add(new_wikipedian, {0:1})
    return var


def active_editor_count(var, editor, **kwargs):
    monthly_edits = editor['monthly_edits']
    for year in xrange(ds.count.min_year, var.max_year):
        for month in xrange(1, 13):
            if monthly_edits[str(year)][str(month)] >= var.cutoff:
                datum = datetime.date(year, month, 1)
                var.add(datum, {0:1})
    return var


def histogram_edits(var, editor, **kwargs):
#        headers = ['year', 'num_edits', 'frequency']
    cnt = editor['edit_count']
    new_wikipedian = editor['new_wikipedian']
    var.add(new_wikipedian, {0: cnt})
    return var


def time_to_new_wikipedian(var, editor, **kwargs):
#    headers = ['year', 'time_to_new_wikipedian']
    new_wikipedian = editor['new_wikipedian']
    first_edit = editor['first_edit']
    dt = new_wikipedian - first_edit
    var.add(new_wikipedian, {0:dt.days}, update=False)
    return var


if __name__ == '__main__':
    #generate_chart_data('wiki', 'editors_dataset', 'en',cohort_dataset_forward_histogram, time_unit='month', cutoff=1, cum_cutoff=50)
    generate_chart_data('wiki', 'editors_dataset', 'en', cohort_dataset_backward_bar, time_unit='year', cutoff=0, cum_cutoff=50, format='wide')
    generate_chart_data('wiki', 'editors_dataset', 'en', cohort_dataset_forward_bar, time_unit='year', cutoff=0, cum_cutoff=50, format='wide')
    #generate_chart_data('wiki', 'editors_dataset','en', histogram_edits, time_unit='year', cutoff=0)
    #generate_chart_data('wiki', 'editors_dataset','en', time_to_new_wikipedian, time_unit='year', cutoff=0)
    #generate_chart_data('wiki', 'editors_dataset','en', new_editor_count, time_unit='month', cutoff=0)

    #analyses()
