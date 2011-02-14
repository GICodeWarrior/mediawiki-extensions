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

import datetime
from dateutil.relativedelta import relativedelta
from utils import data_converter


def cohort_dataset_backward_bar(var, editor, **kwargs):
    '''
    The backward looking bar chart looks for every year that an editor
    was part of the Wikimedia community whether this person made at least cutoff
    value edits. If yes, then include this person in the analysis, else skip the
    person. 
    '''
    break_down = kwargs.pop('break_down', False)
    new_wikipedian = editor['new_wikipedian']
    n = editor['edit_count']

    if n >= var.cum_cutoff:
        windows = data_converter.create_windows(var, break_down_first_year=break_down)
        for year in xrange(new_wikipedian.year, var.max_year):
            year = str(year)
            if editor['edits_by_year'][year] >= var.cutoff:
                last_edit = editor['last_edit_by_year'][year]
                if last_edit != 0.0:
                    editor_dt = relativedelta(last_edit, new_wikipedian)
                    editor_dt = (editor_dt.years * 12) + editor_dt.months
                    for w in windows:
                        if w >= editor_dt:
                            datum = datetime.datetime(int(year), 12, 31)
                            var.add(datum, 1, {'window':w})
                            break
    return var
