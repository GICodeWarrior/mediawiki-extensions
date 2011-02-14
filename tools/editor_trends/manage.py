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
from argparse import ArgumentParser
from argparse import RawTextHelpFormatter
import ConfigParser

#import configuration
from utils import file_utils
from utils import ordered_dict
from utils import log
from utils import timer
from classes import projects
from classes import languages
from classes import runtime_settings
from database import db
from etl import downloader
from etl import extracter
from etl import store
from etl import sort
from etl import transformer
from analyses import inventory


def show_choices(settings, attr):
    choices = getattr(settings, attr).items()
    choices.sort()
    choices = ['%s\t%s' % (choice[0], choice[1]) for choice in choices]
    return choices


def config_launcher(properties, logger):
    '''
    Config launcher is used to reconfigure editor trends toolkit. 
    '''
#    settings.load_configuration()
    pc = projects.ProjectContainer()
    if not os.path.exists('wiki.cfg') or properties.force:
        config = ConfigParser.RawConfigParser()
        project = None
        language = None
        #language_map = languages.language_map()
        working_directory = raw_input('Please indicate where you installed Editor Trends Analytics.\nCurrent location is %s\nPress Enter to accept default.\n' % os.getcwd())
        input_location = raw_input('Please indicate where to store the Wikipedia dump files.\nDefault is: %s\nPress Enter to accept default.\n' % settings.input_location)

        while project not in pc.projects.keys():
            project = raw_input('Please indicate which project you would like to analyze.\nDefault is: %s\nPress Enter to accept default.\n' % pc.projects[properties.project.name])
            project = project if len(project) > 0 else properties.project.name
            if project not in pc.projects.keys():
                print 'Valid choices for a project are: %s' % ','.join(pc.projects.keys())

        while language not in properties.project.valid_languages:
            language = raw_input('Please indicate which language of project %s you would like to analyze.\nDefault is: %s\nPress Enter to accept default.\n' % (pc.projects[project], properties.language))
            if len(language) == 0:
                language = properties.language.code
            language = language if language in properties.project.valid_languages else properties.language

        input_location = input_location if len(input_location) > 0 else settings.input_location
        working_directory = working_directory if len(working_directory) > 0 else os.getcwd()

        config = ConfigParser.RawConfigParser()
        config.add_section('file_locations')
        config.set('file_locations', 'working_directory', working_directory)
        config.set('file_locations', 'input_location', input_location)
        config.add_section('wiki')
        config.set('wiki', 'project', project)
        config.set('wiki', 'language', language)

        fh = file_utils.create_binary_filehandle(working_directory, 'wiki.cfg', 'wb')
        config.write(fh)
        fh.close()

        settings.working_directory = config.get('file_locations', 'working_directory')
        settings.input_location = config.get('file_locations', 'input_location')




def downloader_launcher(properties, logger):
    '''
    This launcher calls the dump downloader to download a Wikimedia dump file.
    '''
    print 'Start downloading'
    stopwatch = timer.Timer()
    log.log_to_mongo(properties, 'dataset', 'download', stopwatch, event='start')
    res = downloader.launcher(properties, logger)
    stopwatch.elapsed()
    log.log_to_mongo(properties, 'dataset', 'download', stopwatch, event='finish')
    return res


def extract_launcher(properties, logger):
    '''
    The extract launcher is used to extract the required variables from a dump
    file. If the zip file is a known archive then it will first launch the
    unzip launcher. 
    '''
    print 'Extracting data from XML'
    stopwatch = timer.Timer()
    log.log_to_mongo(properties, 'dataset', 'extract', stopwatch, event='start')
    extracter.launcher(properties)
    stopwatch.elapsed()
    log.log_to_mongo(properties, 'dataset', 'extract', stopwatch, event='finish')


def sort_launcher(rts, logger):
    '''
    After the extracter has finished then the created output files need to be
    sorted. This function takes care of that. 
    '''
    print 'Start sorting data'
    stopwatch = timer.Timer()
    log.log_to_mongo(rts, 'dataset', 'sort', stopwatch, event='start')
#    write_message_to_log(logger, settings,
#                         message=None,
#                         verb=None,
#                         location=properties.location,
#                         input=properties.txt,
#                         output=properties.sorted)
    sort.launcher(rts)
    stopwatch.elapsed()
    log.log_to_mongo(rts, 'dataset', 'sort', stopwatch, event='finish')


def store_launcher(rts, logger):
    '''
    The data is ready to be stored once the sorted function has completed. This
    function starts storing data in MongoDB.
    '''
    print 'Start storing data in MongoDB'
    stopwatch = timer.Timer()
    log.log_to_mongo(rts, 'dataset', 'store', stopwatch, event='start')
    db.cleanup_database(rts.dbname, logger)
#    write_message_to_log(logger, settings,
#                         message=None,
#                         verb='Storing',
#                         function=properties.function,
#                         location=properties.location,
#                         input=properties.sorted,
#                         project=properties.full_project,
#                         collection=properties.collection)
#    for key in properties:
#        print key, getattr(properties, key)
    store.launcher(rts)
    stopwatch.elapsed()
    log.log_to_mongo(rts, 'dataset', 'store', stopwatch, event='finish')


def transformer_launcher(rts, logger):
    print 'Start transforming dataset'
    stopwatch = timer.Timer()
    log.log_to_mongo(rts, 'dataset', 'transform', stopwatch, event='start')
    db.cleanup_database(rts.dbname, logger, 'dataset')
#    write_message_to_log(logger, settings,
#                         message=None,
#                         verb='Transforming',
#                         project=properties.project,
#                         collection=properties.collection)
    transformer.transform_editors_single_launcher(rts)
    stopwatch.elapsed()
    log.log_to_mongo(rts, 'dataset', 'transform', stopwatch,
                     event='finish')


def dataset_launcher(rts, logger):
    print 'Start exporting dataset'
    stopwatch = timer.Timer()
    log.log_to_mongo(rts, 'dataset', 'export', stopwatch, event='start')

    #collection = '%s_%s' % (rts.collection, 'dataset')
    for target in rts.targets:
#        write_message_to_log(logger, settings,
#                             message=None,
#                             verb='Exporting',
#                             target=target,
#                             dbname=properties.full_project,
#                             collection=properties.collection)

        analyzer.generate_chart_data(rts.dbname,
                                     rts.editors_dataset,
                                     rts.language.code,
                                     target,
                                     **rts.keywords)
    stopwatch.elapsed()
    log.log_to_mongo(properties, 'dataset', 'export', stopwatch, event='finish')


def cleanup(rts, logger):
    directories = properties.directories[1:]
    for directory in directories:
        write_message_to_log(logger, setting,
                             message=None,
                             verb='Deleting',
                             dir=directory)
        file_utils.delete_file(directory, '', directory=True)

    write_message_to_log(logger, settings,
                         message=None,
                         verb='Creating',
                         dir=directories)
    settings.verify_environment(directories)

    filename = '%s%s' % (properties.full_project, '_editor.bin')
    write_message_to_log(logger, settings,
                         message=None,
                         verb='Deleting',
                         filename=filename)
    file_utils.delete_file(settings.binary_location, filename)


def all_launcher(rts, logger):
    print 'The entire data processing chain has been called, this will take a \
    couple of hours (at least) to complete.'
    stopwatch = timer.Timer()
    log.log_to_mongo(rts, 'dataset', 'all', stopwatch, event='start')
    print 'Start of building %s %s dataset.' % (rts.language.name, rts.project)

#    write_message_to_log(logger, settings,
#                         message=message,
#                         verb=None,
#                         full_project=properties.full_project,
#                         ignore=properties.ignore,
#                         clean=properties.clean)
    if rts.clean:
        cleanup(rts, logger)

    functions = ordered_dict.OrderedDict(((downloader_launcher, 'download'),
                                          (extract_launcher, 'extract'),
                                          (sort_launcher, 'sort'),
                                          (store_launcher, 'store'),
                                          (transformer_launcher, 'transform'),
                                          (dataset_launcher, 'dataset')))

    for function, callname in functions.iteritems():
        if callname not in rts.ignore:
            print 'Starting %s' % function.func_name
            res = function(rts, logger)
            if res == False:
                sys.exit(False)
            elif res == None:
                print 'Function %s does not return a status, \
                implement NOW' % function.func_name
    stopwatch.elapsed()
    log.log_to_mongo(rts, 'dataset', 'all', stopwatch, event='finish')



def about_statement():
    print ''
    print 'Editor Trends Software is (c) 2010-2011 by the Wikimedia Foundation.'
    print 'Written by Diederik van Liere (dvanliere@gmail.com).'
    print '''This software comes with ABSOLUTELY NO WARRANTY.\nThis is 
    free software, and you are welcome to distribute it under certain 
    conditions.'''
    print 'See the README.1ST file for more information.'
    print ''


def init_args_parser():
    '''
    Entry point for parsing command line and launching the needed function(s).
    '''
    #settings = configuration.Settings()
    language = languages.init()
    project = projects.init()
    pjc = projects.ProjectContainer()
    rts = runtime_settings.RunTimeSettings(project, language)

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
                                default={})

    #ALL
    parser_all = subparsers.add_parser('all',
        help='The all sub command runs the download, split, store and dataset \
        commands.\n\nWARNING: THIS COULD TAKE DAYS DEPENDING ON THE \
        CONFIGURATION OF YOUR MACHINE AND THE SIZE OF THE WIKIMEDIA DUMP FILE.')
    parser_all.set_defaults(func=all_launcher)
    parser_all.add_argument('-e', '--except',
        action='store',
        help='Should be a list of functions that are to be ignored when \
        executing all.',
        default=[])

    parser_all.add_argument('-n', '--new',
        action='store_true',
        help='This will delete all previous output and starts from scratch. \
        Mostly useful for debugging purposes.',
        default=False)

    #DJANGO
    parser_django = subparsers.add_parser('django')
    parser_django.add_argument('-e', '--except',
        action='store',
        help='Should be a list of functions that are to be ignored when \
        executing all.',
        default=[])

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

    parser.add_argument('-o', '--location',
        action='store',
        help='Indicate where you want to store the downloaded file.',
        #default=settings.input_location)
        default=rts.input_location)

    parser.add_argument('-ns', '--namespace',
        action='store',
        help='A list of namespaces to include for analysis.',
        default='0')

    parser.add_argument('-f', '--file',
        action='store',
        choices=rts.file_choices,
        help='Indicate which dump you want to download. Valid choices are:\n \
            %s' % ''.join([f + ',\n' for f in rts.file_choices]),
        default='stub-meta-history.xml.gz')


    return project, language, parser

def main():
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
    #detect_python_version(logger)
    about_statement()
    #config.create_configuration(settings, args)

    rts.show_settings()
    args.func(rts, logger)


if __name__ == '__main__':
    main()
