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
import ConfigParser

from utils import utils
from classes import wikiprojects


def show_choices(settings, attr):
    choices = getattr(settings, attr).items()
    choices.sort()
    choices = ['%s\t%s' % (choice[0], choice[1]) for choice in choices]
    return choices


def create_configuration(settings, args):
    force = getattr(args, 'force', False)

    if not os.path.exists('wiki.cfg') or force:
        config = ConfigParser.RawConfigParser()
        project = None
        language = None
        dumpversion = None
        #language_map = languages.language_map()
        working_directory = raw_input('Please indicate where you installed Editor Trends Analytics.\nCurrent location is %s\nPress Enter to accept default.\n' % os.getcwd())
        input_location = raw_input('Please indicate where to store the Wikipedia dump files.\nDefault is: %s\nPress Enter to accept default.\n' % settings.input_location)

        while project not in settings.projects.keys():
            project = raw_input('Please indicate which project you would like to analyze.\nDefault is: %s\nPress Enter to accept default.\n' % settings.projects[args.project].capitalize())
            project = project if len(project) > 0 else args.project
            if project not in settings.projects.keys():
                print 'Valid choices for a project are: %s' % ','.join(settings.projects.keys())

        wiki = wikiprojects.Wiki(settings.encoding, project=project)
        while language not in wiki.valid_languages:
            language = raw_input('Please indicate which language of project %s you would like to analyze.\nDefault is: %s\nPress Enter to accept default.\n' % (settings.projects[project].capitalize(), language_map[args.language]))
            if len(language) == 0:
                language = language_map[args.language]
            language = language if language in wiki.valid_languages else args.language

#        while dumpversion not in settings.dumpversions.keys():
#            choices = '\n'.join(show_choices(settings, 'dumpversions'))
#            dumpversion = raw_input('Please indicate the version of the Wikipedia project you are analyzing.\nValid choices are:\n%s\nDefault is: 0 (%s)\nPress Enter to accept default.\n' % (choices, settings.dumpversions['0']))
#            if len(dumpversion) == 0:
#                dumpversion = settings.dumpversions['0']

        #dumpversion = settings.dumpversions[dumpversion]
        input_location = input_location if len(input_location) > 0 else settings.input_location
        working_directory = working_directory if len(working_directory) > 0 else os.getcwd()

        config = ConfigParser.RawConfigParser()
        config.add_section('file_locations')
        config.set('file_locations', 'working_directory', working_directory)
        config.set('file_locations', 'input_location', input_location)
        config.add_section('wiki')
        config.set('wiki', 'project', project)
        config.set('wiki', 'language', language)
        #config.set('wiki', 'dumpversion', dumpversion)

        fh = file_utils.create_binary_filehandle(working_directory, 'wiki.cfg', 'wb')
        config.write(fh)
        fh.close()

        settings.working_directory = config.get('file_locations', 'working_directory')
        settings.input_location = config.get('file_locations', 'input_location')
        #settings.xml_namespace = config.get('wiki', 'dumpversion')
        return settings


if __name__ == '__main__':
    pass
