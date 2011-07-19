#! /usr/bin/env python

import random
import argparse
import time
import sys
import os
import gzip

def parse(f):
    for line in f.readlines():
        i = None
        try:
            i = line.rindex(' ', 0, line.rindex(' '))
        except ValueError:
            print >>sys.stderr, line
        if i != None and i > 0:
            yield (line,line[0:i])

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('-l', '--list', metavar='FILE',
                        dest='filter', type=str, required=True,
                        help='')
    parser.add_argument('-d', '--directory', metavar='DIR',
                        dest='dir', type=str, required=True,
                        help='')
    parser.add_argument('files', nargs='+')
    options = parser.parse_args()

    accepts = {}

    for line in open(options.filter).readlines():
        accepts[line.strip()] = True
    for f in options.files:
        print >>sys.stderr, f
        w = gzip.open(os.path.sep.join([options.dir, os.path.basename(f)]), 'w')
        for (line,p) in parse(gzip.open(f)):
            if accepts.has_key(p):
                print >>w, line,
