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
__date__ = '2011-01-21'
__version__ = '0.1'

import datetime
import time
import sys

sys.path.append('..')
import configuration
settings = configuration.Settings()


def convert_timestamp_to_date(timestamp):
    return datetime.datetime.strptime(timestamp[:10], settings.date_format)


def convert_timestamp_to_datetime_naive(timestamp):
    return datetime.datetime.strptime(timestamp, settings.timestamp_format)


def convert_timestamp_to_datetime_utc(timestamp):
    tz = datetime.tzinfo('utc')
    d = convert_timestamp_to_datetime_naive(timestamp)
    #return d.replace(tzinfo=tz) #enabling this line crashes pymongo
    return d



def invert_dict(dictionary):
    '''
    @dictionary is a simple dictionary containing simple values, ie. no lists,
    or other dictionaries
    output: dictionary where key and value are swapped. 
    '''
    return dict([[v, k] for k, v in dictionary.items()])


