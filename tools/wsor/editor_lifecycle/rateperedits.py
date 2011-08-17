#!/usr/bin/python

'''plots number of edits vs activity rate '''

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
