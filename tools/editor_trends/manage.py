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
__date__ = '2010-10-21'
__version__ = '0.1'

import os
import logging
import logging.handlers
import sys
import datetime
from argparse import ArgumentParser
from argparse import RawTextHelpFormatter
import locale
import progressbar

sys.path.append('..')
import configuration
settings = configuration.Settings()

import languages
import config
from utils import utils
from utils import dump_downloader
from utils import compression
from utils import ordered_dict
from utils import exceptions
from utils import log
from database import db
from etl import chunker
from etl import extracter
from etl import store
from etl import sort
from etl import transformer
from etl import exporter

datasets = {'forward': 'generate_cohort_dataset_forward',
            'backward': 'generate_cohort_dataset_backward',
            'backward_custom': 'generate_cohort_dataset_backward_custom',
            'wide': 'generate_wide_editor_dataset',
            }

class Config(object):
    def __init__(self, locations):
        for location in locations:
            setattr(self, location, locations[location])

    def __str__(self):
        return 'Configurator'

    def __iter__(self):
        for item in self.__dict__:
            yield item

class Timer(object):
    def __init__(self):
        self.t0 = datetime.datetime.now()

    def __str__(self):
        return 'Timer started: %s' % self.t0

    def stop(self):
        self.t1 = datetime.datetime.now()

    def elapsed(self):
        self.stop()
        print 'Processing time: %s' % (self.t1 - self.t0)


def get_value(args, key):
    return getattr(args, key, None)


def config_launcher(args, logger, config):
    settings.load_configuration()


def determine_default_language():
    language_code = locale.getdefaultlocale()[0]
    return language_code.split('_')[0]


def get_projectname(args):
    language_code = get_language(args)
    if language_code == None:
        print 'Entered language: %s is not a valid Wikimedia language' % get_value(args, 'language')
        sys.exit(-1)
    project = get_project(args)

    if project == None:
        print 'Entered project: %s is not valid Wikimedia Foundation project.' % get_value(args, 'project')
        sys.exit(-1)
    if project == 'commonswiki':
        return project
    else:
        return '%s%s' % (language_code, project)


def get_language(args):
    language = get_value(args, 'language')
    language = language.title()
    return languages.MAPPING.get(language, 'en')


def get_namespaces(args):
    namespaces = get_value(args, 'namespace')
    if namespaces != None:
        return namespaces.split(',')
    else:
        return namespaces


def write_message_to_log(logger, args, config, message=None, verb=None, **kwargs):
    function = get_value(args, 'func')
    logger.debug('%s\tStarting %s task' % (datetime.datetime.now(), function.func_name))
    if message:
        logger.debug('%s\t%s' % (datetime.datetime.now(), message))

    if config == None:
        config = Config(kwargs)
    max_length = max([len(prop) for prop in config if type(prop) != type(True)])
    max_tabs = max_length // settings.tab_width
    res = max_length % settings.tab_width
    if res > 0:
        max_tabs += 1
    pos = max_tabs * settings.tab_width
    for prop in config:
        if verb:
            logger.debug('%s\tAction: %s\tSetting: %s' % (datetime.datetime.now(), verb, getattr(config, prop)))
        else:
            tabs = (pos - len(prop)) // settings.tab_width
            res = len(prop) % settings.tab_width
            if res > 0 or tabs == 0:
                tabs += 1
            tabs = ''.join(['\t' for t in xrange(tabs)])
            logger.debug('%s\t\t%s %s%s%s %s' % (datetime.datetime.now(), 'Key:', prop, tabs, 'Setting:', getattr(config, prop)))


def get_project(args):
    project = get_value(args, 'project')
    if project != 'wiki':
        project = settings.projects.get(project, None)
    return project


def generate_wikidump_filename(language_code, project, args):
    return '%s%s-%s-%s' % (language_code, project, 'latest', get_value(args, 'file'))


def determine_file_locations(args, logger):
    config = {}
    location = get_value(args, 'location') if get_value(args, 'location') != None else settings.input_location
    project = get_project(args)
    language_code = get_language(args)
    targets = get_value(args, 'datasets')

    config['language_code'] = language_code
    config['language'] = get_value(args, 'language')
    config['collection'] = get_value(args, 'collection')
    config['ignore'] = get_value(args, 'except')
    config['clean'] = get_value(args, 'new')

    config['project'] = project
    config['full_project'] = get_projectname(args)
    config['filename'] = generate_wikidump_filename(language_code, project, args)
    config['namespaces'] = get_namespaces(args)

    config['dataset'] = os.path.join(settings.dataset_location, config['full_project'])
    config['charts'] = os.path.join(settings.chart_location, config['full_project'])
    config['location'] = os.path.join(location, language_code, project)
    config['txt'] = os.path.join(config['location'], 'txt')
    config['sorted'] = os.path.join(config['location'], 'sorted')

    config['directories'] = [config['location'], config['txt'], config['sorted'], config['dataset'], config['charts']]
    config['path'] = '/%s/latest/' % config['full_project']
    config['targets'] = targets.split(',')

    c = Config(config)
    message = 'Settings as generated from the configuration module.'
    write_message_to_log(logger, args, c, message)
    return c


def show_settings(args, logger, config):
    language_map = languages.language_map()

    about = {}
    about['Project'] = '%s' % settings.projects.get(config.project).title()
    about['Language'] = '%s / %s' % (language_map[config.language_code], config.language) #.decode(settings.encoding)
    about['Input directory'] = '%s' % config.location
    about['Output directory'] = '%s and subdirectories' % config.location

    max_length_key = max([len(key) for key in about.keys()])
    message = 'Final settings after parsing command line arguments:'
    for a in about:
        print '%s: %s' % (a.rjust(max_length_key), about[a])
    about = Config(about)
    write_message_to_log(logger, args, about, message)


def dump_downloader_launcher(args, logger, config):
    print 'Start downloading'
    timer = Timer()
    write_message_to_log(logger, args, config)

    extension = utils.determine_file_extension(config.filename)
    filemode = utils.determine_file_mode(extension)
    log.log_to_mongo(config.full_project, 'download', timer, type='start')
    task_queue, result = dump_downloader.create_list_dumpfiles(settings.wp_dump_location, config.path, config.filename, extension)

    if result:
        while True:
            filename = task_queue.get(block=False)
            if filename == None:
                break
            task_queue.task_done()
            dump_downloader.download_wiki_file(settings.wp_dump_location, config.path, filename, config.location, filemode)
    else:
        dump_downloader.download_wiki_file(settings.wp_dump_location, config.path, config.filename, config.location, filemode)

    timer.elapsed()
    log.log_to_mongo(full_project, 'download', timer, type='finish')


def launch_zip_extractor(args, logger, location, file):
    print 'Unzipping zip file'
    timer = Timer()
    log.log_to_mongo(config.full_project, 'unpack', timer, type='start')
    write_message_to_log(logger, args, None, message=None, verb=None, location=location, file=file)
    compressor = compression.Compressor(location, file)
    compressor.extract()
    timer.elapsed()
    log.log_to_mongo(full_project, 'unpack', timer, type='finish')


def extract_launcher(args, logger, config):
    print 'Extracting data from XML'
    timer = Timer()
    log.log_to_mongo(config.full_project, 'extract', timer, type='start')
    write_message_to_log(logger, args, None, message=None, verb=None, location=config.location, language_code=config.language_code, project=config.project)
    '''make sure that the file exists, if it doesn't then expand it first'''
    print 'Checking if dump file has been extracted...'
    canonical_filename = utils.determine_canonical_name(config.filename)
    extension = utils.determine_file_extension(config.filename)
    files = utils.retrieve_file_list(config.location, extension, mask=canonical_filename)
    for file in files:
        file_without_ext = file.replace('%s%s' % ('.', extension), '')
        result = utils.check_file_exists(config.location, file_without_ext)
        if not result:
            print 'Dump file has not yet been extracted...'
            retcode = launch_zip_extractor(args, logger, config.location, file)
        else:
            print 'Dump file has already been extracted...'
            retcode = 0
        if retcode != 0:
            sys.exit(retcode)
    extracter.parse_dumpfile(config.project, config.language_code, namespaces=['0'])
    timer.elapsed()
    log.log_to_mongo(full_project, 'extract', timer, type='finish')


def sort_launcher(args, logger, config):
    print 'Start sorting data'
    timer = Timer()
    log.log_to_mongo(config.full_project, 'sort', timer, type='start')
    write_message_to_log(logger, args, None, message=None, verb=None, location=config.location, input=config.input, output=config.output)
    sort.mergesort_launcher(input, output)
    timer.elapsed()
    log.log_to_mongo(full_project, 'sort', timer, type='finish')


def store_launcher(args, logger, config):
    print 'Start storing data in MongoDB'
    timer = Timer()
    log.log_to_mongo(config.full_project, 'store', timer, type='start')
    db.cleanup_database(config.project, logger)
    write_message_to_log(logger, args, None, message=None, verb='Storing', location=config.location, input=config.sorted, project=config.full_project, collection=config.collection)
    store.launcher(config.sorted, config.full_project, config.collection)
    timer.elapsed()
    log.log_to_mongo(full_project, 'store', timer, type='finish')


def transformer_launcher(args, logger, **kwargs):
    print 'Start transforming dataset'
    timer = Timer()
    log.log_to_mongo(config.full_project, 'transform', timer, type='start')
    db.cleanup_database(config.project, logger, 'dataset')
    write_message_to_log(logger, args, None, message=None, verb='Transforming', project=config.project, collection=config.collection)
    transformer.transform_editors_single_launcher(config.project, config.collection)
    timer.elapsed()
    log.log_to_mongo(full_project, 'transform', timer, type='finish')


def exporter_launcher(args, logger, config):
    print 'Start exporting dataset'
    timer = Timer()
    log.log_to_mongo(config.full_project, 'export', timer, type='start')
    for target in config.targets:
        write_message_to_log(logger, args, None, message=None, verb='Exporting', target=target, dbname=config.full_project, collection=config.collection)
        target = datasets[target]
        print 'Dataset is created by: %s' % target
        exporter.dataset_launcher(config.full_project, config.collection, target)
    timer.elapsed()
    log.log_to_mongo(config.full_project, 'export', timer, type='finish')


def cleanup(logger, args, config):
    #dirs = kwargs.get('directories')[1:]
    for dir in config.directories[1:]:
        write_message_to_log(logger, args, None, message=None, verb='Deleting', dir=dir)
        utils.delete_file(dir, '', directory=True)

    write_message_to_log(logger, args, None, message=None, verb='Creating', dir=dirs)
    settings.verify_environment(dirs)

    file = '%s%s' % (config.full_project, '_editor.bin')
    #file = kwargs.get('full_project') + '_editor.bin'
    write_message_to_log(logger, args, None, message=None, verb='Deleting', file=file)
    utils.delete_file(settings.binary_location, file)


def all_launcher(args, logger, config):
    print 'The entire data processing chain has been called, this will take a couple of hours (at least) to complete.'
    timer = Timer()
    log.log_to_mongo(config.full_project, 'all', timer, type='start')
    message = 'Start of building %s dataset.' % config.full_project

    write_message_to_log(logger, args, None, message=message, verb=None, full_project=config.full_project, ignore=config.ignore, clean=config.clean)
    if config.clean:
        cleanup(logger, args, config)

    functions = ordered_dict.OrderedDict(((dump_downloader_launcher, 'download'),
                                          #(chunker_launcher, 'split'),
                                          (extract_launcher, 'extract'),
                                          (sort_launcher, 'sort'),
                                          (store_launcher, 'store'),
                                          (transformer_launcher, 'transform'),
                                          (exporter_launcher, 'export')))

    for function, callname in functions.iteritems():
        if callname not in config.ignore:
            function(args, logger, config)
    timer.elapsed()
    log.log_to_mongo(full_project, 'all', timer, type='finish')


def supported_languages():
    choices = languages.MAPPING.keys()
    choices = [c.encode(settings.encoding) for c in choices]
    return tuple(choices)


def show_languages(args, logger, config):
    first = get_value(args, 'startswith')
    if first != None:
        first = first.title()
    choices = supported_languages()
    languages = []
    for choice in choices:
        languages.append(choice)
    languages.sort()
    for language in languages:
        try:
            if first != None and language.startswith(first):
                print '%s' % language.decode(settings.encoding)
            elif first == None:
                print '%s' % language.decode(settings.encoding)
        except UnicodeEncodeError:
            print '%s' % language


def detect_python_version(logger):
    version = sys.version_info[0:2]
    logger.debug('Python version: %s' % '.'.join(str(version)))
    if version < settings.minimum_python_version:
        raise exceptions.OutDatedPythonVersionError


def about():
    print '\nEditor Trends Software is (c) 2010-2011 by the Wikimedia Foundation.'
    print 'Written by Diederik van Liere (dvanliere@gmail.com).'
    print 'This software comes with ABSOLUTELY NO WARRANTY.\nThis is free software, and you are welcome to distribute it\nunder certain conditions.'
    print 'See the README.1ST file for more information.'
    print '\n'


def main():
    default_language = determine_default_language()

    file_choices = ('stub-meta-history.xml.gz',
                    'stub-meta-current.xml.gz',
                    'pages-meta-history.xml.7z',
                    'pages-meta-current.xml.bz2',
                    )


    parser = ArgumentParser(prog='manage', formatter_class=RawTextHelpFormatter)
    subparsers = parser.add_subparsers(help='sub - command help')

    parser_languages = subparsers.add_parser('show_languages', help='Overview of all valid languages.')
    parser_languages.add_argument('-s', '--startswith',
                                  action='store',
                                  help='Enter the first letter of a language to see which languages are available.')
    parser_languages.set_defaults(func=show_languages)

    parser_config = subparsers.add_parser('config', help='The config sub command allows you set the data location of where to store files.')
    parser_config.set_defaults(func=config_launcher)
    parser_config.add_argument('-f', '--force', action='store_true',
                               help='Reconfigure Editor Toolkit (this will replace wiki.cfg')

    parser_download = subparsers.add_parser('download', help='The download sub command allows you to download a Wikipedia dump file.')
    parser_download.set_defaults(func=dump_downloader_launcher)

    #parser_split = subparsers.add_parser('split', help='The split sub command splits the downloaded file in smaller chunks to parallelize extracting information.')
    #parser_split.set_defaults(func=chunker_launcher)

    parser_create = subparsers.add_parser('extract', help='The store sub command parsers the XML chunk files, extracts the information and stores it in a MongoDB.')
    parser_create.set_defaults(func=extract_launcher)

    parser_sort = subparsers.add_parser('sort', help='By presorting the data, significant processing time reductions are achieved.')
    parser_sort.set_defaults(func=sort_launcher)

    parser_store = subparsers.add_parser('store', help='The store sub command parsers the XML chunk files, extracts the information and stores it in a MongoDB.')
    parser_store.set_defaults(func=store_launcher)

    parser_transform = subparsers.add_parser('transform', help='Transform the raw datatable to an enriched dataset that can be exported.')
    parser_transform.set_defaults(func=transformer_launcher)

    parser_dataset = subparsers.add_parser('export', help='Create a dataset from the MongoDB and write it to a csv file.')
    parser_dataset.set_defaults(func=exporter_launcher)

    #parser_debug = subparsers.add_parser('debug', help='Input custom dump files for debugging purposes')
    #parser_debug.set_defaults(func=debug_launcher)

    parser_all = subparsers.add_parser('all', help='The all sub command runs the download, split, store and dataset commands.\n\nWARNING: THIS COULD TAKE DAYS DEPENDING ON THE CONFIGURATION OF YOUR MACHINE AND THE SIZE OF THE WIKIMEDIA DUMP FILE.')
    parser_all.set_defaults(func=all_launcher)
    parser_all.add_argument('-e', '--except',
                            action='store',
                            help='Should be a list of functions that are to be ignored when executing \'all\'.',
                            default=[]
                            )

    parser_all.add_argument('-n', '--new',
                            action='store_true',
                            help='This will delete all previous output and starts from scratch. Mostly useful for debugging purposes.',
                            default=False
                            )

    parser.add_argument('-l', '--language',
                        action='store',
                        help='Example of valid languages.',
                        choices=supported_languages(),
                        default=default_language
                        )

    parser.add_argument('-p', '--project',
                        action='store',
                        help='Specify the Wikimedia project that you would like to download',
                        choices=settings.projects.keys(),
                        default='wiki'
                        )

    parser.add_argument('-c', '--collection', action='store',
                        help='Name of MongoDB collection',
                        default='editors')


    parser.add_argument('-o', '--location',
                        action='store',
                        help='Indicate where you want to store the downloaded file.',
                        default=settings.input_location
                        )

    parser.add_argument('-ns', '--namespace',
                        action='store',
                        help='A list of namespaces to include for analysis.',
                        default='0'
                        )

    parser.add_argument('-f', '--file',
                        action='store',
                        choices=file_choices,
                        help='Indicate which dump you want to download. Valid choices are:\n %s' % ''.join([f + ',\n' for f in file_choices]),
                        default='stub-meta-history.xml.gz'
                        )

    parser.add_argument('-dv', '--dumpversion',
                        action='store',
                        choices=settings.dumpversions.keys(),
                        help='Indicate the Wikidump version that you are parsing.',
                        default=settings.dumpversions['0']
                        )

    parser.add_argument('-d', '--datasets',
                        action='store',
                        choices=datasets.keys(),
                        help='Indicate what type of data should be exported.',
                        default='backward'
                        )

    parser.add_argument('-prog', '--progress',
                        action='store_true',
                        default=True, \
                        help='Indicate whether you want to have a progressbar.'
                        )

    args = parser.parse_args()
    #initialize logger
    logger = logging.getLogger('manager')
    logger.setLevel(logging.DEBUG)

    # Add the log message handler to the logger
    today = datetime.datetime.today()
    log_filename = os.path.join(settings.log_location, '%s%s_%s-%s-%s.log' % (args.language, args.project, today.day, today.month, today.year))
    handler = logging.handlers.RotatingFileHandler(log_filename, maxBytes=1024 * 1024, backupCount=3)

    logger.addHandler(handler)
    logger.debug('Default language: \t%s' % default_language)

    #start manager
    detect_python_version(logger)
    about()
    config.create_configuration(settings, args)
    locations = determine_file_locations(args, logger)
    settings.verify_environment(locations.directories)
    show_settings(args, logger, locations)
    args.func(args, logger, locations)


if __name__ == '__main__':
    main()
