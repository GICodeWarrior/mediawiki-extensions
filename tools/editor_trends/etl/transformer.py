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

import progressbar
import multiprocessing
from Queue import Empty
from operator import itemgetter
import datetime
import sys
from copy import deepcopy

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

        last_edit_by_year = determine_last_edit_by_year(edits, first_year, final_year)
        articles_edited = determine_articles_workedon(edits, first_year, final_year)
        article_count = determine_article_count(articles_edited, first_year, final_year)
        articles_edited = db.stringify_keys(articles_edited)

        namespaces_edited = determine_namespaces_workedon(edits, first_year, final_year)
        character_count = determine_edit_volume(edits, first_year, final_year)
        revert_count = determine_number_reverts(edits, first_year, final_year)

        edits = sort_edits(edits)
        edit_count = determine_number_edits(edits, first_year, final_year)

        totals = {}
        counts = shaper.create_datacontainer(first_year, final_year)
        totals = calculate_totals(totals, counts, character_count, 'character_count')
        totals = calculate_totals(totals, counts, revert_count, 'revert_count')
        totals = calculate_totals(totals, counts, article_count, 'article_count')
        totals = calculate_totals(totals, counts, edit_count, 'edit_count')
        totals = db.stringify_keys(totals)

        if len(edits) > cutoff:
            new_wikipedian = edits[cutoff]['date']
        else:
            new_wikipedian = False
        first_edit = edits[0]['date']
        final_edit = edits[-1]['date']

        self.output_db.insert({'editor': self.id,
                               'username': username,
                               'new_wikipedian': new_wikipedian,
                               'final_edit': final_edit,
                               'first_edit': first_edit,
                               'last_edit_by_year': last_edit_by_year,
                               'articles_edited': articles_edited,
                               'edit_count': edit_count,
                               'namespaces_edited': namespaces_edited,
                               'article_count': article_count,
                               'character_count': character_count,
                               'revert_count': revert_count,
                               'totals': totals,
                               },
                               safe=True)


def cleanup_datacontainer(dc, variable_type):
    '''
    valid variable_type are either a {}, a [] or 0.
    '''
    years = dc.keys()
    for year in years:
        months = dc[year].keys()
        for month in months:
            if dc[year][month] == variable_type:
                del dc[year][month]
    return dc


def calculate_totals(totals, counts, dc, var):
    cnts = deepcopy(counts)
    totals.setdefault(var, {})
    for year in dc:
        for month in dc[year]:
            for ns in dc[year][month]:
                if isinstance(dc[year][month][ns], dict):
                    cnts[year].setdefault(ns, {})
                    for key in dc[year][month][ns]:
                        cnts[year][ns].setdefault(key, 0)
                        cnts[year][ns][key] += dc[year][month][ns][key]
                else:
                    cnts[year].setdefault(ns, 0)
                    #print year, ns, type(ns), dc[year][month][ns]
                    cnts[year][ns] += dc[year][month][ns]
    totals[var] = cnts
    return totals


def determine_number_edits(edits, first_year, final_year):
    dc = shaper.create_datacontainer(first_year, final_year)
    dc = shaper.add_months_to_datacontainer(dc, 'dict')
    for edit in edits:
        ns = edit['ns']
        year, month = str(edit['date'].year), edit['date'].month
        dc[year][month].setdefault(ns, 0)
        dc[year][month][ns] += 1
    dc = cleanup_datacontainer(dc, {})
    dc = db.stringify_keys(dc)
    return dc


def determine_articles_workedon(edits, first_year, final_year):
    dc = shaper.create_datacontainer(first_year, final_year)
    dc = shaper.add_months_to_datacontainer(dc, 'dict')
    for year in edits:
        for edit in edits[year]:
            month = edit['date'].month
            ns = edit['ns']
            dc[year][month].setdefault(ns, set())
            dc[year][month][ns].add(edit['article'])

    for year in dc:
        for month in dc[year]:
            for ns in dc[year][month]:
                dc[year][month][ns] = list(dc[year][month][ns])
    dc = cleanup_datacontainer(dc, {})
    return dc


def determine_namespaces_workedon(edits, first_year, final_year):
    dc = shaper.create_datacontainer(first_year, final_year)
    dc = shaper.add_months_to_datacontainer(dc, 'set')
    for year in edits:
        for edit in edits[year]:
            month = edit['date'].month
            dc[year][month].add(edit['ns'])
    for year in dc:
        for month in dc[year]:
            dc[year][month] = list(dc[year][month])
    dc = cleanup_datacontainer(dc, [])
    dc = db.stringify_keys(dc)
    return dc


def determine_number_reverts(edits, first_year, final_year):
    dc = shaper.create_datacontainer(first_year, final_year)
    dc = shaper.add_months_to_datacontainer(dc, 'dict')
    for year in edits:
        for edit in edits[year]:
            month = edit['date'].month
            ns = edit['ns']
            if edit['revert']:
                dc[year][month].setdefault(ns, 0)
                dc[year][month][ns] += 1
    dc = cleanup_datacontainer(dc, {})
    dc = db.stringify_keys(dc)
    return dc


def determine_edit_volume(edits, first_year, final_year):
    '''
    This function counts the number of characters added and remove  by year 
    by month by namespace for a particular editor. 
    '''
    dc = shaper.create_datacontainer(first_year, final_year)
    dc = shaper.add_months_to_datacontainer(dc, 'dict')
    for year in edits:
        for edit in edits[year]:
            month = edit['date'].month
            ns = edit['ns']
            dc[year][month].setdefault(ns, {})
            dc[year][month][ns].setdefault('added', 0)
            dc[year][month][ns].setdefault('removed', 0)
            print edit
            if edit['delta'] < 0:
                dc[year][month][ns]['removed'] += edit['delta']
            elif edit['delta'] > 0:
                dc[year][month][ns]['added'] += edit['delta']
    dc = cleanup_datacontainer(dc, {})
    dc = db.stringify_keys(dc)
    return dc


def determine_year_range(edits):
    years = [year for year in edits if edits[year] != []]
    first_year = int(min(years))
    final_year = int(max(years)) + 1
    return first_year, final_year


def determine_last_edit_by_year(edits, first_year, final_year):
    dc = shaper.create_datacontainer(first_year, final_year, 0)
    for year in edits:
        for edit in edits[year]:
            date = str(edit['date'].year)
            if dc[date] == 0:
                dc[date] = edit
            elif dc[date] < edit:
                dc[date] = edit
    dc = db.stringify_keys(dc)
    return dc


def determine_article_count(articles_edited, first_year, final_year):
    '''
    This function counts the number of unique articles by year edited by a
    particular editor.
    '''
    dc = shaper.create_datacontainer(first_year, final_year)
    dc = shaper.add_months_to_datacontainer(dc, 'dict')
    for year in articles_edited:
        for month in articles_edited[year]:
            for ns in articles_edited[year][month]:
                dc[year][month][ns] = len(articles_edited[year][month][ns])
    dc = db.stringify_keys(dc)
    return dc


def sort_edits(edits):
    edits = file_utils.merge_list(edits)
    return sorted(edits, key=itemgetter('date'))


def transform_editors_multi_launcher(rts):
    ids = db.retrieve_distinct_keys(rts.dbname, rts.editors_raw, 'editor')
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
    db.drop_collection(rts.dbname, rts.editors_dataset)
    output_db = mongo[rts.editors_dataset]

    output_db.ensure_index('editor')
    output_db.create_index('editor')
    output_db.ensure_index('new_wikipedian')
    output_db.create_index('new_wikipedian')
    return input_db, output_db


def transform_editors_single_launcher(rts):
    print rts.dbname, rts.editors_raw
    ids = db.retrieve_distinct_keys(rts.dbname, rts.editors_raw, 'editor')
    print len(ids)
    input_db, output_db = setup_database(rts)
    pbar = progressbar.ProgressBar(maxval=len(ids)).start()
    for x, id in enumerate(ids):
        editor = Editor(id, input_db, output_db)
        editor()
        pbar.update(pbar.currval + 1)


if __name__ == '__main__':
    transform_editors_single_launcher('enwiki', 'editors')
    #transform_editors_multi_launcher('enwiki', 'editors')
