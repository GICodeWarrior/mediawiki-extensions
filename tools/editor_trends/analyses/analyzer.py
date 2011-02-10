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


import sys
import os
import progressbar
import types
import datetime

sys.path.append('..')

import configuration
settings = configuration.Settings()
from database import db
from utils import timer
from utils import log
import dataset


def generate_chart_data(project, collection, language_code, func, encoder, **kwargs):
    '''
    This is the entry function to be called to generate data for creating charts.
    '''
    stopwatch = timer.Timer()
    res = True
    dbname = '%s%s' % (language_code, project)
    functions = available_analyses()
    try:
        func = functions[func]
    except KeyError:
        return False

    print 'Exporting data for chart: %s' % func.func_name
    print 'Project: %s' % dbname
    print 'Dataset: %s' % collection

    ds = loop_editors(dbname, project, collection, language_code, func, encoder, **kwargs)
    ds.create_filename()
    print 'Storing dataset: %s' % os.path.join(settings.dataset_location, ds.filename)
    ds.write(format='csv')

    print 'Serializing dataset to %s_%s' % (dbname, 'charts')
    log.log_to_mongo(ds, 'chart', 'storing', stopwatch, event='start')
    ds.write(format='mongo')
    stopwatch.elapsed()
    log.log_to_mongo(ds, 'chart', 'storing', stopwatch, event='finish')

    ds.summary()
    return res


def loop_editors(dbname, project, collection, language_code, func, encoder, **kwargs):
    '''
    Generic loop function that loops over all the editors of a Wikipedia project
    and then calls the function that does the actual aggregation.
    '''
    mongo = db.init_mongo_db(dbname)
    coll = mongo[collection]
    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')


    min_year, max_year = determine_project_year_range(dbname, collection, 'new_wikipedian')
    pbar = progressbar.ProgressBar(maxval=len(editors)).start()
    print 'Number of editors: %s' % len(editors)

    fmt = kwargs.pop('format', 'long')
    kwargs['min_year'] = min_year
    kwargs['max_year'] = max_year
    variables = []
    ds = dataset.Dataset(func.func_name,
                         project,
                         coll.name,
                         language_code,
                         encoder,
                         variables,
                         format=fmt)
    var = dataset.Variable('count', **kwargs)

    for editor in editors:
        editor = coll.find_one({'editor': editor})
        var = func(var, editor, dbname=dbname)
        pbar.update(pbar.currval + 1)

    ds.add_variable(var)
    return ds


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

    fn = os.path.realpath(__file__)
    pos = fn.rfind(os.sep)
    loc = fn[:pos]
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
    '''
    Dynamically importing functions from the plugins directory. 
    '''
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
    try:
        max_year = db.run_query(dbname, collection, var, 'max')
        max_year = max_year[var].year + 1
        min_year = db.run_query(dbname, collection, var, 'min')
        min_year = min_year[var].year
    except KeyError:
        min_year = 2001
        max_year = datetime.datetime.today().year + 1
    return min_year, max_year


if __name__ == '__main__':
    generate_chart_data('wiki', 'editors_dataset', 'en', 'histogram_by_backward_cohort', 'to_bar_json', time_unit='year', cutoff=0, cum_cutoff=50)
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'edit_patterns', 'to_bar_json', time_unit='year', cutoff=5)
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'total_number_of_new_wikipedians', 'to_bar_json', time_unit='year')
    #generate_chart_data('wiki', 'editors', 'en', 'total_number_of_articles', 'to_bar_json', time_unit='year')
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'total_cumulative_edits', 'to_bar_json', time_unit='year')
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'cohort_dataset_forward_histogram', 'to_bar_json', time_unit='month', cutoff=5, cum_cutoff=0)
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'cohort_dataset_backward_bar', 'to_stacked_bar_json', time_unit='year', cutoff=10, cum_cutoff=0, format='wide')
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'cohort_dataset_forward_bar', 'to_stacked_bar_json', time_unit='year', cutoff=5, cum_cutoff=0, format='wide')
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'histogram_edits', 'to_bar_json', time_unit='year', cutoff=0)
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'time_to_new_wikipedian', 'to_bar_json', time_unit='year', cutoff=0)
    #generate_chart_data('wiki', 'editors_dataset', 'en', 'new_editor_count', 'to_bar_json', time_unit='month', cutoff=0)

    #available_analyses()
