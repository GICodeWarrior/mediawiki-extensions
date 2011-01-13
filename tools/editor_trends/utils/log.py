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
__date__ = '2011-01-11'
__version__ = '0.1'


import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()

from database import db

def log_to_mongo(project, task, timer, type='start'):
    conn = db.init_mongo_db('wikilytics')
    coll = conn['jobs']
    if type == 'start':
        coll.save({'project': project, 'tasks': {task: {'start': timer.t0, 'in_progress': True}}})
    if type == 'finish':
        coll.save({'project': project, 'tasks': {task: {'finish': timer.t1, 'in_progress': False}}})
