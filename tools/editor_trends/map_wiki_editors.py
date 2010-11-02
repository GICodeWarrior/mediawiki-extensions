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
import cStringIO
import re
from operator import itemgetter
import xml.etree.cElementTree as cElementTree
from multiprocessing import Queue, JoinableQueue
from Queue import Empty
import pymongo

# Custom written files
import settings
from utils import utils, models
from database import db_settings
from database import db
from database import cache
from wikitree import xml
from statistics import dataset
from utils import process_constructor as pc


try:
    import psyco
    psyco.full()
except ImportError:
    pass


def determine_username_is_bot(username, kwargs):
    '''
    @username is the xml element containing the id of the user
    @kwargs should have a list with all the bot ids

    @Return False if username id is not in bot list id or True if username id
    is a bot id.
    '''
    ids = kwargs.get('bots', [])
    if ids == None:
        ids = []
    if username != None and username.text != None:
        id = username.text
        if id in ids:
            return 1
        else:
            return 0


def extract_contributor_id(contributor, kwargs):
    '''
    @contributor is the xml contributor node containing a number of attributes

    Currently, we are only interested in registered contributors, hence we
    ignore anonymous editors. If you are interested in collecting data on
    anonymous editors then add the string 'ip' to the tags variable.
    '''
    tags = ['id']
    if contributor.get('deleted'):
        return - 1  # ASK: Not sure if this is the best way to code deleted contributors.
    for elem in contributor:
        if elem.tag in tags:
            if elem.text != None:
                return elem.text.decode('utf-8')
            else:
                return - 1


def output_editor_information(elem, data_queue, **kwargs):
    '''
    @elem is an XML element containing 1 revision from a page
    @data_queue is where to store the data
    @**kwargs contains extra information 
    
    the variable tags determines which attributes are being parsed, the values in
    this dictionary are the functions used to extract the data. 
    '''
    tags = {'contributor': {'editor': extract_contributor_id, 'bot': determine_username_is_bot},
            'timestamp': {'date': xml.extract_text},
            }
    vars = {}

    revisions = elem.findall('revision')
    for revision in revisions:
        vars['article'] = elem.find('id').text.decode(settings.ENCODING)
        elements = revision.getchildren()
        for tag, functions in tags.iteritems():
            xml_node = xml.retrieve_xml_node(elements, tag)
            for var, function in functions.iteritems():
                vars[var] = function(xml_node, kwargs)

        #print '%s\t%s\t%s\t%s\t' % (vars['article'], vars['contributor'], vars['timestamp'], vars['bot'])
        if vars['bot'] == 0 and vars['editor'] != -1 and vars['editor'] != None:
            vars.pop('bot')
            vars['date'] = utils.convert_timestamp_to_date(vars['date'])
            data_queue.put(vars)
        vars = {}


def parse_editors(xml_queue, data_queue, pbar, bots, **kwargs):
    '''
    @xml_queue contains the filenames of the files to be parsed
    @data_queue is an instance of Queue where the extracted data is stored for 
    further processing
    @pbar is an instance of progressbar to display the progress
    @bots is a list of id's of known Wikipedia bots
    @debug is a flag to indicate whether the function is called for debugging.
    
    Output is the data_queue that will be used by store_editors() 
    '''
    file_location = os.path.join(settings.XML_FILE_LOCATION, kwargs.get('language', 'en'))
    debug = kwargs.get('debug', None)
    if settings.DEBUG:
        messages = {}
        vars = {}
    
    while True:
        try:
            if debug:
                file = xml_queue
            else:
                file = xml_queue.get(block=False)
            if file == None:
                print 'Swallowed a poison pill'
                break
            data = xml.read_input(utils.create_txt_filehandle(file_location,
                                                      file, 'r',
                                                      encoding=settings.ENCODING))
            for raw_data in data:
                xml_buffer = cStringIO.StringIO()
                raw_data.insert(0, '<?xml version="1.0" encoding="UTF-8" ?>\n')

                try:
                    raw_data = ''.join(raw_data)
                    xml_buffer.write(raw_data)
                    elem = cElementTree.XML(xml_buffer.getvalue())
                    output_editor_information(elem, data_queue, bots=bots)
                except SyntaxError, error:
                    print error
                    '''
                    There are few cases with invalid tokens, they are fixed
                    here and then reinserted into the XML DOM
                    data = convert_html_entities(xml_buffer.getvalue())
                    elem = cElementTree.XML(data)
                    output_editor_information(elem)
                    '''
                    if settings.DEBUG:
                        utils.track_errors(xml_buffer, error, file, messages)
                except UnicodeEncodeError, error:
                    print error
                    if settings.DEBUG:
                        utils.track_errors(xml_buffer, error, file, messages)
                except MemoryError, error:
                    print file, error
                    print raw_data[:12]
                    print 'String was supposed to be %s characters long' % sum([len(raw) for raw in raw_data])

            data_queue.put('NEXT')
            if pbar:
                print file, xml_queue.qsize(), data_queue.qsize()
                #utils.update_progressbar(pbar, xml_queue)
            if debug:
                break

            while True:
                if data_queue.qsize() < 100000:
                    break
                else:
                    time.sleep(10)
                    print 'Still sleeping, queue is %s items long' % data_queue.qsize()

        except Empty:
            break

    #for x in xrange(4):
    data_queue.put(None)

    if settings.DEBUG:
        utils.report_error_messages(messages, parse_editors)


def store_editors(data_queue, pids, dbname):
    '''
    @data_queue is an instance of Queue containing information extracted by
    parse_editors()
    @pids is a list of PIDs used to check if other processes are finished
    running
    @dbname is the name of the MongoDB collection where to store the information.
    '''
    mongo = db.init_mongo_db(dbname)
    collection = mongo['editors']
    mongo.collection.ensure_index('editor')
    editor_cache = cache.EditorCache(collection)
    while True:
        try:
            edit = data_queue.get(block=False)
            data_queue.task_done()
            if edit == None:
                print 'Swallowing poison pill'
                break
            elif edit == 'NEXT':
                editor_cache.add('NEXT', '')
            else:
                contributor = edit['editor']
                value = {'date': edit['date'], 'article': edit['article']}
                editor_cache.add(contributor, value)
                #collection.update({'editor': contributor}, {'$push': {'edits': value}}, True)
                #'$inc': {'edit_count': 1},

        except Empty:
            '''
            This checks whether the Queue is empty because the preprocessors are
            finished or because this function is faster in emptying the Queue
            then the preprocessors are able to fill it. If the preprocessors
            are finished and this Queue is empty than break, else wait for the
            Queue to fill.
            '''
            pass

    print 'Emptying entire cache.'
    editor_cache.store()
    print 'Time elapsed: %s and processed %s items.' % (datetime.datetime.now() - editor_cache.init_time, editor_cache.cumulative_n)


def load_bot_ids():
    '''
    Loader function to retrieve list of id's of known Wikipedia bots. 
    '''
    ids = {}
    mongo = db.init_mongo_db('bots')
    bots = mongo['ids']
    cursor = bots.find()
    for bot in cursor:
        ids[bot['id']] = bot['name']
    return ids


def run_parse_editors(dbname, language):
    ids = load_bot_ids()
    kwargs = {'bots': ids,
              'dbname': dbname,
              'pbar': True,
              'nr_input_processors': 1,
              'nr_output_processors': 1,
              'language': language,
              }
    chunks = {}
    file_location = os.path.join(settings.XML_FILE_LOCATION, language)
    files = utils.retrieve_file_list(file_location, 'xml')
    parts = int(round(float(len(files)) / settings.NUMBER_OF_PROCESSES, 0))
    a = 0
    for x in xrange(settings.NUMBER_OF_PROCESSES):
        b = a + parts
        chunks[x] = files[a:b]
        a = (x + 1) * parts


    for x in xrange(settings.NUMBER_OF_PROCESSES):
        pc.build_scaffolding(pc.load_queue, parse_editors, chunks[x], store_editors, True, **kwargs)


def debug_parse_editors(dbname):
    q = JoinableQueue()
    #edits = db.init_mongo_db('editors')
    parse_editors('en\\522.xml', q, None, None, True)
    store_editors(q, [], dbname)


if __name__ == "__main__":
    #debug_parse_editors('test')
    run_parse_editors('test', 'en')
    pass
