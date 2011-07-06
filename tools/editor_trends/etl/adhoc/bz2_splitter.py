#!/usr/bin/python
# -*- coding: utf-8 -*-
'''
Copyright (C) 2011 by Diederik van Liere (dvanliere@gmail.com)
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
__date__ = '2011-04-20'
__version__ = '0.1'

from threading import Thread
import bz2
import os
import cStringIO


class BZ2File(object):
    def __init__(self, filename, location, mode):
        self.filename = filename
        self.location =location
        self.fh = self.open(mode) 
    
    def open(self, mode):
        return bz2.BZ2File(os.path.join(self.location, self.filename), mode)


class BZ2Decompressor(BZ2File):
    def __init__(self, filename, location, mode):
        super(BZ2Decompressor, self).__init__(filename, location, mode)

    def decompress(self):
        for line in self.fh:
            yield line
        self.fh.close()


class BZ2Compressor(BZ2File):
    def __init__(self,filename, location, mode):
        self.part = 0
        self.filename = self.update_filename()
        self.max_size = 1024*1024*1024
        super(BZ2Compressor, self).__init__(self.filename, location, mode)
        
    def compress(self, data):
        self.fh.write(data)
        self.check_file_size()

    def update_filename(self):
        self.part +=1
        return  'part-%s.bz2' % self.part
    
    def check_file_size(self):
        if self.fh.tell() > self.max_size:
            self.fh.close()
            self.fh = self.open('w')


def parser(dumpfile, newfile):
    buffer = cStringIO.StringIO()
    for data in dumpfile.decompress():
        buffer.write(data)
        if data.find('</page>')> -1:
            newfile.compress(buffer.getvalue())
            buffer = cStringIO.StringIO()

        

def run():
    path = '/data/dumps'
    #path = '/Users/diederik/wiki/en/wiki/chunks'
    filenames =  os.listdir(path)
    newfile = BZ2Compressor(None, path, 'w')
    for filename in filenames:
        if filename.endswith('bz2'):
            dumpfile = BZ2Decompressor(filename, path, 'r')
            parser(dumpfile, newfile)

        
if __name__ == '__main__':
    run()    
