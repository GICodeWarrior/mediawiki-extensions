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
__date__ = '2010-11-16'
__version__ = '0.1'

import os
import sys
import multiprocessing
from Queue import Empty

sys.path.append('..')
import configuration
settings = configuration.Settings()
from database import db
from database import cache
from utils import utils
from utils import sort


def store_editors(input, dbname, collection):
    filename = utils.retrieve_file_list(input, 'txt', mask=None)[0]
    fh = utils.create_txt_filehandle(input, filename, 'r', settings.encoding)
    mongo = db.init_mongo_db(dbname)
    collection = mongo[collection]
    collection.ensure_index('editor')
    collection.create_index('editor')
    editor_cache = cache.EditorCache(collection)
    prev_contributor = -1
    edits = 0
    for line in sort.readline(fh):
        if len(line) == 0:
            continue
        contributor = line[0]
        #print 'Parsing %s' % contributor
        if prev_contributor != contributor:
            if edits > 9:
                editor_cache.add(prev_contributor, 'NEXT')
                print 'Stored %s' % prev_contributor
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
    return editor_cache.n

def mergesort_external_launcher(input, output):
    files = utils.retrieve_file_list(input, 'txt', mask='')
    x = 0
    maxval = 99999
    while maxval >= settings.max_filehandles:
        x += 1.0
        maxval = round(len(files) / x)
    chunks = utils.split_list(files, int(x))

    to_remove = []
    for chunk in chunks:
        print '1st iteration external mergesort'
        filehandles = [utils.create_txt_filehandle(input, file, 'r', settings.encoding) for file in chunks[chunk]]
        filename = sort.merge_sorted_files(output, filehandles, chunk)
        if len(chunks) > 1:
            to_remove.append(filename)
        filehandles = [fh.close() for fh in filehandles]

    if len(chunks) > 1:
        print '2nd iteration external mergesort'
        files = utils.retrieve_file_list(output, 'txt', mask='[merged]')
        filehandles = [utils.create_txt_filehandle(output, file, 'r', settings.encoding) for file in files]
        filename = sort.merge_sorted_files(output, filehandles, 'final')
        filehandles = [fh.close() for fh in filehandles]
        filename = 'merged_final.txt'
    for r in to_remove:
        print 'Going to delete: %s' % os.path.join(output, r)
#        utils.delete_file(output , r)


def mergesort_feeder(tasks, input, output):
    while True:
        try:
            file = tasks.get(block=False)
            tasks.task_done()
            if file == None:
                print 'Swallowed a poison pill'
                break
            fh = utils.create_txt_filehandle(input, file, 'r', settings.encoding)
            data = fh.readlines()
            fh.close()
            data = [d.replace('\n', '') for d in data]
            data = [d.split('\t') for d in data]
            sorted_data = sort.mergesort(data)
            sort.write_sorted_file(sorted_data, file, output)
            print file, tasks.qsize()
        except Empty:
            break


def mergesort_launcher(input, output):
    settings.verify_environment([input, output])
    files = utils.retrieve_file_list(input, 'txt')
    tasks = multiprocessing.JoinableQueue()
    consumers = [multiprocessing.Process(target=mergesort_feeder, args=(tasks, input, output)) for i in xrange(settings.number_of_processes)]
    for file in files:
        tasks.put(file)

    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    tasks.join()


def debug_mergesort_feeder(input, output):
    kwargs = {
              'input': input,
              'output': output,
              }
    files = utils.retrieve_file_list(input, 'txt')
    chunks = utils.split_list(files, settings.number_of_processes)
    q = pc.load_queue(chunks[0])
    mergesort_feeder(q, False, **kwargs)


if __name__ == '__main__':
    input = os.path.join(settings.input_location, 'en', 'wiki', 'txt')
    intermediate_output = os.path.join(settings.input_location, 'en', 'wiki', 'sorted')
    output = os.path.join(settings.input_location, 'en', 'wiki', 'dbready')
    dbname = 'enwiki'
    collection = 'editors'
    #mergesort_launcher(input, intermediate_output)
    #mergesort_external_launcher(intermediate_output, output)
    num_editors = store_editors(output, dbname, collection)
