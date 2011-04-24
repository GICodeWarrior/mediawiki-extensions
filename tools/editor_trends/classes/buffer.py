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
__date__ = '2011-04-11'
__version__ = '0.1'

import sys
from collections import deque
import itertools
if '..' not in sys.path:
    sys.path.append('..')

from utils import file_utils


class FileHandleDistributor:
    '''
    Locking a file object is an expensive operation. This class is a lockless
    lock that is very fast and still makes sure that only one process is
    accessing a file object at a time. The logic is as follows: create a deque 
    object with the same number of items as you have open filehandles. When a 
    process wants to write something to a file then the FileHandleDistributor 
    pops and id from the deque. It sees whether it has already issued this id 
    to the calling process. If not then it returns this id and the process can 
    use the matching file object to this id to write stuff. When finished, 
    the process returns the id and it's inserted in the deque again. 
    If the id has already been assigned to a process then it puts it straight 
    back into the deque and gets the next id.
    '''
    def __init__(self, nr_filehandles, nr_processors):
        self.nr_filehandles = nr_filehandles
        self.nr_processors = nr_processors
        self.x = [i for i in xrange(self.nr_filehandles)]
        self.deque = deque(self.x)
        self.tracker = {}
        for process_id in xrange(self.nr_processors):
            self.tracker[process_id] = {}

    def assign_filehandle(self, process_id):
        while True:
            fh = self.deque.popleft()
            processed = self.tracker[process_id].get(fh)
            if processed:
                self.return_filehandle(fh)
            else:
                self.tracker[process_id][fh] = 1
                return fh

    def return_filehandle(self, fh):
        self.deque.append(fh)

    def reset_tracker(self, process_id):
        self.tracker[process_id] = {}


class CSVBuffer:
    def __init__(self, process_id, rts, fhd):
        self.rts = rts
        self.fhd = fhd
        self.revisions = {}
        self.comments = {}
        self.articles = {}
        self.process_id = process_id
        self.count_articles = 0
        self.count_revisions = 0
        self.n = 0
        self.filehandles = [file_utils.create_txt_filehandle(self.rts.txt,
        file_id, 'a', 'utf-8') for file_id in xrange(self.rts.max_filehandles)]
        self.keys = ['id', 'article_id', 'revision_id', 'username', 'namespace',
                     'title', 'timestamp', 'hash', 'revert',
                     'reverted_contributor', 'reverted_revision_id', 'bot',
                     'cur_size', 'delta']
        self.fh_articles = file_utils.create_txt_filehandle(self.rts.txt,
                            'articles_%s' % self.process_id, 'w', 'utf-8')
        self.fh_comments = file_utils.create_txt_filehandle(self.rts.txt,
                            'comments_%s' % self.process_id, 'w', 'utf-8')

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

    def invert_dictionary(self, editors):
        hashes = {}
        for editor, file_id in editors.iteritems():
            hashes.setdefault(file_id, [])
            hashes[file_id].append(editor)
        return hashes

    def add(self, revision):
        revision = self.stringify(revision)
        id = revision['id']
        file_id = self.get_hash(id)
        revision = self.simplify(revision)
        self.revisions.setdefault(file_id, [])
        self.revisions[file_id].append(revision)
        if self.n > 10000:
            #print '%s: Emptying buffer %s - buffer size %s' % (datetime.datetime.now(), self.id, len(self.revisions))
            self.store()
            self.n = 0
        else:
            self.n += 1

    def simplify(self, revision):
        row = []
        for key in self.keys:
            row.append(revision[key].decode('utf-8'))
        return row

    def stringify(self, revision):
        for key, value in revision.iteritems():
            value = revision[key]
            try:
                value = str(value)
            except UnicodeEncodeError:
                value = value.encode('utf-8')
            revision[key] = value
        return revision


    def summary(self):
        print 'Worker %s: Number of articles: %s' % (self.process_id, self.count_articles)
        print 'Worker %s: Number of revisions: %s' % (self.process_id, self.count_revisions)

    def store(self):
        self.write_revisions()
        self.write_articles()
        self.write_comments()

    def close(self):
        self.store()
        self.filehandles = [fh.close() for fh in self.filehandles]

    def write_comments(self):
        rows = []
        try:
            for revision_id, comment in self.comments.iteritems():
                #comment = comment.decode('utf-8')
                #row = '\t'.join([revision_id, comment]) + '\n'
                rows.append([revision_id, comment])
            file_utils.write_list_to_csv(rows, self.fh_comments)
        except Exception, error:
            print '''Encountered the following error while writing comment data 
                to %s: %s''' % (self.fh_comments, error)
        self.comments = {}
        self.fh_comments.flush()

    def write_articles(self):
        #t0 = datetime.datetime.now()
        if len(self.articles.keys()) > 10000:
            rows = []
            try:
                for article_id, data in self.articles.iteritems():
                    keys = data.keys()
                    keys.insert(0, 'id')

                    values = data.values()
                    values.insert(0, article_id)

                    row = zip(keys, values)
                    row = list(itertools.chain(*row))
                    #row = '\t'.join([article_id, title]) + '\n'
                    rows.append(row)
                file_utils.write_list_to_csv(rows, self.fh_articles, newline=False)
            except Exception, error:
                print '''Encountered the following error while writing article 
                    data to %s: %s''' % (self.fh_articles, error)
            self.articles = {}
            self.fh_articles.flush()
        #t1 = datetime.datetime.now()
        #print '%s articles took %s' % (len(self.articles.keys()), (t1 - t0))

    def write_revisions(self):
        #t0 = datetime.datetime.now()
        file_ids = self.revisions.keys()
        while len(file_ids) > 0:
            fh_id = self.fhd.assign_filehandle(self.process_id)
            revisions = self.revisions.get(fh_id, [])
            fh = self.filehandles[fh_id]
            for revision in revisions:
                try:
                    file_utils.write_list_to_csv(revision, fh)
                except Exception, error:
                    print '''Encountered the following error while writing 
                            revision data to %s: %s''' % (fh, error)
            fh.flush()
            self.fhd.return_filehandle(fh_id)
            try:
                del self.revisions[fh_id]
                file_ids.remove(fh_id)
            except KeyError:
                pass

        self.fhd.reset_tracker(self.process_id)

#        t1 = datetime.datetime.now()
#        print 'Worker %s: %s revisions took %s' % (self.process_id,
#                                                   len([1]),
#                                                   (t1 - t0))
