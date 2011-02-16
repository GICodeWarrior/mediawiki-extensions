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
__date__ = '2011-01-27'
__version__ = '0.1'

import sys
import types
import re

if '..' not in sys.path:
    sys.path.append('..')

import inventory
from classes import exceptions
from utils import data_converter

HISTOGRAM = re.compile('histogram')
#BAR = re.compile('bar')
STACKED_BAR = re.compile('stacked_bar')
RES = [HISTOGRAM, STACKED_BAR]

def determine_chart_type(chart):
    for res in RES:
        match = re.findall(res, chart)
        if len(match) > 0:
            return match[0]
    #Bar charts is the default chart, 
    return 'bar'

def get_json_encoder(chart):
    chart = determine_chart_type(chart)
    functions = globals()
    ignore = ['transform_to_json', 'available_charts', 'init_options']
    for func in functions:
        if func.endswith('json'):
            if func not in ignore:
                encoder = func.replace('to_', '')
                encoder = encoder.replace('_json', '')
                if encoder == chart:
                    return func, chart, RES
    return None, chart, RES


def transform_to_json(ds):
    analyses = analyzer.available_analyses()
    encoder = get_json_encoder(ds.chart)
    #analysis = '%s_%s_%s' % ('transform_to', ds.encoder, 'json')
    #print analysis
    encoder = getattr(locals(), analysis, None)
    if encoder == None:
        encoder = to_bar_json

    data = encoder(ds)
    return data


def init_options():
    options = {}
    options['xaxis'] = {}
    options['xaxis']['ticks'] = []
    options['series'] = {}
    options['series']['stack'] = 0
    options['series']['lines'] = {}
    options['series']['lines']['show'] = False
    options['series']['lines']['steps'] = False
    options['series']['bars'] = {}
    options['series']['bars']['show'] = True
    options['series']['bars']['barWidth'] = 0.5
    options['series']['bars']['align'] = 'center'
    return options


def to_bar_json(ds):
    data = {}

    options = init_options()
    obs, all_keys = data_converter.convert_dataset_to_lists(ds, 'django')

    for ob in obs:
        year = ob[0].year
        row = data.get(year, {})
        row.setdefault('label', year)
        row.setdefault('data', [[year, 0]])
        row['data'][0][1] += 1
        data[year] = row


    obs = []
    for dat in data:
        obs.append(data[dat])
    min_year = min(data.keys()) - 1
    max_year = max(data.keys()) + 1
    obs.insert(0, {'label': min_year, 'data':[[min_year, None]]})
    obs.insert(-1, {'label': max_year, 'data':[[max_year, None]]})
    json = {}
    json['data'] = obs
    json['options'] = options
    print json
    return json


def to_histogram_json(ds):
    pass


def to_stacked_bar_json(ds):
    '''
    This function outputs data in a format that is understood by jquery
    flot plugin. Example JSON object:
    var data = [
        {label: 'foo', data: [[1, 300], [2, 300], [3, 300], [4, 300], [5, 300]]},
        {label: 'bar', data: [[1, 800], [2, 600], [3, 400], [4, 200], [5, 0]]},
        {label: 'baz', data: [[1, 100], [2, 200], [3, 300], [4, 400], [5, 500]]},
    ];
    var options = {
        series: {stack: 0,
                 lines: {show: false, steps: false },
                 bars: {show: true, barWidth: 0.9, align: 'center', }, },
        xaxis: {ticks: [[1, 'One'], [2, 'Two'], [3, 'Three'], [4, 'Four'], [5, 'Five']]},
    };
    '''


    data = []
    options = init_options()
    obs, all_keys = data_converter.convert_dataset_to_lists(ds, 'django')

    for ob in obs:
        d = {}
        d['label'] = str(ob[0].year)
        d['data'] = []
        ob = ob[1:]
        for x, o in enumerate(ob):
            d['data'].append([x, o])
        data.append(d)
        print d
    for x, date in enumerate(obs):
        options['xaxis']['ticks'].append([x, date[0].year])

    d = {}
    d['data'] = data
    d['options'] = options
    return d
