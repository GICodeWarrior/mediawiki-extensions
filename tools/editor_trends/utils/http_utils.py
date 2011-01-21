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


sys.path.append('..')
import configuration
settings = configuration.Settings()
import file_utils
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
        res = check_remote_path_exists(domain, path, f)
        if res == None or res.status != 200:
            if x == 1:
                task_queue.put(filename)
            break
        else:
            print 'Added chunk to download: %s' % f
            task_queue.put(f)
    for x in xrange(settings.number_of_processes):
        task_queue.put(None)
    return task_queue



def check_remote_path_exists(domain, path, filename):
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


def determine_remote_filesize(domain, path, filename):
    res = check_remote_path_exists(domain, path, filename)
    if res != None and res.status == 200:
        return int(res.getheader('content-length', -1))
    else:
        return - 1


def debug():
    domain = 'download.wikimedia.org'
    path = 'enwikinews'
    filename = None
    #check_remote_path_exists(domain, path, filename)
    #read_directory_contents(domain, path)
#    download_wp_dump('http://download.wikimedia.org/enwiki/latest',
#                     'enwiki-latest-page_props.sql.gz',
#                     settings.input_location)


if __name__ == '__main__':
    debug()
