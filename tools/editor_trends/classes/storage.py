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

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)'])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2011-04-05'
__version__ = '0.1'

import sys
from abc import ABCMeta, abstractmethod
if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
from classes import exceptions
settings = settings.Settings()
import file_utils

error = 0
try:
    import pymongo
    import bson
    from bson.code import Code
    from pymongo.errors import OperationFailure
except ImportError:
    error += 1
try:
    import pycassa
except ImportError:
    error += 1
if error == 2:
    raise exceptions.NoDatabaseProviderInstalled()


class AbstractDatabase:
    __metaclass__ = ABCMeta

    def __init__(self, dbname, collection):
        self.dbname = dbname
        self.collection = collection
        self.db = self.connect()

    def __repr__(self):
        return '%s:%s' % (self.dbname, self.collection)

    @abstractmethod
    def connect(self):
        '''Initializes a connection to a specific collection in a database'''

    @abstractmethod
    def drop_collection(self):
        '''Deletes a collection from a database'''

    @abstractmethod
    def add_index(self, key):
        '''Add index to a collection'''

    @abstractmethod
    def insert(self, data):
        '''Insert observation to a collection'''

    @abstractmethod
    def update(self, key, data):
        '''Update an observation in a collection'''

    @abstractmethod
    def find(self, key, qualifier=None):
        '''Find an observationi in a collection'''

    @abstractmethod
    def save(self, data):
        '''Saves an observation and returns the id from the db'''

    @abstractmethod
    def count(self):
        '''Counts the number of observations in a collection'''

class Mongo(AbstractDatabase):
    @classmethod
    def is_registrar_for(cls, storage):
        return storage == 'mongo'

    def connect(self):
        db = pymongo.Connection()
        return db[self.dbname]

    def save(self, data):
        assert isinstance(data, dict), 'You need to feed me dictionaries.'
        return self.db[self.collection].save(data)

    def insert(self, data, qualifiers=None):
        assert isinstance(data, dict), 'You need to feed me dictionaries.'
        data = self.stringify_keys(data)
        try:
            if qualifiers:
                self.db[self.collection].insert(data, qualifiers, safe=True)
            else:
                self.db[self.collection].insert(data, safe=True)
        except bson.errors.InvalidDocument, error:
            print error
            print 'BSON document too large, unable to store %s' % \
                (data.keys()[0])
        except OperationFailure, error:
            print 'It seems that you are running out of disk space. \
            Error message: %s' % error
            sys.exit(-1)

    def update(self, key, value, data):
        assert isinstance(data, dict), 'You need to feed me dictionaries.'
        self.db[self.collection].update({key: value}, data, upsert=True)

    def find(self, key=None, qualifier=None):
        if qualifier == 'min':
            return self.db[self.collection].find({
                key : {'$ne' : False}}).sort(key, pymongo.ASCENDING).limit(1)[0]
        elif qualifier == 'max':
            return self.db[self.collection].find({
                key : {'$ne' : False}}).sort(key, pymongo.DESCENDING).limit(1)[0]
        elif key != None:
            return self.db[self.collection].find({key: 1})
        else:
            return self.db[self.collection].find()

    def find_one(self, key, value):
        return self.db[self.collection].find_one({key: value})

    def drop_collection(self):
        self.db.drop_collection(self.collection)

    def add_index(self, key):
        self.db[self.collection].create_index(key)
        self.db[self.collection].ensure_index(key)

    def count(self):
        return self.db[self.collection].count()

    def retrieve_distinct_keys(self, key, force_new=False):
        '''
        TODO: figure out how big the index is and then take appropriate action, 
        index < 4mb just do a distinct query, index > 4mb do a map reduce.
        '''
        if force_new == False and \
            file_utils.check_file_exists(settings.binary_location, '%s_%s_%s.bin'
                                         % (self.dbname, self.collection, key)):
            ids = file_utils.load_object(settings.binary_location, '%s_%s_%s.bin'
                                         % (self.dbname, self.collection, key))
        else:
            #TODO this is a bit arbitrary, should check if index > 4Mb.
            if self.db[self.collection].count() < 200000:
                ids = self.db[self.collection].distinct(key)
            else:
                ids = self.retrieve_distinct_keys_mapreduce(key)
            file_utils.store_object(ids, settings.binary_location, \
                                    '%s_%s_%s.bin' % (self.dbname,
                                                      self.collection, key))
        return ids

    def retrieve_distinct_keys_mapreduce(self, key):
        emit = 'function () { emit(this.%s, 1)};' % key
        map = Code(emit)
        reduce = Code("function()")

        ids = []
        cursor = self.db[self.collection].map_reduce(map, reduce)
        for c in cursor.find():
            ids.append(c['_id'])
        return ids

    def stringify_keys(self, data):
        '''
        @data should be a dictionary where the keys are not yet strings. This 
        function is called just prior any insert / update query in mongo 
        because mongo only accepts strings as keys.
        '''
        new_data = {}
        for key, value in data.iteritems():
            if isinstance(value, dict):
                new_data[str(key)] = self.stringify_keys(value)
            else:
                new_data[str(key)] = value
        return new_data

    def start_server(self, port, path):
        default_port = 27017
        if settings.platform == 'Windows':
            p = subprocess.Popen([path, '--port %s', self.port, '--dbpath',
                                  'c:\data\db', '--logpath', 'c:\mongodb\logs'])
        elif settings.platform == 'Linux':
            subprocess.Popen([path, '--port %s' % port])
        elif settings.platform == 'OSX':
            raise exceptions.NotImplementedError
        else:
            raise exceptions.PlatformNotSupportedError(platform)


class Cassandra(AbstractDatabase):
    @classmethod
    def __init__(self):
        self.port = 9160
        self.host = '127.0.0.1'

    def is_registrar_for(cls, storage):
        return storage == 'cassandra'

    def install_schema(self, drop_first=False):
        sm = pycassa.system_manager.SystemManager('%s:%s' % (sef.host, self.port))
        if drop_first:
            sm.drop_keyspace(keyspace_name)

        sm.create_keyspace(keyspace_name, replication_factor=1)

        sm.create_column_family(self.dbname, self.collection,
                                comparator_type=pycassa.system_manager.UTF8_TYPE,
                                default_validation_class=pycassa.system_manager.UTF8_TYPE)

        sm.create_index(self.dbname, self.collection, 'article', pycassa.system_manager.UTF8_TYPE)
        sm.create_index(self.dbname, self.collection, 'username', pycassa.system_manager.UTF8_TYPE)
        sm.create_index(self.dbname, self.collection, 'user_id', pycassa.system_manager.LONG_TYPE)

    def connect(self):
        self.db = pycassa.connect(self.dbname)
        self.collection = pycassa.ColumnFamily(self.dbname, self.collection)

    def drop_collection(self):
        return

    def add_index(self, key):
        return

    def insert(self, data):
        return

    def update(self, key, data):
        return

    def find(self, key, qualifier=None):
        return

    def save(self, data):
        return

    def count(self):
        return


def Database(storage, dbname, collection):
  for cls in AbstractDatabase.__subclasses__():
    if cls.is_registrar_for(storage):
      return cls(dbname, collection)
  raise ValueError


if __name__ == '__main__':
    db = Database('mongo', 'wikilytics', 'zhwiki_editors_raw')
    ids = db.retrieve_distinct_keys('editor', force_new=True)
    #db.insert({'foo':'bar'})
    #db.update('foo', 'bar', {})
    #db.drop_collection()
    print db
