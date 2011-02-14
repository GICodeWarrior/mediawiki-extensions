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

import time
from multiprocessing import Process

import manage as manager

from database import db
from classes import languages
from classes import projects
from classes import runtime_settings
from analyses import analyzer


def init_environment(task):
    project, language, parser = manager.init_args_parser()
    args = parser.parse_args(['django'])
    pjc = projects.ProjectContainer()
    project = pjc.get_project(task['project'])
    lnc = languages.LanguageContainer()
    language = lnc.get_language(task['language_code'])

    args.language = language.name
    args.project = project.name
    rts = runtime_settings.RunTimeSettings(project, language, args)
    return rts


def launch_editor_trends_toolkit(task):
    '''
    This function should only be called as a cronjob and not directly.
    '''
    rts = init_environment(task)
    res = manager.all_launcher(rts, None)
    return res


def launch_chart(task):
    '''
    This function should only be called as a cronjob and not directly. 
    '''
    res = True
    try:
        rts = init_environment(task)
        func = task['jobtype']
        time_unit = 'month'  #FIXME hardcoded string
        cutoff = 1  #FIXME hardcoded string
        cum_cutoff = 50  #FIXME hardcoded string

        analyzer.generate_chart_data(rts.project.name,
                                     rts.collection,
                                     rts.language.code,
                                     func,
                                     time_unit=time_unit,
                                     cutoff=cutoff,
                                     cum_cutoff=cum_cutoff)
    except AttributeError, e:
        res = False
        print e #need to capture more fine grained errors but not quite what errors are going to happen.
    except Exception, e:
        res = False
        print e #need to capture more fine grained errors but not quite what errors are going to happen.

    return res


def launcher():
    '''
    This is the main entry point, it creates a queue with jobs and determines
    the type of job and fires it off 
    '''
    mongo = db.init_mongo_db('wikilytics')
    coll = mongo['jobs']
    tasks = []
    jobs = coll.find({'finished': False, 'in_progress': False, 'error': False})
    for job in jobs:
        tasks.append(job)

    for task in tasks:
        if task['jobtype'] == 'dataset':
            print 'Launching the Editor Trends Analytics Toolkit.'
            res = launch_editor_trends_toolkit(task)
            #res = False
        else:
            print 'Launching %s.' % task['jobtype']
            res = launch_chart(task)

        if res:
            coll.update({'_id': task['_id']}, {'$set': {'finished': True}})
        else:
            '''
            To prevent jobs from recurring non-stop, set error to True. These
            jobs will be excluded and need to be investigated to see what's
            happening. 
            '''
            coll.update({'_id': task['_id']}, {'$set': {'error': True}})


def debug():
    launcher()


if __name__ == '__main__':
    x = 0
    while True:
        launcher()
        time.sleep(x * 60)
        x = +1
        if x > 30:
            x = 0
