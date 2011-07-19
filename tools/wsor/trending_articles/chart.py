#! /usr/bin/env python
# -*- coding: utf-8 -*-
# 

import numpy
import pylab as plt
import matplotlib
import os
import argparse
import sys
import csv
import datetime
import math
import re
from collections import namedtuple

counter_tuple = namedtuple('counter', 'name filter color explode')

def str_to_time(x):
    return datetime.datetime.strptime(x, '%Y%m%d%H%M%S')

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('-s', '--font-size', metavar='POINT',
                      dest='fsize', type=int, default=15,
                      help='')
    parser.add_argument('-f', '--field', metavar='N',
                      dest='field', type=int, default=9,
                      help='')
    parser.add_argument('-w', '--width', metavar='SIZE',
                      dest='width', type=int, default=0.3,
                      help='')
    parser.add_argument('-y', '--ylimit', metavar='LIMITS',
                      dest='ylim', type=str, default='-300,1500',
                      help='')
    parser.add_argument('-v', '--verbose',
                      dest='verbose', action='store_true', default=False,
                      help='turn on verbose message output')
    parser.add_argument('files', nargs='+')
    options = parser.parse_args()


    csv.field_size_limit(1000000000)

    counters = [counter_tuple('new reg. users', lambda x: x[10] == 'REG'  and x[13] == 'NEW', '#4444FF', 0.1),
                counter_tuple('old reg. users (semiprotected)', lambda x: x[10] == 'REG'  and x[13] == 'OLD' and x[14] == 'SEMIPROTECT', '#99DD99', 0.0),
                counter_tuple('old reg. users (not protected)', lambda x: x[10] == 'REG'  and x[13] == 'OLD' and x[14] == 'NO_PROTECT', '#8888EE', 0.0),
                counter_tuple('old reg. users (other)', lambda x: x[10] == 'REG'  and x[13] == 'OLD', '#FFFFFF', 0.0),
                counter_tuple('new IP users',         lambda x: x[10] == 'ANON' and x[13] == 'NEW', '#FF4444', 0.1),
                counter_tuple('old IP users',         lambda x: x[10] == 'ANON' and x[13] == 'OLD', '#EE8888', 0.0),
                counter_tuple('bots',                 lambda x: x[10] == 'REG_BOT',                 '#666666', 0.0),
                counter_tuple('others', lambda x: x, '#CCCCCC', 0.0),
               ]

    # counters = [counter_tuple('new registered users', lambda x: x[10] == 'REG'  and x[13] == 'NEW' and x[14] != 'SEMIPROTECT', '#4444FF', 0.1),
    #             counter_tuple('old registered users', lambda x: x[10] == 'REG'  and x[13] == 'OLD' and x[14] != 'SEMIPROTECT', '#8888EE', 0.0),
    #             counter_tuple('new IP users',         lambda x: x[10] == 'ANON' and x[13] == 'NEW' and x[14] != 'SEMIPROTECT', '#FF4444', 0.1),
    #             counter_tuple('old IP users',         lambda x: x[10] == 'ANON' and x[13] == 'OLD' and x[14] != 'SEMIPROTECT', '#EE8888', 0.0),
    #             counter_tuple('bots',                 lambda x: x[10] == 'REG_BOT' and x[14] != 'SEMIPROTECT',                 '#666666', 0.0),
    #             #counter_tuple('others', lambda x: x, '#CCCCCC', 0.0),
    #            ]

    counters_map = {}
    for x in counters:
        counters_map[x.name] = x

    ratios = []
    patt = re.compile('(\d+) / (\d+) / (\d+)')
    for (i,fname) in enumerate(options.files):
        for line in open(fname).readlines():
            m = patt.search(line)
            if m:
                ratios.append((float(m.group(1)) / float(m.group(2)) / float(m.group(3))) ** 0.5)
                break
    sum_ratio = sum(ratios)
    counter_names = [x.name for x in counters]

    plots = []
    matplotlib.rc('font', size=options.fsize)
    for (n,fname) in enumerate(options.files):
        plt.figure(figsize=(10,10))
        table = list(csv.reader(filter(lambda x: x[0] != '#', open(fname)), delimiter='\t'))
        table = table[1:]

        counts = {}
        for name in counter_names:
            counts[name] = set()
        for cols in table:
            for c in counters:
                if c.filter(cols):
                    counts[c[0]].add(cols[options.field-1])
                    break

        print counts#!
        #plt.subplot(1, len(options.files), n+1)
        plt.axes([0, 0, ratios[n]/sum_ratio, ratios[n]/sum_ratio])
        plt.title(fname)
        p = plt.pie([len(counts[x]) for x in counter_names],
                    explode=[counters_map[x].explode for x in counter_names],
                    autopct='%1.1f%%',
                    pctdistance=1.2,
                    colors=[x.color for x in counters])

        plt.legend(p[0], ['' if counts[x] == 0 else x for x in counter_names],
                   loc=(.8, .8))

        base,ext = os.path.splitext(fname)
        plt.savefig('.'.join([base, 'svg']))
