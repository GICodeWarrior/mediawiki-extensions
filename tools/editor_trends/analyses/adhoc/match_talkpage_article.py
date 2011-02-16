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
__date__ = '2011-01-07'
__version__ = '0.1'

import sys
import os
if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
settings = settings.Settings()
from etl import extracter
from utils import file_utils
import wikitree

try:
    import psyco
    psyco.full()
except ImportError:
    pass

class Article:
    def __init__(self, title, id, talk_id=None):
        self.title = title
        self.id = id
        self.talk_id = talk_id


def parse_dumpfile(project, language_code, namespaces=['0', '1']):
    articles = {}
    ns = extracter.load_namespace(language_code)
    non_valid_namespaces = extracter.build_namespaces_locale(ns, namespaces)


    location = os.path.join(settings.input_location, language_code, project)
    fh = file_utils.create_txt_filehandle(location,
                '%s%s-latest-stub-meta-history.xml' % (language_code, project),
                'r', settings.encoding)

    for page, article_size in wikitree.parser.read_input(fh):
        title = page.find('title')
        if extracter.verify_article_belongs_namespace(title, non_valid_namespaces):
            article_id = page.find('id').text
            title = title.text
            if title.startswith(ns['1'].get('canonical')):
                namespace = 'Talk'
                article = articles.get(article_id, Article(None, None, article_id))
                article.talk_id = article_id
            else:
                namespace = 'Main'
                article = articles.get(article_id, Article(title, article_id))
            articles[article_id] = article

    file_utils.store_object(articles, settings.binary_location, 'talk2article.bin')

if __name__ == '__main__':
    parse_dumpfile('wiki', 'en')
