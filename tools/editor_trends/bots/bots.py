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
__date__ = '2010-11-25'
__version__ = '0.1'


import os
import cStringIO
import multiprocessing
import xml.etree.cElementTree as cElementTree
import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()
from wikitree import xml
from database import db
from utils import utils
from utils import process_constructor as pc
from etl import models
import models as botmodels

try:
    import psyco
    psyco.full()
except ImportError:
    pass


def read_bots_csv_file(manager, location, filename, encoding):
    '''
    Constructs a dictionary from Bots.csv
    key is language
    value is a list of bot names
    '''
    bot_dict = manager.dict()
    for line in utils.read_data_from_csv(location, filename, encoding):
        line = utils.clean_string(line)
        language, bots = line.split(',')
        bots = bots.split('|')
        for bot in bots:
            if bot not in bot_dict:
                b = botmodels.Bot(bot)
                b.id = None
            else:
                b = bot_dict[bot]
            b.projects.append(language)
            bot_dict[bot] = b
    return bot_dict


def retrieve_bots():
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


def store_bots():
    '''
    This file reads the results from the lookup_bot_userid function and stores
    it in a MongoDB collection. 
    '''
    bots = read_bots_csv_file(settings.csv_location, 'bots_ids.csv', settings.encoding)
    mongo = db.init_mongo_db('bots')
    collection = mongo['ids']
    db.remove_documents_from_mongo_db(collection, None)
    for id, name in ids.iteritems():
        collection.insert({'id': int(id), 'name': name, 'language': language})

    print 'Stored %s bots' % collection.count()


def convert_object_to_dict(obj, exclude=[]):
    '''
    @obj is an arbitray object where the properties need to be translated to
    keys and values to ease writing to a csv file. 
    '''
    d = {}
    for kw in obj.__dict__.keys():
        if kw not in exclude:
            d[kw] = getattr(obj, kw)
    return d


def lookup_bot_userid(xml_nodes, fh, **kwargs):
    '''
    This function is used to find the id's belonging to the different bots that
    are patrolling the Wikipedia sites.
    @xml_nodes is a list of xml elements that need to be parsed
    @fh is the file handle to write the results
    @bots is a dictionary containing the names of the bots to lookup
    '''
    lock = kwargs.get('lock')
    bots = kwargs.get('bots')
    if settings.debug:
        messages = {}

    revisions = xml_nodes.findall('revision')
    for revision in revisions:
        contributor = xml.retrieve_xml_node(revision, 'contributor')
        username = contributor.find('username')
        if username == None:
            continue
        username = xml.extract_text(username, None)
        #print username.encode('utf-8')
        if username in bots and bots[username].verified == True:
            id = contributor.find('id')
            id = xml.extract_text(id, None)
            bot = bots[username]
            bot_dict = convert_object_to_dict(bot, exclude=['time', 'name', 'written'])
            bot_dict['_username'] = username
            bot_dict['id'] = id
            
            if not hasattr(bot, 'written'):
                lock.acquire()
                utils.write_dict_to_csv(bot_dict, fh, write_key=False)
                lock.release()
            bot.written = True            
            #bots.pop(username)
            #if bots == {}:
            #    print 'Found id numbers for all bots.'
            #    return 'break'
            #print username.encode('utf-8')
        name = username.lower()
        if name.find('bot') > -1:
            bot = bots.get(username, botmodels.Bot(username))
            if bot not in bots:
                bot.verified = False
            timestamp = revision.find('timestamp').text
            if timestamp != None:
                timestamp = utils.convert_timestamp_to_datetime_naive(timestamp)
                bot.time[str(timestamp.year)].append(timestamp)
                bots[username] = bot

    #bot = bots.get('PseudoBot')
    #bot.hours_active()
    #bot.avg_lag_between_edits()
    if settings.debug:
        utils.report_error_messages(messages, lookup_bot_userid)




def bot_launcher(language_code, project, single=False):
    '''
    This function sets the stage to launch bot id detection and collecting data
    to discover new bots. 
    '''
    utils.delete_file(settings.csv_location, 'bots_ids.csv')
    location = os.path.join(settings.input_location, language_code, project)
    input = os.path.join(location, 'chunks')

    files = utils.retrieve_file_list(input, 'xml', mask=None)
    input_queue = pc.load_queue(files, poison_pill=True)
    tasks = multiprocessing.JoinableQueue()
    manager = multiprocessing.Manager()
    bots = manager.dict()
    lock = manager.Lock()
    bots = read_bots_csv_file(manager, settings.csv_location, 'Bots.csv', settings.encoding)

    for file in files:
        tasks.put(models.XMLFile(input, settings.csv_location, file, bots, lookup_bot_userid, 'bots_ids.csv', lock=lock))

    if single:
        task = tasks.get(block=False)
        task()
    else:
        bot_launcher_multi(tasks)
    
    utils.store_object(bots, settings.binary_location, 'bots.bin')
    bot_training_dataset(bots)
    if bots != {}:
        print 'The script was unable to retrieve the user id\s for the following %s bots:\n' % len(bots)
        keys = bots.keys()
        for key in keys:
            print '%s' % key
    
    store_bots()


def bot_training_dataset(bots):
    fh = utils.create_txt_filehandle(settings.csv_location, 'training_bots.csv', 'w', settings.encoding)
    keys = bots.keys()
    for key in keys:
        bot = bots.get(key)
        bot.hours_active()
        bot.avg_lag_between_edits()
        bot.write_training_dataset(fh)
        
    fh.close()
    
    
def bot_launcher_multi(tasks):
    '''
    This is the launcher that uses multiprocesses. 
    '''
    consumers = [models.XMLFileConsumer(tasks, None) for i in xrange(settings.number_of_processes)]
    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    tasks.join()


def bot_detector_launcher():
    bots = retrieve_bots()



if __name__ == '__main__':
    language_code = 'en'
    project = 'wiki'
    bot_launcher(language_code, project, single=False)
