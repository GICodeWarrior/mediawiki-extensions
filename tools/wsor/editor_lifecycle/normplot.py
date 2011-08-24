#!/usr/bin/python

''' plots evolution of normalized peak activity '''

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

import os
import sys

import numpy as np
import matplotlib.pyplot as pp

from argparse import ArgumentParser
from collections import defaultdict
from datetime import datetime
from matplotlib.font_manager import FontProperties

__prog__ = os.path.basename(__file__)

parser = ArgumentParser(description=__doc__)
parser.add_argument('input_paths', metavar='data', nargs='+')
parser.add_argument('-t', '--title', required=1)
parser.add_argument('-xlim', nargs=2, metavar='YEAR', type=int)
parser.add_argument('-ylim', nargs=2, metavar='VALUE', type=float)

conv = defaultdict(lambda k : float)
conv[0] = lambda k : datetime.strptime(k, '%Y-%m')
markers = 'ov^<>sp*D'
colors = 'brcmgyk'
M = len(markers)
C = len(colors)
labeltempl = r'$10^{%d} \leq a < 10^{%d}$'

if __name__ == '__main__':
    ns = parser.parse_args()
    
    lines = []

    fig = pp.figure(figsize=(8,4))
    ax = fig.add_axes(pp.axes([.1,.1,.65,.8], axisbg='whitesmoke'))
    
    for i, path in enumerate(ns.input_paths):
        try:
            data = np.loadtxt(path, converters=conv, dtype=object, skiprows=1)
        except IOError, e:
            print >> sys.stderr, '%s: skipping %s because: %s' % (__prog__,\
                    path, e.message or e.args[1])
            continue
        act, peak_date, peak_date_err, peak, peak_err = np.asfarray(data[:,1:]).T
        a = act[0]
        cohort = data[:, 0]
        idx = np.argsort(cohort)
        cohort = cohort[idx]
        peak = peak[idx] / peak.mean()
        l, = ax.plot(cohort, peak, marker=markers[i % M], color=colors[i % C], 
                ls='none', mec=colors[i % C], label=labeltempl % (a-1, a), ms=8,
                alpha=.65)
        lines.append(l)

    pp.figlegend(lines, [ l.get_label() for l in lines ], 
            loc='center right', prop=FontProperties(size='medium'))

    if ns.xlim:
        pp.xlim(datetime(ns.xlim[0],1,1), datetime(ns.xlim[1],1,1))
    if ns.ylim:
        pp.ylim(ns.ylim)

    pp.xlabel('cohort')
    pp.ylabel(r'normalized activity $\frac{a_p}{< a_p >}$')

    pp.title(ns.title)
    ax.minorticks_on()
    ax.grid("on")
    pp.draw()
    
    output_path = ns.title.replace(' ', '_').lower() + '.pdf'
    pp.savefig(output_path, fmt='pdf')
    print 'figure saved to %s' % output_path

    pp.show()
