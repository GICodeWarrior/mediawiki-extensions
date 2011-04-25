#!/usr/bin/python
# coding=utf-8
'''
Copyright (C) 2010 by Diederik van Liere (dvanliere@gmail.com)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details, at
http,//www.fsf.org/licenses/gpl.html
'''


__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)'])
__email__ = 'dvanliere at gmail dot com'
__date__ = '2011-04-21'
__version__ = '0.1'


from multiprocessing.queues import JoinableQueue, Queue
import errno

def retry_on_eintr(function, *args, **kw):
    while True:
        try:
            return function(*args, **kw)
        except IOError, e:
            if e.errno == errno.EINTR:
                continue
            else:
                raise

class RetryQueue(Queue):
    """Queue which will retry if interrupted with EINTR."""
    def get(self, block=True, timeout=None):
        return retry_on_eintr(Queue.get, self, block, timeout)

    def qsize(self):
        try:
            return self.qsize()
        except:
            #OSX does not support the qsize function so we return unknown
            return 'unknown'


class JoinableRetryQueue(JoinableQueue):
    """Queue which will retry if interrupted with EINTR."""
    def get(self, block=True, timeout=None):
        return retry_on_eintr(Queue.get, self, block, timeout)

    def qsize(self):
        try:
            return self.qsize()
        except:
            #OSX does not support the qsize function so we return unknown
            return 'unknown'
