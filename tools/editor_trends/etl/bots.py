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


def create_bot_ids_db_mongo():
    ids = utils.create_dict_from_csv_file(add_id_to_botnames, settings.encoding)
    mongo = db.init_mongo_db('bots')
    collection = mongo['ids']

    db.remove_documents_from_mongo_db(collection, None)

    for id, name in ids.iteritems():
        collection.insert({'id': id, 'name': name})

    print collection.count()


def lookup_username(input_queue, result_queue, progressbar, bots, debug=False):
    '''
    This function is used to find the id's belonging to the different bots that
    are patrolling the Wikipedia sites.
    @input_queue contains a list of xml files to parse

    @result_queue should be set to false as the results are directly written to
    a csv file.

    @progressbar depends on settings

    @bots is a dictionary containing the names of the bots to lookup
    '''

    #if len(bots.keys()) == 1:
    bots = bots['bots']
    #print bots.keys()

    if settings.debug:
        messages = {}

    while True:
        if debug:
            file = input_queue
        else:
            file = input_queue.get(block=False)

        if file == None:
            break

        data = xml.read_input(utils.open_txt_file(settings.input_location +
                            file, 'r', encoding=settings.encoding))

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
                    username = xml.extract_text(username)
                    #print username.encode('utf-8')

                    if username in bots:
                        id = contributor.find('id')
                        id = xml.extract_text(id)
                        #print username.encode('utf-8'), id
                        utils.write_data_to_csv({username: [id]}, add_id_to_botnames, settings.encoding)
                        bots.pop(username)
                        if bots == {}:
                            print 'Mission accomplished'
                            return
            except Exception, error:
                print error
                if settings.debug:
                    messages = utils.track_errors(xml_buffer, error, file, 
                        messages)

    if settings.debug:
        utils.report_error_messages(messages, lookup_username)


if __name__ == '__main__':
    #debug()
    #add_id_to_botnames()
    create_bot_ids_db_mongo()
