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
__date__ = '2010-11-16'
__version__ = '0.1'


import heapq
import sys
import os
import multiprocessing
from Queue import Empty

from utils import file_utils
from utils import messages


def quick_sort(obs):
    '''
    Quicksort is a sorting algorithm developed by C. A. R. Hoare that, on \
    average, makes O(nlogn) (big O notation) comparisons to sort n items.
    More info: http://en.wikipedia.org/wiki/Quicksort
    '''
    if obs == []:
        return []
    else:
        pivot = obs[0]
        lesser = quick_sort([x for x in obs[1:] if x < pivot])
        greater = quick_sort([x for x in obs[1:] if x >= pivot])
        return lesser + [pivot] + greater


def mergesort(n):
    """
    Merge sort is an O(n log n) comparison-based sorting algorithm.
    Recursively merge sort a list. Returns the sorted list.
    """
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
        '''
        pick the smaller one from the front and stick it on
        note that list.pop(0) is a linear operation, so this gives quadratic 
        running time...
        '''
        result.append(front.pop(0) if front[0] <= back[0] else back.pop(0))
        # add the remaining end
    result.extend(front or back)
    return result



def merge_sorted_files(target, files, iteration, rts):
    '''
    Merges smaller sorted files in one big file, Only used for creating 
    data competition file.  
    '''
    fh = file_utils.create_txt_filehandle(target,
                                          'merged_%s.txt' % iteration,
                                          'w',
                                          rts.encoding)
    lines = 0
    for line in heapq.merge(*[readline(filename) for filename in files]):
        file_utils.write_list_to_csv(line, fh)
        lines += 1
    fh.close()
    print lines
    return fh.name


def write_sorted_file(sorted_data, filename, rts):
    '''
    Writes the sorted file to target
    '''
    fh = file_utils.create_txt_filehandle(rts.sorted,
                                          filename,
                                          'w',
                                          rts.encoding)
    file_utils.write_list_to_csv(sorted_data, fh)
    fh.close()


def mergesort_feeder(tasks, rts):
    '''
    The feeder function is called by the launcher and gives it a task to
    complete.
    '''
    while True:
        try:
            filename = tasks.get(block=False)
            tasks.task_done()
            if filename == None:
                print 'Swallowed a poison pill'
                print tasks.qsize()
                break

            fh = file_utils.create_txt_filehandle(rts.txt,
                                                  filename,
                                                  'r',
                                                  rts.encoding)
            #print fh
            #data = fh.readlines()
            data = file_utils.read_unicode_text(fh)
            fh.close()
            data = [d.strip() for d in data]
            data = [d.split('\t') for d in data]
            sorted_data = mergesort(data)
            write_sorted_file(sorted_data, filename, rts)
            print filename, messages.show(tasks.qsize)
        except UnicodeDecodeError, e:
            print e
        except Empty:
            pass


def launcher(rts):
    '''
    rts is an instance of RunTimeSettings
    '''
    files = file_utils.retrieve_file_list(rts.txt, 'csv')
    tasks = multiprocessing.JoinableQueue()
    consumers = [multiprocessing.Process(target=mergesort_feeder,
                                args=(tasks, rts))
                                for x in xrange(rts.number_of_processes)]
    for filename in files:
        tasks.put(filename)

    for x in xrange(rts.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    tasks.join()


def debug():
    '''
    Simple test function
    '''
    source = os.path.join(settings.input_location, 'en', 'wiki', 'txt')
    target = os.path.join(settings.input_location, 'en', 'wiki', 'sorted')
    mergesort_launcher(source, target)


if __name__ == '__main__':
    debug()
