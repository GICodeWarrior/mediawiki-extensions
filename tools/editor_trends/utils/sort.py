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

import settings
import utils

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
        if line == '':
            continue
        else:
            line = line.replace('\n', '')
            line = line.split('\t')
            yield line


def merge_sorted_files(output, files):
    output = utils.create_txt_filehandle(output, 'merged.txt', 'w', settings.ENCODING)
    lines = 0
    for line in heapq.merge(*[readline(file) for file in files]):
        output.write(line)
        lines += 1
    output.close()
    return lines


def write_sorted_file(sorted_data, file, output):
    file = file.split('.')
    file[0] = file[0] + '_sorted'
    file = '.'.join(file)
    fh = utils.create_txt_filehandle(output, file, 'w', settings.ENCODING)
    utils.write_list_to_csv(sorted_data, fh)
    fh.close()


def debug_merge_sorted_files(input, output):
    files = utils.retrieve_file_list(input, 'txt', mask='')
    filehandles = [utils.create_txt_filehandle(input, file, 'r', settings.ENCODING) for file in files]
    lines = merge_sorted_files(output, filehandles)
    filehandles = [fh.close() for fh in filehandles]
    print lines


def debug_mergesort(input, output):
    files = utils.retrieve_file_list(input, 'txt', mask='((?!_sorted)\d)')
    for file in files:
        fh = utils.create_txt_filehandle(input, file, 'r', settings.ENCODING)
        data = fh.readlines()
        fh.close()
        data = [d.replace('\n', '') for d in data]
        data = [d.split('\t') for d in data]
        sorted_data = mergesort(data)
        write_sorted_file(sorted_data, file, output)


if __name__ == '__main__':
    input = os.path.join(settings.XML_FILE_LOCATION, 'en', 'wiki')
    output = os.path.join(settings.XML_FILE_LOCATION, 'en', 'wiki', 'sorted')
    debug_mergesort(input, output)
    #debug_merge_sorted_files(input, output)
