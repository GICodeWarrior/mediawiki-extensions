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
__date__ = '2010-11-07'
__version__ = '0.1'

'''
This module provides a small number of sorting algorithms including mergesort,
external mergesort and quicksort. By presorting the data, considerably
efficiency gains can be realized when inserting the data in MongoDB.
'''

import heapq
from multiprocessing import Queue
from Queue import Empty
import datetime

import settings
import utils
import process_constructor as pc
from database import cache
from database import db

def quick_sort(obs):
    if obs == []:
        return []
    else:
        pivot = obs[0]
        lesser = quick_sort([x for x in obs[1:] if x < pivot])
        greater = quick_sort([x for x in obs[1:] if x >= pivot])
        return lesser + [pivot] + greater


def mergesort(n):
        """Recursively merge sort a list. Returns the sorted list."""
        front = n[:len(n) / 2]
        back = n[len(n) / 2:]

        if len(front) > 1:
                front = mergesort(front)
        if len(back) > 1:
                back = mergesort(back)

        return merge(front, back)


def merge(front, back):
        """Merge two sorted lists together. Returns the merged list."""
        result = []
        while front and back:
                # pick the smaller one from the front and stick it on
                # note that list.pop(0) is a linear operation, so this gives quadratic running time...
                result.append(front.pop(0) if front[0] <= back[0] else back.pop(0))
        # add the remaining end
        result.extend(front or back)
        return result


def readline(file):
    for line in file:
        line = line.replace('\n', '')
        if line == '':
            continue
        else:
            line = line.split('\t')
            yield line


def merge_sorted_files(output, files, iteration):
    fh = utils.create_txt_filehandle(output, 'merged_%s.txt' % iteration, 'w', settings.ENCODING)
    lines = 0
    for line in heapq.merge(*[readline(file) for file in files]):
        utils.write_list_to_csv(line, fh)
        lines += 1
    fh.close()
    print lines
    return fh.name


def write_sorted_file(sorted_data, file, output):
    file = file.split('.')
    file[0] = file[0] + '_sorted'
    file = '.'.join(file)
    fh = utils.create_txt_filehandle(output, file, 'w', settings.ENCODING)
    utils.write_list_to_csv(sorted_data, fh)
    fh.close()


def store_editors(input, filename, dbname):
    fh = utils.create_txt_filehandle(input, filename, 'r', settings.ENCODING)
    mongo = db.init_mongo_db(dbname)
    collection = mongo['test']
    mongo.collection.ensure_index('editor')
    mongo.collection.create_index('editor')
    editor_cache = cache.EditorCache(collection)
    prev_contributor = -1
    x = 0
    edits = 0
    editors = set()
    for line in readline(fh):
        if len(line) == 0:
            continue
        contributor = int(line[0]) 
        if contributor == 5767932:
            print 'debug'
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
        date = utils.convert_timestamp_to_date(line[1]) #+ datetime.timedelta(days=1)
        article_id = int(line[2])
        value = {'date': date, 'article': article_id}
        editor_cache.add(contributor, value)
        prev_contributor = contributor
    fh.close()
    utils.store_object(editors, settings.BINARY_OBJECT_FILE_LOCATION, 'editors')


def mergesort_external_launcher(dbname, input, output):
    files = utils.retrieve_file_list(input, 'txt', mask='')
    x = 0
    maxval = 99999
    while maxval >= settings.MAX_FILES_OPEN:
        x += 1.0
        maxval = round(len(files) / x)
    chunks = utils.split_list(files, int(x))
    '''1st iteration external mergesort'''
    for chunk in chunks:
#        filehandles = [utils.create_txt_filehandle(input, file, 'r', settings.ENCODING) for file in chunks[chunk]]
#        filename = merge_sorted_files(output, filehandles, chunk)
#        filehandles = [fh.close() for fh in filehandles]
        pass
    '''2nd iteration external mergesort, if necessary'''
    if len(chunks) > 1:
#        files = utils.retrieve_file_list(output, 'txt', mask='[merged]')
#        filehandles = [utils.create_txt_filehandle(output, file, 'r', settings.ENCODING) for file in files]
#        filename = merge_sorted_files(output, filehandles, 'final')
#        filehandles = [fh.close() for fh in filehandles]
        filename = 'merged_final.txt'
    store_editors(output, filename, dbname)


def mergesort_feeder(input_queue, result_queue, **kwargs):
    input = kwargs.get('input', None)
    output = kwargs.get('output', None)
    while True:
        try:
            file = input_queue.get(block=False)
            fh = utils.create_txt_filehandle(input, file, 'r', settings.ENCODING)
            data = fh.readlines()
            fh.close()
            data = [d.replace('\n', '') for d in data]
            data = [d.split('\t') for d in data]
            sorted_data = mergesort(data)
            write_sorted_file(sorted_data, file, output)
        except Empty:
            break


def mergesort_launcher(input, output):
    kwargs = {'pbar': True,
              'nr_input_processors': settings.NUMBER_OF_PROCESSES,
              'nr_output_processors': settings.NUMBER_OF_PROCESSES,
              'input': input,
              'output': output,
              'poison_pill': False
              }
    files = utils.retrieve_file_list(input, 'txt')
    chunks = utils.split_list(files, settings.NUMBER_OF_PROCESSES)
    pc.build_scaffolding(pc.load_queue, mergesort_feeder, chunks, False, False, **kwargs)


def debug_mergesort_feeder(input, output):
    kwargs = {
              'input': input,
              'output': output,
              }
    files = utils.retrieve_file_list(input, 'txt')
    chunks = utils.split_list(files, settings.NUMBER_OF_PROCESSES)
    q = pc.load_queue(chunks[0])
    mergesort_feeder(q, False, **kwargs)


if __name__ == '__main__':
    input = os.path.join(settings.XML_FILE_LOCATION, 'en', 'wiki', 'txt')
    output = os.path.join(settings.XML_FILE_LOCATION, 'en', 'wiki', 'sorted')
    dbname = 'enwiki'
    mergesort_launcher(input, output)
    mergesort_external_launcher(dbname, output, output)
