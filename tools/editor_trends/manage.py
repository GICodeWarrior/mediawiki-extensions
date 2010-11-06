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
import subprocess
from argparse import ArgumentParser
from argparse import RawTextHelpFormatter
import locale

import progressbar

import settings
import languages
from utils import utils
from utils import dump_downloader
import split_xml_file
import map_wiki_editors
import config


def get_value(args, key):
    return getattr(args, key, None)


def config_launcher(args, location, filename, project, language_code):
    config.load_configuration(args)


def determine_default_language():
    language_code = locale.getdefaultlocale()[0]
    return language_code.split('_')[0]
    
    
def retrieve_projectname(args):
    language_code = retrieve_language(args)
    if language_code == None:
        print 'Entered language: %s is not a valid Wikipedia language' % get_value(args, 'language')
        sys.exit(-1)
    project = retrieve_project(args)

    if project == None:
        print 'Entered project: %s is not valid Wikipedia project.' % get_value(args, 'project')
        sys.exit(-1)
    if project == 'commonswiki':
        return project
    else:
        return '%s%s' % (language_code, project)


def retrieve_language(args):
    language = get_value(args, 'language')
    language = language.title()
    return languages.MAPPING.get(language, 'en')


def retrieve_project(args):
    project = get_value(args, 'project')
    if project != 'wiki':
        project = settings.WIKIMEDIA_PROJECTS.get(project, None)
    return project


def generate_wikidump_filename(args):
    return '%s-%s-%s' % (retrieve_projectname(args), 'latest', get_value(args, 'file'))


def determine_file_locations(args):
    locations = {}
    location = get_value(args, 'location') if get_value(args, 'location') != None else settings.XML_FILE_LOCATION
    locations['language_code'] = retrieve_language(args)
    locations['location'] = os.path.join(location, retrieve_language(args))
    locations['project'] = retrieve_projectname(args)
    locations['filename'] = generate_wikidump_filename(args)
    return locations


def show_settings(args, location, filename, project, language_code):
    project = settings.WIKIMEDIA_PROJECTS.get(project, 'wiki')
    project = project.title()
    language_map = utils.invert_dict(languages.MAPPING)
    print 'Project: %s' % (project)
    print 'Language: %s' % language_map[language_code]
    print 'Input directory: %s' % location
    print 'Output directory: TODO'
  

def dump_downloader_launcher(args, location, filename, project, language_code):
    print 'dump downloader'
    pbar = get_value(args, 'progress')
    domain = settings.WP_DUMP_LOCATION
    path = '/%s/latest/' % project
    extension = utils.determine_file_extension(filename)
    filemode = utils.determine_file_mode(extension)

    dump_downloader.download_wiki_file(domain, path, filename, location, filemode, pbar)


def split_xml_file_launcher(args, location, filename, project, language_code):
    print 'split_xml_file_launcher'
    ext = utils.determine_file_extension(filename)
    if ext in settings.COMPRESSION_EXTENSIONS:
        ext = '.%s' % ext
        file = filename.replace(ext, '')
    result = utils.check_file_exists(location, file)
    if not result:
        retcode = extract_xml_file(args, location, filename)
    else:
        retcode = 0
    if retcode != 0:
        sys.exit(retcode)
    split_xml_file.split_xml(location, file, project, language_code)


def extract_xml_file(args, location, file):
    path = config.detect_installed_program('7zip')

    source = os.path.join(location, file)
    p = subprocess.Popen(['%s%s' % (path, '7z.exe'), 'e', '-o%s\\' % location, '%s' % (source,)])
    return p


def mongodb_script_launcher(args, location, filename, project, language_code):
    print 'mongodb_script_launcher'
    map_wiki_editors.run_parse_editors(project, language_code, location)
    #print args


def all_launcher(args, location, filename, project, language_code):
    print 'all_launcher'
    dump_downloader_launcher(args, location, filename, project, language_code)
    split_xml_file_launcher(args, location, filename, project, language_code)
    mongodb_script_launcher(args, location, filename, project, language_code)


def supported_languages():
    choices = languages.MAPPING.keys()
    choices = [c.encode(settings.ENCODING) for c in choices]
    return tuple(choices)


def show_languages(args, location, filename, project, language_code):
    first = get_value(args, 'startswith')
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
    default_language = determine_default_language()
    file_choices = ('stub-meta-history.xml.gz',
                  'stub-meta-current.xml.gz',
                  'pages-meta-history.xml.7z',
                  'pages-meta-current.xml.bz2')

    parser = ArgumentParser(prog='manage', formatter_class=RawTextHelpFormatter)
    #group = parser.add_mutually_exclusive_group()
    #group.add_argument('show_languages', action='store')
    #group.add_argument('language', action='store')
    subparsers = parser.add_subparsers(help='sub-command help')

    parser_languages = subparsers.add_parser('show_languages', help='Overview of all valid languages.')
    parser_languages.add_argument('-s', '--startswith', 
                                  action='store', 
                                  help='Enter the first letter of a language to see which languages are available.')
    parser_languages.set_defaults(func=show_languages)

    parser_config = subparsers.add_parser('config', help='The config sub command allows you set the data location of where to store files.')
    parser_config.set_defaults(func=config_launcher)

    parser_download = subparsers.add_parser('download', help='The download sub command allows you to download a Wikipedia dump file.')
    parser_download.set_defaults(func=dump_downloader_launcher)

    parser_split = subparsers.add_parser('split', help='The split sub command splits the downloaded file in smaller chunks to parallelize extracting information.')
    parser_split.set_defaults(func=split_xml_file_launcher)

    parser_create = subparsers.add_parser('store', help='The store sub command parsers the XML chunk files, extracts the information and stores it in a MongoDB.')
    parser_create.set_defaults(func=mongodb_script_launcher)

    parser_all = subparsers.add_parser('all', help='The all sub command runs the download, split, store and dataset commands.\n\nWARNING: THIS COULD TAKE DAYS DEPENDING ON THE CONFIGURATION OF YOUR MACHINE AND THE SIZE OF THE WIKIMEDIA DUMP FILE.')
    parser_all.set_defaults(func=all_launcher)

    parser.add_argument('-l', '--language', action='store',
                        help='Example of valid languages.',
                        choices=supported_languages(),
                        default=default_language)

    parser.add_argument('-p', '--project', action='store',
                        help='Specify the Wikimedia project that you would like to download',
                        choices=settings.WIKIMEDIA_PROJECTS.keys(),
                        default='wiki')

    parser.add_argument('-o', '--location', action='store',
                        help='Indicate where you want to store the downloaded file.',
                        default=settings.XML_FILE_LOCATION)

    parser.add_argument('-f', '--file', action='store',
                        choices=file_choices,
                        help='Indicate which dump you want to download. Valid choices are:\n %s' % ''.join([f + ',\n' for f in file_choices]),
                        default='stub-meta-current.xml.gz')

    parser.add_argument('-prog', '--progress', action='store_true', default=True,
                      help='Indicate whether you want to have a progressbar.')

    args = parser.parse_args()
    config.load_configuration(args)
    locations = determine_file_locations(args)
    show_settings(args, **locations)
    args.func(args, **locations)


if __name__ == '__main__':
    #args = ['download', '-l', 'Russian']
    main()
