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
__date__ = '2011-01-04'
__version__ = '0.1'

from Queue import Empty
import multiprocessing
import sys
import os

from utils import file_utils
from utils import text_utils
from database import cache
from utils import messages
from database import db


def store_articles(rts):
    location = os.path.join(rts.input_location, rts.language.code, rts.project.name)
    fh = file_utils.create_txt_filehandle(location, 'articles.csv', 'r', rts.encoding)
    headers = ['id', 'title']
    data = file_utils.read_unicode_text(fh)
    fh.close()

    mongo = db.init_mongo_db(rts.dbname)
    collection = mongo[rts.articles_raw]

    articles = {}
    for x, d in enumerate(data):
        d = d.split('\t')
        x = str(x)
        articles[x] = {}
        for k, v in zip(headers, d):
            articles[x][k] = v

    collection.insert(articles)


def store_editors(tasks, rts):
    '''
    This function is called by multiple consumers who each take a sorted file 
    and create a cache object. If the number of edits made by an editor is above
    the treshold then the cache object stores the data in Mongo, else the data
    is discarded.
    The treshold is currently more than 9 edits and is not yet configurable. 
    '''
    mongo = db.init_mongo_db(rts.dbname)
    collection = mongo[rts.editors_raw]

    editor_cache = cache.EditorCache(collection)
    prev_contributor = -1
    while True:
        try:
            filename = tasks.get(block=False)
        except Empty:
            break

        tasks.task_done()
        if filename == None:
            print 'Swallowing a poison pill.'
            break
        print '%s files left in the queue.' % messages.show(tasks.qsize)

        fh = file_utils.create_txt_filehandle(rts.sorted, filename, 'r', rts.encoding)
        for line in file_utils.read_raw_data(fh):
            if len(line) > 1:
                contributor = line[0]
                #print 'Parsing %s' % contributor
                if prev_contributor != contributor and prev_contributor != -1:
                    editor_cache.add(prev_contributor, 'NEXT')
                date = text_utils.convert_timestamp_to_datetime_utc(line[1])
                article_id = int(line[2])
                username = line[3].encode(rts.encoding)
                ns = int(line[4])
                value = {'date': date,
                         'article': article_id,
                         'username': username,
                         'ns': ns}
                editor_cache.add(contributor, value)
                prev_contributor = contributor
        fh.close()
        #print editor_cache.n


def launcher(rts):
    '''
    This is the main entry point and creates a number of workers and launches
    them. 
    '''
    #rts.sorted, rts.dbname, rts.collection
    mongo = db.init_mongo_db(rts.dbname)
    coll = mongo[rts.editors_raw]
    coll.ensure_index('editor')
    coll.create_index('editor')

    files = file_utils.retrieve_file_list(rts.sorted, 'csv')

    print 'Input directory is: %s ' % rts.sorted
    tasks = multiprocessing.JoinableQueue()
    consumers = [multiprocessing.Process(target=store_editors,
                args=(tasks, rts))
                for i in xrange(rts.number_of_processes)]

    for filename in files:
        tasks.put(filename)

    for x in xrange(rts.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    tasks.join()
    store_articles(rts)


def debug():
    store_articles('wiki', 'cs')


if __name__ == '__main__':
    debug()
