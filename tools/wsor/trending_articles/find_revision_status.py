#! /usr/bin/env python
# -*- coding: utf-8 -*-
# 

import oursql
import os
import argparse
import sys
import csv
import urllib2
import re
from datetime import datetime, timedelta

def parse_wikidate(x):
    return datetime.strptime(str(x), '%Y%m%d%H%M%S')

def format_wikidate(x):
    return datetime.strftime(x, '%Y%m%d%H%M%S')

def title2pageid(cursor, title, namespace=0):
    cursor.execute('''
          SELECT p.page_id, page_is_redirect
            FROM page p
            WHERE
              p.page_title = ?
              AND p.page_namespace = ?
        ;
    ''', (title,namespace))
    ls = list(cursor)
    if len(ls) == 0:
        return (None,None)
    return tuple(ls[0])
    
def redirected(cursor, pid, namespace=0):
    cursor.execute('''
          SELECT rd_title
            FROM redirect r
            WHERE
              r.rd_from = ?
        ;
    ''', (pid,))
    title = list(cursor)[0][0]
    rd_pid,rd = title2pageid(cursor, title)
    if rd_pid == None:
        return (None,None)
    if rd and rd_pid != pid:
        (title, rd_pid) = redirected(cursor, rd_pid, namespace)
    return (title, rd_pid)

def firstedits(cursor, uid, uname, delta, n):
    where = 'r.rev_user_text = ?'
    uspec = uname
    if uid != 0:
        where = 'r.rev_user = ?'
        uspec = uid
    cursor.execute('''
          SELECT r.rev_timestamp
            FROM revision r
            WHERE
              r.rev_timestamp != ""
              AND %s
              ORDER BY r.rev_timestamp ASC
            LIMIT 1
        ;
    ''' % (where,), (uspec,))
    first = list(cursor)[0][0]
    first = parse_wikidate(first)
    cursor.execute('''
          SELECT r.rev_id
            FROM revision r
            WHERE
              %s
              AND r.rev_timestamp BETWEEN ? AND ?
            LIMIT ?
        ;
    ''' % (where,), (uspec, format_wikidate(first), format_wikidate(first + delta), n))
    return [int(x[0]) for x in list(cursor)]

def editcount(cursor, uid, uname, timestamp):
    where = 'r.rev_user_text = ?'
    uspec = uname
    if uid != 0:
        where = 'r.rev_user = ?'
        uspec = uid
    
    cursor.execute('''
          SELECT count(*)
            FROM revision r
            WHERE
              %s
              AND r.rev_timestamp < ?
        ;
        ''' % (where,), (uspec,timestamp))
    return int(list(cursor)[0][0])

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('-f', '--field', metavar='N',
                        dest='field', type=int, default=1,
                        help='')
    parser.add_argument('-d', '--db', metavar='DBNAME', required=True,
                        dest='db', type=str, default='hywiki-p',
                        help='target wiki name')
    parser.add_argument('input')
    options = parser.parse_args()
    options.db = options.db.replace('_','-')

    host = options.db + '.rrdb.toolserver.org'
    conn = oursql.connect(host = host,
                          read_default_file=os.path.expanduser('~/.my.cnf'),
                          db = options.db.replace('-','_'),
                          charset=None,
                          use_unicode=False)

    cursor = conn.cursor()

    csv.field_size_limit(1000000000)
    table = list(csv.reader(open(options.input), delimiter='\t'))
    table = table[1:]

    output = []
    hours = {}
    for cols in table:
        cursor.execute('''
          SELECT p.page_id, p.page_title, page_is_redirect
            FROM page p
            WHERE
              p.page_title = ?
              AND p.page_namespace = 0
        ;
        ''', (cols[options.field-1],))
        res = list(cursor)
        if res == None or res == []:
            print >>sys.stderr, 'error 1 %s' % cols
            continue
        redirect = int(res[0][2]) == 1
        cols.insert(options.field, 'REDIRECT' if redirect else 'ARTICLE')
        cols.insert(options.field, str(res[0][0]))
        output.append(cols)
        if redirect:
            (title,pageid) = redirected(cursor, res[0][0])
            if title == None:
                print >>sys.stderr, 'error 2 %s' % cols
                continue
            a = [x for x in cols]
            a[0] = title
            a[1] = str(pageid)
            a[2] = 'REDIRECT_RESOLVED'
            output.append(a)
        hours[cols[3]] = True

    # cursor.executemany('''
    #       SELECT p.page_title, p.page_id
    #         FROM page p
    #         WHERE
    #           p.page_title = ?
    #           AND p.page_namespace = 0
    # ''', [(urllib2.quote(x[options.field-1]),) for x in table])
    # print list(cursor)

    print '\t'.join(['title', 'page_id', 'redirect?', 'pageview timestamp', 'predicted pageview', 'actual pageview', 'trending hours', 'surprisedness', 'revision', 'timestamp', 'user type', 'username', 'editcount', 'new?'])

    botpat = re.compile('bot( |$)', re.IGNORECASE)
    edits = 0
    articles = {}
    for cols in output:
        start = datetime.strptime(cols[3], '%Y/%m/%d %H:%M:%S')
        end   = start + timedelta(hours=1)
        cursor.execute('''
       SELECT r.rev_id, r.rev_timestamp, r.rev_user, r.rev_user_text
           FROM revision r
           WHERE
               r.rev_page = ?
               AND rev_timestamp BETWEEN ? AND ?
       ;

       ''', (cols[1],
             datetime.strftime(start, '%Y%m%d$H%M%S'),
             datetime.strftime(end,   '%Y%m%d$H%M%S'),
             ))
        ls = list(cursor)
        if len(ls) == 0:
            print >>sys.stderr, 'no revision: %s %s %s' % (cols[0], start, end)
        for (rev,ts,uid,username) in ls:
            usertype = 'ANON' if uid == 0 else 'REG'
            if uid != 0 and botpat.search(username):
               usertype += '_BOT' 
            output = cols + [str(x) for x in [rev, ts, usertype, username,
                                         editcount(cursor,uid,username,re.sub('[ /\:]', '', cols[3])),
                                         'NEW' if firstedits(cursor,uid,username,timedelta(days=30),30).count(rev) > 0 else 'OLD']]
            print '\t'.join(output)
            edits +=1
            articles[cols[1]] = True

    print '# %s / %s / %s edits/article/hour' % (edits, len(articles.keys()), len(hours.keys()))
