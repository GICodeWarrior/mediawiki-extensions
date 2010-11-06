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

from multiprocessing import Queue
from Queue import Empty

import progressbar

import settings
from utils import models, utils
from database import db
from utils import process_constructor as pc

try:
    import psyco
    psyco.full()
except ImportError:
    pass


def retrieve_editor_ids_mongo(dbname, collection):
    if utils.check_file_exists(settings.BINARY_OBJECT_FILE_LOCATION,
                               retrieve_editor_ids_mongo):
        ids = utils.load_object(settings.BINARY_OBJECT_FILE_LOCATION,
                                retrieve_editor_ids_mongo)
    else:
        mongo = db.init_mongo_db(dbname)
        editors = mongo[collection]
        ids = editors.distinct('editor')
        utils.store_object(ids, settings.BINARY_OBJECT_FILE_LOCATION, retrieve_editor_ids_mongo)
    return ids


def expand_edits(edits):
    data = []
    for edit in edits:
        data.append(edit['date'])
    return data


def expand_observations(obs, vars_to_expand):
    for var in vars_to_expand:
        if var == 'edits':
            obs[var] = expand_edits(obs[var])
        elif var == 'edits_by_year':
            keys = obs[var].keys()
            keys.sort()
            edits = []
            for key in keys:
                edits.append(str(obs[var][key]))
            obs[var] = edits
    return obs


def expand_headers(headers, vars_to_expand, obs):
    for var in vars_to_expand:
        l = len(obs[var])
        pos = headers.index(var)
        for i in xrange(l):
            if var.endswith('year'):
                suffix = 2001 + i
            elif var.endswith('edits'):
                suffix = 1 + i
            headers.insert(pos+i, '%s_%s' % (var, suffix))
        headers.remove(var)
    return headers
            
        
def generate_editor_dataset(input_queue, data_queue, pbar, kwargs):
    debug = kwargs.pop('debug')
    dbname = kwargs.pop('dbname')
    mongo = db.init_mongo_db(dbname)
    editors = mongo['dataset']
    name = dbname + '_editors.csv'
    fh = utils.create_txt_filehandle(settings.DATASETS_FILE_LOCATION, name, 'a', settings.ENCODING)
    x = 0
    vars_to_expand = ['edits', 'edits_by_year']
    while True:
        try:
            if debug:
                id = u'99797'
            else:
                id = input_queue.get(block=False)

            print input_queue.qsize()

            obs = editors.find_one({'editor': id})
            obs = expand_observations(obs, vars_to_expand)
            if x == 0:
                headers = obs.keys()
                headers.sort()
                headers = expand_headers(headers, vars_to_expand, obs)
                utils.write_list_to_csv(headers, fh)
                fh.write('\n')
            data = []
            keys = obs.keys()
            keys.sort()
            for key in keys:
                data.append(obs[key])
            utils.write_list_to_csv(data, fh)
            fh.write('\n')

            x += 1
        except Empty:
            break
    fh.close()


def retrieve_edits_by_contributor_launcher():
    pc.build_scaffolding(pc.load_queue, retrieve_edits_by_contributor, 'contributors')


def debug_retrieve_edits_by_contributor_launcher():
    kwargs = {'debug': False,
              'dbname': 'enwiki',
              }
    ids = retrieve_editor_ids_mongo('enwiki', 'editors')
    input_queue = pc.load_queue(ids)
    q = Queue()
    generate_editor_dataset(input_queue, q, False, kwargs)


def generate_editor_dataset_launcher(dbname):
    kwargs = {'nr_input_processors': 1,
              'nr_output_processors': 1,
              'debug': False,
              'dbname': dbname,
              }
    ids = retrieve_editor_ids_mongo(dbname, 'editors')
    chunks = {}
    parts = int(round(float(len(ids)) / 1, 0))
    a = 0
    for x in xrange(settings.NUMBER_OF_PROCESSES):
        b = a + parts
        chunks[x] = ids[a:b]
        a = (x + 1) * parts
        if a >= len(ids):
            break
        
    pc.build_scaffolding(pc.load_queue, generate_editor_dataset, chunks, False, False, **kwargs)


def generate_editor_dataset_debug(dbname):
    ids = retrieve_editor_ids_mongo(dbname, 'editors')
    input_queue = pc.load_queue(ids)
    #write_dataset(input_queue, [], 'enwiki')
    kwargs = {'nr_input_processors': 1,
              'nr_output_processors': 1,
              'debug': True,
              'dbname': dbname,
              }
    generate_editor_dataset(input_queue, False, False, kwargs)


if __name__ == '__main__':
    #generate_editor_dataset_debug('test')
    generate_editor_dataset_launcher('test')
    #debug_retrieve_edits_by_contributor_launcher()
