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
from multiprocessing import JoinableQueue, Process
#from xml.etree.cElementTree. import iterparse
from xml.etree.cElementTree import fromstring

RE_CATEGORY= re.compile('\(.*\`\,\.\-\:\'\)')

def extract_categories():
    '''
    Field 1: page id
    Field 2: name category
    Field 3: sort key
    Field 4: timestamp last change
    '''
    filename = '/Users/diederik/Downloads/enwiki-20110115-categorylinks.sql'
    output = codecs.open('categories.csv', 'w', encoding='utf-8')
    fh = codecs.open(filename, 'r', encoding='utf-8')
    
    for line in fh:
        if line.startswith('INSERT INTO `categorylinks` VALUES ('):
            line = line.replace('INSERT INTO `categorylinks` VALUES (','')
            line = line.replace("'",'')
            categories = line.split('),(')
            for category in categories:
                category = category.split(',')
                if len(category) ==4:
                    output.write('%s\t%s\n' % (category[0], category[1]))
    
    output.close()
    fh.close()

def extract_revision_text(revision):
    rev = revision.find('text')
    if rev != None:
        return rev.text.encode('utf-8')
    else:
        return None
    
def create_md5hash(revision):
    if revision == None:
        return False
    rev = extract_revision_text(revision)
    if rev != None:
        m = hashlib.md5()
        m.update(rev)
        #echo m.digest()
        return m.hexdigest()
    else:
        return False

    
def calculate_delta_article_size(prev_size, revision):
    if revision == None:
        return False
    rev= extract_revision_text(revision)
    if rev == None:
        return 0, prev_size
    else:
        delta = len(rev) - prev_size
        prev_size = len(rev)
        return delta, prev_size
        


def create_variables(result_queue):
    while True:
        try:
            article = result_queue.get(block=True)
            result_queue.task_done()
            if article == None:
                break
            article = fromstring(article)
            prev_size = 0
            revisions = article.findall('revision')
            for revision in revisions:
                revision_id = revision.find('id').text
                hash = create_md5hash(revision)
                delta, prev_size = calculate_delta_article_size(prev_size, revision)
                print revision_id, hash, delta, prev_size
        except ValueError, e:
            pass
            #print e
                


def create_article(input_queue, result_queue):
    '''
    This function creates three variables:
    1) a MD5 hash for each revision
    2) the size of the current revision
    3) the delta size of the current revision and the previous revision
    '''
    buffer = cStringIO.StringIO()
    parsing = False
    while True:
        filename = input_queue.get()
        input_queue.task_done()
        if filename == None:
            break

        for data in unzip(filename):
            if data.startswith('<page>'):
                parsing = True
            #print data
            if parsing:
                buffer.write(data)
                if data == '</page>':
                    xml1 = buffer.getvalue()
                    #xml1 = xml1.decode('utf-8')
                    #xml1 = xml1.encode('utf-8')
                    #xml1 = fromstring(xml1)
                    if xml1 != None:
                        result_queue.put(xml1)
                    buffer = cStringIO.StringIO()
    
    result_queue.put(None)                
    print 'Finished parsing bz2 archives'

def unzip(filename):
    '''
    Filename should be a fully qualified path to the bz2 file that will be decompressed.
    It will iterate line by line and yield this back to create_article
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
    files = ['/Users/diederik/Downloads/enwiki-20110115-pages-articles1.xml.bz2']
    for file in files:
        input_queue.put(file)
    
    for x in xrange(2):
        input_queue.put(None)
    
    extracters = [Process(target=create_article, args=[input_queue, result_queue]) for x in xrange(2)]
    for extracter in extracters:
        extracter.start()
    
    creators = [Process(target=create_variables, args=[result_queue]) for x in xrange(2)]
    for creator in creators:
        creator.start()
    
    
    input_queue.join()
    result_queue.join()
    
    

if __name__ == '__main__':
    extract_categories()
    #launcher()