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

def create_datacontainer(datatype='dict'):
    '''
    This function initializes an empty dictionary with as key the year (starting
    2001 and running through) and as value @datatype, in most cases this will
    be zero so the dictionary will act as a running tally for a variable but
    @datatype can also a list, [], or a dictionary, {}, or a set, set().  
    '''
    data = {}
    year = datetime.datetime.now().year + 1
    for x in xrange(2001, year):
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


def get_standard_deviation(numberList):
    mean = get_mean(numberList)
    std = 0
    n = len(numberList)
    for i in numberList:
        std = std + (i - mean) ** 2
    return math.sqrt(std / float(n - 1))


def get_median(numberList):
    #print numberList
    if numberList == []: return '.'
    theValues = sorted(numberList)
    theValues = [float(x) for x in theValues]
    if len(theValues) % 2 == 1:
        return theValues[(len(theValues) + 1) / 2 - 1]
    else:
        lower = theValues[len(theValues) / 2 - 1]
        upper = theValues[len(theValues) / 2]
        #print upper, lower
    return (lower + upper) / 2


def get_mean(numberList):
    #print numberList
    if numberList == []: return '.'
    floatNums = [float(x) for x in numberList]
    return sum(floatNums) / len(numberList)
