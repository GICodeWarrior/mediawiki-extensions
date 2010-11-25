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

import os
import cStringIO
import xml.etree.cElementTree as cElementTree
import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()
from wikitree import xml
from database import db
from database import db_settings
from utils import utils
from utils import process_constructor as pc

try:
    import psyco
    psyco.full()
except ImportError:
    pass


def read_bots_csv_file(location, filename, encoding):
    '''
    Constructs a dictionary:
    key is language
    value is a list of bot names
    '''
    d = {}
    for line in utils.read_data_from_csv(location, filename, encoding):
        line = utils.clean_string(line)
        language, bots = line.split(',')
        bots = bots.split('|')
        for bot in bots:
            if bot not in d:
                d[bot] = {}
                d[bot]['id'] = None
                d[bot]['languages'] = []
            d[bot]['languages'].append(language)
    return d


def store_bots():
    bots = read_bots_csv_file(settings.csv_location, 'Bots.csv', settings.encoding)
    mongo = db.init_mongo_db('bots')
    collection = mongo['ids']
    db.remove_documents_from_mongo_db(collection, None)
    for id, name in ids.iteritems():
        collection.insert({'id': int(id), 'name': name, 'language': language})

    print 'Stored %s bots' % collection.count()


def lookup_bot_userid(input_queue, language_code, project, bots):
    '''
    This function is used to find the id's belonging to the different bots that
    are patrolling the Wikipedia sites.
    @input_queue contains a list of xml files to parse
    @bots is a dictionary containing the names of the bots to lookup
    '''
    if settings.debug:
        messages = {}
    
    location = os.path.join(settings.input_location, language_code, project, 'chunks')
    fh = utils.create_txt_filehandle(settings.csv_location, 'bots_ids.csv', 'w', settings.encoding)
    
    while True:
        file = input_queue.get(block=False)
        if file == None:
            break
        data = xml.read_input(utils.create_txt_filehandle(location, 
                                                          file, 
                                                          'r', 
                                                          settings.encoding))

        for raw_data in data:
            xml_buffer = cStringIO.StringIO()
            raw_data.insert(0, '<?xml version="1.0" encoding="UTF-8" ?>\n')
            raw_data = ''.join(raw_data)
            raw_data = raw_data.encode('utf-8')
            xml_buffer.write(raw_data)
            
            try:
                xml_nodes = cElementTree.XML(xml_buffer.getvalue())
                revisions = xml_nodes.findall('revision')
                for revision in revisions:
                    contributor = xml.retrieve_xml_node(revision, 'contributor')
                    username = contributor.find('username')
                    if username == None:
                        continue
                    username = xml.extract_text(username, None)
                    #print username.encode('utf-8')
                    if username in bots:
                        id = contributor.find('id')
                        id = xml.extract_text(id, None)
                        #print username.encode('utf-8'), id
                        bot = bots[username]
                        bot['_username'] = username
                        bot['id'] = id
                        utils.write_dict_to_csv(bot, fh, write_key=False)
                        bots.pop(username)
                        if bots == {}:
                            print 'Found id numbers for all bots.'
                            return

            except Exception, error:
                print error
                if settings.debug:
                    messages = utils.track_errors(xml_buffer, error, file,
                        messages)
    fh.close()
    
    if settings.debug:
        utils.report_error_messages(messages, lookup_username)

def bot_launcher(language_code, project):
    bots = read_bots_csv_file(settings.csv_location, 'Bots.csv', settings.encoding)
    files = utils.retrieve_file_list(os.path.join(settings.input_location, language_code, project, 'chunks'), 'xml', mask=None)
    input_queue = pc.load_queue(files, poison_pill=True)
    lookup_bot_userid(input_queue, language_code, project, bots)


if __name__ == '__main__':
    language_code = 'en'
    project = 'wiki'
    bot_launcher(language_code, project)
