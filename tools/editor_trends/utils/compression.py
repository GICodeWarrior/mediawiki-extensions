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
__date__ = '2010-11-27'
__version__ = '0.1'

import sys
import subprocess
import os
sys.path.append('..')

#import configuration
#settings = configuration.Settings()
from classes import settings
settings = settings.Settings()
from classes import exceptions
import file_utils
import timer
import log

class Compressor(object):

    def __init__(self, location, file, output=None):
        self.extension = file_utils.determine_file_extension(file)
        self.file = file
        self.location = location
        self.path = os.path.join(self.location, self.file)
        self.output = None
        self.name = None
        self.program = []
        self.compression = '7z'

    def __str__(self):
        return self.name

    def support_extension(self, extension):
        if extension in self.extensions:
            return True
        else:
            return False

    def compress(self):
        '''
        @path is the absolute path to the zip program
        @location is the directory where to store the compressed file
        @source is the name of the zipfile
        '''
        if self.program == []:
            self.init_compression_tool(self.extension, 'compress')

        if self.program_installed == None:
            raise exceptions.CompressionNotSupportedError

        args = {'7z': ['%s' % self.program_installed, 'a', '-scsUTF-8',
                       '-t%s' % self.compression,
                       '%s' % self.output,
                       '%s' % self.input],
                }

        commands = args.get(self.name, None)
        if commands != None:
            p = subprocess.Popen(commands, shell=True).wait()
        else:
            raise exceptions.CompressionNotSupportedError


    def extract(self):
        '''
        @location is the directory where to store the compressed file
        @source is the name of the archive
        @extension is a helper variable to identify which tool to use.
        '''
        if self.program == []:
            self.init_compression_tool(self.extension, 'extract')

        if self.program_installed == None:
            raise exceptions.CompressionNotSupportedError

        print self.location
        print self.file
        if not file_utils.check_file_exists(self.location, self.file):
            raise exceptions.FileNotFoundException(self.location, self.file)

        args = {'7z': ['%s' % self.program_installed, 'e', '-y', '-o%s' % self.location, '%s' % self.path],
                'bunzip2': ['%s' % self.program_installed, '-k', '%s' % self.path],
                'zip': ['%s' % self.program_installed, '-o', '%s' % self.path],
                'gz': ['%s' % self.program_installed, '-xzvf', '%s' % self.path],
                'tar': ['%s' % self.program_installed, '-xvf', '%s' % self.path]
                }
        commands = args.get(self.name, None)
        #print commands
        if commands != None:
            p = subprocess.call(commands)
            #p = subprocess.Popen(commands, shell=True).wait()
        else:
            raise exceptions.CompressionNotSupportedError
        return p

    def init_compression_tool(self, extension, action):
        compression = {'gz': [['tar', 'tar'], ['7z', '7z']],
        'bz2': [['bzip2', 'bunzip2'], ['7z', '7z']],
        '7z': [['7z', '7z']],
        'zip': [['zip', 'unzip'], ['7z', '7z']],
        'tar': [['tar', 'tar'], ['7z', '7z']],
        }

        for ext in compression[extension]:
            archive, extract = ext[0], ext[1]
            if action == 'extract':
                self.program.append(extract)
            else:
                self.program.append(extract)

        for p in self.program:
            path = settings.detect_installed_program(p)
            if path != None:
                self.name = p
                self.program_installed = path


def launch_zip_extractor(location, filename, properties):
    '''
    
    '''
    print 'Unzipping zip file'
    stopwatch = timer.Timer()
    log.log_to_mongo(properties, 'dataset', 'unpack', stopwatch, event='start')
    compressor = Compressor(location, filename)
    retcode = compressor.extract()
    stopwatch.elapsed()
    log.log_to_mongo(properties, 'dataset', 'unpack', stopwatch, event='finish')
    return retcode


if __name__ == '__main__':
    c = Compressor('C:\Users\diederik.vanliere\Documents', 'test.zip')
    c.extract()
