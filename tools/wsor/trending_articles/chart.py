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
import math
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
    parser.add_argument('-X', '--exclude-semiprotect',
                      dest='nosemiprotect', action='store_true', default=False,
                      help='')
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

    # counters = [counter_tuple('w/ <30d edit history or IP', lambda x: x[10] == 'ANON'  or x[13] == 'NEW', '#FF4444', 0.1),
    #             counter_tuple('w/ >30d edit history and registered', lambda x: x, '#CCCCCC', 0.0),
    #            ]

    if options.nosemiprotect:
        counters = [counter_tuple('new registered users', lambda x: x[10] == 'REG'  and x[13] == 'NEW' and x[14] != 'SEMIPROTECT', '#4444FF', 0.1),
                    counter_tuple('old registered users', lambda x: x[10] == 'REG'  and x[13] == 'OLD' and x[14] != 'SEMIPROTECT', '#8888EE', 0.0),
                    counter_tuple('new IP users',         lambda x: x[10] == 'ANON' and x[13] == 'NEW' and x[14] != 'SEMIPROTECT', '#FF4444', 0.1),
                    counter_tuple('old IP users',         lambda x: x[10] == 'ANON' and x[13] == 'OLD' and x[14] != 'SEMIPROTECT', '#EE8888', 0.0),
                    counter_tuple('bots',                 lambda x: x[10] == 'REG_BOT' and x[14] != 'SEMIPROTECT',                 '#666666', 0.0),
                    #counter_tuple('others', lambda x: x, '#CCCCCC', 0.0),
                    ]

    counters_map = {}
    for x in counters:
        counters_map[x.name] = x

    ratios = []
    patt = re.compile('(\d+) / (\d+) / (\d+)')
    for (i,fname) in enumerate(options.files):
        ratios.append(1.0)
        for line in open(fname).readlines():
            m = patt.search(line)
            if m:
                ratios[i] = (float(m.group(1)) / float(m.group(2)) / float(m.group(3))) ** 0.5
                break

    sum_ratio = sum(ratios)
    counter_names = [x.name for x in counters]

    # chart for breakdown of users
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

        for (name,value) in counts.items():
            print name, len(value)
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
        print >>sys.stderr, 'output: ' + base
        plt.savefig('.'.join([base, 'svg']))

    # chart for new editor retention
    for (n,fname) in enumerate(options.files):
        plt.figure(figsize=(10,10))
        table = list(csv.reader(filter(lambda x: x[0] != '#', open(fname)), delimiter='\t'))
        table = table[1:]
        filt = lambda x: x[10] == 'REG'  and x[13] == 'NEW'
        bin = lambda x: min(int(10 * math.log10(int(x[15]) + 1)), int(10 * math.log10(3000)))
        username = lambda x: x[11]
        users = {}
        bins = {}
        for cols in table:
            if filt(cols) and not users.has_key(username(cols)):
                users[username(cols)] = True
                b = bin(cols)
                bins.setdefault(b, 0)
                bins[b] += 1

        bins = sorted(bins.items(), key=lambda x: -x[0])
        max_bin = max(x[0] for x in bins)

        if max_bin == 0:
            print >>sys.stderr, '%s: %s (no values)' % (fname, bins)
            continue
        print >>sys.stderr, '%s: %s' % (fname, bins)

        p = plt.pie([x[1] for x in bins],
                    pctdistance=1.2,
                    autopct='%1.1f%%',
                    colors=['#' + 3 * ('%02X' % int(255 - 255 * float(x[0]) / max_bin)) for x in bins])

        base,ext = os.path.splitext(fname)
        print >>sys.stderr, 'output: ' + base
        plt.savefig('.'.join([base, 'retention', 'svg']))
