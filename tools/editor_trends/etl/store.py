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
__date__ = '2011-01-04'
__version__ = '0.1'

from Queue import Empty
import multiprocessing
import os
import progressbar

from utils import file_utils
from utils import text_utils
from database import cache
from database import db
from classes import consumers


class Storer(consumers.BaseConsumer):
    '''
    This function is called by multiple consumers who each take a sorted 
    file and create a cache object. If the number of edits made by an 
    editor is above the treshold then the cache object stores the data in 
    Mongo, else the data is discarded.
    The treshold is currently more than 9 edits and is not yet configurable. 
    '''
    def run(self):
        mongo = db.init_mongo_db(self.rts.dbname)
        collection = mongo[self.rts.editors_raw]

        editor_cache = cache.EditorCache(collection)
        prev_editor = -1
        while True:
            try:
                filename = self.tasks.get(block=False)
            except Empty:
                break

            self.tasks.task_done()
            if filename == None:
                self.result.put(None)
                break

            fh = file_utils.create_txt_filehandle(self.rts.sorted, filename,
                                                  'r', self.rts.encoding)
            for line in file_utils.read_raw_data(fh):
                if len(line) == 12:
                    editor = line[2]
                    #print 'Parsing %s' % contributor
                    if prev_editor != editor and prev_editor != -1:
                        editor_cache.add(prev_editor, 'NEXT')

                    data = self.prepare_data(line)

                    editor_cache.add(editor, data)
                    prev_editor = editor
            fh.close()
            self.result.put(True)

    def prepare_data(self, line):
        article_id = int(line[1])
        username = line[3].encode(self.rts.encoding)
        ns = int(line[4])
        date = text_utils.convert_timestamp_to_datetime_utc(line[6])
        md5 = line[7]
        revert = int(line[8])
        bot = int(line[9])
        cur_size = int(line[10])
        delta = int(line[11])

        data = {'date': date,
                 'article': article_id,
                 'username': username,
                 'ns': ns,
                 'hash': md5,
                 'revert':revert,
                 'cur_size':cur_size,
                 'delta':delta,
                 'bot':bot
                }
        return data

def store_articles(rts):
    '''
    This function reads titles.csv and stores it in a separate collection.
    Besides containing the title of an article, it also includes:
    * namespace
    * category (if any)
    * article id
    '''
    mongo = db.init_mongo_db(rts.dbname)
    db.drop_collection(rts.dbname, rts.articles_raw)
    collection = mongo[rts.articles_raw]
    db.add_index_to_collection(rts.dbname, rts.articles_raw, 'id')
    db.add_index_to_collection(rts.dbname, rts.articles_raw, 'title')
    db.add_index_to_collection(rts.dbname, rts.articles_raw, 'ns')
    db.add_index_to_collection(rts.dbname, rts.articles_raw, 'category')

    location = os.path.join(rts.input_location, rts.language.code, rts.project.name, 'txt')
    fh = file_utils.create_txt_filehandle(location, 'titles.csv', 'r', rts.encoding)
    print 'Storing article titles...'
    for line in fh:
        line = line.strip()
        #print line.encode('utf-8')
        line = line.split('\t')
        title = line[-1]
        article_id = line[0]
        ns = line[1]
        if len(line) == 4:
            category = line[2]
            collection.insert({'id':article_id, 'title':title,
                               'category': category, 'ns': ns})
        else:
            collection.insert({'id':article_id, 'title':title, 'ns': ns})
    fh.close()
    print 'Done...'


def launcher(rts):
    '''
    This is the main entry point and creates a number of workers and launches
    them. 
    '''
    store_articles(rts)
    print 'Input directory is: %s ' % rts.sorted
    db.drop_collection(rts.dbname, rts.editors_dataset)
    mongo = db.init_mongo_db(rts.dbname)
    coll = mongo[rts.editors_raw]
    coll.ensure_index('editor')
    coll.create_index('editor')

    files = file_utils.retrieve_file_list(rts.sorted, 'csv')
    pbar = progressbar.ProgressBar(maxval=len(files)).start()

    tasks = multiprocessing.JoinableQueue()
    result = multiprocessing.JoinableQueue()

    consumers = [Storer(rts, tasks, result) for
                 x in xrange(rts.number_of_processes)]

    for filename in files:
        tasks.put(filename)

    for x in xrange(rts.number_of_processes):
        tasks.put(None)

    for w in consumers:
        w.start()

    ppills = rts.number_of_processes
    while True:
        while ppills > 0:
            try:
                res = result.get(block=True)
                if res == True:
                    pbar.update(pbar.currval + 1)
                else:
                    ppills -= 1
            except Empty:
                pass
        break

    tasks.join()


if __name__ == '__main__':
    pass
