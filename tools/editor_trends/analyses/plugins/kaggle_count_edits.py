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
__date__ = '2011-04-19'
__version__ = '0.1'

from datetime import datetime

def kaggle_count_edits(var, editor, **kwargs):
    '''
    This plugin counts the total number of edits made by non-bot users in 
    the main namespace. The key is set to an arbitrary date because we are 
    only interested in the final overall count. 
    '''

    username = editor['username'].lower()
    if username.endswith('bot'):
        return var
    else:
        username = editor['username']

    edits = editor['edit_count']
    years = edits.keys()
    count = 0
    key = datetime(2011, 4, 19)
    for year in years:
        months = edits[year].keys()
        for month in months:
            count += edits[year][month].get(0, 0)
    var.add(key, count, {'username': username})
    return var
