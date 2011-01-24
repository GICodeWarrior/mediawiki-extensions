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
__date__ = '2010-11-24'
__version__ = '0.1'

import datetime
import math


def add_datatype(datatype=0.0):
    if datatype == 'dict':
        d = dict()
    elif datatype == 'list':
        d = list()
    elif datatype == 'set':
        d = set()
    else:
        d = 0.0
    return d


def create_clock():
    d = {}
    for i in xrange(0, 24):
        d[i] = 0.0
    return d


def create_datacontainer(first_year, final_year, datatype='dict'):
    '''
    This function initializes an empty dictionary with as key the year (starting
    2001 and running through) and as value @datatype, in most cases this will
    be zero so the dictionary will act as a running tally for a variable but
    @datatype can also a list, [], or a dictionary, {}, or a set, set().  
    '''
    data = {}
    for x in xrange(first_year, final_year):
        data[x] = add_datatype(datatype)
    return data

def add_windows_to_datacontainer(datacontainer, windows):
    for dc in datacontainer:
        for w in windows:
            datacontainer[dc][w] = add_datatype()

    return datacontainer

def add_months_to_datacontainer(datacontainer, datatype):
    for dc in datacontainer:
        datacontainer[dc] = {}
        for x in xrange(1, 13):
            datacontainer[dc][x] = add_datatype(datatype)

    return datacontainer

def add_years_to_datacontainer(first_year, final_year, datacontainer, datatype):
    for dc in datacontainer:
        datacontainer[dc] = {}
        for x in range(first_year, final_year):
            datacontainer[dc][x] = datatype
    return datacontainer



