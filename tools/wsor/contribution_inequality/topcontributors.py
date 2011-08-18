#!/usr/bin/python

''' lists top contributors by year and namespace '''

import os
import sys
import csv

from itertools import groupby
from contextlib import closing
from argparse import ArgumentParser
from collections import deque

parser = ArgumentParser(description=__doc__)
parser.add_argument('data_path', metavar='data')
parser.add_argument('maxlen', metavar='number', type=int)

if __name__ == '__main__':

    ns = parser.parse_args() 

    with closing(open(ns.data_path)) as f:
        reader = csv.DictReader(f, delimiter='\t', quoting=csv.QUOTE_NONE)
        groupfunc = lambda row : (row['namespace'], row['year'])
        for key, subiter in groupby(reader, groupfunc):
            # smart way to keep only the tail
            users = deque((row['user_id'] for row in subiter ), maxlen=ns.maxlen)
            print '\t'.join(key + tuple(users))
            sys.stdout.flush()
            
            

