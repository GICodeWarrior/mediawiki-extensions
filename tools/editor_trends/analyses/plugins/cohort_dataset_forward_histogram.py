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


def cohort_dataset_forward_histogram(var, editor, **kwargs):
#        headers = ['year', 'month', 'edits']
    '''
    The forward looking histogram looks for every month that an editor
    was part of the Wikimedia community whether this person made at least cutoff
    value edits. If yes, then include this person in the analysis, else skip the
    person. 
    '''

    new_wikipedian = editor['new_wikipedian']
    final_edit = editor['final_edit'].year + 1
    yearly_edits = editor['edits_by_year']
    n = editor['edit_count']

    if n >= var.cum_cutoff:
        for i, year in enumerate(xrange(new_wikipedian.year, final_edit)):
            edits = editor['monthly_edits'].get(str(year), {0:0})
            if year == new_wikipedian.year:
                start = new_wikipedian.month
            else:
                start = 1
            for month in xrange(start, 13):
                if edits.get(str(month), 0) >= var.cutoff:
                    experience = i * 12 + (month - new_wikipedian.month)
                    var.add(new_wikipedian, 1, {'experience': experience})
    return var
