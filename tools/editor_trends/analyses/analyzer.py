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

from multiprocessing import JoinableQueue, Manager, RLock, Process
from multiprocessing.managers import BaseManager
from Queue import Empty

import sys
import cPickle
import os
import progressbar
import datetime

if '..' not in sys.path:
    sys.path.append('..')

import inventory
from classes import dataset
from classes import runtime_settings
from classes import consumers
from classes import exceptions
from classes import analytics
from classes import storage
from utils import timer
from utils import log


def reconstruct_observations(var):
    '''
    When the Task queue is empty then the Variable instance is returned. However,
    the observations in var.obs are still pickled. This function does two things:
    a) it uses an ordinary dictionary instead of a shared dictionary
    b) it reconstructs the serialized observations to instances of Observation
    '''
    if not isinstance(var, dataset.Variable):
        raise exceptions.GenericMessage('only_variables')

    keys = var.obs.keys()
    d = {}
    for key in keys:
        d[key] = cPickle.loads(var.obs[key])
    var.obs = d
    return var


def retrieve_plugin(func):
    functions = inventory.available_analyses()
    try:
        return functions[func]
    except KeyError:
        return False


def feedback(plugin, rts):
    print 'Exporting data for chart: %s' % plugin
    print 'Project: %s' % rts.dbname
    print 'Dataset: %s' % rts.editors_dataset


def write_output(ds, rts, stopwatch):
    filename = ds.create_filename()
    print 'Storing dataset: %s' % os.path.join(rts.dataset_location,
                                               filename)
    ds.write(format='csv')
    print 'Serializing dataset to %s_%s' % (rts.dbname, 'charts')
    #log.log_to_mongo(rts, 'chart', 'storing', stopwatch, event='start')
    #ds.write(format='mongo')
    #log.log_to_mongo(rts, 'chart', 'storing', stopwatch, event='finish')


def generate_chart_data(rts, func, **kwargs):
    '''
    This is the entry function to be called to generate data for creating 
    charts.
    '''
    stopwatch = timer.Timer()
    plugin = retrieve_plugin(func)
    available_plugins = inventory.available_analyses()
    if not plugin:
        raise exceptions.UnknownPluginError(plugin, available_plugins)

    feedback(func, rts)

    tasks = JoinableQueue()
    result = JoinableQueue()

    mgr = Manager()
    lock = mgr.RLock()
    obs = dict()
    obs_proxy = mgr.dict(obs)

    db = storage.init_database(rts.storage, rts.dbname, rts.editors_dataset)
    editors = db.retrieve_distinct_keys('editor')
    min_year, max_year = determine_project_year_range(db, 'new_wikipedian')

    fmt = kwargs.pop('format', 'long')
    time_unit = kwargs.pop('time_unit', 'year')
    kwargs['min_year'] = min_year
    kwargs['max_year'] = max_year


    var = dataset.Variable('count', time_unit, lock, obs_proxy, **kwargs)

    try:
        print 'Determinging whether plugin requires preloaded data...'
        preloader = getattr(plugin, 'preload')
        data = preloader(rts)
        print 'Finished preloading data...'
    except Exception, error:
        print Exception, error
        data = None
    finally:
        print 'Finished preloading data.'

    plugin = getattr(plugin, func)
    for editor in editors:
        tasks.put(analytics.Task(plugin, editor))

    analyzers = [analytics.Analyzer(rts, tasks, result, var, data) for
                 x in xrange(rts.number_of_processes)]


    for x in xrange(rts.number_of_processes):
        tasks.put(None)

    pbar = progressbar.ProgressBar(maxval=len(editors)).start()
    for analyzer in analyzers:
        analyzer.start()


    ppills = rts.number_of_processes
    while True:
        while ppills > 0:
            try:
                res = result.get(block=True)
                if res == True:
                    pbar.update(pbar.currval + 1)
                else:
                    ppills -= 1
                    var = res
            except Empty:
                pass
        break

    tasks.join()

    reconstruct_observations(var)
    ds = dataset.Dataset(plugin.func_name, rts, format=fmt, **kwargs)
    ds.add_variable(var)

    stopwatch.elapsed()
    write_output(ds, rts, stopwatch)

    ds.summary()


def determine_project_year_range(db, var):
    '''
    Determine the first and final year for the observed data
    '''
    try:
        obs = db.find(var, qualifier='max')
        max_year = obs[var].year + 1
        obs = db.find(var, qualifier='min')
        min_year = obs[var].year
    except KeyError:
        min_year = 2001
        max_year = datetime.datetime.today().year + 1
    return min_year, max_year


def launcher():
    project, language, parser = manage.init_args_parser()
    args = parser.parse_args(['django'])
    rts = runtime_settings.init_environment('wiki', 'en', args)
    generate_chart_data(rts, 'taxonomy_burnout', time_unit='month')
    #TEMP FIX, REMOVE 
#    rts.dbname = 'enwiki'
#    rts.editors_dataset = 'editors_dataset'
    #END TEMP FIX

#    replicator = analytics.Replicator('histogram_by_backward_cohort', time_unit='year')
#    replicator()
    #replicator = analytics.Replicator('cohort_dataset_backward_bar', time_unit='year', format='wide', languages=True)
    #replicator()

#    generate_chart_data('histogram_by_backward_cohort', time_unit='year', cutoff=1, cum_cutoff=10)
#    generate_chart_data('edit_patterns', time_unit='year', cutoff=5)
#    generate_chart_data('total_number_of_new_wikipedians', time_unit='year')
#    generate_chart_data('total_number_of_articles', time_unit='year')
#    generate_chart_data('total_cumulative_edits', time_unit='year')
#    generate_chart_data('cohort_dataset_forward_histogram', time_unit='month', cutoff=1, cum_cutoff=10)
#    generate_chart_data('cohort_dataset_backward_bar', time_unit='year', cutoff=1, cum_cutoff=10, format='wide')
#    generate_chart_data('cohort_dataset_forward_bar', time_unit='year', cutoff=5, cum_cutoff=0, format='wide')
#    generate_chart_data('histogram_edits', time_unit='year', cutoff=0)
#    generate_chart_data('time_to_new_wikipedian', time_unit='year', cutoff=0)
#    generate_chart_data('new_editor_count', time_unit='month', cutoff=0)
#    #available_analyses()



if __name__ == '__main__':
    launcher()
