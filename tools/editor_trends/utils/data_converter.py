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
__date__ = '2011-01-24'
__version__ = '0.1'

import datetime

def convert_seconds_to_date(secs):
    #return time.gmtime(secs)
    return datetime.datetime.fromtimestamp(secs)

def convert_dataset_to_lists(ds, caller):
#        for var in ds.variables:
#            var = ds.variables[var]
#            for date in var['obs'].keys():
#                o = {}
#                o['date'] = datum
#                
#                print date

    assert ds.format == 'long' or ds.format == 'wide'
    data, all_keys = [], []
    for var in ds.variables:
        if caller == 'django':
            var = ds.variables[var]
        else:
            var = getattr(ds, var)

        for date in var['obs'].keys():
            datum = convert_seconds_to_date(float(date))
            if ds.format == 'long':
                o = []
            else:
                o = {}
                o['date'] = datum

            for obs in var['obs'][date]['data']:
                if ds.format == 'long':
                    o.append([datum, obs, var['obs'][date]['data'][obs]])
                    data.extend(o)
                    o = []
                else:
                    o[obs] = var['obs'][date]['data'][obs]
            if ds.format == 'wide':
                data.append(o)
    if ds.format == 'wide':
        #Make sure that each variable / observation combination exists.
        all_keys = get_all_keys(data)
        data = make_data_rectangular(data, all_keys)
        data = sort(data, all_keys)
    return data, all_keys


def add_headers(ds, all_keys):
    assert ds.format == 'long' or ds.format == 'wide'
    headers = []
    if ds.format == 'long':
        headers.append('date')
    for var in ds:
        if ds.format == 'long':
            headers.extend([var.time_unit, var.name])
        else:
            for key in all_keys:
                header = '%s_%s' % (key, var.name)
                headers.append(header)
    return headers


def make_data_rectangular(data, all_keys):
    for i, d in enumerate(data):
        for key in all_keys:
            if key not in d:
                d[key] = 0
            data[i] = d
    return data


def get_all_keys(data):
    all_keys = []
    for d in data:
        for key in d:
            if key not in all_keys:
                all_keys.append(key)
    all_keys.sort()
    all_keys.insert(0, all_keys[-1])
    del all_keys[-1]
    return all_keys


def sort(data, all_keys):
    dates = [date['date'] for date in data]
    dates.sort()
    cube = []
    for date in dates:
        for i, d in enumerate(data):
            if d['date'] == date:
                raw_data = d
                del data[i]
                break
        obs = []
        for key in all_keys:
            obs.append(raw_data[key])
        cube.append(obs)
    return cube
