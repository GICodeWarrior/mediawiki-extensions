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

#Default Python libraries (Python => 2.6)
import sys
import os
#import time
#import datetime
#import codecs
#import math

#from operator import itemgetter

import multiprocessing
from Queue import Empty
import pymongo

# Custom written files
sys.path.append('..')
import configuration
settings = configuration.Settings()
from utils import utils, models
from database import db_settings
from database import db
from database import cache
import wikitree.parser
from bots import bots
from etl import models
#from utils import process_constructor as pc

try:
    import psyco
    psyco.full()
except ImportError:
    pass

def validate_hostname(address):
    '''
    This is not a foolproof solution at all. The problem is that it's really hard
    to determine whether a string is a hostname or not **reliably**. This is a 
    very fast rule of thumb. Will lead to false positives, but that's life :)
    '''
    parts = address.split(".")
    if len(parts) > 2:
        return True
    else:
        return False

def validate_ip(address):
    parts = address.split(".")
    if len(parts) != 4:
        return False
    parts = parts[:3]
    for item in parts:
        try:
            if not 0 <= int(item) <= 255:
                return False
        except ValueError:
            return False
    return True


def determine_username_is_bot(contributor, **kwargs):
    '''
    #contributor is an xml element containing the id of the contributor
    @bots should have a dcit with all the bot ids and bot names
    @Return False if username id is not in bot dict id or True if username id
    is a bot id.
    '''
    bots = kwargs.get('bots')
    for elem in contributor:
        if elem.tag == 'id':
            if elem.text in bots:
                return 1
            else:
                return 0


def extract_username(contributor, **kwargs):
    for elem in contributor:
        if elem.tag == 'username':
            return elem.text
    else:
        return None


def extract_contributor_id(contributor, **kwargs):
    '''
    @contributor is the xml contributor node containing a number of attributes

    Currently, we are only interested in registered contributors, hence we
    ignore anonymous editors. 
    '''
    if contributor.get('deleted'):
        return None  # ASK: Not sure if this is the best way to code deleted contributors.
    for elem in contributor:
        if elem.tag == 'id' and elem.text != None:
            return {'id':elem.text}

        elif elem.tag == 'ip' and elem.text != None:
            if validate_ip(elem.text) == False and validate_hostname(elem.text) == False:
                return {'username':elem.text, 'id': elem.text}
            else:
                return None
    return None

def output_editor_information(elem, fh, **kwargs):
    '''
    @elem is an XML element containing 1 revision from a page
    @output is where to store the data,  a filehandle
    @**kwargs contains extra information 
    
    the variable tags determines which attributes are being parsed, the values in
    this dictionary are the functions used to extract the data. 
    '''
    tags = {'contributor': {'id': extract_contributor_id,
                            'bot': determine_username_is_bot,
                            'username': extract_username,
                            },
            'timestamp': {'date': xml.extract_text},
            }
    vars = {}
    headers = ['id', 'date', 'article', 'username']
    revisions = elem.findall('revision')
    for revision in revisions:
        vars['article'] = elem.find('id').text.decode(settings.encoding)
        elements = revision.getchildren()
        for tag, functions in tags.iteritems():
            xml_node = xml.retrieve_xml_node(elements, tag)
            for var, function in functions.iteritems():
                value = function(xml_node, **kwargs)
                if type(value) == type({}):
                    for kw in value:
                        vars[kw] = value[kw]
                else:
                    vars[var] = value

        #print '%s\t%s\t%s\t%s\t' % (vars['article'], vars['contributor'], vars['timestamp'], vars['bot'])
        if vars['bot'] != 1 and vars['id'] != None:
            vars.pop('bot')
            data = []
            for head in headers:
                data.append(vars[head])
            utils.write_list_to_csv(data, fh)
        vars = {}


def run_parse_editors(location, **kwargs):

    input = os.path.join(location, 'chunks')
    output = os.path.join(location, 'txt')
    language_code = kwargs.get('language_code')
    settings.verify_environment([input, output])
    files = utils.retrieve_file_list(input, 'xml')

    bot_ids = bots.retrieve_bots(language_code)
    tasks = multiprocessing.JoinableQueue()
    consumers = [models.XMLFileConsumer(tasks, None) for i in xrange(settings.number_of_processes)]
    for file in files:
        tasks.put(models.XMLFile(input, output, file, bot_ids, output_editor_information, **kwargs))
    print 'The queue contains %s files.' % tasks.qsize()
    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    tasks.join()


def debug_parse_editors(location):
    language_code = 'en'
    bot_ids = bots.retrieve_bots(language_code)
    input = os.path.join(location, 'chunks')
    output = os.path.join(location, 'txt')
    xml_file = models.XMLFile(input, output, 'pages_full_en.xml', bot_ids, output_editor_information)
    xml_file()

if __name__ == '__main__':
    location = os.path.join(settings.input_location, 'en', 'wiki')
    debug_parse_editors(location)
    #run_parse_editors(location)
