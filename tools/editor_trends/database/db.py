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

import sys
import pymongo
from bson.code import Code

if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
settings = settings.Settings()
import file_utils


def init_mongo_db(dbname):
    connection = pymongo.Connection()
    db = connection[dbname]
    return db


def drop_collection(dbname, collection):
    db = init_mongo_db(dbname)
    db.drop_collection(collection)


def get_collections(dbname):
    db = init_mongo_db(dbname)
    return db.collection_names()


def count_records(dbname, collection):
    db = init_mongo_db(dbname)
    return db[collection].count()


def cleanup_database(dbname, logger, endswith=None):
    coll = get_collections(dbname)
    for c in coll:
        if not c.startswith('system'):
            if endswith != None and c.endswith(endswith):
                drop_collection(dbname, c)
                logger.debug('Deleting collection %s from database %s.' % (c, dbname))


def remove_documents_from_mongo_db(collection, ids):
    collection.remove(ids)


def add_index_to_collection(db, collection, key):
    '''
    @db is the name of the mongodb 
    @collection is the name of the 'table' in mongodb
    @key name of the field to create the index
    '''

    mongo = init_mongo_db(db)
    collection = mongo[collection]
    mongo.collection.create_index(key)
    mongo.collection.ensure_index(key)


def run_query(dbname, collection, var, qualifier=None):
    mongo = init_mongo_db(dbname)
    collection = mongo[collection]
    if qualifier == 'min':
        return collection.find().sort(var, pymongo.ASCENDING).limit(1)[0]
    elif qualifier == 'max':
        return collection.find().sort(var, pymongo.DESCENDING).limit(1)[0]
    else:
        return collection.find({var: 1})


def stringify_keys(obj):
    '''
    @obj should be a dictionary where the keys are not yet strings. this function
    is called just prior any insert / update query in mongo because mongo only
    accepts strings as keys.
    '''
    d = {}
    for o in obj:
        if isinstance(obj[o], dict):
        #if type(obj[o]) == type({}):
            obj[o] = stringify_keys(obj[o])
        d[str(o)] = obj[o]
    return d


def retrieve_min_value(dbname, collection, var):
    mongo = init_mongo_db(dbname)
    coll = mongo[collection]
    emit = 'function () {emit(this.editor, this.edit_count);}'
    map = Code(emit)
    reduce = Code("function()")
#    reduce = Code("""reduce = function (key, value) {
#                        return Math.max(value);
#                        }
#                    """)
    cursor = coll.map_reduce(map, reduce)

    data = []
    for c in cursor.find():
        data.append(c)
    return data


def retrieve_max_value(dbname, collection, var):
    pass

def retrieve_distinct_keys(dbname, collection, field, force_new=False):
    #mongo = init_mongo_db(dbname)
    #editors = mongo[collection]
    #ids = retrieve_distinct_keys_mapreduce(editors, field)
    '''
    TODO: figure how big the index is and then take appropriate action, index 
    < 4mb just do a distinct query, index > 4mb do a map reduce.
    '''
    if force_new == False and file_utils.check_file_exists(settings.binary_location,
                                                '%s_%s.bin' % (dbname, field)):
        ids = file_utils.load_object(settings.binary_location, '%s_%s.bin' % (dbname, field))
    else:
        mongo = init_mongo_db(dbname)
        editors = mongo[collection]
        #index_size = mongo.stats()
        if editors.count () < 200000:   #TODO this is a bit arbitrary, should check if index > 4Mb.
            ids = editors.distinct(field)
        else:
            #params = {}
            #params['size'] = 'size'
            #size = editors.find_one({'size': 1})
            ids = retrieve_distinct_keys_mapreduce(editors, field)
        file_utils.store_object(ids, settings.binary_location, '%s_%s.bin' % (dbname, field))
    return ids


def retrieve_distinct_keys_mapreduce(collection, field):
    emit = 'function () { emit(this.%s, 1)};' % field
    map = Code(emit)

    reduce = Code("function()")

    ids = []
    cursor = collection.map_reduce(map, reduce)
    for c in cursor.find():
        ids.append(c['_id'])
    return ids


def debug():
    #retrieve_distinct_keys('enwiki', 'editors_dataset', 'editor')
    retrieve_min_value('enwiki', 'editors_dataset', 'new_wikipedian')


if __name__ == '__main__':
    debug()
