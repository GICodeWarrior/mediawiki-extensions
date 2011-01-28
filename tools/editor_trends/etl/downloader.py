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

#sys.path.append('..')
#import configuration
#settings = configuration.Settings()

from utils import file_utils
from utils import http_utils
from utils import log

def download_wiki_file(task_queue, properties):
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
        filesize = http_utils.determine_remote_filesize(properties.settings.wp_dump_location,
                                                        properties.dump_relative_path,
                                                        filename)

#        mod_rem = http_utils.determine_modified_date(properties.settings.wp_dump_location,
#                                                properties.dump_relative_path,
#                                                filename)

        if file_utils.check_file_exists(properties.location, filename):
            #This can be activated as soon as bug 21575 is fixed. 
            #mod_loc = file_utils.get_modified_date(properties.location, filename)
            #if mod_loc != mod_rem:
            print 'Swallowed a poison pill'
            break

        if filemode == 'w':
            fh = file_utils.create_txt_filehandle(properties.location, filename, filemode, properties.settings.encoding)

        else:
            fh = file_utils.create_binary_filehandle(properties.location, filename, 'wb')

        if filesize != -1:
            widgets = log.init_progressbar_widgets(filename)
            pbar = progressbar.ProgressBar(widgets=widgets, maxval=filesize).start()

        try:
            path = '%s%s' % (properties.dump_absolute_path, filename)
            req = urllib2.Request(path)
            response = urllib2.urlopen(req)
            while True:
                data = response.read(chunk)
                if not data:
                    print 'Finished downloading %s.' % (path)
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

    #file_utils.set_modified_data(mod_rem, properties.location, filename)

    return success


def launcher(properties, settings, logger):
    print 'Creating list of files to be downloaded...'
    result = True
    tasks = http_utils.create_list_dumpfiles(properties.settings.wp_dump_location,
                                  properties.dump_relative_path,
                                  properties.dump_filename)
    #print tasks.qsize()
    #if tasks.qsize() < properties.settings.number_of_processes:
    #    properties.settings.number_of_processes = tasks.qsize()
    consumers = [multiprocessing.Process(target=download_wiki_file,
                args=(tasks, properties))
                for i in xrange(properties.settings.number_of_processes + 1)]
    print 'Starting consumers to download files...'
    for w in consumers:
        w.start()

    tasks.join()
    for consumer in consumers:
        if consumer.exitcode != 0 and consumer.exitcode != None:
            result = False

    return result
