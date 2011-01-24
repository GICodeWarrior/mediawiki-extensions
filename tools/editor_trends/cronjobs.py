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
__date__ = '2010-10-21'
__version__ = '0.1'

from multiprocessing import Process


from database import db
from classes import wikiprojects
import manage as manager

def launch_editor_trends_toolkit(task):
    '''
    This function should only be called as a cronjob.
    '''
    parser, settings, wiki = manager.init_args_parser()
    args = parser.parse_args(['django'])
    args.language = wikiprojects.get_language(task['language'])
    args.project = task['project']
    print args
    wiki = wikiprojects.Wiki(settings, args)
    manager.all_launcher(wiki, settings, None)
    #wiki.update_language(language)
    #wiki.update_project(project)

    #p = Process(target=manager.all_launcher, args=(wiki, settings, None))
    #p.start()

def launch_chart(project, language):
    pass


def launcher():
    mongo = db.init_mongo_db('wikilytics')
    coll = mongo['jobs']
    tasks = []
    #'in_progress': False}
    jobs = coll.find({'finished': False, 'in_progress': False})
    for job in jobs:
        tasks.append(job)

    for task in tasks:
        if task['jobtype'] == 'dataset':
            launch_editor_trends_toolkit(task)
        elif task['jobtype'] == 'chart':
            launch_chart(task)

def debug():
    project = 'wiki'
    language = 'en'
    #launch_editor_trends_toolkit(project, language)
    launcher()

if __name__ == '__main__':
    debug()
