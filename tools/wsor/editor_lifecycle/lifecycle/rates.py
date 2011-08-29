#!/usr/bin/python
#:vim:ts=python:

''' functions for computing average activity rate of a single cohort '''

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

# TODO adapts to sparse matrices!

import os
import sys

import numpy as np
import datetime as dt

from argparse import ArgumentParser, FileType
from scipy.sparse import coo_matrix
from scipy.stats import gmean
from collections import deque

__prog__ = os.path.basename(os.path.abspath(__file__))

namespaces = {
        'main': 0, 
        'talk': 1, 
        'user': 2, 
        'user_talk' : 3,
        'wikipedia' : 4, 
        'wikipedia_talk' : 5, 
        'file' : 6, 
        'file_talk' : 7, 
        'mediawiki' : 8, 
        'mediawiki_talk' : 9, 
        'template' : 10, 
        'template_talk' : 11, 
        'help' : 12, 
        'help_talk' : 13,
        'category' : 14,
        'category_talk' : 15, 
        'portal' : 100, 
        'portal_talk' : 101,
        'book' : 108, 
        'book_talk' : 109
}

MAX_NS = np.max(namespaces.values()) # 109 as of August 2011

def estimaterate(edits, step):
    edits = np.asfarray(edits)
    N = len(edits)
    tmp = []
    rem = N % step
    for i in xrange(0, N, step): # step-size chunks
        if i + step <= N:
            tmp.append(edits[i:i+step].sum() / step)
        else:
            tmp.append(edits[i:].sum() / (N-i))
    return np.asarray(tmp)

def itercycles(npzarchive, every, users=None, onlyns=None):
    '''
    Iterates over the archive or over given list of users and returns estimated
    activity life cycle (see estimaterate())

    For parameters, see computerates
    '''
    for uid in (users or npzarchive.files):
        data = npzarchive[uid].view(np.recarray)
        idx = data.ns >= 0 # let's filter out junk (i.e. edits to virtual ns)
        days = data.day[idx]
        edits = data.edits[idx]
        ns = data.ns[idx]
        days = days - days.min()
        shape = (days.max() + 1, MAX_NS + 1)
        M = coo_matrix((edits, (days, ns)), shape=shape)
        if onlyns is not None:
            M = M.tocsc()[:, onlyns]
        M = M.tocsr()
        rates = estimaterate(np.asarray(M.sum(axis=1)).ravel(), every)
        yield np.c_[np.arange(len(rates)) * every, rates]

def average(ratesbyday, geometric=False):
    '''
    Computes average cycle with standard errors. Takes in input a dictionary
    returned by groupbydayssince(). If geometric, compute the geometric mean
    and standard deviation instead.
    '''
    all_days = sorted(ratesbyday.keys())
    result = deque()
    for d in all_days:
        s = ratesbyday[d]
        N = len(s)
        if geometric:
            s = np.ma.masked_equal(s, 0.0)
            m = gmean(s)
            sem = np.exp(np.std(np.log(s), ddof=1)) / np.sqrt(N)
        else:
            m = np.mean(s)
            sem = np.std(s, ddof=1)
        result.append((d, m, sem, N))
    return np.asarray(result)

def groupbyday(npzarchive, every, users=None, onlyns=None):
    '''
    This function estimates editors' activity rates and groups rate estimates by
    number of days elapsed since editor registration (which corresponds to time = 0)

    For parameters, see computerates
    '''
    tmp = {}
    for cyclearr in itercycles(npzarchive, every, users, onlyns):
        for d, r in cyclearr:
            try:
                tmp[d].append(r)
            except KeyError:
                tmp[d] = deque([r])
    return tmp

# NOTE: not used right now
def lifetimes(npzarchive, users=None):
    '''
    Returns the distribution of account lifetimes over an archive. Can take an
    optional list users ids to restrict the sample to a specific group of
    editors
    '''
    lt = deque()
    for uid in (users or npzarchive.files):
        days, edits = npzarchive[uid].T
        lt.append(days.ptp())
    return np.asarray(lt)

# NOTE: not used right now
def find_inactives(npzarchive, inactivity, minimum_activity, maximum_activity):
    now = dt.datetime.now().toordinal()
    epoch = dt.datetime(1970,1,1).toordinal()
    unix_now = now - epoch
    inactives = deque()
    for uid in npzarchive.files:
        days, edits = npzarchive[uid].T
        if days.ptp() <= inactivity:
            continue
        unix_last = days[-1]
        if (unix_now - unix_last) > inactivity:
            tot_edits = float(edits.sum())
            tot_days = float(days.ptp() - inactivity)
            activity = tot_edits / tot_days * 365.0
            if minimum_activity < activity and maximum_activity > activity:
                inactives.append(uid)
    return inactives

def computerates(fn, every, users=None, onlyns=None, geometric=False):
    '''
    Returns an array of average activity vs day since registration with standard
    errors of the average

    Parameters
    ----------
    onlyns    - compute edit counts only over specified list of namespaces
    users     - compute rates only for these users
    every     - compute daily rates in strides of length `every'
    geometric - computes geometric mean of average rate by day since
                registration
    '''
    npzarchive = np.load(fn)
    rates = average(groupbyday(npzarchive, every, users, onlyns), geometric)
    return rates

parser = ArgumentParser(description=__doc__)
parser.add_argument('data_file', metavar='data')
parser.add_argument('output_file', metavar='output', type=FileType('w'))
parser.add_argument('-every', type=int, help='default: average over %(default)d days',
        default=30, metavar='NUM')
parser.add_argument('-ns', type=int, action='append', help='select only these NS',
        dest='only')

def main(ns):
    rates = computerates(ns.data_file, ns.every, onlyns=ns.only)
    if ns.output_file.isatty():
        print >> sys.stderr, 'writing to standard output'
    np.savetxt(ns.output_file, rates, fmt='%f')
    if not ns.output_file.isatty():
        print '%s: output saved to %s' % (__prog__, ns.output_file.name)

if __name__ == '__main__':
    ns = parser.parse_args()
    main(ns)
