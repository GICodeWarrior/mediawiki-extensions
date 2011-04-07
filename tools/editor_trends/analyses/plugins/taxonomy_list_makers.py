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

def taxonomy_list_makers(var, editor, **kwargs):
    """
    == List makers ==
    Any editor who makes more than 10 mainspace edits a month to articles with 
    titles that begin with "List of..."
    """
    db_articles = kwargs.get('articles', None)

    if db_articles == None:
        sys.exit(-1)

    articles_edited = editor['articles_edited']
    list_articles = db_articles.find('category', 'List')
    print list_articles
    count = 0
    years = articles_edited.keys()
    for year in years:
        months = articles_edited[year].keys()
        for month in months:
            articles = articles_edited[year].get(month, [])
            for article in articles:
                if article in list_articles:
                    count += 1

    """ Add all editors with an edit count of more than 10 """

    if count > 10:
        var.add(editor['username'], 1)

    return var
