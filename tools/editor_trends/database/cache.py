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
__date__ = 'Oct 24, 2010'
__version__ = '0.1'

import datetime
import sys

if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
settings = settings.Settings()

from utils import file_utils
from utils import data_converter

class EditorCache:
    def __init__(self, db):
        self.db = db
        self.editors = {}
        self.final_year = datetime.datetime.now().year + 1
        self.n = 0

    def __repr__(self):
        return self.editors

    def clear(self, key):
        if key in self.editors:
            del self.editors[key]

    def drop_years_no_obs(self, edits):
        data = {}
        for edit in edits:
            if edits[edit] != []:
                data[edit] = edits[edit]
        return data

    def add(self, key, value):
        if value == 'NEXT':
            self.n += 1
            edits = self.drop_years_no_obs(self.editors[key]['edits'])
            self.insert(key, edits, self.editors[key]['username'])
            del self.editors[key]
        else:
            if key not in self.editors:
                self.editors[key] = {}
                self.editors[key]['obs'] = 0
                self.editors[key]['edits'] = data_converter.create_datacontainer(2001, self.final_year, 'list')
                self.editors[key]['username'] = value.pop('username')
            else:
                value.pop('username')

            year = str(value['date'].year)
            self.editors[key]['edits'][year].append(value)
            self.editors[key]['obs'] += 1

    def insert(self, editor, values, username):
        data = {'editor': editor, 'edits': values, 'username': username}
        self.db.insert(data)
#        '''
#        Adding the safe=True statement slows down the insert process but this 
#        assures that all data will be written. 
#        '''
#        try:
#            self.collection.insert({'editor': editor, 'edits': values, 'username': username}, safe=True)
#        except bson.errors.InvalidDocument:
#            print 'BSON document too large, unable to store %s' % (username)
#        except OperationFailure, error:
#            print error
#            print 'It seems that you are running out of disk space.'
#            sys.exit(-1)

    def store(self):
        file_utils.store_object(self, settings.binary_location, self.__repr__())
