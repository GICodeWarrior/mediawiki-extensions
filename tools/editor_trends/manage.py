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
from database import db
from etl import chunker
from etl import extract
from etl import loader
from etl import transformer
from etl import exporter



class Timer(object):
    def __init__(self):
        self.t0 = datetime.datetime.now()

    def stop(self):
        self.t1 = datetime.datetime.now()

    def elapsed(self):
        self.stop()
        print 'Processing time: %s' % (self.t1 - self.t0)


def get_value(args, key):
    return getattr(args, key, None)


def config_launcher(args, logger, **kwargs):
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

def write_message_to_log(logger, args, message=None, verb=None, **kwargs):
    function = get_value(args, 'func')
    logger.debug('Starting %s task' % function.func_name)
    if message:
        logger.debug(message)

    max_length = max([len(kw) for kw in kwargs])
    #max_tab = max_length / 4
    for kw in kwargs:
        if verb:
            logger.debug('Action: %s\tSetting: %s' % (verb, kwargs[kw]))
        else:
            tabs = (max_length - len(kw)) / 4
            if tabs == 0:
                tabs = 1
            tabs = ''.join(['\t' for t in xrange(tabs)])
            logger.debug('\tKey: %s%sSetting: %s' % (kw, tabs, kwargs[kw]))



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
    config['format'] = get_value(args, 'format')
    config['language_code'] = language_code
    config['language'] = get_value(args, 'language')
    config['location'] = os.path.join(location, language_code, project)
    config['chunks'] = os.path.join(config['location'], 'chunks')
    config['txt'] = os.path.join(config['location'], 'txt')
    config['sorted'] = os.path.join(config['location'], 'sorted')
    config['dbready'] = os.path.join(config['location'], 'dbready')
    config['project'] = project
    config['full_project'] = get_projectname(args)
    config['filename'] = generate_wikidump_filename(language_code, project, args)
    config['collection'] = get_value(args, 'collection')
    config['namespaces'] = get_namespaces(args)
    config['directories'] = [config['location'], config['chunks'], config['txt'], config['sorted'], config['dbready']]

    message = 'Settings as generated from the configuration module.'
    write_message_to_log(logger, args, message, None, **config)
    #for c in config:
    #    logger.debug('Key: %s - Setting: %s' % (c, config[c]))
    return config


def show_settings(args, logger, **kwargs):
    language_map = languages.language_map()
    language = kwargs.pop('language')
    language_code = kwargs.pop('language_code')
    config = {}
    config['Project'] = '\t\t%s' % settings.projects.get(kwargs.pop('project'), 'wiki').title()
    config['Language'] = '\t%s / %s' % (language_map[language_code], language) #.decode(settings.encoding)
    config['Input directory'] = '\t%s' % kwargs.get('location')
    config['Output directory'] = '%s and subdirectories' % kwargs.get('location')

    message = 'Final settings after parsing command line arguments:'
    write_message_to_log(logger, args, message, None, **config)
    for c in config:
        print '%s\t%s' % (c, config[c])


def dump_downloader_launcher(args, logger, **kwargs):
    print 'Start downloading'
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    filename = kwargs.get('filename')
    extension = kwargs.get('extension')
    location = kwargs.get('location')
    pbar = get_value(args, 'progress')
    domain = settings.wp_dump_location
    path = '/%s/latest/' % project
    extension = utils.determine_file_extension(filename)
    filemode = utils.determine_file_mode(extension)
    dump_downloader.download_wiki_file(domain, path, filename, location, filemode, pbar)
    timer.elapsed()


def chunker_launcher(args, logger, **kwargs):
    print 'Start splitting'
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    filename = kwargs.pop('filename')
    location = kwargs.pop('location')
    project = kwargs.pop('project')
    language = kwargs.pop('language')
    language_code = kwargs.pop('language_code')
    namespaces = kwargs.pop('namespaces')
    format = kwargs.pop('format')
    ext = utils.determine_file_extension(filename)
    file = filename.replace('.' + ext, '')
    result = utils.check_file_exists(location, file)
    if not result:
        retcode = launch_zip_extractor(args, logger, location, filename)
    else:
        retcode = 0
    if retcode != 0:
        sys.exit(retcode)

    chunker.split_file(location, file, project, language_code, namespaces, format=format, zip=False)
    timer.elapsed()


def launch_zip_extractor(args, logger, location, file):
    print 'Unzipping zip file'
    timer = Timer()
    write_message_to_log(logger, args, location=location, file=file)
    compressor = compression.Compressor(location, file)
    compressor.extract()
    timer.elapsed()


def extract_launcher(args, logger, **kwargs):
    print 'Extracting data from XML'
    timer = Timer()
    location = kwargs.pop('location')
    language_code = kwargs.pop('language_code')
    project = kwargs.pop('project')
    write_message_to_log(logger, args, location=location, language_code=language_code, project=project)
    extract.run_parse_editors(location, **kwargs)
    timer.elapsed()


def sort_launcher(args, logger, **kwargs):
    print 'Start sorting data'
    timer = Timer()
    location = kwargs.pop('location')
    input = os.path.join(location, 'txt')
    output = os.path.join(location, 'sorted')
    final_output = os.path.join(location, 'dbready')
    write_message_to_log(logger, args, location=location, input=input, output=output, final_output=final_output)
    loader.mergesort_launcher(input, output)
    loader.mergesort_external_launcher(output, final_output)
    timer.elapsed()


def store_launcher(args, logger, **kwargs):
    print 'Start storing data in MongoDB'
    timer = Timer()
    location = kwargs.pop('location')
    input = os.path.join(location, 'dbready')
    project = kwargs.pop('full_project')
    collection = kwargs.pop('collection')

    db.cleanup_database(project, logger)

    write_message_to_log(logger, args, verb='Storing', location=location, input=input, project=project, collection=collection)
    num_editors = loader.store_editors(input, project, collection)
    cnt_editors = db.count_records(project, collection)
    assert num_editors == cnt_editors
    timer.elapsed()


def transformer_launcher(args, logger, **kwargs):
    print 'Start transforming dataset'
    timer = Timer()
    project = kwargs.pop('full_project')
    collection = kwargs.pop('collection')
    db.cleanup_database(project, logger, 'dataset')
    write_message_to_log(logger, args, verb='Transforming', project=project, collection=collection)
    transformer.transform_editors_single_launcher(project, collection)
    timer.elapsed()


def exporter_launcher(args, logger, **kwargs):
    print 'Start exporting dataset'
    timer = Timer()
    collection = get_value(args, 'collection')
    dbname = kwargs.get('full_project')
    targets = get_value(args, 'datasets')
    targets = targets.split(',')
    for target in targets:
        write_message_to_log(logger, args, verb='Exporting', target=target, dbname=dbname, collection=collection)
        exporter.dataset_launcher(dbname, collection, target)
    timer.elapsed()


def cleanup(logger, args, **kwargs):
    dirs = kwargs.get('directories')[1:]
    for dir in dirs:
        write_message_to_log(logger, args, verb='Deleting', dir=dir)
        utils.delete_file(dir, '', directory=True)

    write_message_to_log(logger, args, verb='Creating', dir=dirs)
    settings.verify_environment(dirs)


    file = kwargs.get('full_project') + '_editor.bin'
    write_message_to_log(logger, args, verb='Deleting', file=file)
    utils.delete_file(settings.binary_location, file)

def all_launcher(args, logger, **kwargs):
    print 'all_launcher'
    timer = Timer()
    full_project = kwargs.get('full_project', None)
    message = 'Start of building %s dataset.' % full_project


    ignore = get_value(args, 'except')
    clean = get_value(args, 'new')
    format = get_value(args, 'format')
    write_message_to_log(logger, args, message=message, full_project=full_project, ignore=ignore, clean=clean)
    if clean:
        cleanup(logger, args, **kwargs)

    if format != 'xml':
        ignore = ignore + ',extract'

    functions = ordered_dict.OrderedDict(((dump_downloader_launcher, 'download'),
                                          (chunker_launcher, 'split'),
                                          (extract_launcher, 'extract'),
                                          (sort_launcher, 'sort'),
                                          (store_launcher, 'store'),
                                          (transformer_launcher, 'transform'),
                                          (exporter_launcher, 'export')))

    for function, callname in functions.iteritems():
        if callname not in ignore:
            function(args, logger, **kwargs)

    timer.elapsed()


def supported_languages():
    choices = languages.MAPPING.keys()
    choices = [c.encode(settings.encoding) for c in choices]
    return tuple(choices)


def show_languages(args, logger, **kwargs):
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
    print 'Editor Trends Software is (c) 2010 by the Wikimedia Foundation.'
    print 'Written by Diederik van Liere (dvanliere@gmail.com).'
    print 'This software comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to distribute it under certain conditions.'
    print 'See the README.1ST file for more information.'
    print '\n'


def main():
    default_language = determine_default_language()

    datasets = {'cohort': 'generate_cohort_dataset',
                'long': 'generate_long_editor_dataset',
                'wide': 'generate_wide_editor_dataset',
                }

    file_choices = ('stub-meta-history.xml.gz',
                    'stub-meta-current.xml.gz',
                    'pages-meta-history.xml.7z',
                    'pages-meta-current.xml.bz2')


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

    parser_split = subparsers.add_parser('split', help='The split sub command splits the downloaded file in smaller chunks to parallelize extracting information.')

    parser_split.set_defaults(func=chunker_launcher)

    parser_create = subparsers.add_parser('extract', help='The store sub command parsers the XML chunk files, extracts the information and stores it in a MongoDB.')
    parser_create.set_defaults(func=extract_launcher)

    parser_sort = subparsers.add_parser('sort', help='By presorting the data, significant processing time reducations are achieved.')
    parser_sort.set_defaults(func=sort_launcher)

    parser_store = subparsers.add_parser('store', help='The store sub command parsers the XML chunk files, extracts the information and stores it in a MongoDB.')
    parser_store.set_defaults(func=store_launcher)

    parser_transform = subparsers.add_parser('transform', help='Transform the raw datatable to an enriched dataset that can be exported.')
    parser_transform.set_defaults(func=transformer_launcher)

    parser_dataset = subparsers.add_parser('export', help='Create a dataset from the MongoDB and write it to a csv file.')
    parser_dataset.set_defaults(func=exporter_launcher)

    parser_all = subparsers.add_parser('all', help='The all sub command runs the download, split, store and dataset commands.\n\nWARNING: THIS COULD TAKE DAYS DEPENDING ON THE CONFIGURATION OF YOUR MACHINE AND THE SIZE OF THE WIKIMEDIA DUMP FILE.')
    parser_all.set_defaults(func=all_launcher)
    parser_all.add_argument('-e', '--except', action='store',
                            help='Should be a list of functions that are to be ignored when executing \'all\'.',
                            default=[])

    parser_all.add_argument('-n', '--new', action='store_true',
                            help='This will delete all previous output and starts from scratch. Mostly useful for debugging purposes.',
                            default=False)

    parser.add_argument('-l', '--language', action='store',
                        help='Example of valid languages.',
                        choices=supported_languages(),
                        default=default_language)

    parser.add_argument('-p', '--project', action='store',
                        help='Specify the Wikimedia project that you would like to download',
                        choices=settings.projects.keys(),
                        default='wiki')

    parser.add_argument('-c', '--collection', action='store',
                        help='Name of MongoDB collection',
                        default='editors')


    parser.add_argument('-o', '--location', action='store',
                        help='Indicate where you want to store the downloaded file.',
                        default=settings.input_location
                        )

    parser.add_argument('-ns', '--namespace', action='store',
                        help='A list of namespaces to include for analysis.',
                        default='0')

    parser.add_argument('-fo', '--format', action='store',
                        help='Indicate which format the chunks should be stored. Valid options are xml and txt.',
                        default='txt')

    parser.add_argument('-f', '--file', action='store',
                        choices=file_choices,
                        help='Indicate which dump you want to download. Valid choices are:\n %s' % ''.join([f + ',\n' for f in file_choices]),
                        default='stub-meta-history.xml.gz')

    parser.add_argument('-dv', '--dumpversion', action='store',
                        choices=settings.dumpversions.keys(),
                        help='Indicate the Wikidump version that you are parsing.',
                        default=settings.dumpversions['0'])

    parser.add_argument('-d', '--datasets', action='store',
                        choices=datasets.keys(),
                        help='Indicate what type of data should be exported.',
                        default=datasets['cohort'])

    parser.add_argument('-prog', '--progress', action='store_true', default=True,
                      help='Indicate whether you want to have a progressbar.')

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
    settings.verify_environment(locations['directories'])
    show_settings(args, logger, **locations)
    args.func(args, logger, **locations)


if __name__ == '__main__':
    main()
