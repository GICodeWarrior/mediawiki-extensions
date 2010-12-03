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
__date__ = '2010-11-05'
__version__ = '0.1'


class Error(Exception):
    '''Base class for exceptions in this module.'''
    pass

class FileNotFoundException(Error):
    def __init__(self, file, path):
        self.file = file
        self.path = path

    def __str__(self):
        print 'The file %s was not found. Please make sure that the file exists and the path is correct.' % (os.path.join(self.path, self.file))

class PlatformNotSupportedError(Error):
    def __init__(self, platform):
        self.platform = platform

    def __str__(self):
        print 'Platform %s is not supported' % self.platform

class CompressionNotSupportedError(Error):
    def __init__(self, extension):
        self.extension = extension

    def __str__(self):
        print 'You have not installed a program to extract %s archives.' % self.extension

class OutDatedPythonVersionError(Error):
    def __init__(self, version):
        self.version = version

    def __str__(self):
        print 'Please upgrade to Python 2.6 or higher (but not Python 3.x).'
