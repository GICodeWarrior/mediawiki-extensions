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
import progressbar
from HTMLParser import HTMLParser

sys.path.append('..')
#print sys.path
import configuration
settings = configuration.Settings()
import utils
import log


class AnchorParser(HTMLParser):
    '''
    A simple HTML parser that takes an HTML directory listing and extracts the
    directories.
    '''
    def __init__(self,):
        HTMLParser.__init__(self)
        self.directories = []

    def handle_starttag(self, tag, attrs):
        if tag == 'a':
            for key, value in attrs:
                if key == 'href':
                    self.directories.append(value)
                    #print value


def launcher(properties, settings, logger):
    print 'Creating list of files to be downloaded...'
    tasks = create_list_dumpfiles(settings.wp_dump_location,
                                  properties.path,
                                  properties.filename)
    consumers = [multiprocessing.Process(target=download_wiki_file,
                args=(tasks, properties))
                for i in xrange(settings.number_of_processes)]

    print 'Starting consumers to download files...'
    for w in consumers:
        w.start()

    tasks.join()


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


def read_directory_contents(domain, path):
    parser = AnchorParser()
    data = read_data_from_http_connection(domain, path)
    parser.feed(data)
    return parser.directories


def retrieve_md5_hashes(domain, project, date):
    path = '%s/%s/%s-%s-md5sums.txt' % (project, date, project, date)
    data = read_data_from_http_connection(domain, path)



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


def download_wiki_file(task_queue, config):
    '''
    This is a very simple replacement for wget and curl because Windows does
    not have these tools installed by default
    '''
    success = True
    chunk = 1024 * 4
    while True:
        filename = task_queue.get(block=False)
        task_queue.task_done()
        if filename == None:
            print 'Swallowed a poison pill'
            break
        extension = file_utils.determine_file_extension(filename)
        filemode = file_utils.determine_file_mode(extension)
        filesize = determine_remote_filesize(settings.wp_dump_location, config.path, filename)
        if filemode == 'w':
            fh = file_utils.create_txt_filehandle(config.location, filename, filemode, settings.encoding)
        else:
            fh = file_utils.create_binary_filehandle(config.location, filename, 'wb')

        if filesize != -1:
            widgets = log.init_progressbar_widgets(filename)
            pbar = progressbar.ProgressBar(widgets=widgets, maxval=filesize).start()

        try:
            if filename.endswith('json'):
                req = urllib2.Request(settings.wp_dump_location + config.path)
            else:
                req = urllib2.Request(settings.wp_dump_location + config.path + filename)
            response = urllib2.urlopen(req)
            while True:
                data = response.read(chunk)
                if not data:
                    print 'Finished downloading %s%s%s.' % (settings.wp_dump_location, config.path, filename)
                    break
                fh.write(data)

                filesize -= chunk
                if filesize < 0:
                    chunk = chunk + filesize
                pbar.update(pbar.currval + chunk)

        except urllib2.URLError, error:
            print 'Reason: %s' % error
            success = False
        except urllib2.HTTPError, error:
            print 'Error: %s' % error
            success = False
        finally:
            fh.close()

    return success


if __name__ == '__main__':
    domain = 'download.wikimedia.org'
    path = 'enwikinews'
    filename = None
    #check_remote_path_exists(domain, path, filename)
    #read_directory_contents(domain, path)
#    download_wp_dump('http://download.wikimedia.org/enwiki/latest',
#                     'enwiki-latest-page_props.sql.gz',
#                     settings.input_location)
