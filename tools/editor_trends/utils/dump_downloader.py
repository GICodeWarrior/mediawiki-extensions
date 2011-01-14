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
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-10-21'
__version__ = '0.1'

import os
import sys
import urllib2
import httplib
import multiprocessing
import progressbar

import configuration
settings = configuration.Settings()
import utils


def create_list_dumpfiles(domain, path, filename, ext):
    '''
    Wikipedia offers the option to download one dump file in separate batches.
    This function determines how many files there are for a giving dump and puts
    them in a queue. 
    '''
    task_queue = multiprocessing.JoinableQueue()
    canonical_filename = utils.determine_canonical_name(filename)
    result = False
    for x in xrange(1, 100):
        f = '%s%s.xml.%s' % (canonical_filename, x, ext)
        res = check_remote_file_exists(domain, path, f)
        if res == None or res.status != 200:
            break
        else:
            print 'Added chunk to download: %s' % f
            task_queue.put(f)
            result = True
    for x in xrange(settings.number_of_processes):
        task_queue.put(None)
    return task_queue, result


def check_remote_file_exists(domain, path, filename):
    '''
    @url is the full path of the file to be downloaded
    @filename is the name of the file to be downloaded
    '''
    try:
        if domain.startswith('http://'):
            domain = domain[7:]
        conn = httplib.HTTPConnection(domain)
        url = '%s%s' % (path, filename)
        conn.request('HEAD', url)
        res = conn.getresponse()
        conn.close()
        return res

    except httplib.socket.error:
        raise httplib.NotConnected('It seems that %s is temporarily unavailable, please try again later.' % url)


def determine_remote_filesize(domain, path, filename):
    res = check_remote_file_exists(domain, path, filename)
    if res != None and res.status == 200:
        return int(res.getheader('content-length', -1))
    else:
        return - 1

def download_wiki_file(domain, path, filename, location, filemode):
    '''
    This is a very simple replacement for wget and curl because Windows does
    not have these tools installed by default
    @domain of the website where dump file is located
    @path location of the dumpfile
    @filename name of the file to be downloaded
    @location indicates where to store the file locally
    @filemode indicates whether we are downloading a binary or ascii file. (zip,
    7z,gz are binary, json is ascii)
    @pbar is an instance of progressbar.ProgressBar()
    '''
    chunk = 4096
    filesize = determine_remote_filesize(domain, path, filename)
    if filemode == 'w':
        fh = utils.create_txt_filehandle(location, filename, filemode, settings.encoding)
    else:
        fh = utils.create_binary_filehandle(location, filename, 'wb')

    if filesize != -1:
        widgets = ['%s: ' % filename, progressbar.Percentage(), ' ',
                   progressbar.Bar(marker=progressbar.RotatingMarker()), ' ',
                   progressbar.ETA(), ' ', progressbar.FileTransferSpeed()]

        pbar = progressbar.ProgressBar(widgets=widgets, maxval=filesize).start()

    try:
        if filename.endswith('json'):
            req = urllib2.Request(domain + path)
        else:
            req = urllib2.Request(domain + path + filename)
        response = urllib2.urlopen(req)
        while True:
            data = response.read(chunk)
            if not data:
                print 'Finished downloading %s%s%s.' % (domain, path, filename)
                break
            fh.write(data)

            filesize -= chunk
            if filesize < 0:
                chunk = chunk + filesize
            pbar.update(pbar.currval + chunk)

    except urllib2.URLError, error:
        print 'Reason: %s' % error
    except urllib2.HTTPError, error:
        print 'Error: %s' % error
    finally:
        fh.close()


if __name__ == '__main__':
    pbar = progressbar.ProgressBar()
    download_wp_dump('http://download.wikimedia.org/enwiki/latest', 'bla.xml', settings.input_location, pbar)
