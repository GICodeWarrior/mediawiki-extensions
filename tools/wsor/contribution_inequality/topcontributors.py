#!/usr/bin/python

''' lists top contributors by year and namespace '''

'''
Copyright (C) 2011 GIOVANNI LUCA CIAMPAGLIA, GCIAMPAGLIA@WIKIMEDIA.ORG
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
http://www.gnu.org/copyleft/gpl.html
'''

__author__ = "Giovanni Luca Ciampaglia"
__email__ = "gciampaglia@wikimedia.org"

import os
import sys
import csv

from oursql import connect
from itertools import groupby
from contextlib import closing
from argparse import ArgumentParser, FileType
from collections import deque
from matplotlib.font_manager import FontProperties
from datetime import date

import numpy as np
import matplotlib.pyplot as pp

parser = ArgumentParser(description=__doc__)
parser.add_argument('data_path', metavar='data')
parser.add_argument('output_file', metavar='output_file', type=FileType('w'))
parser.add_argument('-t', '--top', dest='maxlen', type=int, default=100,
        help='Top users to list. default: %(default)d', metavar='NUM')
parser.add_argument('-u', '--user-names', action='store_true', help='query DB'
        ' for contributor\'s name')

colors = 'bgrcmykw'
styles = ['-', '--', '-.', ':']
markers = 'ov^<>1234'
query = 'select user_name from user where user_id = ?'

if __name__ == '__main__':

    ns = parser.parse_args() 
    databyns = {}

    if ns.user_names:
        conn = connect(read_default_file=os.path.expanduser("~/.my.cnf"))
        names_cache = {}
    
    with closing(open(ns.data_path)) as f:
        reader = csv.DictReader(f, delimiter='\t', quoting=csv.QUOTE_NONE)
        groupfunc = lambda row : (row['namespace'], row['year'])
        for key, subiter in groupby(reader, groupfunc):
            # smart way to keep only the tail
            users = deque((row['user_id'] for row in subiter ), maxlen=ns.maxlen)

            if ns.user_names:
                user_names = []
                for uid in users:
                    try:
                        user_name = names_cache[uid]
                    except KeyError:
                        cu = conn.cursor()
                        cu.execute(query, (uid,))
                        user_name, = cu.fetchone()
                        names_cache[uid] = user_name
                    user_names.append(user_name)
                users = map(lambda k : '"%s"' % k, user_names)

            print >> ns.output_file, '\t'.join(key + tuple(users))
            ns.output_file.flush()
            
            NS, year = map(int, key)
            try:
                databyns[NS].append((year, set(users)))
            except KeyError:
                databyns[NS] = [ (year, set(users)) ]

    figure = pp.figure(figsize=(8,4))
    ax = figure.add_axes(pp.axes([.1,.1,.8,.8], axisbg='whitesmoke'))
    i = 0
    M = len(markers)
    C = len(colors)
    S = len(styles)

    for key in databyns:
        years, users = zip(*databyns[key])
        years = [ date(year, 1, 1) for year in years ]
        I = np.asfarray(map(len, map(set.intersection, users[1:], users[:-1])))
        U = np.asfarray(map(len, map(set.union, users[1:], users[:-1])))
        label = 'NS %s' % key

        ax.plot(years[1:], I / U, label=label, marker=markers[i % M],
                color=colors[i % C], linestyle=styles[i % S])
        i += 1

    pp.ylim(0,1)
    pp.ylabel('similarity')
    pp.title('Top %d contributors' % ns.maxlen)
    pp.legend(loc='best', prop=FontProperties(size='small'))
    pp.draw()

    if not ns.output_file.isatty():
        figure_path = os.path.splitext(ns.output_file.name)[0] + '.pdf'
        pp.savefig(figure_path, fmt='pdf')
        print 'figure saved to %s' % figure_path
        print 'output saved to %s' % ns.output_file.name

    pp.show()
            
    if not ns.output_file.isatty():
        ns.output_file.close()


