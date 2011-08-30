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
from collections import namedtuple

revision_t = namedtuple('revision', 'oldid pageid textid comment userid usertext timestamp minor deleted length parentid')
user_t = namedtuple('user', 'id name first editcount periodedits futureedits type')
article_t = namedtuple('article', 'title protectlog older')
edits_t = namedtuple('edits', 'before between')
wikidate_t = namedtuple('wikidate', 'text datetime')
log_t = namedtuple('log', 'title action params timestamp')

botpat = re.compile('bot( |$)', re.IGNORECASE)
protectpat = re.compile('\[edit=(.*?)\] \((.*?) \(UTC\)\)')

def make_revision_t(*args):
    x = revision_t(*args)
    return x._replace(timestamp=wikidate_t(text=x.timestamp,
                                           datetime=parse_wikidate(x.timestamp)))
def make_log_t(*args):
    x = log_t(*args)
    return x._replace(timestamp=wikidate_t(text=x.timestamp,
                                           datetime=parse_wikidate(x.timestamp)))

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

def allprotect(cursor, start, end, ns=0):
    cursor.execute('''
          SELECT l.log_title, l.log_action, l.log_params, l.log_timestamp
            FROM logging l
            WHERE
              l.log_type = "protect"
              AND l.log_timestamp BETWEEN ? AND ?
              AND l.log_namespace = ?
              ORDER BY l.log_timestamp DESC
        ;
    ''', (start, end, ns))
    return [make_log_t(*x) for x in list(cursor)]

def closestprotect(cursor, limit, start, title, ns=0):
    cursor.execute('''
          SELECT l.log_title, l.log_action, l.log_params, l.log_timestamp
            FROM logging l
            WHERE
              l.log_type = "protect"
              AND l.log_title = ?
              AND l.log_timestamp BETWEEN ? AND ?
              AND l.log_namespace = ?
            ORDER BY l.log_timestamp DESC
            LIMIT 1
        ;
    ''', (title, limit, start, ns))
    ls = list(cursor)
    if len(ls) == 0:
        return None
    return make_log_t(*(ls[0]))

def firstedits(cursor, uid, uname, limit=1):
    where = 'r.rev_user_text = ?'
    uspec = uname
    if uid != 0:
        where = 'r.rev_user = ?'
        uspec = uid
    cursor.execute('''
          SELECT *
            FROM revision r
            WHERE
              r.rev_timestamp != ""
              AND %s
            ORDER BY r.rev_timestamp ASC
          LIMIT ?
        ;
    ''' % (where,), (uspec,limit))
    return [make_revision_t(*x) for x in cursor]

def olderthan(cursor, title, timestamp):
    cursor.execute('''
          SELECT r.rev_timestamp
            FROM revision r
              INNER JOIN page p on p.page_id = r.rev_page
            WHERE
              r.rev_timestamp != ""
              AND p.page_title = ?
              AND r.rev_timestamp < ?
          LIMIT 1
        ;
    ''', (title,timestamp))
    return len(list(cursor)) != 0

def editcount_before(cursor, uid, uname, timestamp):
    if uid != 0:
        cursor.execute('''
          SELECT /* SLOW_OK */ count(*)
            FROM revision r
            WHERE
              r.rev_user = ?
              AND r.rev_timestamp > ?
        ;
        ''', (uid,timestamp))
        newedits = list(cursor)[0][0]
        cursor.execute('''
          SELECT u.user_editcount
            FROM user u
            WHERE
              u.user_id = ?
        ;
        ''', (uid,))
        alledits = list(cursor)[0][0]
        return int(alledits) - int(newedits)
    else:
        # anonymous user's edit count only can be found from revision
        cursor.execute('''
          SELECT /* SLOW_OK */ count(*)
            FROM revision r
            WHERE
              r.rev_user_text = ?
              AND r.rev_timestamp < ?
        ;
        ''', (uname,timestamp))
        return int(list(cursor)[0][0])

def editcount_duration(cursor, uid, uname, timestamp1, timestamp2):
    uspec = 'r.rev_user = ?'
    uarg = uid
    if uid == 0:
        uspec = 'r.rev_user_text = ?'
        uarg = uname
    cursor.execute('''
          SELECT /* SLOW_OK */ count(*)
            FROM revision r
            WHERE
              %s
              AND r.rev_timestamp BETWEEN ? AND ?
        ;
    ''' % uspec, (uarg, timestamp1, timestamp2))
    return int(list(cursor)[0][0])

def edits_duration(cursor, uid, uname, timestamp1, timestamp2):
    uspec = 'r.rev_user = ?'
    uarg = uid
    if uid == 0:
        uspec = 'r.rev_user_text = ?'
        uarg = uname
    cursor.execute('''
          SELECT /* SLOW_OK */ *
            FROM revision r
            WHERE
              %s
              AND r.rev_timestamp BETWEEN ? AND ?
        ;
    ''' % uspec, (uarg, timestamp1, timestamp2))
    return [make_revision_t(*x) for x in list(cursor)]

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('-f', '--field', metavar='N',
                        dest='field', type=int, default=1,
                        help='')
    parser.add_argument('-H', '--host', metavar='HOST',
                        dest='host', type=str, default='',
                        help='mysql host name')
    parser.add_argument('-R', '--hours', metavar='N',
                        dest='hours', type=int, default=1,
                        help='')
    parser.add_argument('-a', '--activity-delta', metavar='DAYS',
                        dest='activedelta', type=lambda x: timedelta(days=x), default=timedelta(days=120),
                        help='')
    parser.add_argument('-D', '--activity-duration', metavar='DAYS',
                        dest='activedur', type=lambda x: timedelta(days=x), default=timedelta(days=90),
                        help='')
    parser.add_argument('-O', '--threshold', metavar='DATE',
                        dest='olderthan', type=lambda x: parse_wikidate(x), default=None,
                        help='')
    parser.add_argument('-L', '--limit', metavar='N',
                        dest='limit', type=int, default=30,
                        help='')
    parser.add_argument('-o', '--output', metavar='FILE',
                        dest='output', type=lambda x: open(x, 'w'), default=sys.stdout,
                        help='')
    parser.add_argument('-b', '--include-bots',
                        dest='include_bots', action='store_true', default=False,
                        help='')
    parser.add_argument('-d', '--db', metavar='DBNAME', required=True,
                        dest='db', type=str, default='hywiki-p',
                        help='target wiki name')
    parser.add_argument('input')
    options = parser.parse_args()
    options.db = options.db.replace('_','-')

    if options.host == '':
	options.host = options.db + '.rrdb.toolserver.org'
    conn = oursql.connect(host = options.host,
                          read_default_file=os.path.expanduser('~/.my.cnf'),
                          db = options.db.replace('-','_'),
                          charset=None,
                          use_unicode=False)

    cursor = conn.cursor()
    csv.field_size_limit(1000000000)
    table = list(csv.reader(open(options.input), delimiter='\t'))
    table = table[1:]

    output = []
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
        cols[options.field:options.field] = ['REDIRECT' if redirect else 'ARTICLE', str(res[0][0])]
        output.append(cols)
        if redirect:
            (title,pageid) = redirected(cursor, res[0][0])
            if title == None:
                print >>sys.stderr, 'error 2 %s' % cols
                continue
            a = [x for x in cols]
            a[options.field-1:options.field+2] = (title,str(pageid),'REDIRECT_RESOLVED')
            output.append(a)

    # cursor.executemany('''
    #       SELECT p.page_title, p.page_id
    #         FROM page p
    #         WHERE
    #           p.page_title = ?
    #           AND p.page_namespace = 0
    # ''', [(urllib2.quote(x[options.field-1]),) for x in table])
    # print list(cursor)

    edits = {}
    articles = {}
    users = {}
    timestamps = {}
    for cols in output:
        ts = datetime.strptime(cols[3], '%Y/%m/%d %H:%M:%S')
        timestamps[ts] = True
    duration = sorted(timestamps.keys())
    duration = (wikidate_t(format_wikidate(duration[0]), duration[0]),
                wikidate_t(format_wikidate(duration[-1]), duration[-2]))
    if options.olderthan == None:
        options.olderthan = duration[0].datetime - timedelta(days=365)
        
    for cols in output:
        ts = datetime.strptime(cols[3], '%Y/%m/%d %H:%M:%S')
        start = ts + timedelta(hours=-options.hours)
        end   = start + timedelta(hours=options.hours)
        cursor.execute('''
       SELECT *
           FROM revision r
           WHERE
               r.rev_page = ?
               AND rev_timestamp BETWEEN ? AND ?
       ;

       ''', (cols[1],
             datetime.strftime(start, '%Y%m%d%H%M%S'),
             datetime.strftime(end,   '%Y%m%d%H%M%S'),
             ))
        ls = [make_revision_t(*x) for x in cursor]
        if len(ls) == 0:
            print >>sys.stderr, 'no revision: %s %s %s' % (start, end, cols[0])
        for rev in ls:
            usertype = 'ANON' if rev.userid == 0 else 'REG'
            if rev.userid != 0 and botpat.search(rev.usertext):
                if options.include_bots:
                    usertype += '_BOT'
                else:
                    print >>sys.stderr, 'rev %s is by bot (%s)' % (rev.oldid, rev.usertext)
                    continue
            if not users.has_key((rev.userid,rev.usertext)):
                users[(rev.userid,rev.usertext)] = user_t(id=rev.userid, name=rev.usertext,
                                                          first=firstedits(cursor, rev.userid, rev.usertext),
                                                          editcount=editcount_before(cursor, rev.userid, rev.usertext, duration[0].text),
                                                          periodedits=edits_duration(cursor, rev.userid, rev.usertext, duration[0].text, duration[1].text),
                                                          futureedits=edits_duration(cursor, rev.userid, rev.usertext, duration[0].datetime + options.activedelta, duration[1].datetime + options.activedelta + options.activedur),
                                                          type=usertype)
            edits[rev.oldid] = (cols,rev)
            print >>sys.stderr, rev.oldid
            if not articles.has_key(cols[0]):
                articles[cols[0]] = article_t(title=cols[0], protectlog=[], older=olderthan(cursor, cols[0], options.olderthan))

    # collect protect logs
    print >>sys.stderr, 'collecting protection log entries for %s - %s...' % (duration[0].text, duration[1].text)
    protectlog = allprotect(cursor, duration[0].text, duration[1].text)

    # collect protect information
    print >>sys.stderr, 'collecting protection log entries of %d articles for %s - %s...' % (len(articles.items()), duration[0].text, duration[1].text)
    for (title,article) in articles.items():
        article.protectlog.extend(filter(lambda x: x.title == title, protectlog))
        closest = None
        if article.older:
            closest = closestprotect(cursor, format_wikidate(options.olderthan), duration[0].text, article.title)
        else:
            closest = closestprotect(cursor, '0', duration[0].text, article.title)
        if closest:
            article.protectlog.append(closest)
        print >>sys.stderr, '%s %d' % (title, len(article.protectlog))

    options.output.write('\t'.join(['title', 'page_id', 'redirect?', 'pageview timestamp', 'predicted pageview', 'actual pageview', 'trending hours', 'surprisedness', 'revision', 'timestamp', 'user type', 'username', 'editcount', 'new?', 'protect', 'editcount_%dd+%dd' % (options.activedelta.days, options.activedur.days)]) + '\n')

    # collect protect information
    print >>sys.stderr, 'writing %d edits...' % (len(edits.items()))
    for (revid,(cols,rev)) in sorted(edits.items(), key=lambda x: x[0]):
        new = 'OLD'
        user = users[(rev.userid, rev.usertext)]
        if len(user.first) == 0 or user.first[0].timestamp.datetime > rev.timestamp.datetime + timedelta(days=-30):
            new = 'NEW'
            
        revdate = rev.timestamp.datetime

        article = articles[cols[0]]
        protect = None
        if len(article.protectlog) > 0:
            f = filter(lambda x: x.timestamp.datetime < rev.timestamp.datetime, article.protectlog)
            if len(f) > 0:
                protect = f[0]

        if protect == None or len(protect) == 0:
            protect = 'NO_PROTECT'
        else:
            m = protectpat.search(protect.params)
            if m:
                lv = m.group(1)
                try:
                    expire = datetime.strptime(m.group(2), 'expires %M:%S, %d %B %Y')
                    if lv == 'autoconfirmed' and expire > revdate:
                        protect = 'SEMIPROTECT'
                    elif lv == 'admin' and expire > revdate:
                        protect = 'PROTECT'
                    else:
                        protect = 'OTHER_PROTECT'
                except ValueError, e:
                    if m.group(2).find('indefinite'):
                        protect = 'INDEFINITE'
                    else:
                        protect = 'OTHER_PROTECT'
            else:
                protect = 'UNKNOWN'

        output = cols + [str(x) for x in [revid, rev.timestamp.text, user.type, user.name,
                                          user.editcount + len(filter(lambda x: x.timestamp.datetime < rev.timestamp.datetime, user.periodedits)),
                                          new,
                                          protect,
                                          len(filter(lambda x: rev.timestamp.datetime + options.activedelta < x.timestamp.datetime and x.timestamp.datetime < rev.timestamp.datetime + options.activedelta + options.activedur, user.futureedits))
                                          ]]
        line = '\t'.join(output)
        options.output.write(line + '\n')
    options.output.write('# %s / %s edits/article\n' % (len(edits.keys()), len(articles.keys())))
