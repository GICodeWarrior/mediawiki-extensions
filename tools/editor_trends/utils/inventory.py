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
__date__ = '2011-01-21'
__version__ = '0.1'

import re
import sys
from threading import Thread
from HTMLParser import HTMLParser
if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
settings = settings.Settings()

from database import db
from utils import http_utils
from classes import runtime_settings
from classes import languages
from classes import projects

class AnchorParser(HTMLParser):
    '''
    A simple HTML parser that takes an HTML directory listing and extracts the
    directories.
    '''
    def __init__(self,):
        HTMLParser.__init__(self)
        self.directories = []

    def handle_starttag(self, tag, attrs):
        if tag == 'a':
            for key, value in attrs:
                if key == 'href':
                    self.directories.append(value)
                    #print value

class Dumper(Thread):
    '''
    A simple threaded http parser that determines for the different wikimedia
    projects when dumps are available. This data is stored in MongoDB and can 
    be fed into the Django Wikilytics application so that people know for sure
    that a particular month /year combination is available instead of getting 
    errors that a particular dump does not exist.  
    '''
    def __init__(self, project, properties):
        Thread.__init__(self)
        self.project = project
        self.props = properties
        self.data = {}


    def store_available_dumps(self):
        mongo = db.init_mongo_db('wikilytics')
        coll = mongo['available_dumps']

        coll.save({'project': self.project, 'dumps': self.data})

    def run(self):
        project = self.props.projects[self.project]
        langs = self.props.project_supports_language(project)

        for lang in langs:
            path = '%s%s' % (lang, project)
            res = http_utils.check_remote_path_exists(settings.wp_dump_location, path, None)
            if res != None and (res.status == 200 or res.status == 301):
                print 'Constructing list of available dumps for %s' % path
                directories = http_utils.read_directory_contents(settings.wp_dump_location, path)
                dates = determine_available_dumps(directories)
                self.data.setdefault(lang, dates)

        self.store_available_dumps()


def read_directory_contents(domain, path):
    parser = AnchorParser()
    data = read_data_from_http_connection(domain, path)
    parser.feed(data)
    return parser.directories


def determine_available_dumps(directories):
    dates = {}
    for directory in directories:
        if directory == '../' or directory == 'latest/':
            continue
        try:
            year = int(directory[:4])
            month = int(directory[4:6])
        except ValueError:
            print directory
        dates.setdefault(year, set())
        dates[year].add(month)
    data = {}
    for year in dates:
        data[str(year)] = list(dates[year])
    return data


def launcher():
    project = projects.init()
    language = languages.init()
    properties = runtime_settings.RunTimeSettings(project, language, settings)
    dumpers = []
    for project in properties.projects:
        if project == 'wiki':
            continue
        dumper = Dumper(project, properties)
        dumpers.append(dumper)
        dumper.start()

    for d in dumpers:
        d.join()
        print 'Found dumps for %s: %s' % (d.project, d.data)


if __name__ == '__main__':
    launcher()
