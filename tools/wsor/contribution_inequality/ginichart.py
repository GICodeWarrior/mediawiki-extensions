#!/usr/bin/python
''' computes gini coefficient of contribution to namespace per year '''

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

import numpy as np
import matplotlib.pyplot as pp

from itertools import groupby
from contextlib import closing
from argparse import ArgumentParser
from matplotlib.font_manager import FontProperties

parser = ArgumentParser(description=__doc__)
parser.add_argument('data_path', metavar='data')
parser.add_argument('-T', '--title')

colors = 'bgrcmykw'
styles = ['-', '--', '-.', ':']
markers = 'ov^<>1234'

def gini(x):
    '''
    Computes an estimator of the Gini coefficient from an array x 
    Parameters
    ----------
    x - a flat array of observations

    References
    ----------
    http://mathworld.wolfram.com/GiniCoefficient.html 
    '''
    x.sort() # sorts in non-decreasing order
    n = float(len(x))
    i = np.arange(len(x)) + 1
    m = np.mean(x)
    return np.sum((2 * i - n - 1) * x) / ( n ** 2 * m) * (n / (n - 1))

def igini(flatiter):
    '''
    Computes an estimator of the Gini coefficient from a sorted iterator on a
    flat sample of observations

    Parameters
    ----------
    flatiter - an iterator over observations, sorted in non-decreasing order
    
    References
    ----------
    http://en.wikipedia.org/wiki/Gini_coefficient
    http://mathworld.wolfram.com/GiniCoefficient.html 
    '''
    den = 0.0
    num = 0.0
    for i, y in enumerate(flatiter):
        num += (i + 1) * y
        den += y
    n = i + 1
    return 1 - (2.0 / (n - 1)) * (n - num / den) * (n / (n - 1))

if __name__ == '__main__':

    ns = parser.parse_args() 

    g = []

    with closing(open(ns.data_path)) as f:
        reader = csv.DictReader(f, delimiter='\t', quoting=csv.QUOTE_NONE)
        groupfunc = lambda row : map(int, (row['namespace'], row['year']))
        for key, subiter in groupby(reader, groupfunc):
            flatiter = ( float(row['total_contributions']) for row in subiter )
            try:
                g.append((tuple(key) + (igini(flatiter),)))
            except ZeroDivisionError: # due to passing an empty iterator to igini
                g.append((tuple(key) + (np.nan,)))

    figure = pp.figure(figsize=(8,4)) 
    ax = figure.add_axes(pp.axes([.1,.1,.8,.8], axisbg='whitesmoke'))
    i = 0
    M = len(markers)
    C = len(colors)
    S = len(styles)

    for key, subiter in groupby(g, lambda k : k[0]):
        data = np.asarray([ (y,g) for n, y, g in subiter ])
        label = 'NS %d' % key
        ax.plot(data.T[0], data.T[1], label=label, marker=markers[i % M],
                color=colors[i % C], linestyle=styles[i % S])
        i += 1

    pp.ylabel('Gini coefficient')
    pp.legend(loc='best', prop=FontProperties(size='small'))
    pp.ylim(0,1)
    pp.draw()
    if ns.title:
        pp.title(ns.title)
        figure_path = 'gini_' + ns.title.replace(' ', '_') + '.pdf'
    else:
        figure_path = 'gini_' + os.path.splitext(ns.data_path)[0] + '.pdf'
    pp.savefig(figure_path, fmt='pdf')
    print 'output saved to %s' % figure_path
    pp.show()
