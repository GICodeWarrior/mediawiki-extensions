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
__date__ = '2011-02-06'
__version__ = '0.1'


import bz2
import cStringIO
import hashlib
import codecs
import re
import sys
import progressbar
from multiprocessing import JoinableQueue, Process, cpu_count
from xml.etree.cElementTree import fromstring, dump
from collections import deque

try:
    import pycassa
except ImportError:
    print 'I am not going to use Cassandra today, it\'s my off day.'

if '..' not in sys.path:
    sys.path.append('..')

from database import db
from bots import detector
from utils import file_utils
import extracter

try:
    import psyco
    psyco.full()
except ImportError:
    print 'and psyco is having an off day as well...'

RE_CATEGORY = re.compile('\(.*\`\,\.\-\:\'\)')


class Buffer:
    def __init__(self, storage):
        assert storage == 'cassandra' or storage == 'mongo', \
            'Valid storage options are cassandra and mongo.'
        self.storage = storage
        self.revisions = []
        self.setup_db()

    def setup_db(self):
        if self.storage == 'cassandra':
            pass
        else:
            self.db = db.init_mongo_db('enwiki')
            self.collection = self.db['kaggle']

    def add(self, revision):
        self.revisions.append(revision)
        if len(self.revisions) == 100:
            self.store()

    def empty(self):
        self.store()

    def store(self):
        if self.storage == 'cassandra':
            print 'insert into cassandra'
        else:
            print 'insert into mongo'


def extract_categories():
    '''
    Field 1: page id
    Field 2: name category
    Field 3: sort key
    Field 4: timestamp last change
    '''
    filename = 'C:\\Users\\diederik.vanliere\\Downloads\\enwiki-latest-categorylinks.sql'
    output = codecs.open('categories.csv', 'w', encoding='utf-8')
    fh = codecs.open(filename, 'r', encoding='utf-8')

    try:
        for line in fh:
            if line.startswith('INSERT INTO `categorylinks` VALUES ('):
                line = line.replace('INSERT INTO `categorylinks` VALUES (', '')
                line = line.replace("'", '')
                categories = line.split('),(')
                for category in categories:
                    category = category.split(',')
                    if len(category) == 4:
                        output.write('%s\t%s\n' % (category[0], category[1]))
    except UnicodeDecodeError, e:
        print e

    output.close()
    fh.close()


def extract_revision_text(revision):
    rev = revision.find('text')
    if rev != None:
        return rev.text.encode('utf-8')
    else:
        return None


def create_md5hash(revision):
    rev = extract_revision_text(revision)
    hash = {}
    if rev != None:
        m = hashlib.md5()
        m.update(rev)
        #echo m.digest()
        hash['hash'] = m.hexdigest()
    else:
        hash['hash'] = -1
    return hash


def calculate_delta_article_size(prev_size, revision):
    rev = extract_revision_text(revision)
    size = {}
    if prev_size == None:
        size['prev_size'] = 0
        size['cur_size'] = len(rev)
    else:
        size['prev_size'] = prev_size
        delta = len(rev) - prev_size
        prev_size = len(rev)
        size['cur_size'] = delta
    return size


def parse_contributor(contributor, bots):
    username = extracter.extract_username(contributor)
    user_id = extracter.extract_contributor_id(contributor)
    bot = extracter.determine_username_is_bot(contributor, bots=bots)
    contributor = {}
    contributor['username'] = username
    contributor['bot'] = bot
    if user_id != None:
        contributor.update(user_id)
    else:
        contribuor = False
    return contributor


def determine_namespace(title):
    namespaces = {'User': 2,
                  'Talk': 1,
                  'User Talk': 3,
                  }
    ns = {}
    if title.text != None:
        title = title.text
        title = title.split(':')
        if len(title) == 1:
           ns['namespace'] = 0
        elif len(title) == 2:
            if title[0] in namespaces:
                ns['namespace'] = namespaces[title[0]]
            else:
                ns = False #article does not belong to either the main namespace, user, talk or user talk namespace.
    else:
        ns = False
    return ns


def prefill_row(title, article_id, namespace):
    row = {}
    row['title'] = title.text
    row['article_id'] = article_id
    row.update(namespace)
    return row


def is_revision_reverted(hash_cur, hashes):
    revert = {}
    if hash_cur in hashes:
        revert['revert'] = 1
    else:
        revert['revert'] = 0
    return revert


def create_variables(result_queue, storage):
    bots = detector.retrieve_bots('en')
    buffer = Buffer(storage)
    while True:
        try:
            article = result_queue.get(block=True)
            result_queue.task_done()
            if article == None:
                break
            article = fromstring(article)
            title = article.find('title')
            namespace = determine_namespace(title)
            if namespace != False:
                prev_size = None
                revisions = article.findall('revision')
                article_id = article.find('id').text
                hashes = deque(maxlen=100)
                for revision in revisions:
                    row = prefill_row(title, article_id, namespace)
                    if revision == None:
                        continue

                    contributor = revision.find('contributor')
                    contributor = parse_contributor(contributor, bots)
                    if not contributor:
                        #editor is anonymous, ignore
                        continue

                    row.update(contributor)
                    revision_id = revision.find('id')
                    revision_id = extracter.extract_revision_id(revision_id)
                    row['revision_id'] = revision_id


                    hash = create_md5hash(revision)
                    revert = is_revision_reverted(hash['hash'], hashes)
                    hashes.append(hash['hash'])
                    size = calculate_delta_article_size(prev_size, revision)

                    row.update(hash)
                    row.update(size)
                    row.update(revert)
                    print row
    #                if row['username'] == None:
    #                    contributor = revision.find('contributor')
    #                    attrs = contributor.getchildren()
    #                    for attr in attrs:
    #                        print attr.text
                    #print revision_id, hash, delta, prev_size\

                    buffer.add(row)

        except ValueError, e:
            print e
        except UnicodeDecodeError, e:
            print e
    buffer.empty()


def create_article(input_queue, result_queue):
    buffer = cStringIO.StringIO()
    parsing = False
    while True:
        filename = input_queue.get()
        input_queue.task_done()
        if filename == None:
            break
        filesize = file_utils.determine_filesize('', filename)
        pbar = progressbar.ProgressBar(maxval=filesize).start()
        for data in unzip(filename):
            if data.startswith('<page>'):
                parsing = True
            if parsing:
                buffer.write(data)
                if data == '</page>':
                    xml_string = buffer.getvalue()
                    if xml_string != None:
                        result_queue.put(xml_string)
                    buffer = cStringIO.StringIO()
                pbar.update(pbar.currval + len(data)) #is inaccurate!!!


    result_queue.put(None)
    print 'Finished parsing bz2 archives'


def unzip(filename):
    '''
    Filename should be a fully qualified path to the bz2 file that will be 
    decompressed. It will iterate line by line and yield this back to 
    create_article
    '''
    fh = bz2.BZ2File(filename, 'r')
    for line in fh:
        #line = line.decode('utf-8')
        line = line.strip()
        yield line
    fh.close()


def launcher():
    input_queue = JoinableQueue()
    result_queue = JoinableQueue()
    storage = 'cassandra'
    files = ['C:\\Users\\diederik.vanliere\\Downloads\\enwiki-latest-pages-articles1.xml.bz2']
    for file in files:
        input_queue.put(file)

    for x in xrange(cpu_count):
        input_queue.put(None)

    extracters = [Process(target=create_article, args=[input_queue, result_queue])
                  for x in xrange(cpu_count)]
    for extracter in extracters:
        extracter.start()

    creators = [Process(target=create_variables, args=[result_queue, storage])
                for x in xrange(cpu_count)]
    for creator in creators:
        creator.start()


    input_queue.join()
    result_queue.join()


if __name__ == '__main__':
    #extract_categories()
    launcher()
