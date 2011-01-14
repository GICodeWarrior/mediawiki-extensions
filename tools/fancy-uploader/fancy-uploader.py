#!/usr/bin/python

"""
Copyright 2011 - Bryan Tong Minh
Licensed under the terms of the MIT license
"""

"""
TODO:
    - Dupe detection

"""
import sys

import mwclient
try:
    import json
except ImportError:
    import simplejson as json

class FancyUploader(object):

    def __init__(self):
        pass

    def construct_title(self, metadata, maxlength=120):
        '''
        Need the following fields in the metadata dictionary:
        * title
        * project
        * id
        * extension
        '''

        if len(metadata['title']) > maxlength:
            base_title = metadata['title'][0 : maxlength]
        else:
            base_title = metadata['title']

        title = u'%s - %s - %s.%s' % (base_title, metadata['project'], metadata['id'], metadata['extension'])
        
        return cleanup_title(title)

    def cleanup_title(self, title):
        '''
        Remove all funky chars that might cause problems
        '''
        return title
        

    def convert_dict_to_wikitext(self, template, dict):
        # TODO curly brace escaping
        return '{{%s|%s}}' % (template, '|'.join('%s=%s' for i in dict.iteritems()))

    def upload(self, username, password, file, filename, wikitext):
        site = mwclient.Site('commons.wikimedia.org')
        site.login(username, password)
        return site.upload(file, filename, wikitext)

    def run(self, data, filename):
        title = self.construct_title()
        wikitext = self.convert_dict_to_wikitext(data['body_template'],
                                                 data['metadata'])
        result = self.upload(data['username'], data['password'],
                             open(filename, 'rb'), title, wikitext)

if __name__ == '__main__':
    uploader = FancyUploader()
    data = json.load(open(sys.argv[1], 'rb'))
    result = uploader.run(data, sys.argv[2])
    json.dump(sys.stdout, result)
    
