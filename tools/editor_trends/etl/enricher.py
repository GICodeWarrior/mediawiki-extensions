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
from multiprocessing import JoinableQueue, Process, cpu_count, current_process
from xml.etree.cElementTree import fromstring
from collections import deque

if '..' not in sys.path:
    sys.path.append('..')

try:
    from database import cassandra
    import pycassa

except ImportError:
    print 'I am not going to use Cassandra today, it\'s my off day.'



from database import db
from bots import detector
from utils import file_utils
import extracter

RE_CATEGORY = re.compile('\(.*\`\,\.\-\:\'\)')


class Buffer:
    def __init__(self, storage, id):
        assert storage == 'cassandra' or storage == 'mongo' or storage == 'csv', \
            'Valid storage options are cassandra and mongo.'
        self.storage = storage
        self.revisions = {}
        self.comments = {}
        self.id = id
        self.keyspace_name = 'enwiki'
        self.keys = ['revision_id', 'article_id', 'id', 'namespace',
                     'title', 'timestamp', 'hash', 'revert', 'bot', 'prev_size',
                     'cur_size', 'delta']
        self.setup_storage()

    def setup_storage(self):
        if self.storage == 'cassandra':
            self.db = pycassa.connect(self.keyspace_name)
            self.collection = pycassa.ColumnFamily(self.db, 'revisions')

        elif self.storage == 'mongo':
            self.db = db.init_mongo_db(self.keyspace_name)
            self.collection = self.db['kaggle']

        else:
            kaggle_file = 'kaggle_%s.csv' % self.id
            comment_file = 'kaggle_comments_%s.csv' % self.id
            file_utils.delete_file('', kaggle_file, directory=False)
            file_utils.delete_file('', comment_file, directory=False)
            self.fh_main = codecs.open(kaggle_file, 'a', 'utf-8')
            self.fh_extra = codecs.open(comment_file, 'a', 'utf-8')

    def add(self, revision):
        self.stringify(revision)
        id = revision['revision_id']
        self.revisions[id] = revision
        if len(self.revisions) == 1000:
            self.store()
            self.clear()

    def stringify(self, revision):
        for key, value in revision.iteritems():
            try:
                value = str(value)
            except UnicodeEncodeError:
                value = value.encode('utf-8')
            revision[key] = value

    def empty(self):
        self.store()
        self.clear()
        if self.storage == 'csv':
            self.fh_main.close()
            self.fh_extra.close()

    def clear(self):
        self.revisions = {}
        self.comments = {}

    def store(self):
        if self.storage == 'cassandra':
            self.collection.batch_insert(self.revisions)
        elif self.storage == 'mongo':
            print 'insert into mongo'
        else:
            for revision in self.revisions.itervalues():
                values = []
                for key in self.keys:
                    values.append(revision[key].decode('utf-8'))

                value = '\t'.join(values) + '\n'
                row = '\t'.join([key, value])
                self.fh_main.write(row)

            for revision_id, comment in self.comments.iteritems():
                comment = comment.decode('utf-8')
                row = '\t'.join([revision_id, comment]) + '\n'
                self.fh_extra.write(row)


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
        if rev.text == None:
            rev = fix_revision_text(revision)
        return rev.text.encode('utf-8')
    else:
        return ''


def fix_revision_text(revision):
    if revision.text == None:
        revision.text = ''
    return revision


def create_md5hash(text):
    hash = {}
    if text != None:
        m = hashlib.md5()
        m.update(text)
        #echo m.digest()
        hash['hash'] = m.hexdigest()
    else:
        hash['hash'] = -1
    return hash


def calculate_delta_article_size(size, text):
    if 'prev_size' not in size:
        size['prev_size'] = 0
        size['cur_size'] = len(text)
        size['delta'] = len(text)
    else:
        size['prev_size'] = size['cur_size']
        delta = len(text) - size['prev_size']
        size['cur_size'] = len(text)
        size['delta'] = delta
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
        contributor = False
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


def create_variables(result_queue, storage, id):
    bots = detector.retrieve_bots('en')
    buffer = Buffer(storage, id)
    i = 0
    while True:
        article = result_queue.get(block=True)
        result_queue.task_done()
        if article == None:
            break
        i += 1
        article = fromstring(article)
        title = article.find('title')
        namespace = determine_namespace(title)
        if namespace != False:
            revisions = article.findall('revision')
            article_id = article.find('id').text
            hashes = deque(maxlen=1000)
            size = {}
            for revision in revisions:
                if revision == None:
                    #the entire revision is empty, weird. 
                    continue

                contributor = revision.find('contributor')
                contributor = parse_contributor(contributor, bots)
                if not contributor:
                    #editor is anonymous, ignore
                    continue

                revision_id = revision.find('id')
                revision_id = extracter.extract_revision_id(revision_id)
                if revision_id == None:
                    #revision_id is missing, which is weird
                    continue

                row = prefill_row(title, article_id, namespace)
                row['revision_id'] = revision_id
                text = extract_revision_text(revision)
                row.update(contributor)


                timestamp = revision.find('timestamp').text
                row['timestamp'] = timestamp

                hash = create_md5hash(text)
                revert = is_revision_reverted(hash['hash'], hashes)
                hashes.append(hash['hash'])
                size = calculate_delta_article_size(size, text)

                row.update(hash)
                row.update(size)
                row.update(revert)
    #           print row
    #           if row['username'] == None:
    #               contributor = revision.find('contributor')
    #               attrs = contributor.getchildren()
    #               for attr in attrs:
    #                   print attr.text
                #print revision_id, hash, delta, prev_size\

                buffer.add(row)
        if i % 10000 == 0:
            print 'Parsed %s articles' % i
#        except ValueError, e:
#            print e
#        except UnicodeDecodeError, e:
#            print e
    buffer.empty()
    print 'Buffer is empty'


def create_article(input_queue, result_queue):
    buffer = cStringIO.StringIO()
    parsing = False
    while True:
        filename = input_queue.get()
        input_queue.task_done()
        if filename == None:
            break
        #filesize = file_utils.determine_filesize('', filename)
        #pbar = progressbar.ProgressBar().start()
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
                #pbar.update(pbar.currval + len(data)) #is inaccurate!!!


    #for x in xrange(cpu_count()):
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
        line = line.strip()
        yield line
    fh.close()


def setup(storage):
    keyspace_name = 'enwiki'
    if storage == 'cassandra':
        cassandra.install_schema(keyspace_name, drop_first=True)


def launcher():

    storage = 'csv'
    setup(storage)
    input_queue = JoinableQueue()
    result_queue = JoinableQueue()
    files = ['C:\\Users\\diederik.vanliere\\Downloads\\enwiki-latest-pages-articles1.xml.bz2']
    #files = ['/home/diederik/kaggle/enwiki-20100904-pages-meta-history2.xml.bz2']

    for file in files:
        input_queue.put(file)

    for x in xrange(cpu_count()):
        input_queue.put(None)

    extracters = [Process(target=create_article, args=[input_queue, result_queue])
                  for x in xrange(cpu_count())]
    for extracter in extracters:
        extracter.start()

    creators = [Process(target=create_variables, args=[result_queue, storage, x])
                for x in xrange(cpu_count())]
    for creator in creators:
        creator.start()


    input_queue.join()
    result_queue.join()


if __name__ == '__main__':
    #extract_categories()
    launcher()
