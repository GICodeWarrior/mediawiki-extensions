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
import time
import datetime
import codecs
import math

import re
from operator import itemgetter

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
from wikitree import xml
from bots import bots
from etl import models
from utils import process_constructor as pc

try:
    import psyco
    psyco.full()
except ImportError:
    pass




def determine_username_is_bot(contributor, bots):
    '''
    #contributor is an xml element containing the id of the contributor
    @bots should have a dcit with all the bot ids and bot names
    @Return False if username id is not in bot dict id or True if username id
    is a bot id.
    '''
    for elem in contributor:
        if elem.tag == 'id':
            if elem.text in bots['bots']:
                return 1
            else:
                return 0


def extract_username(contributor, kwargs):
    for elem in contributor:
        if elem.tag == 'username':
            return elem.text
    else:
        return None


def extract_contributor_id(contributor, kwargs):
    '''
    @contributor is the xml contributor node containing a number of attributes

    Currently, we are only interested in registered contributors, hence we
    ignore anonymous editors. 
    '''
    if contributor.get('deleted'):
        return - 1  # ASK: Not sure if this is the best way to code deleted contributors.
    for elem in contributor:
        if elem.tag == 'id':
            if elem.text != None:
                return elem.text
            else:
                return - 1


def output_editor_information(elem, fh, **kwargs):
    '''
    @elem is an XML element containing 1 revision from a page
    @output is where to store the data, either a queue or a filehandle
    @**kwargs contains extra information 
    
    the variable tags determines which attributes are being parsed, the values in
    this dictionary are the functions used to extract the data. 
    '''
    tags = {'contributor': {'editor': extract_contributor_id,
                            'bot': determine_username_is_bot,
                            'username': extract_username,
                            },
            'timestamp': {'date': xml.extract_text},
            }
    vars = {}
    headers = ['editor', 'date', 'article', 'username']
    #destination = kwargs.pop('destination')
    revisions = elem.findall('revision')
    for revision in revisions:
        vars['article'] = elem.find('id').text.decode(settings.encoding)
        elements = revision.getchildren()
        for tag, functions in tags.iteritems():
            xml_node = xml.retrieve_xml_node(elements, tag)
            for var, function in functions.iteritems():
                vars[var] = function(xml_node, kwargs)

        #print '%s\t%s\t%s\t%s\t' % (vars['article'], vars['contributor'], vars['timestamp'], vars['bot'])
        if vars['bot'] == 0 and vars['editor'] != -1 and vars['editor'] != None:
            vars.pop('bot')
            data = []
            for head in headers:
                data.append(vars[head])
            utils.write_list_to_csv(data, fh)
        vars = {}


def run_parse_editors(location, **kwargs):
    bot_ids = bots.retrieve_bots()
    input = os.path.join(location, 'chunks')
    output = os.path.join(location, 'txt')
    settings.verify_environment([input, output])
    files = utils.retrieve_file_list(input, 'xml')
    
    
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
    bot_ids = bots.retrieve_bots()
    input = os.path.join(location, 'chunks')
    output = os.path.join(location, 'txt')
    xml_file = models.XMLFile(input, output, '1.xml', bot_ids, output_editor_information)
    xml_file()

if __name__ == '__main__':
    location = os.path.join(settings.input_location, 'en', 'wiki')
    debug_parse_editors(location)
    #run_parse_editors(location)
