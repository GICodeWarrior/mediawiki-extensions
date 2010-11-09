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
__date__ = 'Oct 24, 2010'
__version__ = '0.1'

'''
This module provides a simple caching mechanism to speed-up the process of
inserting records to MongoDB. The caching object works as follows:
1) Each edit from an author is added to a dictionary
2) Every x seconds, the object returns %x with the least number of edits,
and these are then stored in MongoDB. By packaging multiple edits in a single
commit, processing time is significantly reduced.

This caching mechanism does not create any benefits for authors with single or
very few edits.
'''


import sys
import datetime
import random

import settings
import db
from utils import utils


class EditorCache(object):
    def __init__(self, collection):
        self.collection = collection
        self.editors = {}
        self.cumulative_n = 0
        self.init_time = datetime.datetime.now()
        self.time_started = datetime.datetime.now()
        self.n = 0
        self.emptied = 1
        self.number_editors = 0
        self.treshold_editors = set()
        self.treshold = 10

    def __repr__(self):
        return '%s_%s' % ('editor_cache', random.randint(0, 99999))

    def _store_editor(self, key, value):
        editor = self.collection.insert({'editor': key, 'edits': {}})
        self.editors[key]['id'] = str(editor)

    def current_cache_size(self):
        return sum([self.editors[k].get('obs', 0) for k in self.editors])

    def add(self, key, value):
        if value == 'NEXT':
            for editor in self.treshold_editors:
                self.insert (editor, self.editors[editor]['edits'])
                self.n -= self.editors[editor]['obs']
                self.number_editors -= 1
                del self.editors[editor]
            if key in self.editors:
                del self.editors[key]
            self.treshold_editors = set()
        else:
            self.cumulative_n += 1
            self.n += 1
            if key not in self.editors:
                self.editors[key] = {}
                self.editors[key]['obs'] = 0
                self.editors[key]['edits'] = {}
                self.add_years(key)
                self.number_editors += 1

            id = str(self.editors[key]['obs'])
            year = str(value['date'].year)
            self.editors[key]['edits'][year].append(value)
            self.editors[key]['obs'] += 1

            if self.editors[key]['obs'] == self.treshold:
                self.treshold_editors.add(key)

    def add_years(self, key):
        now = datetime.datetime.now().year + 1
        for year in xrange(2001, now):
            self.editors[key]['edits'][str(year)] = []


    def update(self, editor, values):
        self.collection.update({'editor': editor}, {'$pushAll': {'edits': values}}, upsert=True)

    def insert(self, editor, values):
        try:
            self.collection.insert({'editor': editor, 'edits': values})
        except:
            pass

    def store(self):
        utils.store_object(self, settings.BINARY_OBJECT_FILE_LOCATION, self.__repr__())

    def drop_n_observations(self, n=1):
        editors_to_remove = set()
        for editor in self.editors:
            if editor['obs'] <= n:
                editors_to_remove.add(editor)

        for editor in editors_to_remove:
            del self.editors[editor]


def debug():
    mongo = db.init_mongo_db('test')
    collection = mongo['test']
    cache = EditorCache(collection, wait=2)
    import random
    for i in xrange(100000):
        cache.add(str(random.randrange(0, 5)), {'date': 'woensaag', 'article': '3252'})
    cache.empty_all(-1)
    print 'Time elapsed: %s and processed %s items.' % (datetime.datetime.now() - cache.init_time, cache.cumulative_n)


if __name__ == '__main__':
    debug()
