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
from Queue import Empty

sys.path.append('..')
import configuration 
settings = configuration.Settings()
from database import db
from database import cache
from utils import utils
from utils import sort
import process_constructor as pc



def store_editors(input, filename, dbname, collection):
    fh = utils.create_txt_filehandle(input, filename, 'r', settings.encoding)
    mongo = db.init_mongo_db(dbname)
    collection = mongo[collection]
    collection.ensure_index('editor')
    collection.create_index('editor')
    editor_cache = cache.EditorCache(collection)
    prev_contributor = -1
    x = 0
    edits = 0
    editors = set()
    for line in sort.readline(fh):
        if len(line) == 0:
            continue
        contributor = int(line[0]) 
        if prev_contributor != contributor:
            if edits >= 10:
                result = editor_cache.add(prev_contributor, 'NEXT')
                if result:
                    editors.add(prev_contributor)
                    result = None
                x += 1
                print 'Stored %s editors' % x
            else:
                editor_cache.clear(prev_contributor)
            edits = 0
        edits += 1
        date = utils.convert_timestamp_to_datetime_utc(line[1]) #+ datetime.timedelta(days=1)
        article_id = int(line[2])
        username = line[3].encode(settings.encoding)
        #print line[3]
        value = {'date': date, 'article': article_id, 'username': username}
        editor_cache.add(contributor, value)
        prev_contributor = contributor
    fh.close()
    utils.store_object(editors, settings.binary_location, 'editors')


def mergesort_external_launcher(dbname, input, output):
    files = utils.retrieve_file_list(input, 'txt', mask='')
    x = 0
    maxval = 99999
    while maxval >= settings.max_filehandles:
        x += 1.0
        maxval = round(len(files) / x)
    chunks = utils.split_list(files, int(x))
    '''1st iteration external mergesort'''
    for chunk in chunks:
        filehandles = [utils.create_txt_filehandle(input, file, 'r', settings.encoding) for file in chunks[chunk]]
        filename = sort.merge_sorted_files(output, filehandles, chunk)
        filehandles = [fh.close() for fh in filehandles]
#        pass
    '''2nd iteration external mergesort, if necessary'''
    if len(chunks) > 1:
        files = utils.retrieve_file_list(output, 'txt', mask='[merged]')
        filehandles = [utils.create_txt_filehandle(output, file, 'r', settings.encoding) for file in files]
        filename = sort.merge_sorted_files(output, filehandles, 'final')
        filehandles = [fh.close() for fh in filehandles]
        filename = 'merged_final.txt'
    return filename


def mergesort_feeder(task_queue, **kwargs):
    input = kwargs.get('input', None)
    output = kwargs.get('output', None)
    #while True:
    #    try:
            #file = input_queue.get(block=False)
    for file in task_queue:
        fh = utils.create_txt_filehandle(input, file, 'r', settings.encoding)
        data = fh.readlines()
        fh.close()
        data = [d.replace('\n', '') for d in data]
        data = [d.split('\t') for d in data]
        sorted_data = sort.mergesort(data)
        sort.write_sorted_file(sorted_data, file, output)


def mergesort_launcher(input, output):
    settings.verify_environment([input, output])
    files = utils.retrieve_file_list(input, 'txt')
    mergesort_feeder(files, input=input, output=output)
    #chunks = utils.split_list(files, settings.number_of_processes)
    #pc.build_scaffolding(pc.load_queue, mergesort_feeder, chunks, False, False, **kwargs)


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
    output = os.path.join(settings.input_location, 'en', 'wiki', 'sorted')
    dbname = 'enwiki'
    #mergesort_launcher(input, output)
    mergesort_external_launcher(dbname, output, output)