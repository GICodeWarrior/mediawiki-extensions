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
__date__ = '2010-11-15'
__version__ = '0.1'

import sys
sys.path.append('..')

import os
import xml.etree.cElementTree as cElementTree

import configuration
from utils import file_utils
settings = configuration.Settings()


class DumpStatistics(object):
    ''' Simple class to keep track of XML tags, how often they occur,
    and the length of strings they contain. This is used to calculate the
    overhead.
    '''
    def __init__(self):
        self.tags = {}

    def add_tag(self, kwargs):
        for kw in kwargs:
            if kw not in self.tags:
                self.tags[kw] = {}
                self.tags[kw]['n'] = 0
                self.tags[kw]['size'] = 0
            self.tags[kw]['n'] += 1
            self.tags[kw]['size'] += self.determine_length(kwargs[kw])

    def average_size_text(self):
        avg = {}
        for kw in self.tags:
            avg[kw] = self.tags[kw]['size'] / self.tags[kw]['n']
        return avg

    def total_size_text(self):
        return sum([self.tags[kw]['size'] for kw in self.tags])

    def total_size_xml(self):
        # the x2 is for the opening and closing tag
        # the +5 is for 2x <, 2x > and 1x /
        return sum([(len(kw) * (self.tags[kw]['n'] * 2) + 5) for kw in self.tags])

    def determine_length(self, text):
        if text == None:
            return 0
        else:
            return len(text)


def calculate_filesize_overhead(location, filename):
    counter = None
    ds = DumpStatistics()
    filename = os.path.join(location, filename)
    context = cElementTree.iterparse(filename, events=('start', 'end'))
    context = iter(context)
    event, root = context.next()  #get the root element of the XML doc

    try:
        for event, elem in context:
            if event == 'end':
                ds.add_tag({elem.tag:elem.text})
                root.clear()  # when done parsing a section clear the tree to release memory
    except SyntaxError:
        pass
    file_utils.store_object(ds, settings.binary_location, 'ds')
    xml_size = ds.total_size_xml()
    text_size = ds.total_size_text()
    print text_size, xml_size
    print ds.tags


def output_dumpstatistics():
    ds = file_utils.load_object(settings.binary_location, 'ds.bin')

    for key in ds.tags:
        print '%s\t%s' % (key, ds.tags[key])

if __name__ == '__main__':
    input = os.path.join(settings.input_location, 'en', 'wiki')
    calculate_filesize_overhead(input, 'enwiki-latest-stub-meta-history.xml')
    output_dumpstatistics()
