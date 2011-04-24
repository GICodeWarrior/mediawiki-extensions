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
__date__ = '2011-04-12'
__version__ = '0.1'

import sys

if '..' not in sys.path:
    sys.path.append('..')

from utils import file_utils


def launcher():
    location = '/home/diederik/wikimedia/en/wiki/kaggle_training/'
    #location = 'C:\\wikimedia\\en\\wiki\\txt'
    files = file_utils.retrieve_file_list(location, extension='csv')
    files.sort()
    dataset = file_utils.create_txt_filehandle(location, 'dataset.csv', 'w', 'utf-8')
    for filename in files:
        if not filename.startswith('comments') and \
            not filename.startswith('articles') and not filename.startswith('dataset'):
            fh = file_utils.create_txt_filehandle(location, filename, 'r', 'utf-8')
            print fh
            for line in fh:
                data = line.split('\t')
                username = data[3].lower()
                if username.endswith('bot'):
                    continue
                else:
                    dataset.write(line)
            fh.close()
    dataset.close()

launcher()
