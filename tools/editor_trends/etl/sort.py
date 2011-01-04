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


import heapq
import datetime
import sys
import os
import multiprocessing
from Queue import Empty

sys.path.append('..')
import configuration
settings = configuration.Settings()
from database import db
from database import cache
from utils import utils
from utils import sort


#def mergesort_external_launcher(input, output):
#    files = utils.retrieve_file_list(input, 'txt', mask='')
#    x = 0
#    maxval = 99999
#    while maxval >= settings.max_filehandles:
#        x += 1.0
#        maxval = round(len(files) / x)
#    chunks = utils.split_list(files, int(x))
#
#    to_remove = []
#    for chunk in chunks:
#        print '1st iteration external mergesort'
#        filehandles = [utils.create_txt_filehandle(input, file, 'r', settings.encoding) for file in chunks[chunk]]
#        filename = sort.merge_sorted_files(output, filehandles, chunk)
#        if len(chunks) > 1:
#            to_remove.append(filename)
#        filehandles = [fh.close() for fh in filehandles]
#
#    if len(chunks) > 1:
#        print '2nd iteration external mergesort'
#        files = utils.retrieve_file_list(output, 'txt', mask='[merged]')
#        filehandles = [utils.create_txt_filehandle(output, file, 'r', settings.encoding) for file in files]
#        filename = sort.merge_sorted_files(output, filehandles, 'final')
#        filehandles = [fh.close() for fh in filehandles]
#        filename = 'merged_final.txt'
#    for r in to_remove:
#        print 'Going to delete: %s' % os.path.join(output, r)
##        utils.delete_file(output , r)


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



def merge_sorted_files(output, files, iteration):
    fh = utils.create_txt_filehandle(output, 'merged_%s.txt' % iteration, 'w', settings.encoding)
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
    fh = utils.create_txt_filehandle(output, file, 'w', settings.encoding)
    utils.write_list_to_csv(sorted_data, fh)
    fh.close()


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
            sorted_data = mergesort(data)
            write_sorted_file(sorted_data, file, output)
            print file, tasks.qsize()
        except Empty:
            break


def mergesort_launcher(input, output):
    settings.verify_environment([input, output])
    files = utils.retrieve_file_list(input, 'csv')
    print files
    print input
    tasks = multiprocessing.JoinableQueue()
    consumers = [multiprocessing.Process(target=mergesort_feeder, args=(tasks, input, output)) for i in xrange(settings.number_of_processes)]
    for file in files:
        tasks.put(file)

    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    tasks.join()


if __name__ == '__main__':
    input = os.path.join(settings.input_location, 'en', 'wiki', 'txt')
    intermediate_output = os.path.join(settings.input_location, 'en', 'wiki', 'sorted')
    output = os.path.join(settings.input_location, 'en', 'wiki', 'dbready')
    dbname = 'enwiki'
    collection = 'editors'
    #mergesort_launcher(input, intermediate_output)
    #mergesort_external_launcher(intermediate_output, output)
    num_editors = store_editors(output, dbname, collection)
