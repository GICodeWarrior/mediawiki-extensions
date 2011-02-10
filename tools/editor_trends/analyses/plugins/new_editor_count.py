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


def new_editor_count(var, editor, **kwargs):
    '''
    Summary: This function generates an overview of the number of
    new_wikipedians for a given year / month combination. 
    Purpose: This data can be used to compare with Erik Zachte's
    stats.download.org to make sure that we are using the same numbers. 
    '''
#   headers = ['year', 'month', 'count']
    new_wikipedian = editor['new_wikipedian']
    var.add(new_wikipedian, 1)
    return var
