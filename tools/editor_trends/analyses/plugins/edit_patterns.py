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

import datetime

def edit_patterns(var, editor, **kwargs):
    monthly = editor['monthly_edits']
    new_wikipedian = editor['new_wikipedian']
    final_edit = editor['final_edit']
    dt = final_edit - new_wikipedian
    if  dt.days < 366:
        return var

    m = 0
    obs = {}
    for year in xrange(new_wikipedian.year, new_wikipedian.year + 2):
        if m == 12:
            break
        for month in xrange(new_wikipedian.month, 13):
            n = monthly[str(year)][str(month)]
            date = datetime.datetime(year, month, 1)
            if n >= var.cutoff:
                var.add(date, True, {'month':m})
                #obs[m] = True
            else:
                var.add(date, False, {'month':m})
                #obs[m] = False
            m += 1
            if m == 12:
                break
#    if m == 12:
#        var.add(date, obs)
    return var
