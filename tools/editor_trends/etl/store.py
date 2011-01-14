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
__date__ = '2011-01-04'
__version__ = '0.1'


import multiprocessing
import sys

sys.path.append('..')
import configuration
settings = configuration.Settings()
from utils import utils
from utils import messages
from database import cache
from database import db


def store_editors(tasks, dbname, collection, input):
    mongo = db.init_mongo_db(dbname)
    collection = mongo[collection]
    editor_cache = cache.EditorCache(collection)
    prev_contributor = -1
    edits = 0
    while True:
        file = tasks.get(block=False)
        tasks.task_done()
        if file == None:
            print 'Swallowing a poison pill.'
            break
        print '%s files left in the queue.' % messages.show(tasks.qsize)

        fh = utils.create_txt_filehandle(input, file, 'r', settings.encoding)
        for line in utils.readline(fh):
            print line
            if len(line) == 0:
                continue
            contributor = line[0]
            #print 'Parsing %s' % contributor
            if prev_contributor != contributor:
                if edits > 9:
                    editor_cache.add(prev_contributor, 'NEXT')
                    #print 'Stored %s' % prev_contributor
                else:
                    editor_cache.clear(prev_contributor)
                edits = 0
            edits += 1
            date = utils.convert_timestamp_to_datetime_utc(line[1]) #+ datetime.timedelta(days=1)
            article_id = int(line[2])
            username = line[3].encode(settings.encoding)
            value = {'date': date, 'article': article_id, 'username': username}
            editor_cache.add(contributor, value)
            prev_contributor = contributor
        fh.close()
        print editor_cache.n
        #return editor_cache.n


def launcher(input, dbname, collection):
    hack = True
    mongo = db.init_mongo_db(dbname)
    coll = mongo[collection]
    coll.ensure_index('editor')
    coll.create_index('editor')

    if hack:
        input = 'C:\wikimedia\en\wiki\dbready'
        files = utils.retrieve_file_list(input, 'txt')
    else:
        files = utils.retrieve_file_list(input, 'csv')
    print files
    print input
    tasks = multiprocessing.JoinableQueue()
    consumers = [multiprocessing.Process(target=store_editors, args=(tasks, dbname, collection, input)) for i in xrange(1)]
    for file in files:
        tasks.put(file)

    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    tasks.join()

    #filename = utils.retrieve_file_list(input, 'txt', mask=None)
    #if len(filename) > 1:
    #    filename = [f for f in filename if f.find('final') > -1]
    #filename = ''.join(filename)


