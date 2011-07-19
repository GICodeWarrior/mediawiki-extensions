#! /usr/bin/env python
import random
import argparse
import time
import sys

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('-a', '--acceptance-rate', metavar='RATE',
                        dest='accept', type=float, default=0.02,
                        help='')
    parser.add_argument('-r', '--random-seed', metavar='SEED',
                        dest='seed', type=int, default=int(time.time()),
                        help='random number seed')
    options = parser.parse_args()
    
    random.seed(options.seed)

    for line in sys.stdin.readlines():
        if random.random() > options.accept:
            continue
        print line,
