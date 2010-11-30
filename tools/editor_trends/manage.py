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
from utils import utils
from utils import dump_downloader
from utils import compression
from etl import chunker
from etl import extract
from etl import loader
from etl import transformer
from etl import exporter
import config


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


def config_launcher(args, **kwargs):
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
    for kw in kwargs:
        if verb:
            logger.debug('Action: %s\tSetting: %s' % (verb, kwargs[kw]))
        else:
            logger.debug('Key: %s\tSetting: %s' % (kw, kwargs[kw]))



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
    config['Project'] = settings.projects.get(kwargs.pop('project'), 'wiki').title()
    config['Language'] = '%s / %s' % (language_map[language_code].decode(settings.encoding), language.decode(settings.encoding))
    config['Input directory'] = kwargs.get('location')
    config['Output directory'] = '%s and subdirectories' % kwargs.get('location')

    message = 'Final settings after parsing command line arguments:'
    write_message_to_log(logger, args, message, None, **config)


def dump_downloader_launcher(args, logger, **kwargs):
    print 'dump downloader'
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
    print 'split_settings.input_filename_launcher'
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    filename = kwargs.pop('filename')
    location = kwargs.pop('location')
    project = kwargs.pop('project')
    language = kwargs.pop('language')
    language_code = kwargs.pop('language_code')
    namespaces = kwargs.pop('namespaces')

    ext = utils.determine_file_extension(filename)
    file = filename.replace('.' + ext, '')
    result = utils.check_file_exists(location, file)
    if not result:
        retcode = launch_zip_extractor(args, location, filename)
    else:
        retcode = 0
    if retcode != 0:
        sys.exit(retcode)

    chunker.split_file(location, file, project, language_code, namespaces, format='xml', zip=False)
    timer.elapsed()


def launch_zip_extractor(args, location, file):
    timer = Timer()
    write_message_to_log(logger, args, location=location, file=file)
    compressor = compression.Compressor(location, file)
    compressor.extract()
    timer.elapsed()


def extract_launcher(args, logger, **kwargs):
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    location = kwargs.pop('location')
    language_code = kwargs.pop('language_code')
    project = kwargs.pop('project')
    extract.run_parse_editors(location, **kwargs)
    timer.elapsed()


def sort_launcher(args, logger, **kwargs):
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    location = kwargs.pop('location')
    input = os.path.join(location, 'txt')
    output = os.path.join(location, 'sorted')
    final_output = os.path.join(location, 'dbready')
    dbname = kwargs.pop('full_project')
    loader.mergesort_launcher(input, output)
    loader.mergesort_external_launcher(dbname, output, final_output)
    timer.elapsed()


def store_launcher(args, logger, **kwargs):
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    location = kwargs.pop('location')
    input = os.path.join(location, 'dbready')
    dbname = kwargs.pop('full_project')
    collection = kwargs.pop('collection')
    loader.store_editors(input, dbname, collection)
    timer.elapsed()


def transformer_launcher(args, logger, **kwargs):
    print 'dataset launcher'
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    project = kwargs.pop('full_project')
    collection = kwargs.pop('collection')
    transformer.run_optimize_editors(project, collection)
    timer.elapsed()


def exporter_launcher(args, logger, **kwargs):
    timer = Timer()
    write_message_to_log(logger, args, **kwargs)
    project = kwargs.pop('full_project')
    exporter.generate_editor_dataset_launcher(project)
    timer.elapsed()


def all_launcher(args, logger, **kwargs):
    print 'all_launcher'
    timer = Timer()
    message = 'Starting '
    write_message_to_log(logger, args, message, **kwargs)
    ignore = get_value(args, 'except')
    clean = get_value(args, 'clean')
    if clean:
        dirs = kwargs.get('directories')[1:]
        for dir in dirs:
            write_message_to_log(logger, args, verb='Deleting', **kwargs)
            utils.delete_file(dir, '')
    functions = {dump_downloader_launcher: 'download',
                 chunker_launcher: 'split',
                 extract_launcher: 'extract',
                 sort_launcher: 'sort',
                 transformer_launcher: 'transform',
                 exporter_launcher: 'export'
                }
    for function, callname in functions.iteritems():
        if callname not in ignore:
            function(args, **kwargs)

    timer.elapsed()


def supported_languages():
    choices = languages.MAPPING.keys()
    choices = [c.encode(settings.encoding) for c in choices]
    return tuple(choices)


def show_languages(args, location, filename, project, full_project, language_code, language):
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
        raise 'Please upgrade to Python 2.6 or higher (but not Python 3.x).'

def about():
    print 'Editor Trends Software is (c) 2010 by the Wikimedia Foundation.'
    print 'Written by Diederik van Liere (dvanliere@gmail.com).'
    print 'This software comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to distribute it under certain conditions.'
    print 'See the README.1ST file for more information.'
    print '\n'


def main():
    logger = logging.getLogger('manager')
    logger.setLevel(logging.DEBUG)

    default_language = determine_default_language()
    file_choices = ('stub-meta-history.xml.gz',
                    'stub-meta-current.xml.gz',
                    'pages-meta-history.xml.7z',
                    'pages-meta-current.xml.bz2')

    parser = ArgumentParser(prog='manage', formatter_class=RawTextHelpFormatter)
    subparsers = parser.add_subparsers(help='sub-command help')

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
    parser_store.add_argument('-c', '--collection', action='store',
                              help='Name of MongoDB collection',
                              default='editors')

    parser_transform = subparsers.add_parser('transform', help='Transform the raw datatable to an enriched dataset that can be exported.')
    parser_transform.set_defaults(func=transformer_launcher)
    parser_transform.add_argument('-c', '--collection', action='store',
                                  help='Name of MongoDB collection',
                                  default='editors')

    parser_dataset = subparsers.add_parser('export', help='Create a dataset from the MongoDB and write it to a csv file.')
    parser_dataset.set_defaults(func=exporter_launcher)

    parser_all = subparsers.add_parser('all', help='The all sub command runs the download, split, store and dataset commands.\n\nWARNING: THIS COULD TAKE DAYS DEPENDING ON THE CONFIGURATION OF YOUR MACHINE AND THE SIZE OF THE WIKIMEDIA DUMP FILE.')
    parser_all.set_defaults(func=all_launcher)
    parser_all.add_argument('-e', '--except', action='store',
                            help='Should be a list of functions that are to be ignored when executing \'all\'.',
                            default=[])
    parser_all.add_argument('-n', '--new', action='store_false',
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

    parser.add_argument('-o', '--location', action='store',
                        help='Indicate where you want to store the downloaded file.',
                        )

    parser.add_argument('-n', '--namespace', action='store',
                        help='A list of namespaces to include for analysis.',
                        default='0')


    parser.add_argument('-f', '--file', action='store',
                        choices=file_choices,
                        help='Indicate which dump you want to download. Valid choices are:\n %s' % ''.join([f + ',\n' for f in file_choices]),
                        default='stub-meta-history.xml.gz')

    parser.add_argument('-prog', '--progress', action='store_true', default=True,
                      help='Indicate whether you want to have a progressbar.')

    detect_python_version(logger)
    about()
    args = parser.parse_args()
    config.create_configuration(settings, args)
    locations = determine_file_locations(args, logger)
    settings.verify_environment(locations['directories'])
    show_settings(args, logger, **locations)
    #locations['settings'] = settings
    args.func(args, logger, **locations)
    t1 = datetime.datetime.now()


if __name__ == '__main__':
    main()
