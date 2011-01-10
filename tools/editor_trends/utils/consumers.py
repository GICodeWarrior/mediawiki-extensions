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
__date__ = '2010-11-09'
__version__ = '0.1'

import multiprocessing


class BaseConsumer(multiprocessing.Process):

    def __init__(self, task_queue, result_queue):
        multiprocessing.Process.__init__(self)
        self.task_queue = task_queue
        self.result_queue = result_queue


#        for kw in kwargs:
#            setattr(self, kw, kwargs[kw])
#
#    def run(self):
#        proc_name = self.name
#        kwargs = {}
#        IGNORE = ['input_queue', 'result_queue', 'target']
#        for kw in self.__dict__:
#            if kw not in IGNORE and not kw.startswith('_'):
#                kwargs[kw] = getattr(self, kw)
#        self.target(self.input_queue, self.result_queue, **kwargs)


class ProcessResultQueue(multiprocessing.Process):

    def __init__(self, target, result_queue, **kwargs):
        multiprocessing.Process.__init__(self)
        self.result_queue = result_queue
        self.target = target
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])


    def run(self):
        proc_name = self.name
        kwargs = {}
        IGNORE = ['result_queue', 'target']
        for kw in self.__dict__:
            if kw not in IGNORE and not kw.startswith('_'):
                kwargs[kw] = getattr(self, kw)
        self.target(self.result_queue, **kwargs)
