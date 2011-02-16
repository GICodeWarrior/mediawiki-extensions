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
__date__ = '2010-11-05'
__version__ = '0.1'


import subprocess
import os


from classes import settings
settings = settings.Settings()
from classes import exceptions
from utils import file_utils


def start_mongodb_server(x, path):
    default_port = 27017
    port = default_port + x
    if settings.platform == 'Windows':
        p = subprocess.Popen([path, '--port', str(port), '--dbpath', 'c:\data\db', '--logpath', 'c:\mongodb\logs'])
    elif settings.platform == 'Linux':
        subprocess.Popen([path, '--port %s' % port])
    elif settings.platform == 'OSX':
        raise NotImplementedError
    else:
        raise exceptions.PlatformNotSupportedError(platform)


def launcher(n=2):
    '''
    @n is the number of MongoDB instances to be started
    '''
    n = 2 if n < 2 else n
    program = 'mongod.exe' if settings.platform == 'Windows' else 'mongod'
    path = file_utils.which(program)
    for x in xrange(1, n):
        start_mongodb_server(platform, x, path)



if __name__ == '__main__':
    launcher()
