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
import sys
from argparse import ArgumentParser
from argparse import RawTextHelpFormatter


import progressbar

import settings
import languages
from utils import utils
from utils import dump_downloader
import split_xml_file
import config


def get_value(args, key):
    return getattr(args, key, None)


def config_launcher(args):
    config.load_configuration(args)


def retrieve_language(args):
    language = get_value(args, 'language')
    language = language.title()
    return languages.MAPPING.get(language, None) 

def retrieve_project(args):
    project = get_value(args, 'project')
    if project != 'wiki':
        project = settings.WIKIMEDIA_PROJECTS.get(project, None)
    return project


def dump_downloader_launcher(args):
    print 'dump downloader'
    config.load_configuration(args)
    language_code = retrieve_language(args)
    if language_code == None:
        print 'Entered language: %s is not a valid Wikipedia language' % get_value(args, 'language')
        sys.exit(-1)
    project = retrieve_project(args)
    if project == None:
        print 'Entered project: %s is not valid Wikipedia project.' % get_value(args, 'project')
        sys.exit(-1)        
    location = os.path.join(get_value(args, 'location'), language_code)
    project = language_code + project
    filename = '%s-%s-%s' % (project, 'latest', get_value(args, 'file'))
    pbar = get_value(args, 'progress')

    domain = settings.WP_DUMP_LOCATION
    path = '/%s/latest/' % language_code

    extension = utils.determine_file_extension(filename)
    filemode = utils.determine_file_mode(extension)

    dump_downloader.download_wp_dump(domain, path, filename, location, filemode, pbar)


def split_xml_file_launcher(args):
    print 'split_xml_file_launcher'
    dbname = create_dbname(args)
    split_xml_file.split_xml(dbname)


def mongodb_script_launcher(args):
    print 'mongodb_script_launcher'
    config.load_configuration(args)
    dbname = create_dbname(args)
    #map_wiki_editors.run_stand_alone(dbname)
    #print args


def all_launcher(args):
    print 'all_launcher'
    config_launcher(args)
    dump_downloader_launcher(args)
    split_xml_file_launcher(args)
    mongodb_script_launcher(args)


def supported_languages():
    choices = languages.MAPPING.keys()
    choices = [c.encode(settings.ENCODING) for c in choices]
    return tuple(choices)


def show_languages(args):
    first = get_value(args, 'first')
    if first != None:
        first = first.title()
    choices = supported_languages()
    languages = []
    for choice in choices:
        languages.append(choice)
    languages.sort()
    for language in languages:
        if first == None:
            print '%s' % language
        elif first != None and language.startswith(first):
            print '%s' % language


def main():
    file_choices = ('stub-meta-history.xml.gz',
                  'stub-meta-current.xml.gz',
                  'pages-meta-history.xml.7z',
                  'pages-meta-current.xml.bz2')

    parser = ArgumentParser(prog='manage', formatter_class=RawTextHelpFormatter)
    subparsers = parser.add_subparsers(help='sub-command help')
    parser.add_argument('-p', '--progress', action='store_true', default=True,
                      help='Indicate whether you want to have a progressbar.')

    parser_languages = subparsers.add_parser('show_languages', help='Overview of all valid languages.')
    parser_languages.set_defaults(func=show_languages)
    parser_languages.add_argument('-f', '--first', action='store', help='Enter the first letter of a language to see which languages are available.')

    parser_config = subparsers.add_parser('config', help='The config sub command allows you set the data location of where to store files.')
    parser_config.set_defaults(func=config_launcher)

    parser_download = subparsers.add_parser('download', help='The download sub command allows you to download a Wikipedia dump file.')
    parser_download.add_argument('language', action='store',
                      help='Example of valid languages.',
                      choices=supported_languages(),
                      default='Russian')
    parser_download.add_argument('-p', '--project', action='store', help='Specify the Wikimedia project that you would like to download',
                                 choices=settings.WIKIMEDIA_PROJECTS.keys(),
                                 default='wiki')
    parser_download.add_argument('-l', '--location', action='store',
                      help='Indicate where you want to store the downloaded file.',
                      default=settings.XML_FILE_LOCATION)
    parser_download.add_argument('-f', '--file', action='store',
                                 choices=file_choices,
                                 help='Indicate which dump you want to download. Valid choices are:\n %s' % ''.join([f + ',\n' for f in file_choices]),
                                 default='stub-meta-current.xml.gz')
    parser_download.set_defaults(func=dump_downloader_launcher)

    parser_split = subparsers.add_parser('split', help='The split sub command splits the downloaded file in smaller chunks to parallelize extracting information.')
    parser_split.set_defaults(func=split_xml_file_launcher)

    parser_create = subparsers.add_parser('store', help='The store sub command parsers the XML chunk files, extracts the information and stores it in a MongoDB.')
    parser_create.set_defaults(func=mongodb_script_launcher)

    parser_all = subparsers.add_parser('all', help='The all sub command runs the download, split, store and dataset commands.\n\nWARNING: THIS COULD TAKE DAYS DEPENDING ON THE CONFIGURATION OF YOUR MACHINE AND THE SIZE OF THE WIKIMEDIA DUMP FILE.')
    parser_all.set_defaults(func=all_launcher)

    args = parser.parse_args()
    args.func(args)


if __name__ == '__main__':
    #args = ['download', '-l', 'Russian']
    main()
