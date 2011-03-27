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
__date__ = '2011-01-24'
__version__ = '0.1'

import datetime

def create_windows(var, break_down_first_year=True):
    '''
    This function creates a list of months. If break_down_first_year = True then
    the first year will be split in 3, 6, 9 months as well.
    '''
    years = (var.max_year - var.min_year) +1 
    windows = [y * 12 for y in xrange(1, years)]
    if break_down_first_year:
        windows = [3, 6, 9] + windows
    return windows

def convert_seconds_to_date(secs):
    #return time.gmtime(secs)
    return datetime.datetime.fromtimestamp(secs)

def convert_dataset_to_lists(ds, caller):
    assert ds.format == 'long' or ds.format == 'wide', 'Format should either be long or wide.'
    data = []
    for var in ds.variables:
        if caller == 'django':
            var = ds.variables[var]
        else:
            var = getattr(ds, var)

        if ds.format == 'long':
            for obs in var.obs.values():
                o = []
                o.append(obs.get_date_range())
                for prop in obs.props:
                    o.append(getattr(obs, prop))
                o.append(obs.data)
                data.append(o)
        else:
            '''
            This only works for observations with one variable and time_unit==year
            '''
            props = get_all_props(var)
            for year in xrange(var.min_year, var.max_year):
                for prop in props:
                    yaxis = get_all_keys(var, prop)
                    o = [0 for y in yaxis]
                    for x, y in enumerate(yaxis):
                        for obs in var.obs.values():
                            if obs.t1.year == year and getattr(obs, prop) == y:
                                o[x] += obs.data
                    o = [year] + o
                    data.append(o)
    return data


def add_headers(ds):
    assert ds.format == 'long' or ds.format == 'wide', 'Format should either be long or wide.'
    headers = []
    if ds.format == 'long':
        headers.append('date')
    for var in ds:
        if ds.format == 'long':
            headers.extend([var.name])
        else:
            props = get_all_props(var)
            for prop in props:
                all_keys = get_all_keys(var, prop)
                for key in all_keys:
                    header = '%s_%s' % (key, var.name)
                    headers.append(header)
    return headers


#def make_data_rectangular(data, all_keys):
#    for i, d in enumerate(data):
#        for key in all_keys:
#            if key not in d:
#                d[key] = 0
#            data[i] = d
#    return data


def get_all_props(var):
    all_keys = []
    for obs in var.obs.values():
        for prop in obs.props:
            if prop not in all_keys:
                all_keys.append(prop)
    return all_keys


def get_all_keys(var, prop):
    all_keys = []
    for obs in var.obs.values():
        v = getattr(obs, prop)
        if v not in all_keys:
            all_keys.append(v)
    all_keys.sort()
    return all_keys


#def sort(data, all_keys):
#    dates = [date['date'] for date in data]
#    dates.sort()
#    cube = []
#    for date in dates:
#        for i, d in enumerate(data):
#            if d['date'] == date:
#                raw_data = d
#                del data[i]
#                break
#        obs = []
#        for key in all_keys:
#            obs.append(raw_data[key])
#        cube.append(obs)
#    return cube
