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


import os
import hashlib
import codecs
import sys
import datetime
import progressbar
from multiprocessing import JoinableQueue, Process, cpu_count, current_process, RLock
from xml.etree.cElementTree import iterparse, dump
from collections import deque


if '..' not in sys.path:
    sys.path.append('..')

from classes import storage
from bots import detector
from utils import file_utils

EXCLUDE_NAMESPACE = {
    #0:'Main',    
    #1:'Talk',
    #2:'User',
    #3:'User talk',
    #4:'Wikipedia',
    #5:'Wikipedia talk',
    6:'File',
    #7:'File talk',
    8:'MediaWiki',
    #9:'MediaWiki talk',
    10:'Template',
    #11:'Template talk',
    12:'Help',
    #13:'Help talk',
    14:'Category',
    #15:'Category talk',
    90:'Thread',
    #91:'Thread talk',
    92:'Summary',
    #93:'Summary talk',
    100:'Portal',
    #101:'Portal talk',
    108:'Book',
    #109:'Book talk'
}

COUNT_EXCLUDE_NAMESPACE = {
    1:'Talk',
    2:'User',
    4:'Wikipedia',
    6:'File',
    8:'MediaWiki',
    10:'Template',
    12:'Help',
    14:'Category',
    90:'Thread',
    92:'Summary',
    100:'Portal',
    108:'Book',
}

class Statistics:
    def __init__(self, process_id):
        self.process_id = process_id
        self.count_articles = 0
        self.count_revisions = 0

    def summary(self):
        print 'Worker %s: Number of articles: %s' % (self.process_id, self.count_articles)
        print 'Worker %s: Number of revisions: %s' % (self.process_id, self.count_revisions)

class Dummy:
        pass

class DummyRTS:
    def __init__(self, location, path):
        self.input_location = location
        self.location = path
        self.language = Dummy()
        self.project = Dummy()
        self.language.code = 'en'
        self.project.name = 'wiki'


class Buffer:
    def __init__(self, storage, process_id, rts=None, filehandles=None, locks=None):
        assert storage == 'cassandra' or storage == 'mongo' or storage == 'csv', \
            'Valid storage options are cassandra and mongo.'
        self.storage = storage
        self.revisions = {}
        self.comments = {}
        self.titles = {}
        self.process_id = process_id
        self.keyspace_name = 'enwiki'
        self.keys = ['revision_id', 'article_id', 'id', 'username', 'namespace',
                     'title', 'timestamp', 'hash', 'revert', 'bot', 'cur_size',
                     'delta']
        self.setup_storage()
        self.stats = Statistics(self.process_id)
        if storage == 'csv' and locks != None:
            self.rts = rts
            self.lock1 = locks[0] #lock for generic data
            self.lock2 = locks[1] #lock for comment data
            self.lock3 = locks[2] #lock for article titles
            self.filehandles = filehandles[0]
            self.fh_titles = filehandles[1]
            self.fh_comments = filehandles[2]

    def setup_storage(self):
        if self.storage == 'cassandra':
            self.db = pycassa.connect(self.keyspace_name)
            self.collection = pycassa.ColumnFamily(self.db, 'revisions')

        elif self.storage == 'mongo':
            self.db = db.init_mongo_db(self.keyspace_name)
            self.collection = self.db['kaggle']

    def get_hash(self, id):
        '''
        A very simple hash function based on modulo. The except clause has been 
        added because there are instances where the username is stored in userid
        tag and hence that's a string and not an integer. 
        '''
        try:
            return int(id) % self.rts.max_filehandles
        except ValueError:
            return sum([ord(i) for i in id]) % self.rts.max_filehandles

    def group_observations(self, revisions):
        '''
        This function groups observation by editor id, this way we have to make
        fewer fileopening calls. 
        '''
        data = {}
        for revision in revisions:
            id = revision[0]
            if id not in data:
                data[id] = []
            data[id].append(revision)
        self.revisions = data

    def add(self, revision):
        self.stringify(revision)
        id = revision['revision_id']
        self.revisions[id] = revision
        if len(self.revisions) > 10000:
            #print '%s: Emptying buffer %s - buffer size %s' % (datetime.datetime.now(), self.id, len(self.revisions))
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


    def clear(self):
        self.revisions = {}
        self.comments = {}
        self.titles = {}

    def store(self):
        if self.storage == 'cassandra':
            self.collection.batch_insert(self.revisions)
        elif self.storage == 'mongo':
            print 'insert into mongo'
        else:
            rows = []
            for id, revision in self.revisions.iteritems():
                values = []
                for key in self.keys:
                    values.append(revision[key].decode('utf-8'))
                #values.insert(0, id)
                rows.append(values)
            self.write_output(rows)

            if self.comments:
                self.lock2.acquire()
                try:
                    rows = []
                    for revision_id, comment in self.comments.iteritems():
                        #comment = comment.decode('utf-8')
                        #row = '\t'.join([revision_id, comment]) + '\n'
                        rows.append([revision_id, comment])
                        file_utils.write_list_to_csv(row, self.fh_comments)
                except Exception, error:
                    print error
                finally:
                    self.lock2.release()

            elif self.titles:
                self.lock3.acquire()
                try:
                    rows = []
                    for article_id, dict in self.titles.iteritems():
                        keys = dict.keys()
                        value = []
                        for key in keys:
                            value.append(key)
                            value.append(dict[key])
                        value.insert(0, article_id)
                        value.insert(0, 'id')
                        #title = title.encode('ascii')
                        #row = '\t'.join([article_id, title]) + '\n'
                        rows.append(value)
                    file_utils.write_list_to_csv(rows, self.fh_titles, newline=False)
                except Exception, error:
                    print error
                finally:
                    self.lock3.release()


    def write_output(self, data):
        self.group_observations(data)
        for editor in self.revisions:
            #lock the write around all edits of an editor for a particular page
            self.lock1.acquire()
            try:
                for i, revision in enumerate(self.revisions[editor]):
                    if i == 0:
                        id = self.get_hash(revision[2])
                        fh = self.filehandles[id]
                try:
                    file_utils.write_list_to_csv(revision, fh, lock=self.lock1)
                except Exception, error:
                    print 'Encountered the following error while writing data to %s: %s' % (error, fh)
            finally:
                self.lock1.release()



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


def validate_hostname(address):
    '''
    This is not a foolproof solution at all. The problem is that it's really 
    hard to determine whether a string is a hostname or not **reliably**. This 
    is a very fast rule of thumb. Will lead to false positives, 
    but that's life :)
    '''
    parts = address.split(".")
    if len(parts) > 2:
        return True
    else:
        return False


def validate_ip(address):
    parts = address.split(".")
    if len(parts) != 4:
        return False
    parts = parts[:3]
    for item in parts:
        try:
            if not 0 <= int(item) <= 255:
                return False
        except ValueError:
            return False
    return True


def extract_revision_text(revision):
    rev = revision.find('ns0:text')
    if rev != None:
        if rev.text == None:
            rev = fix_revision_text(revision)
        return rev.text.encode('utf-8')
    else:
        return ''


def parse_title(title):
    return title.text


def parse_title_meta_data(title, namespace):
    '''
    This function categorizes an article to assist the Wikimedia Taxonomy
    project. See 
    http://meta.wikimedia.org/wiki/Contribution_Taxonomy_Project/Research_Questions
    '''
    title_meta = {}
    if not namespace:
        return title_meta

    title_meta['title'] = title
    ns = namespace['namespace']
    title_meta['ns'] = ns
    if title.startswith('List of'):
        title_meta['category'] = 'List'
    elif ns == 4 or ns == 5:
        if title.find('Articles for deletion') > -1:
            title_meta['category'] = 'Deletion'
        elif title.find('Mediation Committee') > -1:
            title_meta['category'] = 'Mediation'
        elif title.find('Mediation Cabal') > -1:
            title_meta['category'] = 'Mediation'
        elif title.find('Arbitration') > -1:
            title_meta['category'] = 'Arbitration'
        elif title.find('Featured Articles') > -1:
            title_meta['category'] = 'Featured Article'
        elif title.find('Featured picture candidates') > -1:
            title_meta['category'] = 'Featured Pictures'
        elif title.find('Featured sound candidates') > -1:
            title_meta['category'] = 'Featured Sounds'
        elif title.find('Featured list candidates') > -1:
            title_meta['category'] = 'Featured Lists'
        elif title.find('Featured portal candidates') > -1:
            title_meta['category'] = 'Featured Portal'
        elif title.find('Featured topic candidates') > -1:
            title_meta['category'] = 'Featured Topic'
        elif title.find('Good Article') > -1:
            title_meta['category'] = 'Good Article'
    return title_meta


def extract_username(contributor, xml_namespace):
    contributor = contributor.find('%s%s' % (xml_namespace, 'username'))
    if contributor != None:
        return contributor.text
    else:
        return None


def determine_username_is_bot(contributor, bots, xml_namespace):
    '''
    #contributor is an xml element containing the id of the contributor
    @bots should have a dict with all the bot ids and bot names
    @Return False if username id is not in bot dict id or True if username id
    is a bot id.
    '''
    username = contributor.find('%s%s' % (xml_namespace, 'username'))
    if username == None:
        return 0
    else:
        if username.text in bots:
            return 1
        else:
            return 0


def extract_contributor_id(revision, xml_namespace):
    '''
    @contributor is the xml contributor node containing a number of attributes
    Currently, we are only interested in registered contributors, hence we
    ignore anonymous editors. 
    '''
    if revision.get('deleted'):
        # ASK: Not sure if this is the best way to code deleted contributors.
        return None
    elem = revision.find('%s%s' % (xml_namespace, 'id'))
    if elem != None:
        return {'id':elem.text}
    else:
        elem = revision.find('%s%s' % (xml_namespace, 'ip'))
        if elem == None or elem.text == None:
            return None
        elif validate_ip(elem.text) == False and validate_hostname(elem.text) == False:
            return {'username':elem.text, 'id': elem.text}
        else:
            return None


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


def parse_contributor(revision, bots, xml_namespace):
    username = extract_username(revision, xml_namespace)
    user_id = extract_contributor_id(revision, xml_namespace)
    bot = determine_username_is_bot(revision, bots, xml_namespace)
    editor = {}
    editor['username'] = username
    editor['bot'] = bot
    if user_id != None:
        editor.update(user_id)
    else:
        editor = False
    return editor


def determine_namespace(title, namespaces, include_ns, exclude_ns):
    '''
    You can only determine whether an article belongs to the Main Namespace
    by ruling out that it does not belong to any other namepace
    '''
    ns = {}
    if title != None:
        for key in include_ns:
            namespace = namespaces.get(key)
            if namespace and title.startswith(namespace):
                ns['namespace'] = key
        if ns == {}:
            for key in exclude_ns:
                namespace = namespaces.get(key)
                if namespace and title.startswith(namespace):
                    '''article does not belong to any of the include_ns
                    namespaces'''
                    ns = False
                    return ns
            ns['namespace'] = 0
    else:
        ns = False
    return ns


def prefill_row(title, article_id, namespace):
    row = {}
    row['title'] = title
    row['article_id'] = article_id
    row.update(namespace)
    return row


def is_revision_reverted(hash_cur, hashes):
    revert = {}
    if hash_cur in hashes and hash_cur != -1:
        revert['revert'] = 1
    else:
        revert['revert'] = 0
    return revert


def extract_revision_id(revision_id):
    if revision_id != None:
        return revision_id.text
    else:
        return None


def extract_comment_text(revision_id, revision):
    comment = {}
    text = revision.find('comment')
    if text != None and text.text != None:
        comment[revision_id] = text.text.encode('utf-8')
    return comment


def create_namespace_dict(siteinfo, xml_namespace):
    '''
    This function determines the local names of the different namespaces.
    '''
    namespaces = {}
    print 'Constructing namespace dictionary'
    print xml_namespace
    elements = siteinfo.find('%s%s' % (xml_namespace, 'namespaces'))
    print elements
    for elem in elements:
        key = int(elem.get('key'))
        namespaces[key] = elem.text #extract_text(ns)
        text = elem.text if elem.text != None else ''
        try:
            print key, text.encode('utf-8')
        except UnicodeEncodeError:
            print key
    if namespaces == {}:
        sys.exit(-1)
    return namespaces


def determine_xml_namespace(siteinfo):
    '''
    This function determines the xml_namespace version
    '''
    for elem in siteinfo    :
        if elem.tag.endswith('sitename'):
            xml_namespace = elem.tag
            pos = xml_namespace.find('sitename')
            xml_namespace = xml_namespace[0:pos]
            return xml_namespace


def count_edits(article, counts, bots, xml_namespace):
    title = parse_title(article['title'])
    namespace = determine_namespace(title, {}, COUNT_EXCLUDE_NAMESPACE)
    if namespace != False:
        article_id = article['id'].text
        revisions = article['revisions']
        for revision in revisions:
            if revision == None:
                #the entire revision is empty, weird. 
                continue

            contributor = revision.find('%s%s' % (xml_namespace, 'contributor'))
            contributor = parse_contributor(contributor, bots)
            if not contributor:
                #editor is anonymous, ignore
                continue
            counts.setdefault(contributor['username'], 0)
            counts[contributor['username']] += 1
            revision.clear()
    return counts


def create_variables(article, cache, bots, xml_namespace, comments=False):
    include_ns = {3: 'User Talk',
                  5: 'Wikipedia Talk',
                  1: 'Talk',
                  2: 'User',
                  4: 'Wikipedia'}

    title = parse_title(article['title'])
    namespaces = article['namespaces']
    namespace = determine_namespace(title, namespaces, include_ns, EXCLUDE_NAMESPACE)
    title_meta = parse_title_meta_data(title, namespace)
    if namespace != False:
        cache.stats.count_articles += 1
        article_id = article['id'].text
        article['id'].clear()
        cache.titles[article_id] = title_meta
        hashes = deque()
        size = {}
        revisions = article['revisions']
        for revision in revisions:
            cache.stats.count_revisions += 1
            if revision == None:
                #the entire revision is empty, weird. 
                continue
            #dump(revision)
            contributor = revision.find('%s%s' % (xml_namespace, 'contributor'))
            contributor = parse_contributor(contributor, bots, xml_namespace)
            if not contributor:
                #editor is anonymous, ignore
                continue
            revision_id = revision.find('%s%s' % (xml_namespace, 'id'))
            revision_id = extract_revision_id(revision_id)
            if revision_id == None:
                #revision_id is missing, which is weird
                continue

            row = prefill_row(title, article_id, namespace)
            row['revision_id'] = revision_id
            text = extract_revision_text(revision)
            row.update(contributor)

            if comments:
                comment = extract_comment_text(revision_id, revision)
                cache.comments.update(comment)

            timestamp = revision.find('%s%s' % (xml_namespace, 'timestamp')).text
            row['timestamp'] = timestamp

            hash = create_md5hash(text)
            revert = is_revision_reverted(hash['hash'], hashes)
            hashes.append(hash['hash'])
            size = calculate_delta_article_size(size, text)

            row.update(hash)
            row.update(size)
            row.update(revert)
            cache.add(row)
            revision.clear()


def parse_xml(fh, rts):
    context = iterparse(fh, events=('end',))
    context = iter(context)

    article = {}
    article['revisions'] = []
    id = False

    try:
        for event, elem in context:
            if event == 'end' and elem.tag.endswith('siteinfo'):
                xml_namespace = determine_xml_namespace(elem)
                namespaces = create_namespace_dict(elem, xml_namespace)
                article['namespaces'] = namespaces
            elif event == 'end' and elem.tag.endswith('title'):
                article['title'] = elem
            elif event == 'end' and elem.tag.endswith('revision'):
                article['revisions'].append(elem)
            elif event == 'end' and elem.tag.endswith('id') and id == False:
                article['id'] = elem
                id = True
            elif event == 'end' and elem.tag.endswith('page'):
                yield article, xml_namespace
                elem.clear()
                article = {}
                article['revisions'] = []
                article['namespaces'] = namespaces
                id = False
            elif rts.kaggle == True and event == 'end':
                elem.clear()
    except SyntaxError, error:
        print 'Encountered invalid XML tag. Error message: %s' % error
        dump(elem)
        sys.exit(-1)


def stream_raw_xml(input_queue, storage, process_id, function, dataset, locks, rts):
    bots = detector.retrieve_bots('en')
    path = os.path.join(rts.location, 'txt')

    filehandles = [file_utils.create_txt_filehandle(path, '%s.csv' % fh, 'a',
                'utf-8') for fh in xrange(rts.max_filehandles)]

    title_file = os.path.join(path, 'titles.csv')
    comment_file = os.path.join(path, 'comments.csv')
    #file_utils.delete_file(path, title_file, directory=False)
    #file_utils.delete_file(path, comment_file, directory=False)
    fh_titles = codecs.open(title_file, 'a', 'utf-8')
    fh_comments = codecs.open(comment_file, 'a', 'utf-8')
    handles = [filehandles, fh_titles, fh_comments]
    wikilytics = False

    t0 = datetime.datetime.now()
    i = 0
    if dataset == 'training':
        cache = Buffer(storage, process_id, rts, handles, locks)
    else:
        counts = {}

    while True:
        filename = input_queue.get()
        input_queue.task_done()
        if filename == None:
            print '%s files left in the queue' % input_queue.qsize()
            break

        fh = file_utils.create_streaming_buffer(filename)
        filename = os.path.split(filename)[1]
        filename = os.path.splitext(filename)[0]
        for article, xml_namespace in parse_xml(fh, rts):
            if dataset == 'training':
                function(article, cache, bots, xml_namespace)
            elif dataset == 'prediction':
                counts = function(article, counts, bots, xml_namespace)
            i += 1
            if i % 10000 == 0:
                print 'Worker %s parsed %s articles' % (process_id, i)
        fh.close()

        t1 = datetime.datetime.now()
        print 'Worker %s: Processing of %s took %s' % (process_id, filename, (t1 - t0))
        print 'There are %s files left in the queue' % (input_queue.qsize())
        t0 = t1

    if dataset == 'training':
        cache.empty()
        cache.stats.summary()
    else:
        location = os.getcwd()
        keys = counts.keys()
        filename = 'counts_%s.csv' % filename
        fh = file_utils.create_txt_filehandle(location, filename, 'w', 'utf-8')
        file_utils.write_dict_to_csv(counts, fh, keys)
        fh.close()

        filename = 'counts_%s.bin' % filename
        file_utils.store_object(counts, location, filename)

    print 'Finished parsing Wikipedia dump files.'


def setup(storage, rts=None):
    '''
    Depending on the storage system selected (cassandra, csv or mongo) some
    preparations are made including setting up namespaces and cleaning up old
    files. 
    '''
    keyspace_name = 'enwiki'
    if storage == 'cassandra':
        cassandra.install_schema(keyspace_name, drop_first=True)
    elif storage == 'csv':
        output_articles = os.path.join(rts.input_location, rts.language.code,
                                       rts.project.name)
        output_txt = os.path.join(rts.input_location, rts.language.code,
                                  rts.project.name, 'txt')
        res = file_utils.delete_file(output_articles, 'articles.csv')
        res = file_utils.delete_file(output_txt, None, directory=True)
        if res:
            res = file_utils.create_directory(output_txt)


def multiprocessor_launcher(function, dataset, storage, locks, rts):
    input_queue = JoinableQueue()

    files = file_utils.retrieve_file_list(rts.input_location)
    if len(files) > cpu_count():
        processors = cpu_count() - 1
    else:
        processors = len(files)

    for filename in files:
        filename = os.path.join(rts.input_location, filename)
        print filename
        input_queue.put(filename)

    for x in xrange(processors):
        print 'Inserting poison pill %s...' % x
        input_queue.put(None)

    extracters = [Process(target=stream_raw_xml, args=[input_queue, storage,
                                                       process_id, function,
                                                       dataset, locks, rts])
                  for process_id in xrange(processors)]
    for extracter in extracters:
        extracter.start()

    input_queue.join()
    #filehandles = [fh.close() for fh in filehandles]
    #fh_titles.close()
    #fh_comments.close()


def launcher_training():
    '''
    Launcher for creating training dataset for data competition    
    '''
    path = '/mnt/wikipedia_dumps/batch2/'
    function = create_variables
    storage = 'csv'
    dataset = 'training'
    rts = DummyRTS(path)
    locks = []
    multiprocessor_launcher(function, dataset, storage, locks, rts)


def launcher_prediction():
    '''
    Launcher for creating prediction dataset for datacompetition
    '''
    path = '/mnt/wikipedia_dumps/batch1/'
    function = count_edits
    storage = 'csv'
    dataset = 'prediction'
    rts = DummyRTS(path)
    locks = []
    multiprocessor_launcher(function, dataset, storage, locks, rts)


def launcher(rts):
    '''
    This is the generic entry point for regular Wikilytics usage.
    '''
    # launcher for creating regular mongo dataset
    function = create_variables
    storage = 'csv'
    dataset = 'training'
    lock1 = RLock()
    lock2 = RLock()
    lock3 = RLock()
    locks = [lock1, lock2, lock3]
    setup(storage, rts)
    multiprocessor_launcher(function, dataset, storage, locks, rts)


if __name__ == '__main__':
    launcher_training()
    #launcher_prediction()
    #launcher(rts)
