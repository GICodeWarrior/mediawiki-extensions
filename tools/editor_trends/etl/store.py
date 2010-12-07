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
__date__ = '2010-11-19'
__version__ = '0.1'


from Queue import Empty
import datetime
import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()

from database import cache


#def store_editors(data_queue, **kwargs):
#    '''
#    @data_queue is an instance of Queue containing information extracted by
#    parse_editors()
#    kwargs should contain:
#    @dbname is the name of the MongoDB database where to store the information.
#    @collection is the name of the MongoDB collection.
#    '''
#    dbname = kwargs.get('dbname', None)
#    collection = kwargs.pop('collection')
#    mongo = db.init_mongo_db(dbname)
#    collection = mongo[collection]
#    mongo[collection].ensure_index('editor')
#    editor_cache = cache.EditorCache(collection)
#
#    while True:
#        try:
#            edit = data_queue.get(block=False)
#            data_queue.task_done()
#            if edit == None:
#                print 'Swallowing poison pill'
#                break
#            elif edit == 'NEXT':
#                editor_cache.add('NEXT', '')
#            else:
#                contributor = edit['editor']
#                value = {'date': edit['date'], 'article': edit['article']}
#                editor_cache.add(contributor, value)
#                #collection.update({'editor': contributor}, {'$push': {'edits': value}}, True)
#                #'$inc': {'edit_count': 1},
#
#        except Empty:
#            '''
#            This checks whether the Queue is empty because the preprocessors are
#            finished or because this function is faster in emptying the Queue
#            then the preprocessors are able to fill it. If the preprocessors
#            are finished and this Queue is empty than break, else wait for the
#            Queue to fill.
#            '''
#            pass
#
#    print 'Emptying entire cache.'
#    editor_cache.store()
#    print 'Time elapsed: %s and processed %s items.' % (datetime.datetime.now() - editor_cache.init_time, editor_cache.cumulative_n)


def load_cache_objects():
    cache = {}
    files = utils.retrieve_file_list(settings.binary_location, '.bin')
    for x, file in enumerate(files):
        cache[x] = utils.load_object(settings.binary_location, file)
    return cache


def search_cache_for_missed_editors(dbname, collection):
    mongo = db.init_mongo_db(dbname)
    collection = mongo[collection]
    editor_cache = cache.EditorCache(collection)
    cache = load_cache_objects()
    for c in cache:
        for editor in cache[c]:
            editor_cache.add(editor, cache[c][editor])
        cache[c] = {}
        editor_cache.add('NEXT', '')
    cache = {}


