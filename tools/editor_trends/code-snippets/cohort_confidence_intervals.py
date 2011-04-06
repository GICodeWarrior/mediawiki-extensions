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
__date__ = '2010-11-24'
__version__ = '0.1'

import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()
from utils import file_utils
from utils import messages
from classes import storage


#def dataset_edits_by_month(dbname, **kwargs):
#    dbname = kwargs.pop('dbname')
#    mongo = db.init_mongo_db(dbname)
#    editors = mongo['dataset']
#    name = dbname + '_edits_by_month.csv'
#    fh = file_utils.create_txt_filehandle(settings.dataset_location, name, 'w', 'utf-8')
#    x = 0
#    vars_to_expand = ['monthly_edits']
#    while True:
#        try:
#            id = input_queue.get(block=False)
#            print messages.show(input_queue.qsize)
#            obs = editors.find_one({'editor': id})
#            obs = expand_observations(obs, vars_to_expand)
#            if x == 0:
#                headers = obs.keys()
#                headers.sort()
#                headers = expand_headers(headers, vars_to_expand, obs)
#                file_utils.write_list_to_csv(headers, fh)
#            data = []
#            keys = obs.keys()
#            keys.sort()
#            for key in keys:
#                data.append(obs[key])
#            file_utils.write_list_to_csv(data, fh)
#
#            x += 1
#        except Empty:
#            break
#    fh.close() 


if __name__ == '__main__':
    pass

