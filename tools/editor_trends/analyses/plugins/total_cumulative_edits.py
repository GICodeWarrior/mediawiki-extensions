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
__date__ = '2011-01-25'
__version__ = '0.1'

from datetime import datetime

def total_cumulative_edits(var, editor, **kwargs):
    '''
    If you have questions about how to use this plugin, please visit:
    http://meta.wikimedia.org/wiki/Wikilytics_Plugins
    '''
    namespace = kwargs.get('namespace', ['0'])
    edits = editor['edit_count']
    years = edits.keys()
    for year in years:
        months = edits[year].keys()
        for month in months:
            date = datetime(int(year), int(month), 1)
            for ns in namespace:
                count = edits[year][month].get(ns, 0)
                if count > 0:
                    var.add(date, count, {'namespace': ns})
    return var
