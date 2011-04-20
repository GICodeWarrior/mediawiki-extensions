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

import os
import logging
import logging.handlers
import sys
import datetime
import ConfigParser
from argparse import ArgumentParser, RawTextHelpFormatter

from classes import languages
from classes import projects
from classes import runtime_settings
from utils import file_utils
from utils import ordered_dict
from utils import log
from utils import timer
from etl import downloader
from etl import extracter
from etl import store
from etl import sort
from etl import transformer
from analyses import analyzer
from analyses import inventory


def init_args_parser():
    '''
    Entry point for parsing command line and launching the needed function(s).
    '''
    language = languages.init()
    project = projects.init()
    pjc = projects.ProjectContainer()
    rts = runtime_settings.RunTimeSettings(project, language)

    file_choices = {'meta-full': 'stub-meta-history.xml.gz',
                    'meta-current': 'stub-meta-current.xml.gz',
                    'history-full': 'pages-meta-history.xml.7z',
                    'history-current': 'pages-meta-current.xml.bz2'
                    }

    #Init Argument Parser
    parser = ArgumentParser(prog='manage', formatter_class=RawTextHelpFormatter)
    subparsers = parser.add_subparsers(help='sub - command help')

    #SHOW LANGUAGES
    parser_languages = subparsers.add_parser('show_languages',
        help='Overview of all valid languages.')
    parser_languages.add_argument('-s', '--startswith',
        action='store',
        help='Enter the first letter of a language to see which languages are \
        available.')
    parser_languages.set_defaults(func=language.show_languages, args=[project])

    #CONFIG 
    parser_config = subparsers.add_parser('config',
        help='The config sub command allows you set the data location of where \
        to store files.')
    parser_config.set_defaults(func=config_launcher)
    parser_config.add_argument('-f', '--force',
        action='store_true',
        help='Reconfigure Editor Toolkit (this will replace wiki.cfg')

    #DOWNLOAD
    parser_download = subparsers.add_parser('download',
        help='The download sub command allows you to download a Wikipedia dump\
         file.')
    parser_download.set_defaults(func=downloader_launcher)

    #EXTRACT
    parser_create = subparsers.add_parser('extract',
        help='The store sub command parsers the XML chunk files, extracts the \
        information and stores it in a MongoDB.')
    parser_create.set_defaults(func=extract_launcher)


    #SORT
    parser_sort = subparsers.add_parser('sort',
        help='By presorting the data, significant processing time reductions \
        are achieved.')
    parser_sort.set_defaults(func=sort_launcher)

    #STORE
    parser_store = subparsers.add_parser('store',
        help='The store sub command parsers the XML chunk files, extracts the \
        information and stores it in a MongoDB.')
    parser_store.set_defaults(func=store_launcher)

    #TRANSFORM
    parser_transform = subparsers.add_parser('transform',
        help='Transform the raw datatable to an enriched dataset that can be \
        exported.')
    parser_transform.set_defaults(func=transformer_launcher)

    #DATASET
    parser_dataset = subparsers.add_parser('dataset',
        help='Create a dataset from the MongoDB and write it to a csv file.')
    parser_dataset.set_defaults(func=dataset_launcher)
    parser_dataset.add_argument('-c', '--charts',
                                action='store',
                                help='Should be a valid function name that matches one of the plugin functions',
                                default=inventory.available_analyses()['new_editor_count'])

    parser_dataset.add_argument('-k', '--keywords',
                                action='store',
                                help='Add additional keywords in the format keyword1=value1,keyword2=value2',
                                default='')

    #ALL
    parser_all = subparsers.add_parser('all',
        help='''The all sub command runs the download, extract, store and dataset 
        commands.\n\nWARNING: THIS COULD TAKE DAYS DEPENDING ON THE 
        CONFIGURATION OF YOUR MACHINE AND THE SIZE OF THE WIKIMEDIA DUMP FILE.''')
    parser_all.set_defaults(func=all_launcher)
    parser_all.add_argument('-e', '--except',
        action='store',
        help='Should be a list of functions that are to be ignored when \
        executing all.',
        default=[])

    #DJANGO
    parser_django = subparsers.add_parser('django')
    parser_django.add_argument('-e', '--except',
        action='store',
        help='Should be a list of functions that are to be ignored when \
        executing all.',
        default=[])


    parser.add_argument('-k', '--kaggle',
                        action='store_true',
                        help='Indicate whether the output is for Kaggle or not',
                        default=False)

    parser.add_argument('-l', '--language',
        action='store',
        help='Example of valid languages.',
        choices=project.supported_languages(),
        default=unicode(language.name)
        )

    parser.add_argument('-p', '--project',
        action='store',
        help='Specify the Wikimedia project that you would like to download',
        choices=pjc.supported_projects(),
        default='wiki')

    parser.add_argument('-c', '--collection',
        action='store',
        help='Name of MongoDB collection',
        default='editors_raw')


    parser.add_argument('-ns', '--namespace',
        action='store',
        help='A list of namespaces to include for analysis.',
        default='0')

    parser.add_argument('-db', '--database',
                        action='store',
                        help='Specify the database that you want to use. Valid choices are mongo and cassandra.',
                        default='mongo')

    parser.add_argument('-f', '--file',
        action='store',
        choices=file_choices,
        help='Indicate which dump you want to download. Valid choices are:\n \
            %s' % ''.join([f + ',\n' for f in file_choices]),
        default=file_choices['meta-full'])

    return project, language, parser


def config_launcher(rts, logger):
    '''
    Config launcher is used to reconfigure editor trends toolkit. 
    '''

    pc = projects.ProjectContainer()
    if not os.path.exists('wiki.cfg') or rts.force:
        config = ConfigParser.RawConfigParser()
        project = None
        language = None
        db = None
        valid_storage = ['mongo', 'cassandra']
        working_directory = raw_input('''Please indicate where you installed 
        Wikilytics.\nCurrent location is %s\nPress Enter to accept default.\n''' % os.getcwd())

        input_location = raw_input('''Please indicate where the Wikipedia dump 
        files are or will be located.\nDefault is: %s\nPress Enter to 
        accept default.\n''' % rts.input_location)

        base_location = raw_input('''Please indicate where to store all 
        Wikilytics project files.\nDefault is: %s\nPress Enter to accept 
        default.\n''' % rts.base_location)

        while db not in valid_storage:
            db = raw_input('Please indicate what database you are using for storage. \nDefault is: Mongo\n')
            db = 'mongo' if len(db) == 0 else db.lower()
            if db not in valid_storage:
                print 'Valid choices are: %s' % ','.join(valid_storage)

        while project not in pc.projects.keys():
            project = raw_input('''Please indicate which project you would like 
            to analyze.\nDefault is: %s\nPress Enter to accept default.\n''' % rts.project.full_name)
            project = project if len(project) > 0 else rts.project.name
            if project not in pc.projects.keys():
                print 'Valid choices for a project are: %s' % ','.join(pc.projects.keys())

        while language not in rts.project.valid_languages:
            language = raw_input('''Please indicate which language of project 
            %s you would like to analyze.\nDefault is: %s\nPress Enter to accept 
            default.\n''' % (rts.project.full_name, rts.language))
            if len(language) == 0:
                language = rts.language.code
            language = language if language in rts.project.valid_languages \
                else rts.language.default

        input_location = input_location if len(input_location) > 0 else \
            rts.input_location
        base_location = base_location if len(base_location) > 0 else \
            rts.base_location
        working_directory = working_directory if len(working_directory) > 0 \
            else os.getcwd()

        config = ConfigParser.RawConfigParser()
        config.add_section('file_locations')
        config.set('file_locations', 'working_directory', working_directory)
        config.set('file_locations', 'input_location', input_location)
        config.set('file_locations', 'base_location', base_location)
        config.add_section('wiki')
        config.set('wiki', 'project', project)
        config.set('wiki', 'language', language)
        config.add_section('storage')
        config.set('storage', 'db', db)

        fh = file_utils.create_binary_filehandle(working_directory, 'wiki.cfg', 'wb')
        config.write(fh)
        fh.close()

        log.to_csv(logger, rts, 'New configuration', 'Creating',
                       config_launcher,
                       working_directory=working_directory,
                       input_location=input_location,
                       base_location=base_location,
                       project=project,
                       language=language,)


def downloader_launcher(rts, logger):
    '''
    This launcher calls the dump downloader to download a Wikimedia dump file.
    '''
    print 'Start downloading'
    stopwatch = timer.Timer()
    log.to_db(rts, 'dataset', 'download', stopwatch, event='start')
    downloader.launcher(rts, logger)
    stopwatch.elapsed()
    log.to_db(rts, 'dataset', 'download', stopwatch, event='finish')


def extract_launcher(rts, logger):
    '''
    The extract launcher is used to extract the required variables from a dump
    file. If the zip file is a known archive then it will first launch the
    unzip launcher. 
    '''
    print 'Extracting data from XML'
    stopwatch = timer.Timer()
    log.to_db(rts, 'dataset', 'extract', stopwatch, event='start')
    log.to_csv(logger, rts, 'Start', 'Extract', extract_launcher)

    #remove output from previous run.
    file_utils.delete_file(rts.txt, None, directory=True)
    file_utils.create_directory(rts.txt)

    extracter.launcher(rts)
    stopwatch.elapsed()
    log.to_db(rts, 'dataset', 'extract', stopwatch, event='finish')
    log.to_csv(logger, rts, 'Finish', 'Extract', extract_launcher)


def sort_launcher(rts, logger):
    '''
    After the extracter has finished then the created output files need to be
    sorted. This function takes care of that. 
    '''
    print 'Start sorting data'
    stopwatch = timer.Timer()
    log.to_db(rts, 'dataset', 'sort', stopwatch, event='start')
    log.to_csv(logger, rts, 'Start', 'Sort', sort_launcher)
    sort.launcher(rts)
    stopwatch.elapsed()
    log.to_db(rts, 'dataset', 'sort', stopwatch, event='finish')
    log.to_csv(logger, rts, 'Finish', 'Sort', sort_launcher)


def store_launcher(rts, logger):
    '''
    The data is ready to be stored once the sorted function has completed. This
    function starts storing data in MongoDB.
    '''
    print 'Start storing data in MongoDB'
    stopwatch = timer.Timer()
    log.to_db(rts, 'dataset', 'store', stopwatch, event='start')
    log.to_csv(logger, rts, 'Start', 'Store', store_launcher)
    store.launcher(rts)
    stopwatch.elapsed()
    log.to_db(rts, 'dataset', 'store', stopwatch, event='finish')
    log.to_csv(logger, rts, 'Finish', 'Store', store_launcher)


def transformer_launcher(rts, logger):
    '''
    This function derives a number of variables from the editors_raw collection
    this will significantly improve processing speed.
    '''
    print 'Start transforming dataset'
    stopwatch = timer.Timer()
    log.to_db(rts, 'dataset', 'transform', stopwatch, event='start')
    log.to_csv(logger, rts, 'Start', 'Transform', transformer_launcher)
    transformer.transform_editors_single_launcher(rts)
    stopwatch.elapsed()
    log.to_db(rts, 'dataset', 'transform', stopwatch, event='finish')
    log.to_csv(logger, rts, 'Finish', 'Transform', transformer_launcher)


def dataset_launcher(rts, logger):
    '''
    Dataset launcher is the entry point to generate datasets from the command
    line. 
    '''
    print 'Start generating dataset'
    stopwatch = timer.Timer()
    log.to_db(rts, 'dataset', 'export', stopwatch, event='start')

    for chart in rts.charts:
        analyzer.generate_chart_data(rts, chart, **rts.keywords)
        log.to_csv(logger, rts, 'Start', 'Dataset', dataset_launcher,
                       chart=chart,
                       dbname=rts.dbname,
                       collection=rts.editors_dataset)
    stopwatch.elapsed()
    log.to_db(rts, 'dataset', 'export', stopwatch, event='finish')
    log.to_csv(logger, rts, 'Finish', 'Dataset', dataset_launcher)


def all_launcher(rts, logger):
    '''
    The entire data processing chain has been called, this will take a 
    couple of hours (at least) to complete.
    '''

    stopwatch = timer.Timer()
    log.to_db(rts, 'dataset', 'all', stopwatch, event='start')
    print 'Start of building %s %s dataset.' % (rts.language.name, rts.project)

    functions = ordered_dict.OrderedDict(((downloader_launcher, 'download'),
                                          (extract_launcher, 'extract'),
                                          (sort_launcher, 'sort'),
                                          (store_launcher, 'store'),
                                          (transformer_launcher, 'transform')))

    for function, callname in functions.iteritems():
        if callname not in rts.ignore:
            print 'Starting %s' % function.func_name
            res = function(rts, logger)
            if res == False:
                sys.exit(False)
            elif res == None:
                pass
    stopwatch.elapsed()
    log.to_db(rts, 'dataset', 'all', stopwatch, event='finish')


def main():
    '''
    This function initializes the command line parser. 
    '''
    project, language, parser, = init_args_parser()
    args = parser.parse_args()
    rts = runtime_settings.RunTimeSettings(project, language, args)
    #initialize logger
    logger = logging.getLogger('manager')
    logger.setLevel(logging.DEBUG)

    # Add the log message handler to the logger
    today = datetime.datetime.today()
    log_filename = os.path.join(rts.log_location, '%s%s_%s-%s-%s.log' \
        % (rts.language.code, rts.project.name,
           today.day, today.month, today.year))
    handler = logging.handlers.RotatingFileHandler(log_filename,
                                                   maxBytes=1024 * 1024,
                                                   backupCount=3)

    logger.addHandler(handler)
    logger.debug('Chosen language: \t%s' % rts.language)

    #start manager
    rts.show_settings()
    args.func(rts, logger)


if __name__ == '__main__':
    main()
    #cProfile.run('main()')
