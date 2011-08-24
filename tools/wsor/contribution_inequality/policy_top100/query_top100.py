#!/usr/bin/python

''' returns the top 100 contributors to a given page '''

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

from argparse import ArgumentParser
import os
from oursql import connect

parser = ArgumentParser()
parser.add_argument('page')
parser.add_argument('year')
parser.add_argument('ns')

query="""
select 
    user_name, editcount 
from giovanni.policy_contributors 
where title = ? and year = ? and namespace = ?
order by editcount desc limit 100;
"""

if __name__ == '__main__':
    ns = parser.parse_args()
    db = connect(read_default_file=os.path.expanduser('~/.my.cnf'))
    cursor = db.cursor()
    cursor.execute(query, (ns.page, ns.year, ns.ns))
    f = open('%s-%s-%s.tsv' % (ns.page, ns.year, ns.ns), 'w')
    for row in cursor:
        print >> f, '%s\t%d' % row
    print 'results printed to %s' % f.name

