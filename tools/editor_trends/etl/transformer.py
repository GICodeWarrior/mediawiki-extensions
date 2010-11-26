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
__date__ = '2010-11-02'
__version__ = '0.1'

import multiprocessing
from Queue import Empty
from operator import itemgetter
import datetime
import sys

sys.path.append('..')
import configuration
settings = configuration.Settings()
from database import db
from utils import process_constructor as pc
from utils import utils
from utils import models
import construct_datasets
import shaper

try:
    import psyco
    psyco.full()
except ImportError:
    pass


class EditorConsumer(models.BaseConsumer):

    def run(self):
        while True:
            new_editor = self.task_queue.get()
            self.task_queue.task_done()
            if new_editor == None:
                break
            new_editor()


class Editor(object):
    def __init__(self, dbname, collection, id, **kwargs):
        self.dbname = dbname
        self.id = id
        self.collection = collection
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])
    
    def __str__(self):
        return '%s' % (self.id)

    def __call__(self):
        self.mongo = db.init_mongo_db(self.dbname)
        input_db = self.mongo[self.collection]
        output_db = self.mongo[self.collection +'_dataset']
        
        output_db.ensure_index('editor')
        output_db.create_index('editor')
        output_db.ensure_index('year_joined')
        output_db.create_index('year_joined')
        
        editor = input_db.find_one({'editor': self.id})
        if editor == None:
            return
        edits = editor['edits']
        username = editor['username']
        monthly_edits = determine_edits_by_month(edits)
        edits = sort_edits(edits)
        edit_count = len(edits)
        new_wikipedian = edits[9]['date']
        first_edit = edits[0]['date']
        final_edit = edits[-1]['date']
        edits_by_year = determine_edits_by_year(edits)
        articles_by_year = determine_articles_by_year(edits)
        edits = edits[:10]
        output_db.insert({'editor': self.id, 
                          'edits': edits,
                          'edits_by_year': edits_by_year,
                          'new_wikipedian': new_wikipedian,
                          'edit_count': edit_count,
                          'final_edit': final_edit,
                          'first_edit': first_edit,
                          'articles_by_year': articles_by_year,
                          'monthly_edits': monthly_edits,
                          'username': username
                          })


def determine_edits_by_month(edits):
    datacontainer = shaper.create_datacontainer(init_value=0)
    datacontainer = shaper.add_months_to_datacontainer(datacontainer)
    for year in edits:
        for edit in edits[year]:
            m = str(edit['date'].month)
            datacontainer[year][m] += 1
    return datacontainer


def determine_edits_by_year(dates):
    '''
    This function counts the number of edits by year made by a particular editor. 
    '''
    edits = shaper.create_datacontainer()
    for date in dates:
        year = str(date['date'].year)
        edits[year] += 1
    return edits


def determine_articles_by_year(dates):
    '''
    This function counts the number of unique articles by year edited by a
    particular editor.
    '''
    articles = shaper.create_datacontainer('set')
    for date in dates:
        year = str(date['date'].year)
        articles[year].add(date['article'])
    for year in articles:
        articles[year] = len(articles[year])
    return articles


def sort_edits(edits):
    edits = utils.merge_list(edits)
    return sorted(edits, key=itemgetter('date'))


def run_optimize_editors(dbname, collection):
    ids = exporter.retrieve_editor_ids_mongo(dbname, collection)
    kwargs = {'definition': 'traditional',
              'pbar': True,
              }
    tasks = multiprocessing.JoinableQueue()
    consumers = [EditorConsumer(tasks, None) for i in xrange(settings.number_of_processes)]
    
    for id in ids:
        tasks.put(Editor(dbname, collection, id))
    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    print tasks.qsize()
    for w in consumers:
        w.start()

    tasks.join()


def debug_optimize_editors(dbname):
    ids = exporter.retrieve_editor_ids_mongo(dbname, 'editors')
    q = pc.load_queue(ids)
    kwargs = {'definition': 'traditional',
              'dbname': dbname
    }
    optimize_editors(q, False, True, kwargs)


if __name__ == '__main__':
    #debug_optimize_editors('test')
    run_optimize_editors('enwiki', 'test')
