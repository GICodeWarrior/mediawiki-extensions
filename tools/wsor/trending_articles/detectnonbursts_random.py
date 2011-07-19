#! /usr/bin/env python
# -*- coding: utf-8 -*-

import pymongo
import codecs
import csv
import sys
from datetime import datetime, timedelta
from pymongo.master_slave_connection import MasterSlaveConnection
import argparse
import random
import gzip
import re
import os
import time
import urllib2
from collections import deque, namedtuple
import numpy as np

pageview_tuple = namedtuple('Pageview', 'date count')
count_tuple = namedtuple('Count', 'pred real')

def time_parse(x):
    return datetime.strptime(x, 'pagecounts-%Y%m%d-%H%M%S.gz')
def time_format(x):
    return datetime.strftime(x, '%Y/%m/%d %H:%M:%S')
def datetime2days(x):
    return x.days + x.seconds / 60.0 / 60.0 / 24.0 + x.microseconds / 6000.0 / 60.0 / 24.0

def load_wikistats_file(f):
    print >>sys.stderr, 'loading %s...' % f
    ret = {}
    for line in gzip.open(f):
        line.strip()
        (lang,title,count,bytes) = line.split(' ')
        ret[(lang,title)] = count_tuple(float(count), int(count))
    return pageview_tuple(time_parse(os.path.basename(f)), ret)

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('-o', '--output', metavar='FILE',
                        dest='output', type=str, required=True,
                        help='')
    parser.add_argument('-a', '--acceptance-rate', metavar='RATE',
                        dest='accept', type=float, default=0.001,
                        help='')
    parser.add_argument('-r', '--random-seed', metavar='SEED',
                        dest='seed', type=int, default=int(time.time()),
                        help='random number seed')
    parser.add_argument('-v', '--verbose',
                        dest='verbose', action='store_true', default=False,
                        help='turn on verbose message output')
    parser.add_argument('files', nargs='+')
    options = parser.parse_args()

    fh = codecs.open(options.output, 'w', 'utf-8')
    writer = csv.writer(fh, delimiter='\t')
    random.seed(options.seed)

    fh.write('title\ttime\tcount_pred\tcount_\tcont\trate\n')

    if options.verbose:
        print >>sys.stderr, options

    options.files.sort()
    for fname in options.files:
        pvs = load_wikistats_file(fname)
        for (page,count) in pvs.count.items():
            if random.random() < options.accept:
                ls = []
                try:
                    ls = [urllib2.unquote(page[1]).decode('utf-8'),
                          time_format(pvs.date),
                          None,
                          count.real,
                          0,
                          None]
                    writer.writerow([unicode(x) for x in ls])
                except UnicodeEncodeError, e:
                    print >>sys.stderr, '%s: %s' % (e, page)
                    continue
                except UnicodeDecodeError, e:
                    print >>sys.stderr, '%s: %s' % (e, page)
                    continue


