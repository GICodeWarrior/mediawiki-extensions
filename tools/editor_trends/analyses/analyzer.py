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
import inspect
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
import analyses.plugins as plugins
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
    ignore = ['__init__']
    functions = {}

    fn = '%s.py' % inspect.getmodulename(__file__)
    loc = __file__.replace(fn, '')
    path = os.path.join(loc , 'plugins')
    plugins = import_libs(path)

    for plugin in plugins:
        if isinstance(plugin, types.FunctionType) and plugin.func_name not in ignore:
            functions[plugin.func_name] = plugin
    if caller == 'manage':
        return functions
    elif caller == 'django':
        django_functions = []
        for function in functions:
            fancy_name = function.replace('_', ' ').title()
            django_functions.append((function, fancy_name))

        return django_functions


def import_libs(path):
    """ 
    Dynamically importing functions from the plugins directory. 
    """

    library_list = []
    sys.path.append(path)
    for f in os.listdir(os.path.abspath(path)):
        module_name, ext = os.path.splitext(f)
        if ext == '.py':
            module = __import__(module_name)
            func = getattr(module, module_name)
            library_list.append(func)

    return library_list


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
    print 'Exporting data for chart: %s' % func
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
    format = kwargs.pop('format', 'long')
    kwargs['min_year'] = min_year
    kwargs['max_year'] = max_year
    vars = []
    ds = dataset.Dataset(func, project, coll.name, language_code, vars, format=format)
    var = dataset.Variable('count', **kwargs)

    functions = available_analyses()
    func = functions[func]

    for editor in editors:
        editor = coll.find_one({'editor': editor})
        data = func(var, editor, dbname=dbname)
        pbar.update(pbar.currval + 1)

    ds.add_variable(var)
    return ds


if __name__ == '__main__':

    generate_chart_data('wiki', 'editors_dataset', 'en', 'cohort_dataset_forward_histogram', time_unit='month', cutoff=1, cum_cutoff=50)
    #generate_chart_data('wiki', 'editors_dataset', 'en', cohort_dataset_backward_bar, time_unit='year', cutoff=0, cum_cutoff=50, format='wide')
    #generate_chart_data('wiki', 'editors_dataset', 'en', cohort_dataset_forward_bar, time_unit='year', cutoff=0, cum_cutoff=50, format='wide')
    #generate_chart_data('wiki', 'editors_dataset','en', histogram_edits, time_unit='year', cutoff=0)
    #generate_chart_data('wiki', 'editors_dataset','en', time_to_new_wikipedian, time_unit='year', cutoff=0)
    #generate_chart_data('wiki', 'editors_dataset','en', new_editor_count, time_unit='month', cutoff=0)

    #available_analyses()
