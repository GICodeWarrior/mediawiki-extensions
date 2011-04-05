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

def taxonomy_list_makers(var, editor, **kwargs):
    """
    == List makers ==
    Any editor who makes more than 10 mainspace edits a month to articles with 
    titles that begin with "List of..."
    """
    articles_by_year = editor['articles_by_year']
    count = 0

    for year in xrange(new_wikipedian.year, var.max_year):
        for month in xrange(1, 13):
            for article in articles_by_year[year][month]:
                """ locate article titles containing  "List of" """
                if article.find('List of') > -1:
                    count = count + 1


    """ Add all editors with an edit count of more than 10 """

    if count > 10:
        var.add(editor['username'], 1)


    return var
