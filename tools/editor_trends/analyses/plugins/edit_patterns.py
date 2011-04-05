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
__date__ = '2011-01-28'
__version__ = '0.1'

from datetime import datetime

def edit_patterns(var, editor, **kwargs):
    '''
    If you have questions about how to use this plugin, please visit:
    http://meta.wikimedia.org/wiki/Wikilytics_Plugins
    '''
    edits = editor['edit_count']
    new_wikipedian = editor['new_wikipedian']
    final_edit = editor['final_edit']

    if new_wikipedian != False:
        dt = final_edit - new_wikipedian
        if dt.days < 366:
            return var

        years = edits.keys()
        for year in years:
        #for year in xrange(new_wikipedian.year, new_wikipedian.year + 2):
            obs = [False for x in xrange(13)]
            months = edit[year].keys()
            for month in xrange(13):
                count = edits[year].get(month, {}).get('0', 0)
                date = datetime(int(year), int(month), 1)
                if count >= var.cutoff:
                    obs[month] = True
            var.add(date, obs)
    return var
