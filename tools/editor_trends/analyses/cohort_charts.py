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
__date__ = '2010-11-10'
__version__ = '0.1'


import  sys
sys.path.append('..')

import configuration
settings = configuration.Settings()
from utils import utils

def prepare_cohort_dataset(dbname, filename):
    dataset = utils.load_object(settings.binary_location, '%s_%s' % (dbname, filename))
    fh = utils.create_txt_filehandle(settings.dataset_location, dbname + '_cohort_data.txt', 'w', settings.encoding)

    years = dataset.keys()
    years.sort()
    periods = dataset[2001].keys()
    periods.sort()
    headers = ['months_%s' % i for i in periods]
    headers.insert(0, 'year')
    utils.write_list_to_csv(headers, fh)

    for year in years:
        obs = [dataset[year][p] for p in periods]
        obs.insert(0, year)
        utils.write_list_to_csv(obs, fh, newline=True)
    fh.close()

if __name__ == '__main__':
    prepare_cohort_dataset('ruwiki')
