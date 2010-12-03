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
__date__ = '2010-10-21'
__version__ = '0.1'

import xml.etree.cElementTree as cElementTree
import sys
import codecs
import re
import json
import os
import random

import progressbar


sys.path.append('..')
import configuration
settings = configuration.Settings()

from utils import utils
import extract
from wikitree import xml
from bots import bots


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


def build_namespaces_locale(namespaces, include=[0]):
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


def parse_comments(xml, function):
    revisions = xml.findall('revision')
    for revision in revisions:
        comment = revision.find('comment')
        timestamp = revision.find('timestamp').text
        if comment != None and comment.text != None:
            comment.text = function(comment.text)
    return xml


def is_article_main_namespace(elem, namespace):
    '''
    checks whether the article belongs to the main namespace
    '''
    title = elem.find('title').text
    for ns in namespace:
        if title.startswith(ns):
            return False
    return True


def write_xml_file(element, fh, output, counter, format):
    '''Get file handle and write xml element to file'''
    try:
        xml_string = cElementTree.tostring(element)
        size = len(xml_string)
        fh, counter, new_file = create_file_handle(fh, output, counter, size, format)
        fh.write(xml_string)
    except MemoryError:
        print 'Add error capturing logic'
    except UnicodeEncodeError, error:
        print error
        n = random.randrange(0, 10000)
        f = '%s%s.bin' % ('element', n)
        new_file = False
        #if element != None:
        #    utils.store_object(element, settings.binary_location, f)
    fh.write('\n')
    return fh, counter, new_file


def create_file_handle(fh, output, counter, size, format):
    '''
    @fh is file handle, if none is supplied or if file size > max file size then
    create a new file handle
    @output is the location where to store the files
    @counter indicates which chunk it is
    @size is the length of the xml element about to be written to file.  
    '''
    if not fh:
        counter = 0
        path = os.path.join(output, '%s.%s' % (counter, format))
        fh = codecs.open(path, 'w', encoding=settings.encoding)
        return fh, counter, False
    elif (fh.tell() + size) > settings.max_xmlfile_size:
        print 'Created chunk %s' % (counter + 1)
        fh.close
        counter += 1
        path = os.path.join(output, '%s.%s' % (counter, format))
        fh = codecs.open(path, 'w', encoding=settings.encoding)
        return fh, counter, True
    else:
        return fh, counter, False


def flatten_xml_elements(data, page, bots):
    headers = ['id', 'date', 'article', 'username']
    tags = {'contributor': {'id': extract.extract_contributor_id,
                            'bot': extract.determine_username_is_bot,
                            'username': extract.extract_username,
                            },
            'timestamp': {'date': xml.extract_text},
            }
    vars = {}
    flat = []

    for x, elems in enumerate(data):
        vars[x] = {}
        vars[x]['article'] = page
        for tag in tags:
            el = xml.retrieve_xml_node(elems, tag)
            for function in tags[tag].keys():
                f = tags[tag][function]
                value = f(el, bots=bots)
                if type(value) == type({}):
                    for kw in value:
                        vars[x][kw] = value[kw]
                else:
                    vars[x][function] = value

    for x, var in enumerate(vars):
        if vars[x]['bot'] == 1 or vars[x]['id'] == None or vars[x]['username'] == None:
            continue
        else:
            f = []
            for head in headers:
                f.append(vars[x][head])
            flat.append(f)

    return flat


def split_file(location, file, project, language_code, namespaces=[0], format='xml', zip=False):
    '''
    Reads xml file and splits it in N chunks
    @namespaces is a list indicating which namespaces should be included, default
    is to include namespace 0 (main namespace)
    @zip indicates whether to compress the chunk or not
    '''
    input = os.path.join(location, file)
    if format == 'xml':
        output = os.path.join(location, 'chunks')
    else:
        output = os.path.join(location, 'txt')
        bot_ids = bots.retrieve_bots()
    settings.verify_environment([output])

    fh = None
    counter = 0

    ns = load_namespace(language_code)
    ns = build_namespaces_locale(ns, namespaces)
    #settings.xml_namespace = 'http://www.mediawiki.org/xml/export-0.4/'

    tag = '{%s}page' % settings.xml_namespace
    context = cElementTree.iterparse(input, events=('start', 'end'))
    context = iter(context)
    event, root = context.next()  #get the root element of the XML doc
    try:
        for event, elem in context:
            if event == 'end':
                if elem.tag == tag:
                    elem = remove_namespace(elem, settings.xml_namespace)
                    if is_article_main_namespace(elem, ns):
                        page = elem.find('id').text
                        elem = parse_comments(elem, remove_numeric_character_references)

                        if format == 'xml':
                            fh, counter, new_file = write_xml_file(elem, fh, output, counter, format)
                        else:
                            data = [el.getchildren() for el in elem if el.tag == 'revision']
                            data = flatten_xml_elements(data, page, bot_ids)
                            if data != None:
                                size = 64 * len(data)
                                fh, counter, new_file = create_file_handle(fh, output, counter, size, format)
                                utils.write_list_to_csv(data, fh, recursive=False, newline=True)

                        if zip and new_file:
                            file = str(counter - 1) + format
                            utils.zip_archive(settings.path_ziptool, output, file)
                            utils.delete_file(output, file)
                    root.clear()  # when done parsing a section clear the tree to safe memory
    except SyntaxError:
        f = utils.create_txt_filehandle(settings.log_location, 'split_xml', 'w', settings.encoding)
        f.write(cElementTree.tostring(elem))
        f.close()

    fh.close()

if __name__ == "__main__":
    kwargs = {'location': settings.input_location,
              'file': settings.input_filename,
              'project':'wiki',
              'language_code':'en',
              'format': 'tsv'
              }
    split_file(**kwargs)
