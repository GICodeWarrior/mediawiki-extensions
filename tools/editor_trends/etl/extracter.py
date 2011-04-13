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
__date__ = '2011-04-10'
__version__ = '0.1'


from collections import deque
import sys
import os
from datetime import datetime
from xml.etree.cElementTree import iterparse, dump
from multiprocessing import JoinableQueue, Process, cpu_count, RLock, Manager

if '..' not in sys.path:
    sys.path.append('..')

from etl import variables
from utils import file_utils
from classes import buffer
from analyses.adhoc import bot_detector

def parse_revision(revision, article, xml_namespace, cache, bots, md5hashes, size):
    '''
    This function has as input a single revision from a Wikipedia dump file, 
    article information it belongs to, the xml_namespace of the Wikipedia dump
    file, the cache object that collects parsed revisions, a list of md5hashes
    to determine whether an edit was reverted and a size dictionary to determine
    how many characters were added and removed compared to the previous revision. 
    '''
    if revision == None:
    #the entire revision is empty, weird. 
        #dump(revision)
        return md5hashes, size

    contributor = revision.find('%s%s' % (xml_namespace, 'contributor'))
    contributor = variables.parse_contributor(contributor, bots, xml_namespace)
    if not contributor:
        #editor is anonymous, ignore
        return md5hashes, size

    revision_id = revision.find('%s%s' % (xml_namespace, 'id'))
    revision_id = variables.extract_revision_id(revision_id)
    if revision_id == None:
        #revision_id is missing, which is weird
        return md5hashes, size

    article['revision_id'] = revision_id
    text = variables.extract_revision_text(revision)
    article.update(contributor)

    comment = variables.extract_comment_text(revision_id, revision)
    cache.comments.update(comment)

    timestamp = revision.find('%s%s' % (xml_namespace, 'timestamp')).text
    article['timestamp'] = timestamp

    hash = variables.create_md5hash(text)
    revert = variables.is_revision_reverted(hash['hash'], md5hashes)
    md5hashes.append(hash['hash'])
    size = variables.calculate_delta_article_size(size, text)

    article.update(hash)
    article.update(size)
    article.update(revert)
    cache.add(article)
    return md5hashes, size


def datacompetition_parse_revision(revision, xml_namespace, bots, counts):
    '''
    This function has as input a single revision from a Wikipedia dump file, 
    article information it belongs to, the xml_namespace of the Wikipedia dump
    file, the cache object that collects parsed revisions, a list of md5hashes
    to determine whether an edit was reverted and a size dictionary to determine
    how many characters were added and removed compared to the previous revision. 
    '''
    if revision == None:
    #the entire revision is empty, weird. 
        #dump(revision)
        return counts

    contributor = revision.find('%s%s' % (xml_namespace, 'contributor'))
    contributor = variables.parse_contributor(contributor, bots, xml_namespace)
    if not contributor:
        #editor is anonymous, ignore
        return counts
    else:
        counts.setdefault(contributor['id'], 0)
        counts[contributor['id']] += 1
        return counts


def datacompetition_count_edits(fh, rts, file_id):
    '''
    This function counts for every editor the total number of edits that person
    made. It follows the same logic as the parse_xml function although it
    skips a bunch of extraction phases that are not relevant for counting 
    edits. This function is only to be used to create the prediction dataset 
    for the datacompetition.
    '''
    bots = bot_detector.retrieve_bots(rts.language.code)
    include_ns = {}

    start = 'start'; end = 'end'
    context = iterparse(fh, events=(start, end))
    context = iter(context)

    counts = {}
    id = False
    ns = False
    parse = False

    try:
        for event, elem in context:
            if event is end and elem.tag.endswith('siteinfo'):
                xml_namespace = variables.determine_xml_namespace(elem)
                namespaces = variables.create_namespace_dict(elem, xml_namespace)
                ns = True
                elem.clear()

            elif event is end and elem.tag.endswith('title'):
                title = variables.parse_title(elem)
                article['title'] = title
                current_namespace = variables.determine_namespace(title, namespaces, include_ns)
                if current_namespace != False:
                    parse = True
                    article['namespace'] = current_namespace
                    cache.count_articles += 1
                elem.clear()

            elif elem.tag.endswith('revision') and parse == True:
                if event is start:
                    clear = False
                else:
                    counts = datacompetition_parse_revision(revision, xml_namespace, bots, counts)
                    cache.count_revisions += 1
                    clear = True
                if clear:
                    elem.clear()

            elif event is end and elem.tag.endswith('page'):
                elem.clear()
                #Reset all variables for next article
                id = False
                parse = False

    except SyntaxError, error:
        print 'Encountered invalid XML tag. Error message: %s' % error
        dump(elem)
        sys.exit(-1)
    except IOError, error:
        print '''Archive file is possibly corrupted. Please delete this archive 
            and retry downloading. Error message: %s''' % error
        sys.exit(-1)

    filename = 'counts_kaggle_%s.csv' % file_id
    fh = file_utils.create_txt_filehandle(rts.txt, filename, 'w', 'utf-8')
    file_utils.write_dict_to_csv(counts, fh, keys)
    fh.close()

    #filename = 'counts_kaggle_%s.bin' % file_id
    #file_utils.store_object(counts, location, filename)


def parse_xml(fh, rts, cache, process_id, file_id):
    bots = bot_detector.retrieve_bots(rts.language.code)
    include_ns = {3: 'User Talk',
                  5: 'Wikipedia Talk',
                  1: 'Talk',
                  2: 'User',
                  4: 'Wikipedia'}

    start = 'start'; end = 'end'
    context = iterparse(fh, events=(start, end))
    context = iter(context)

    article = {}
    size = {}
    id = False
    ns = False
    parse = False

    try:
        for event, elem in context:
            if event is end and elem.tag.endswith('siteinfo'):
                xml_namespace = variables.determine_xml_namespace(elem)
                namespaces = variables.create_namespace_dict(elem, xml_namespace)
                ns = True
                elem.clear()

            elif event is end and elem.tag.endswith('title'):
                title = variables.parse_title(elem)
                article['title'] = title
                current_namespace = variables.determine_namespace(title, namespaces, include_ns)
                title_meta = variables.parse_title_meta_data(title, current_namespace)
                if isinstance(current_namespace, int):
                    parse = True
                    article['namespace'] = current_namespace
                    cache.count_articles += 1
                    if cache.count_articles % 10000 == 0:
                        print 'Worker %s parsed %s articles' % (process_id, cache.count_articles)
                    md5hashes = deque()
                elem.clear()

            elif elem.tag.endswith('revision') and parse == True:
                if event is start:
                    clear = False
                else:
                    md5hashes, size = parse_revision(elem, article, xml_namespace, cache, bots, md5hashes, size)
                    cache.count_revisions += 1
                    clear = True
                if clear:
                    elem.clear()

            elif event is end and elem.tag.endswith('id') and id == False:
                article['article_id'] = elem.text
                if isinstance(current_namespace, int):
                    cache.articles[article['article_id']] = title_meta
                id = True
                elem.clear()

            elif event is end and elem.tag.endswith('page'):
                elem.clear()
                #Reset all variables for next article
                article = {}
                size = {}
                md5hashes = deque()
                id = False
                parse = False


    except SyntaxError, error:
        print 'Encountered invalid XML tag. Error message: %s' % error
        dump(elem)
        sys.exit(-1)
    except IOError, error:
        print '''Archive file is possibly corrupted. Please delete this archive 
            and retry downloading. Error message: %s''' % error
        sys.exit(-1)
    print 'Finished parsing Wikipedia dump file.'


def stream_raw_xml(input_queue, process_id, lock, rts):
    t0 = datetime.now()
    file_id = 0
    if not rts.kaggle:
        cache = buffer.CSVBuffer(process_id, rts, lock)

    while True:
        filename = input_queue.get()
        input_queue.task_done()
        file_id += 1
        if filename == None:
            print '%s files left in the queue' % input_queue.qsize()
            break

        print filename
        fh = file_utils.create_streaming_buffer(filename)

        if rts.kaggle:
            datacompetition_count_edits(fh, rts, process_id, file_id)
        else:
            parse_xml(fh, rts, cache, process_id, file_id)

        fh.close()

        t1 = datetime.now()
        print 'Worker %s: Processing of %s took %s' % (process_id, filename, (t1 - t0))
        print 'There are %s files left in the queue' % (input_queue.qsize())
        t0 = t1

    if not rts.kaggle:
        cache.close()
        cache.summary()


def debug():
    fh = 'c:\\wikimedia\sv\wiki\svwiki-latest-stub-meta-history.xml'


def launcher(rts):
    lock = RLock()
    mgr = Manager()
    open_handles = []
    open_handles = mgr.list(open_handles)
    clock = buffer.CustomLock(lock, open_handles)
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

    extracters = [Process(target=stream_raw_xml, args=[input_queue, process_id,
                                                       clock, rts])
                  for process_id in xrange(processors)]
    for extracter in extracters:
        extracter.start()

    input_queue.join()



if __name__ == '__main__':
    debug()
