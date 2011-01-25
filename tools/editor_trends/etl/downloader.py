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
__date__ = '2011-01-21'
__version__ = '0.1'

import urllib2
import progressbar
import multiprocessing
import sys

sys.path.append('..')
import configuration
settings = configuration.Settings()

from utils import file_utils
from utils import http_utils
from utils import log

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
        filesize = http_utils.determine_remote_filesize(settings.wp_dump_location, config.path, filename)
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


def launcher(properties, settings, logger):
    print 'Creating list of files to be downloaded...'
    tasks = http_utils.create_list_dumpfiles(settings.wp_dump_location,
                                  properties.path,
                                  properties.filename)
    consumers = [multiprocessing.Process(target=download_wiki_file,
                args=(tasks, properties))
                for i in xrange(settings.number_of_processes)]

    print 'Starting consumers to download files...'
    for w in consumers:
        w.start()

    tasks.join()
    result = all([consumer.exitcode for consumer in consumers])
    return result
