#!/usr/bin/python
# -*- coding: utf-8 -*-
'''
Copyright (C) 2011 by Ryan Faulkner (rfaulkner@wikimedia.org)
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
__date__ = '2011-01-25'
__version__ = '0.1'

import sys
from datetime import datetime
if '..' not in sys.path:
    sys.path.append('..')

from classes import storage

def taxonomy_list_makers(var, editor, **kwargs):
    """
    == List makers ==
    Any editor who makes more than 10 mainspace edits a month to articles with 
    titles that begin with "List of..."
    """
    data = kwargs.get('data', None)
    today = datetime.today()

    if data == None:
        print 'Ooooopppsssss.....'
        sys.exit(-1)

    articles_edited = editor['articles_edited']
    print articles_edited
    #print data
    count = 0
    years = articles_edited.keys()
    for year in years:
        months = articles_edited[year].keys()
        for month in months:
            articles = articles_edited[year].get(month, [])
            for article in articles:
                try:
                    count += data[article]
                except KeyError:
                    pass

    """ Add all editors with an edit count of more than 10 """

    if count > 10:
        var.add(today, count, {'username': editor['username']})

    return var


def preload(rts):
    collection = '%s%s_articles_raw' % (rts.language.code, rts.project.name)
    db = storage.Database(rts.storage, rts.dbname, collection)
    data = {}
    cursor = db.find('category', 'List')
    for c in cursor:
        data[c['id']] = 1
    return data
