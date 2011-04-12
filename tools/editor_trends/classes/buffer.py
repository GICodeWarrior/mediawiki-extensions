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
__date__ = '2011-04-11'
__version__ = '0.1'

import sys
if '..' not in sys.path:
    sys.path.append('..')

from utils import file_utils

class CustomLock:
    def __init__(self, lock, open_handles):
        self.lock = lock
        self.open_handles = open_handles

    def available(self, handle):
        self.lock.acquire()
        try:
            self.open_handles.index(handle)
            #print 'RETRIEVED FILEHANDLE %s' % handle
            return False
        except (ValueError, Exception), error:
            self.open_handles.append(handle)
            #print 'ADDED FILEHANDLE %s' % handle
            return True
        finally:
            #print 'FIles locked: %s' % len(self.open_handles)
            self.lock.release()

    def release(self, handle):
        #print 'RELEASED FILEHANDLE %s' % handle
        self.open_handles.remove(handle)


class CSVBuffer:
    def __init__(self, process_id, rts, lock):
        self.rts = rts
        self.lock = lock
        self.revisions = {}
        self.comments = {}
        self.articles = {}
        self.process_id = process_id
        self.count_articles = 0
        self.count_revisions = 0
        self.filehandles = [file_utils.create_txt_filehandle(self.rts.txt,
        file_id, 'a', 'utf-8') for file_id in xrange(self.rts.max_filehandles)]
        self.keys = ['revision_id', 'article_id', 'id', 'username', 'namespace',
                     'title', 'timestamp', 'hash', 'revert', 'bot', 'cur_size',
                     'delta']
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

    def group_revisions_by_fileid(self):
        '''
        This function groups observation by editor id and then by file_id, 
        this way we have to make fewer file opening calls and should reduce
        processing time.
        '''
        data = {}
        editors = {}
        #first, we group all revisions by editor 

        for revision in self.revisions.values():
            row = []
            #strip away the keys and make sure that the values are always in the same sequence
            for key in self.keys:
                row.append(revision[key].decode('utf-8'))
            editor_id = row[0]
            data.setdefault(editor_id, [])
            data[editor_id].append(row)
            editors.setdefault(editor_id, self.get_hash(editor_id))

        #now, we are going to group all editors by file_id
        file_ids = self.invert_dictionary(editors)
        self.revisions = {}
        for file_id, editors in file_ids.iteritems():
            for editor in editors:
                self.revisions.setdefault(file_id, [])
                self.revisions[file_id].extend(data[editor])

    def add(self, revision):
        self.stringify(revision)
        id = revision['revision_id']
        self.revisions[id] = revision
        if len(self.revisions) > 10000:
            #print '%s: Emptying buffer %s - buffer size %s' % (datetime.datetime.now(), self.id, len(self.revisions))
            self.store()


    def stringify(self, revision):
        for key, value in revision.iteritems():
            try:
                value = str(value)
            except UnicodeEncodeError:
                value = value.encode('utf-8')
            revision[key] = value


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
            self.comments = {}
        except Exception, error:
            print '''Encountered the following error while writing comment data 
                to %s: %s''' % (self.fh_comments, error)

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
        #t1 = datetime.datetime.now()
        #print '%s articles took %s' % (len(self.articles.keys()), (t1 - t0))

    def write_revisions(self):
        #t0 = datetime.datetime.now()
        self.group_revisions_by_fileid()
        file_ids = self.revisions.keys()
        for file_id in file_ids:
            wait = True
            for i, revision in enumerate(self.revisions[file_id]):
                if i == 0:
                    while wait:
                        #print file_id, self.lock
                        if self.lock.available(file_id):
                            fh = self.filehandles[file_id]
                            wait = False
                try:
                    file_utils.write_list_to_csv(revision, fh)
                except Exception, error:
                    print '''Encountered the following error while writing 
                            revision data to %s: %s''' % (fh, error)
            self.lock.release(file_id)
            del self.revisions[file_id]
            wait = True
#        t1 = datetime.datetime.now()
#        print 'Worker %s: %s revisions took %s' % (self.process_id,
#                                                   len([1]),
#                                                   (t1 - t0))
