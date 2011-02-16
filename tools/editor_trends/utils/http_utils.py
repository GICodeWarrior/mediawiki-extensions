#!/usr/bin/python
# -*- coding: utf-8 -*-
'''
Copyright (C) 2010 by Diederik van Liere (dvanliere@gmail.com)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details, at
http://www.fsf.org/licenses/gpl.html
'''

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__email__ = 'dvanliere at gmail dot com'
__date__ = '2010-10-21'
__version__ = '0.1'

import os
import sys
import urllib2
import httplib
import multiprocessing

if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
settings = settings.Settings()
import file_utils
import text_utils
import log


def read_data_from_http_connection(domain, path):
    if not domain.startswith('http://'):
        domain = 'http://%s' % domain
    url = '%s/%s' % (domain, path)

    try:
        req = urllib2.Request(url)
        response = urllib2.urlopen(req)
        data = response.read()
    except urllib2.URLError, error:
        print 'Reason: %s' % error
    except urllib2.HTTPError, error:
        print 'Error: %s' % error

    return data


def retrieve_md5_hashes(domain, project, date):
    path = '%s/%s/%s-%s-md5sums.txt' % (project, date, project, date)
    data = read_data_from_http_connection(domain, path)
    '''Implementation not yet finished'''


def create_list_dumpfiles(domain, path, filename):
    '''
    Wikipedia offers the option to download one dump file in separate pieces.
    This function determines how many files there are for a giving dump and puts
    them in a queue. 
    '''
    task_queue = multiprocessing.JoinableQueue()
    ext = file_utils.determine_file_extension(filename)
    canonical_filename = file_utils.determine_canonical_name(filename)
    for x in xrange(1, 100):
        f = '%s%s.xml.%s' % (canonical_filename, x, ext)
        res = get_headers(domain, path, f)
        if res == None or res.status != 200:
            if x == 1:
                task_queue.put(filename)
            break
        else:
            print 'Added chunk to download: %s' % f
            task_queue.put(f)
    if x == 1:
        for x in xrange(1):
            task_queue.put(None)
    else:
        for x in xrange(settings.number_of_processes):
            task_queue.put(None)
    return task_queue


def get_headers(domain, path, filename):
    '''
    @path is the full path of the file to be downloaded
    @filename is the name of the file to be downloaded
    '''
    try:
        if domain.startswith('http://'):
            domain = domain[7:]
        conn = httplib.HTTPConnection(domain)
        if filename != None:
            url = '%s%s' % (path, filename)
        else:
            url = '%s' % path
        conn.request('HEAD', url)
        res = conn.getresponse()
        conn.close()
        return res

    except httplib.socket.error:
        raise httplib.NotConnected('It seems that %s is temporarily \
            unavailable, please try again later.' % url)


def determine_modified_date(domain, path, filename):
    res = get_headers(domain, path, filename)
    if res != None and (res.status == 200 or res.status == 301):
        return res.getheader('last-modified', -1)
    else:
        return - 1


def determine_remote_filesize(domain, path, filename):
    res = get_headers(domain, path, filename)
    if res != None or res.status == 200:
        return int(res.getheader('content-length', -1))
    else:
        return - 1


def debug():
    domain = 'http://dumps.wikimedia.org'
    path = '/enwikinews/20100315/'
    filename = 'enwikinews-20100315-all-titles-in-ns0.gz'
    mod_date = determine_modified_date(domain, path, filename)
    print mod_date
    mod_date = text_utils.convert_timestamp_to_datetime_naive(mod_date, '%a, %d %b %Y %H:%M:%S %Z')
    print mod_date


if __name__ == '__main__':
    debug()
