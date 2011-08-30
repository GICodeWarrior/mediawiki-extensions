#! /usr/bin/env python
# -*- coding: utf-8 -*-

import codecs
import csv
import sys
from datetime import datetime, timedelta
import argparse
import random
import myzip
import re
import os
import urllib2
from collections import deque, namedtuple
import numpy as np

pageview_tuple = namedtuple('Pageview', 'date count')
count_tuple = namedtuple('Count', 'pred real')

def time_parse(x):
    if x.endswith('.gz'):
        return datetime.strptime(x, 'pagecounts-%Y%m%d-%H%M%S.gz')
    elif x.endswith('.gz'):
        return datetime.strptime(x, 'pagecounts-%Y%m%d-%H%M%S.xz')

def time_format(x):
    return datetime.strftime(x, '%Y/%m/%d %H:%M:%S')
def datetime2days(x):
    return x.days + x.seconds / 60.0 / 60.0 / 24.0 + x.microseconds / 6000.0 / 60.0 / 24.0

def load_wikistats_file(f):
    print >>sys.stderr, 'loading %s...' % f
    ret = {}
    for line in myzip.open(f):
        line.strip()
        (lang,title,count,bytes) = line.split(' ')
        ret[(lang,title)] = count_tuple(float(count), int(count))
    return pageview_tuple(time_parse(os.path.basename(f)), ret)

def slices(ls, size):
    size /= 2
    return map(lambda i: ls[i:i+2*size+1], xrange(0, len(ls) - 2*size))

def predict(ls, new):
    hist = {}
    for (page,count) in new.items():
        hist[page] = count_tuple([], count.real)
    for (i,cnts) in enumerate(ls):
        for (page,c) in cnts.items():
            if hist.has_key(page):
                if len(hist[page].pred) < i:
                    a = [0]*(i-len(hist[page].pred))
                    hist[page].pred.extend(a)
                hist[page].pred.append(c.real)
            else:
                a = [0]*(i+1)
                a[-1] = c.real
                hist[page] = count_tuple(a, new[page].real if new.has_key(page) else 0)
    ret = {}
    for (page, count) in hist.items():
        if len(hist[page].pred) < len(ls):
            a = [0]*(len(ls)-len(hist[page].pred))
            hist[page].pred.extend(a)
        slope,intercept = np.linalg.lstsq(np.transpose([np.array(range(0,len(count.pred))),
                                                     np.ones(len(count.pred))]),
                                          np.array(count.pred))[0]
        ret[page] = count._replace(pred=slope * (len(count.pred) + 1) + intercept)
    return ret

def moving_accumurate(ls, n, extract=lambda x: x, accumurate=lambda sum,x: sum+x):
    if n <= 1:
        for x in ls:
            yield(extract(x))
        return
    buff = deque()
    for (i,v) in enumerate(ls):
        if i < n-1:
            buff.append(extract(v))
        else:
            vv = extract(v)
            r = accumurate(buff, vv)
            yield r
            buff.popleft()
            buff.append(vv)

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('-o', '--output', metavar='FILE',
                        dest='output', type=lambda x: codecs.open(x, 'w', 'utf-8'), default=sys.stdout,
                        help='')
    parser.add_argument('-R', '--rate', metavar='RATE',
                        dest='rate', type=float, default=8.0,
                        help='')
    parser.add_argument('-m', '--max-duration', metavar='HOURS',
                        dest='max', type=float, default=5,
                        help='')
    parser.add_argument('-w', '--window', metavar='HOURS',
                        dest='window', type=int, default=5,
                        help='')
    parser.add_argument('-M', '--min-count', metavar='N',
                        dest='min', type=int, default=2000,
                        help='')
    parser.add_argument('-v', '--verbose',
                        dest='verbose', action='store_true', default=False,
                        help='turn on verbose message output')
    parser.add_argument('-i', '--inclusive',
                        dest='inclusive', action='store_true', default=False,
                        help='include the items below the threshold, add a binary indicator column')
    parser.add_argument('files', nargs='+')
    options = parser.parse_args()

    fh = options.output
    writer = csv.writer(fh, delimiter='\t')
    fh.write('title\ttime\tcount_pred\tcount_\tcont\trate\n')

    if options.verbose:
        print >>sys.stderr, options

    options.files.sort()
    gen_sums = moving_accumurate(options.files, options.window, extract=load_wikistats_file,
                                 accumurate=lambda hist,cur: (cur.date, predict([x.count for x in hist],cur.count)))
    bursting = {}
    for (newtime,new) in gen_sums:
        for (page,count) in new.items():
            if count.real < options.min:
                continue
            r = 0
            if count.pred == 0:
                if count.real > options.min:
                    r = 9999999
            else:
                r = float(count.real - count.pred) / count.pred
            if r > options.rate:
                bursting.setdefault(page, 0)
            if bursting.has_key(page):
                bursting[page] += 1
            if bursting.has_key(page) or options.inclusive:
                b = bursting[page] if bursting.has_key(page) else 0
                try:
                    ls = [urllib2.unquote(page[1]).decode('utf-8'),
                          time_format(newtime),
                          count.pred,
                          count.real,
                          b,
                          r]
                    if options.inclusive:
                        ls.insert(len(ls), bursting.has_key(page))
                    writer.writerow([unicode(x) for x in ls])
                except UnicodeDecodeError, e:
                    print >>sys.stderr, '%s: %s' % (e, page)
                    continue
            if bursting.has_key(page) and (r < -options.rate or bursting[page] > float(options.max) / options.window):
                    bursting.pop(page)


