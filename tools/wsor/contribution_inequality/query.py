#!/usr/bin/python
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

