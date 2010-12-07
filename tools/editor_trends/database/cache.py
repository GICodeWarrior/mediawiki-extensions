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
__date__ = 'Oct 24, 2010'
__version__ = '0.1'

import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()

import db
from utils import utils
from etl import shaper

class EditorCache(object):
    def __init__(self, collection):
        self.collection = collection
        self.editors = {}
        self.n = 0

    def __repr__(self):
        return '%s' % 'Editor Cache'

    def clear(self, key):
        if key in self.editors:
            del self.editors[key]

    def add(self, key, value):
        if value == 'NEXT':
            self.n += 1
            result = self.insert(key, self.editors[key]['edits'], self.editors[key]['username'])
            del self.editors[key]
            return result
        else:
            if key not in self.editors:
                self.editors[key] = {}
                self.editors[key]['obs'] = 0
                self.editors[key]['edits'] = shaper.create_datacontainer('list')
                self.editors[key]['username'] = value.pop('username')
            else:
                value.pop('username')

            year = str(value['date'].year)
            self.editors[key]['edits'][year].append(value)
            self.editors[key]['obs'] += 1


    def update(self, editor, values):
        self.collection.update({'editor': editor}, {'$pushAll': {'edits': values}}, upsert=True)

    def insert(self, editor, values, username):
        try:
            self.collection.insert({'editor': editor, 'edits': values, 'username': username})
            return True
        except:
            return False

    def store(self):
        utils.store_object(self, settings.binary_location, self.__repr__())
