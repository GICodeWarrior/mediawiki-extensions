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
import ConfigParser

import settings
from utils import utils


def load_configuration(args):
    config = ConfigParser.RawConfigParser()
    if not utils.check_file_exists(settings.WORKING_DIRECTORY, 'wiki.cfg'):
        working_directory = raw_input('Please indicate where you installed Editor Trends Analytics.\nCurrent location is %s\nPress Enter to accept default.' % os.getcwd())
        if working_directory == '':
            working_directory = os.getcwd()
        
        xml_file_location = raw_input('Please indicate where to store the Wikipedia dump files.\nDefault is: %s\nPress Enter to accept default.' % settings.XML_FILE_LOCATION)
        if xml_file_location == '':
            xml_file_location = settings.XML_FILE_LOCATION
            
        create_configuration(WORKING_DIRECTORY=working_directory, XML_FILE_LOCATION=xml_file_location)

    config.read('wiki.cfg')
    settings.WORKING_DIRECTORY = config.get('file_locations', 'WORKING_DIRECTORY')
    settings.XML_FILE_LOCATION = config.get('file_locations', 'XML_FILE_LOCATION')
    
    
def create_configuration(**kwargs):
    working_directory = kwargs.get('WORKING_DIRECTORY', settings.WORKING_DIRECTORY)
    config = ConfigParser.RawConfigParser()
    config.add_section('file_locations')
    config.set('file_locations', 'WORKING_DIRECTORY', working_directory)
    config.set('file_locations', 'XML_FILE_LOCATION', kwargs.get('XML_FILE_LOCATION', settings.XML_FILE_LOCATION))

    fh = utils.create_binary_filehandle(working_directory, 'wiki.cfg', 'wb')
    config.write(fh)
    fh.close()


if __name__ == '__main__':
    load_configuration([])


