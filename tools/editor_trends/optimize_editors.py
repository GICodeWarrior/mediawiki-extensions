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

from multiprocessing import Queue
from Queue import Empty
from operator import itemgetter
import datetime

import settings
from database import db
from utils import process_constructor as pc
from utils import utils
import construct_datasets


try:
    import psyco
    psyco.full()
except ImportError:
    pass


def create_datacontainer(init_value=0):
    '''
    This function initializes an empty dictionary with as key the year (starting
    2001 and running through) and as value @init_value, in most cases this will
    be zero so the dictionary will act as a running tally for a variable but
    @init_value can also a list, [], or a dictionary, {}, or a set, set().  
    '''
    data = {}
    year = datetime.datetime.now().year + 1
    for x in xrange(2001, year):
        data[str(x)] = init_value
    return data


def add_months_to_datacontainer(datacontainer):
    for dc in datacontainer:
        datacontainer[dc] = {}
        for x in xrange(1, 13):
             datacontainer[dc][str(x)] = 0
    return datacontainer


def determine_edits_by_month(edits):
    datacontainer = create_datacontainer(init_value=0)
    datacontainer = add_months_to_datacontainer(datacontainer)
    for year in edits:
        months = set()
        for edit in edits[year]:
            m = str(edit['date'].month)
            if m not in months:
                datacontainer[year][m] = 1
                months.add(m)
            if len(months) == 12:
                break
    return datacontainer
    

def determine_edits_by_year(dates):
    '''
    This function counts the number of edits by year made by a particular editor. 
    '''
    edits = create_datacontainer()
    for date in dates:
        year = str(date['date'].year)
        edits[year] += 1
    return edits


def determine_articles_by_year(dates):
    '''
    This function counts the number of unique articles by year edited by a
    particular editor.
    '''
    articles = create_datacontainer(set())
    for date in dates:
        year = str(date['date'].year)
        articles[year].add(date['article'])
    for article in articles:
        articles[article] = len(articles[article])
    return articles


def sort_edits(edits):
    edits = utils.merge_list(edits)
    return sorted(edits, key=itemgetter('date'))


def optimize_editors(input_queue, result_queue, pbar, **kwargs):
    dbname = kwargs.pop('dbname')
    mongo = db.init_mongo_db(dbname)
    input = mongo['test']
    output = mongo['dataset']
    output.ensure_index('editor')
    output.ensure_index('year_joined')
    definition = kwargs.pop('definition')
    while True:
        try:
            id = input_queue.get(block=False)
            editor = input.find_one({'editor': id})
            if editor == None:
                continue
            edits = editor['edits']
            monthly_edits = determine_edits_by_month(edits)
            edits = sort_edits(edits)
            edit_count = len(edits)
            new_wikipedian = edits[9]['date']
            first_edit = edits[0]['date']
            final_edit = edits[-1]['date']
            edits_by_year = determine_edits_by_year(edits)
            articles_by_year = determine_articles_by_year(edits)
            
            edits = edits[:10]

            output.insert({'editor': id, 'edits': edits,
                           'edits_by_year': edits_by_year,
                           'new_wikipedian': new_wikipedian,
                           'edit_count': edit_count,
                           'final_edit': final_edit,
                           'first_edit': first_edit,
                           'articles_by_year': articles_by_year,
                           'monthly_edits': monthly_edits})
            print 'Items left: %s' % input_queue.qsize()
        except Empty:
            break


def run_optimize_editors(dbname):
    ids = construct_datasets.retrieve_editor_ids_mongo(dbname, 'editors')
    kwargs = {'definition': 'traditional',
              'pbar': True,
              'dbname': 'enwiki',
              'nr_input_processors': 1,
              'nr_output_processors': 0,
              'poison_pill': False
              }
    print len(ids)
    ids = list(ids)
    chunks = dict(0, ids)
    pc.build_scaffolding(pc.load_queue, optimize_editors, chunks, False, False, **kwargs)


def debug_optimize_editors(dbname):
    ids = construct_datasets.retrieve_editor_ids_mongo(dbname, 'editors')
    q = pc.load_queue(ids)
    kwargs = {'definition': 'traditional',
              'dbname': dbname
    }
    optimize_editors(q, False, True, kwargs)


if __name__ == '__main__':
    #debug_optimize_editors('test')
    run_optimize_editors('enwiki')