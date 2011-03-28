#!/usr/bin/python
# -*- coding: utf-8 -*-
'''
Copyright (C) 2011 by Ryan Faulkner (rfaulkner@wikimedia.org)
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



def burnout(var, editor, **kwargs):
    new_wikipedian = editor['new_wikipedian']
    edits = editor['monthly_edits']
    
    burnout = False
    sum =0.0 
    count = 0.0
    
    for year in xrange(new_wikipedian.year, var.max_year):
        for month in xrange(1, 13):
            if edits[year][month] > 249:
                burnout = True
            if burnout == True:
              sum += edits[year][month]
              count +=1.0
            
    if sum / count < 10 and burnout == True:
        var.add(editor['username'], 1)
    
    return var
