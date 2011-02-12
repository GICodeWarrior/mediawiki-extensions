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
__date__ = '2010-11-02'
__version__ = '0.1'

import multiprocessing
from Queue import Empty
from operator import itemgetter
import datetime
import sys

from database import db
from utils import file_utils
from utils import messages
from classes import consumers
import shaper

try:
    import psyco
    psyco.full()
except ImportError:
    pass


class EditorConsumer(consumers.BaseConsumer):

    def run(self):
        while True:
            new_editor = self.task_queue.get()
            self.task_queue.task_done()
            print '%s editors to go...' % messages.show(self.task_queue.qsize)
            if new_editor == None:
                break
            new_editor()


class Editor(object):
    def __init__(self, id, input_db, output_db, **kwargs):
        self.id = id
        self.input_db = input_db
        self.output_db = output_db
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])

    def __str__(self):
        return '%s' % (self.id)

    def __call__(self):
        cutoff = 9
        editor = self.input_db.find_one({'editor': self.id})
        if editor == None:
            return
        edits = editor['edits']
        username = editor['username']
        first_year, final_year = determine_year_range(edits)
        monthly_edits = determine_edits_by_month(edits, first_year, final_year)
        monthly_edits = db.stringify_keys(monthly_edits)
        edits = sort_edits(edits)
        edit_count = len(edits)
        if len(edits) > cutoff:
            new_wikipedian = edits[cutoff]['date']
        else:
            new_wikipedian = False
        first_edit = edits[0]['date']
        final_edit = edits[-1]['date']
        edits_by_year = determine_edits_by_year(edits, first_year, final_year)
        edits_by_year = db.stringify_keys(edits_by_year)
        last_edit_by_year = determine_last_edit_by_year(edits, first_year, final_year)
        last_edit_by_year = db.stringify_keys(last_edit_by_year)
        articles_by_year = determine_articles_by_year(edits, first_year, final_year)
        articles_by_year = db.stringify_keys(articles_by_year)
        edits = edits[:cutoff]

        self.output_db.insert({'editor': self.id,
                          'edits': edits,
                          'edits_by_year': edits_by_year,
                          'new_wikipedian': new_wikipedian,
                          'edit_count': edit_count,
                          'final_edit': final_edit,
                          'first_edit': first_edit,
                          'articles_by_year': articles_by_year,
                          'monthly_edits': monthly_edits,
                          'last_edit_by_year': last_edit_by_year,
                          'username': username
                          }, safe=True)


def determine_year_range(edits):
    years = [year for year in edits if edits[year] != []]
    first_year = int(min(years))
    final_year = int(max(years)) + 1
    return first_year, final_year


def determine_last_edit_by_year(edits, first_year, final_year):
    dc = shaper.create_datacontainer(first_year, final_year, 0)
    for edit in edits:
        edit = edit['date']
        if dc[edit.year] == 0:
             dc[edit.year] = edit
        elif dc[edit.year] < edit:
             dc[edit.year] = edit
    return dc


def determine_edits_by_month(edits, first_year, final_year):
    dc = shaper.create_datacontainer(first_year, final_year)
    dc = shaper.add_months_to_datacontainer(dc, 0.0)
    for year in edits:
        for edit in edits[year]:
            m = edit['date'].month
            dc[int(year)][m] += 1
    return dc


def determine_edits_by_year(edits, first_year, final_year):
    '''
    This function counts the number of edits by year made by a particular editor. 
    '''
    dc = shaper.create_datacontainer(first_year, final_year, 0)
    for edit in edits:
        year = edit['date'].year
        dc[year] += 1
    return dc


def determine_articles_by_year(dates, first_year, final_year):
    '''
    This function counts the number of unique articles by year edited by a
    particular editor.
    '''
    articles = shaper.create_datacontainer(first_year, final_year, 'set')
    for date in dates:
        year = date['date'].year
        articles[year].add(date['article'])
    for year in articles:
        articles[year] = len(articles[year])
    return articles


def sort_edits(edits):
    edits = file_utils.merge_list(edits)
    return sorted(edits, key=itemgetter('date'))


def transform_editors_multi_launcher(rts):
    ids = db.retrieve_distinct_keys(rts.dbname, rts.editors_raw, 'editor')
#    kwargs = {'definition': 'traditional',
#              'pbar': True,
#              }
    tasks = multiprocessing.JoinableQueue()
    consumers = [EditorConsumer(tasks, None) for i in xrange(rts.number_of_processes)]

    for id in ids:
        tasks.put(Editor(rts.dbname, rts.editors_raw, id))
    for x in xrange(rts.number_of_processes):
        tasks.put(None)

    print messages.show(tasks.qsize)
    for w in consumers:
        w.start()

    tasks.join()


def setup_database(rts):
    mongo = db.init_mongo_db(rts.dbname)
    input_db = mongo[rts.editors_raw]
    output_db = mongo[rts.editors_dataset]

    output_db.ensure_index('editor')
    output_db.create_index('editor')
    output_db.ensure_index('new_wikipedian')
    output_db.create_index('new_wikipedian')
    return input_db, output_db


def transform_editors_single_launcher(rts):
    ids = db.retrieve_distinct_keys(rts.dbname, rts.editors_raw, 'editor')
    input_db, output_db = setup_database(rts)
    for x, id in enumerate(ids):
        print '%s editors to go...' % (len(ids) - x)
        editor = Editor(id, input_db, output_db)
        editor()


if __name__ == '__main__':
    transform_editors_single_launcher('enwiki', 'editors')
    #transform_editors_multi_launcher('enwiki', 'editors')
