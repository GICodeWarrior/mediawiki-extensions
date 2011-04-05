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

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@wikimedia.org', 'Ryan Faulkner (rfaulkner@wikimedia.org)'])
__email__ = 'dvanliere at wikimedia dot org'
__date__ = '2011-01-25'
__version__ = '0.1'



def taxonomy_burnout(var, editor, **kwargs):
    new_wikipedian = editor['new_wikipedian']
    edits = editor['edit_count']
    final_edit = editor['final_edit']
    cutoff = kwargs.get('cutoff', 149)
    username = editor['username']

    burnout = False
    sum = 0.0
    count = 0.0

    if new_wikipedian:
        years = edits.keys()
        for year in years:
            months = edits[year].keys()
            for month in months:
                try:
                    if edits[year][month].get('0', 0) > cutoff:
                        burnout = True
                    if burnout == True:
                        n = edits[year][month].get('0', 0)
                        sum += n
                        if n > 0:
                            count += 1.0
                except (AttributeError, KeyError):
                    print 'Editor %s does not have data for year: %s and month %s. Data: %s' \
                    % (username, year, month, edits[year])

        if burnout and sum / count > 10:
            avg_edit = sum / count

            try:
                var.add(new_wikipedian, avg_edit, {'username' : username})
            except Exception, error:
                print 'user: %s error: %s' % (username, error)

    return var
