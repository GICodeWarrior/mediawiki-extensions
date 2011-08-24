#!/usr/bin/python

''' Plots number of edits vs activity rate. Reproduces similar plot from
Radicchi (2009), Phys. Rev. E 80, 026118, that used data from a snapshot of the
logging table from 2008. '''

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

import re
import os
import sys

from argparse import ArgumentParser
from itertools import groupby

import numpy as np
import matplotlib.pyplot as pp

__prog__ = os.path.basename(__file__)

parser = ArgumentParser(description=__doc__)
parser.add_argument('data_file', metavar='data')

def main(ns):

    # detect extension and load data
    _, ext = os.path.splitext(ns.data_file)
    if re.match('^\.npy$', ext, re.I):
        data = np.load(ns.data_file)
    elif re.match('^\.tsv$', ext, re.I) or re.match('^\.txt$', ext, re.I):
        data = np.loadtxt(ns.data_file, delimiter='\t')
    else:
        print >> sys.stderr, '%s: error: could not determine file type (.npy,'\
                '.tsv, .txt accepted)' % __prog__
    
    # sort data
    data[:,1] = np.floor(np.log2(data[:,1]))
    idx = np.argsort(data[:,1])
    data = data[idx]

    # group by exponential binning
    positions = []
    x = []
    for p, subiter in groupby(data, lambda k : k[1]):
        positions.append(p)
        x.append(np.asarray([r for r, e in subiter ]))
    positions = np.asarray(positions)

    # make boxplot on log-log scale
    widths = 2 ** np.arange(0, len(x))
    ax = pp.gca()
    pp.boxplot(x, positions= 2 ** positions, sym=' ', whis=1.8, bootstrap=5000,
            widths=widths)
    pp.xscale('log')
    pp.yscale('log')

    # add reference line
    x = np.array([1e2, 1e6])
    m = 1e-8
    pp.plot(x, m * x, 'k-', alpha=.75, lw=2)

    # decorate
    pp.setp(ax.lines, color='k')
    pp.xlim(1,2e6)
    pp.ylim(1e-9,.1)
    pp.xlabel('edits')
    pp.ylabel(r'activity (${\rm sec} ^ {-1}$)')
    pp.draw()
    pp.show()

if __name__ == '__main__': 
    ns = parser.parse_args()
    main(ns)
