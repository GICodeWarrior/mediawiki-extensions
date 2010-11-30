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
__date__ = '2010-11-26'
__version__ = '0.1'

import cStringIO
import xml.etree.cElementTree as cElementTree
import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()

from utils import models
from utils import utils
from wikitree import xml

class XMLFileConsumer(models.BaseConsumer):

    def run(self):
        while True:
            print 'Queue is %s files long...' % (self.task_queue.qsize() - settings.number_of_processes)
            new_xmlfile = self.task_queue.get()
            self.task_queue.task_done()
            if new_xmlfile == None:
                print 'Swallowed a poison pill'
                break
            new_xmlfile()

class XMLFile(object):
    def __init__(self, input, output, xml_file, bots, target, output_file=None, **kwargs):
        self.file = xml_file
        self.input = input
        self.output = output
        self.bots = bots
        self.target = target
        self.output_file = output_file
        self.lock = None
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])

    def create_file_handle(self):
        self.mode = 'a'
        if self.output_file == None:
            self.mode = 'w'
            self.output_file = self.file[:-4] + '.txt'

        self.fh = utils.create_txt_filehandle(self.output, self.output_file, self.mode, settings.encoding)

    def __str__(self):
        return '%s' % (self.file)

    def __call__(self, bots=None):
        if settings.debug:
            messages = {}
            vars = {}

        data = xml.read_input(utils.create_txt_filehandle(self.input,
                                                      self.file, 'r',
                                                      encoding=settings.encoding))
        self.create_file_handle()
        for raw_data in data:
            xml_buffer = cStringIO.StringIO()
            raw_data.insert(0, '<?xml version="1.0" encoding="UTF-8" ?>\n')
            try:
                raw_data = ''.join(raw_data)
                xml_buffer.write(raw_data)
                elem = cElementTree.XML(xml_buffer.getvalue())
                result = self.target(elem, self.fh, bots=self.bots, lock=self.lock)
                if result == 'break':
                    break
            except SyntaxError, error:
                print error
                '''
                There are few cases with invalid tokens, they are ignored
                '''
                if settings.debug:
                    utils.track_errors(xml_buffer, error, self.file, messages)
            except UnicodeEncodeError, error:
                print error
                if settings.debug:
                    utils.track_errors(xml_buffer, error, self.file, messages)
            except MemoryError, error:
                print self.file, error
                print raw_data[:12]
                print 'String was supposed to be %s characters long' % sum([len(raw) for raw in raw_data])

        else:
            self.fh.close()

        if settings.debug:
            utils.report_error_messages(messages, self.target)

        return self.bots
