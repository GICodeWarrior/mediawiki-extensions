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
__date__ = '2011-02-25'
__version__ = '0.1'

import pycassa

def install_schema(keyspace_name, drop_first=False):

    sm = pycassa.system_manager.SystemManager('127.0.0.1:9160')
    if drop_first:
        sm.drop_keyspace(keyspace_name)

    sm.create_keyspace(keyspace_name, replication_factor=1)

    sm.create_column_family(keyspace_name, 'revisions',
                            comparator_type=pycassa.system_manager.UTF8_TYPE,
                            default_validation_class=pycassa.system_manager.UTF8_TYPE)

    sm.create_index(keyspace_name, 'revisions', 'article', pycassa.system_manager.UTF8_TYPE)
    sm.create_index(keyspace_name, 'revisions', 'username', pycassa.system_manager.UTF8_TYPE)
    sm.create_index(keyspace_name, 'revisions', 'user_id', pycassa.system_manager.LONG_TYPE)
