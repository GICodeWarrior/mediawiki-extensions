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


import configuration
settings = configuration.Settings()
from utils import utils



def load_configuration(args):
    config = ConfigParser.RawConfigParser()
    if not utils.check_file_exists(settings.working_directory, 'wiki.cfg'):
        working_directory = raw_input('Please indicate where you installed Editor Trends Analytics.\nCurrent location is %s\nPress Enter to accept default.' % os.getcwd())
        if working_directory == '':
            working_directory = os.getcwd()

        settings.input_location = raw_input('Please indicate where to store the Wikipedia dump files.\nDefault is: %s\nPress Enter to accept default.' % settings.input_location)
        if settings.input_location == '':
            settings.input_location = settings.input_location

        create_configuration(working_directory=working_directory, input_location=settings.input_location)

    config.read('wiki.cfg')
    settings.working_directory = config.get('file_locations', 'working_directory')
    settings.input_location = config.get('file_locations', 'settings.input_location')


def create_configuration(**kwargs):
    working_directory = kwargs.get('working_directory', settings.working_directory)
    config = ConfigParser.RawConfigParser()
    config.add_section('file_locations')
    config.set('file_locations', 'working_directory', working_directory)
    config.set('file_locations', 'settings.input_location', kwargs.get('settings.input_location', settings.input_location))

    fh = utils.create_binary_filehandle(working_directory, 'wiki.cfg', 'wb')
    config.write(fh)
    fh.close()


if __name__ == '__main__':
    p =detect_windows_program('7zip')
    print p
    #load_configuration([])


