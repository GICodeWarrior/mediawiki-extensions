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
__date__ = '2010-12-13'
__version__ = '0.1'

import sys
import re
import json
import os
import xml.etree.cElementTree as cElementTree

sys.path.append('..')
import configuration
settings = configuration.Settings()

import wikitree.parser
from bots import bots
from utils import utils

try:
    import psyco
    psyco.full()
except ImportError:
    pass


RE_NUMERIC_CHARACTER = re.compile('&#(\d+);')


def remove_numeric_character_references(text):
    return re.sub(RE_NUMERIC_CHARACTER, lenient_deccharref, text).encode('utf-8')


def lenient_deccharref(m):
    try:
        return unichr(int(m.group(1)))
    except ValueError:
        '''
        There are a few articles that raise a Value Error here, the reason is
        that I am using a narrow Python build (UCS2) instead of a wide build
        (UCS4). The quick fix is to return an empty string...
        Real solution is to rebuild Python with UCS4 support.....
        '''
        return ''


def remove_namespace(element, namespace):
    '''Remove namespace from the XML document.'''
    ns = u'{%s}' % namespace
    nsl = len(ns)
    for elem in element.getiterator():
        if elem.tag.startswith(ns):
            elem.tag = elem.tag[nsl:]
    return element


def load_namespace(language):
    file = '%s_ns.json' % language
    fh = utils.create_txt_filehandle(settings.namespace_location, file, 'r', settings.encoding)
    ns = json.load(fh)
    fh.close()
    ns = ns['query']['namespaces']
    return ns


def build_namespaces_locale(namespaces, include=['0']):
    '''
    @include is a list of namespace keys that should not be ignored, the default
    setting is to ignore all namespaces except the main namespace. 
    '''
    ns = []
    for namespace in namespaces:
        if namespace not in include:
            value = namespaces[namespace].get(u'*', None)
            ns.append(value)
    return ns


def parse_comments(revisions, function):
    for revision in revisions:
        comment = revision.find('{%s}comment' % settings.xml_namespace)
        #timestamp = revision.find('{%s}timestamp' % settings.xml_namespace).text
        if comment != None and comment.text != None:
            comment.text = function(comment.text)
    return revisions


def is_article_main_namespace(elem, namespace):
    '''
    checks whether the article belongs to the main namespace
    '''
    title = elem.text
    for ns in namespace:
        if title.startswith(ns):
            return False
    return True

def validate_hostname(address):
    '''
    This is not a foolproof solution at all. The problem is that it's really hard
    to determine whether a string is a hostname or not **reliably**. This is a 
    very fast rule of thumb. Will lead to false positives, but that's life :)
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


def determine_username_is_bot(contributor, **kwargs):
    '''
    #contributor is an xml element containing the id of the contributor
    @bots should have a dict with all the bot ids and bot names
    @Return False if username id is not in bot dict id or True if username id
    is a bot id.
    '''
    bots = kwargs.get('bots')
    username = contributor.find('username')
    if username == None:
        return 0
    else:
        if username in bots:
            return 1
        else:
            return 0


def extract_username(contributor, **kwargs):
    contributor = contributor.find('username')
    if contributor != None:
        return contributor.text
    else:
        return None


def extract_contributor_id(contributor, **kwargs):
    '''
    @contributor is the xml contributor node containing a number of attributes
    Currently, we are only interested in registered contributors, hence we
    ignore anonymous editors. 
    '''
    if contributor.get('deleted'):
        return None  # ASK: Not sure if this is the best way to code deleted contributors.
    elem = contributor.find('id')
    if elem != None:
        return {'id':elem.text}
    else:
        elem = contributor.find('ip')
        if elem != None and elem.text != None and validate_ip(elem.text) == False and validate_hostname(elem.text) == False:
            return {'username':elem.text, 'id': elem.text}
        else:
            return None


def output_editor_information(revisions, page, bots):
    '''
    @elem is an XML element containing 1 revision from a page
    @output is where to store the data,  a filehandle
    @**kwargs contains extra information 
    
    the variable tags determines which attributes are being parsed, the values in
    this dictionary are the functions used to extract the data. 
    '''
    headers = ['id', 'date', 'article', 'username']
    tags = {'contributor': {'id': extract_contributor_id,
                            'bot': determine_username_is_bot,
                            'username': extract_username,
                            },
            'timestamp': {'date': wikitree.parser.extract_text},
            }
    vars = {}
    flat = []

    for x, revision in enumerate(revisions):
        #print len(revision.getchildren())
        vars[x] = {}
        vars[x]['article'] = page
        for tag in tags:
            el = revision.find('%s' % tag)
            if el == None:
                #print cElementTree.tostring(revision, settings.encoding)
                del vars[x]
                break
            for function in tags[tag].keys():
                f = tags[tag][function]
                value = f(el, bots=bots)
                if type(value) == type({}):
                    for kw in value:
                        vars[x][kw] = value[kw]
                else:
                    vars[x][function] = value

    '''
    This loop determines for each observation whether it should be stored or not. 
    '''
    for x in vars:
        if vars[x]['bot'] == 1 or vars[x]['id'] == None or vars[x]['username'] == None:
            continue
        else:
            f = []
            for head in headers:
                f.append(vars[x][head])
            flat.append(f)

    return flat


def parse_dumpfile(project, language_code, namespaces=['0']):
    bot_ids = bots.retrieve_bots(language_code)
    ns = load_namespace(language_code)
    ns = build_namespaces_locale(ns, namespaces)

    location = os.path.join(settings.input_location, language_code, project)
    fh = utils.create_txt_filehandle(location, 'enwiki-latest-stub-meta-history.xml', 'r', settings.encoding)
    for page in wikitree.parser.read_input(fh):
        title = page.find('title')
        if is_article_main_namespace(title, ns):
            #cElementTree.dump(page)
            article_id = page.find('id').text
            revisions = page.findall('revision')
            revisions = parse_comments(revisions, remove_numeric_character_references)
            output = output_editor_information(revisions, article_id, bot_ids)
            write_output(output, project, language_code)
        page.clear()
    fh.close()


def write_output(output, project, language_code):
    location = os.path.join(settings.input_location, language_code, project, 'txt')
    for o in output:
        file = '%s.csv' % hash(o[0])
        try:
            fh = utils.create_txt_filehandle(location, file, 'a', settings.encoding)
            utils.write_list_to_csv(o, fh)
            fh.close()
        except Exception, error:
            print error


def hash(id):
    '''
    A very simple hash function based on modulo. The except clause has been 
    addde because there are instances where the username is stored in userid
    tag and hence that's a string and not an integer. 
    '''
    try:
        return int(id) % 500
    except:
        return sum([ord(i) for i in id]) % 500

if __name__ == '__main__':
    project = 'wiki'
    language_code = 'en'
    parse_dumpfile(project, language_code)
