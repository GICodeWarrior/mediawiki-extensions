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

from multiprocessing import JoinableQueue, Lock, Manager, RLock
from Queue import Empty
import sys
import cPickle
import os
import progressbar
import datetime

if '..' not in sys.path:
    sys.path.append('..')

import inventory
import manage as manager
from classes import dataset
from classes import runtime_settings
from classes import consumers
from database import db
from utils import timer
from utils import log

class Analyzer(consumers.BaseConsumer):

    def __init__(self, rts, tasks, result, var):
        super(Analyzer, self).__init__(rts, tasks, result)
        self.var = var

    def convert_synchronized_objects(self):
        for obs in self.var:
            obs = self.var[obs]
            obs.data = obs.data.value

    def store(self):
        #self.convert_synchronized_objects()
        location = os.path.join(self.rts.binary_location, '%s_%s.bin' % (self.var.name, self.name))
        fh = open(location, 'wb')
        cPickle.dump(self.var, fh)
        fh.close()

    def run(self):
        '''
        Generic loop function that loops over all the editors of a Wikipedia 
        project and then calls the function that does the actual aggregation.
        '''
        mongo = db.init_mongo_db(self.rts.dbname)
        coll = mongo[self.rts.editors_dataset]
        while True:
            try:
                task = self.tasks.get(block=False)
                self.tasks.task_done()
                if task == None:
                    #print self.var.number_of_obs(), len(self.var.obs)
                    #self.store()
                    self.result.put(self.var)
                    break
                editor = coll.find_one({'editor': task.editor})

                task.plugin(self.var, editor, dbname=self.rts.dbname)
                self.result.put(True)
            except Empty:
                pass

class Task:
    def __init__(self, plugin, editor):
        self.plugin = plugin
        self.editor = editor


def retrieve_plugin(func):
    functions = inventory.available_analyses()
    try:
        return functions[func]
    except KeyError:
        return False


def feedback(plugin, rts):
    print 'Exporting data for chart: %s' % plugin.func_name
    print 'Project: %s' % rts.dbname
    print 'Dataset: %s' % rts.editors_dataset


def write_output(ds, rts, stopwatch):
    ds.create_filename()
    print 'Storing dataset: %s' % os.path.join(rts.dataset_location,
                                               ds.filename)
    ds.write(format='csv')
    print 'Serializing dataset to %s_%s' % (rts.dbname, 'charts')
    log.log_to_mongo(rts, 'chart', 'storing', stopwatch, event='start')
    ds.write(format='mongo')
    log.log_to_mongo(rts, 'chart', 'storing', stopwatch, event='finish')


def generate_chart_data(rts, func, **kwargs):
    '''
    This is the entry function to be called to generate data for creating 
    charts.
    '''
    stopwatch = timer.Timer()
    plugin = retrieve_plugin(func)
    feedback(plugin, rts)


    tasks = JoinableQueue()
    result = JoinableQueue()
    mgr = Manager()
    lock = mgr.RLock()
    editors = db.retrieve_distinct_keys(rts.dbname, rts.editors_dataset, 'editor')
    min_year, max_year = determine_project_year_range(rts.dbname,
                                                      rts.editors_dataset,
                                                      'new_wikipedian')
    fmt = kwargs.pop('format', 'long')
    time_unit = kwargs.pop('time_unit', 'year')
    kwargs['min_year'] = min_year
    kwargs['max_year'] = max_year

    pbar = progressbar.ProgressBar(maxval=len(editors)).start()
    var = dataset.Variable('count', time_unit, lock, **kwargs)

    for editor in editors:
        tasks.put(Task(plugin, editor))

    consumers = [Analyzer(rts, tasks, result, var) for
                 x in xrange(rts.number_of_processes)]

    for x in xrange(rts.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

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
    ds = dataset.Dataset(plugin.func_name, rts, format=fmt)
    #var = consumers[0].var
    ds.add_variable(var)

    stopwatch.elapsed()
    write_output(ds, rts, stopwatch)

    ds.summary()
    return True


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
    project, language, parser = manager.init_args_parser()
    args = parser.parse_args(['django'])
    rts = runtime_settings.init_environment('wiki', 'en', args)

    #TEMP FIX, REMOVE 
    rts.dbname = 'enwiki'
    rts.editors_dataset = 'editors_dataset'
    #END TEMP FIX

    generate_chart_data(rts, 'histogram_by_backward_cohort', time_unit='year', cutoff=1, cum_cutoff=10)
#    generate_chart_data(rts, 'edit_patterns', time_unit='year', cutoff=5)
#    generate_chart_data(rts, 'total_number_of_new_wikipedians', time_unit='year')
#    generate_chart_data(rts, 'total_number_of_articles', time_unit='year')
#    generate_chart_data(rts, 'total_cumulative_edits', time_unit='year')
#    generate_chart_data(rts, 'cohort_dataset_forward_histogram', time_unit='month', cutoff=5, cum_cutoff=0)
#    generate_chart_data(rts, 'cohort_dataset_backward_bar', time_unit='year', cutoff=10, cum_cutoff=0, format='wide')
#    generate_chart_data(rts, 'cohort_dataset_forward_bar', time_unit='year', cutoff=5, cum_cutoff=0, format='wide')
#    generate_chart_data(rts, 'histogram_edits', time_unit='year', cutoff=0)
#    generate_chart_data(rts, 'time_to_new_wikipedian', time_unit='year', cutoff=0)
#    generate_chart_data(rts, 'new_editor_count', time_unit='month', cutoff=0)
#    #available_analyses()
