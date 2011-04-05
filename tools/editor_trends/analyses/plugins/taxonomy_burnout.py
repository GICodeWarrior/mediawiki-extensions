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

__author__ = '''\n'''.join(['Ryan Faulkner (rfaulkner@wikimedia.org)', ])
__email__ = 'dvanliere at gmail dot com'
__date__ = '2011-01-25'
__version__ = '0.1'



def taxonomy_burnout(var, editor, **kwargs):
    new_wikipedian = editor['new_wikipedian']
    edits = editor['monthly_edits']
    
    burnout = False
    sum = 0.0 
    count = 0.0
    
    for year in xrange(2001, var.max_year):
        for month in xrange(1, 13):
            str_year = str(year)
            str_month = str(month) 
            
            try:
                if edits[str_year][str_month] > 149:
                    burnout = True
                if burnout == True:
                  sum += edits[str_year][str_month]
                  count += 1.0
            except (AttributeError, KeyError):
                # print 'Editor ' + editor['username'] + ' does not have data for year ' + str_year + ' and month  ' + str_month
                pass
            
    if count > 0.0 and sum / count < 10 and burnout == True:    
        
        try:
            var.add(editor['new_wikipedian'], 1, {'username' : editor['username']})
        except:
            print 'error: ' + editor['username']
            pass
            
    return var
