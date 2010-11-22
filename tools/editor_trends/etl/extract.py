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
from statistics import dataset
from utils import process_constructor as pc


try:
    import psyco
    psyco.full()
except ImportError:
    pass

class XMLFileConsumer(models.BaseConsumer):

    def run(self):
        while True:
            new_xmlfile = self.task_queue.get()
            self.task_queue.task_done()
            if new_xmlfile == None:
                print 'Swallowed a poison pill'
                break
            new_xmlfile()

class XMLFile(object):
    def __init__(self, input, output, file, bots, **kwargs):
        self.file = file
        self.input = input
        self.output = output
        self.bots = bots
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])

    def create_file_handle(self):
        if self.destination == 'file':
            self.name = self.file[:-4] + '.txt'
            self.fh = utils.create_txt_filehandle(self.output, self.name, 'w', settings.encoding)

    def __str__(self):
        return '%s' % (self.file)

    def __call__(self):
        if settings.debug:
            messages = {}
            vars = {}

        data = xml.read_input(utils.create_txt_filehandle(self.input,
                                                      self.file, 'r',
                                                      encoding=settings.encoding))
        self.create_file_handle()
        for raw_data in data:
            xml_buffer = cStringIO.StringIO()
            raw_data.insert(0, '<?xml version="1.0" encoding="UTF-8" ?>\n')

            try:
                raw_data = ''.join(raw_data)
                xml_buffer.write(raw_data)
                elem = cElementTree.XML(xml_buffer.getvalue())
                output_editor_information(elem, self.fh, bots=self.bots, destination=self.destination)
            except SyntaxError, error:
                print error
                '''
                There are few cases with invalid tokens, they are ignored
                '''
                if settings.debug:
                    utils.track_errors(xml_buffer, error, self.file, messages)
            except UnicodeEncodeError, error:
                print error
                if settings.debug:
                    utils.track_errors(xml_buffer, error, self.file, messages)
            except MemoryError, error:
                print self.file, error
                print raw_data[:12]
                print 'String was supposed to be %s characters long' % sum([len(raw) for raw in raw_data])

        if self.destination == 'queue':
            self.output.put('NEXT')
            while True:
                if self.output.qsize() < 100000:
                    break
                else:
                    time.sleep(10)
                    print 'Still sleeping, queue is %s items long' % self.output.qsize()

        else:
            self.fh.close()


        if self.destination == 'queue':
            data_queue.put(None)

        if settings.debug:
            utils.report_error_messages(messages, output_editor_information)



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


def extract_username(contributor, kwargs):
    for elem in contributor:
        if elem.tag == 'username':
            return elem.text    #.encode(settings.encoding)
    else:
        return None

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
                return elem.text.encode(settings.encoding)
            else:
                return - 1


def output_editor_information(elem, output, **kwargs):
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
    destination = kwargs.pop('destination')
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
            if destination == 'queue':
                output.put(vars)
                vars['date'] = utils.convert_timestamp_to_date(vars['date'])
            elif destination == 'file':
                data = []
                for head in headers:
                    data.append(vars[head])
                utils.write_list_to_csv(data, output)
        vars = {}


#def parse_editors(xml_queue, data_queue, **kwargs):
#    '''
#    @xml_queue contains the filenames of the files to be parsed
#    @data_queue is an instance of Queue where the extracted data is stored for 
#    further processing
#    @pbar is an instance of progressbar to display the progress
#    @bots is a list of id's of known Wikipedia bots
#    @debug is a flag to indicate whether the function is called for debugging.
#    
#    Output is the data_queue that will be used by store_editors() 
#    '''
#    input = kwargs.get('input', None)
#    output = kwargs.get('output', None)
#    debug = kwargs.get('debug', False)
#    destination = kwargs.get('destination', 'file')
#    bots = kwargs.get('bots', None)
#    pbar = kwargs.get('pbar', None)
#    if settings.debug:
#        messages = {}
#        vars = {}
#
#    while True:
#        try:
#            if debug:
#                file = xml_queue
#            else:
#                file = xml_queue.get(block=False)
#            if file == None:
#                print 'Swallowed a poison pill'
#                break
#
#            data = xml.read_input(utils.create_txt_filehandle(input,
#                                                      file, 'r',
#                                                      encoding=settings.encoding))
#            if destination == 'file':
#                name = file[:-4] + '.txt'
#                fh = utils.create_txt_filehandle(output, name, 'w', settings.encoding)
#            for raw_data in data:
#                xml_buffer = cStringIO.StringIO()
#                raw_data.insert(0, '<?xml version="1.0" encoding="UTF-8" ?>\n')
#
#                try:
#                    raw_data = ''.join(raw_data)
#                    xml_buffer.write(raw_data)
#                    elem = cElementTree.XML(xml_buffer.getvalue())
#                    output_editor_information(elem, fh, bots=bots, destination=destination)
#                except SyntaxError, error:
#                    print error
#                    '''
#                    There are few cases with invalid tokens, they are fixed
#                    here and then reinserted into the XML DOM
#                    data = convert_html_entities(xml_buffer.getvalue())
#                    elem = cElementTree.XML(data)
#                    output_editor_information(elem)
#                    '''
#                    if settings.debug:
#                        utils.track_errors(xml_buffer, error, file, messages)
#                except UnicodeEncodeError, error:
#                    print error
#                    if settings.debug:
#                        utils.track_errors(xml_buffer, error, file, messages)
#                except MemoryError, error:
#                    print file, error
#                    print raw_data[:12]
#                    print 'String was supposed to be %s characters long' % sum([len(raw) for raw in raw_data])
#            if destination == 'queue':
#                output.put('NEXT')
#                while True:
#                    if output.qsize() < 100000:
#                        break
#                    else:
#                        time.sleep(10)
#                        print 'Still sleeping, queue is %s items long' % output.qsize()
#
#            else:
#                fh.close()
#
#            if pbar:
#                print file, xml_queue.qsize()
#                #utils.update_progressbar(pbar, xml_queue)
#
#            if debug:
#                break
#
#        except Empty:
#            break
#
#    if destination == 'queue':
#        data_queue.put(None)
#
#    if settings.debug:
#        utils.report_error_messages(messages, parse_editors)


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


def run_parse_editors(location, **kwargs):
    bots = load_bot_ids()
    input = os.path.join(location, 'chunks')
    output = os.path.join(location, 'txt')
    settings.verify_environment([input, output])
    files = utils.retrieve_file_list(input, 'xml')
    kwargs['destination'] = 'file'
    
    
    tasks = multiprocessing.JoinableQueue()
    consumers = [XMLFileConsumer(tasks, None) for i in xrange(settings.number_of_processes)]
    for file in files:
        tasks.put(XMLFile(input, output, file, bots, **kwargs))
    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    print tasks.qsize()
    for w in consumers:
        w.start()

    tasks.join()

    #chunks = utils.split_list(files, settings.number_of_processes)
    #pc.build_scaffolding(pc.load_queue, parse_editors, chunks, False, False, **kwargs)


def debug_parse_editors(dbname):
    q = JoinableQueue()
    parse_editors('522.xml', q, None, None, debug=True, destination='file')
    store_editors(q, [], dbname)


if __name__ == "__main__":
    #debug_parse_editors('test2')
    run_parse_editors(os.path.join(settings.input_location, 'en', 'wiki'))
