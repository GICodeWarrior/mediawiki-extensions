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
__date__ = '2010-10-21'
__version__ = '0.1'

import re
import cStringIO
import codecs
import xml.etree.cElementTree as cElementTree
import sys

if '..' not in sys.path:
    sys.path.append('..')

from classes import settings
settings = settings.Settings()
from utils import file_utils

def convert_html_entities(text):
    return file_utils.unescape(text)


def extract_text(elem, **kwargs):
    if elem != None and elem.text != None:
        return u'%s' % elem.text
    else:
        return None


def remove_xml_namespace(element, xml_namespace):
    '''Remove namespace from the XML document.'''
    ns = u'{%s}' % xml_namespace
    nsl = len(ns)
    for elem in element.getiterator():
        if elem.tag.startswith(ns):
            elem.tag = elem.tag[nsl:]
    return element


def determine_element(line):
    pos = line.find(' ')
    elem = line[:pos] + '>'


def create_namespace_dict(namespaces):
    d = {}
    print 'Constructing namespace dictionary'
    for ns in namespaces:
        key = ns.get('key')
        d[key] = extract_text(ns)
        text = ns.text if ns.text != None else ''
        try:
            print key, text.encode(settings.encoding)
        except UnicodeEncodeError:
            print key
    return d


def extract_meta_information(fh):
    '''
    The purpose of this function is:
    1) Determine the version of the mediawiki dump file. Default is 0.4.
    2) Create a dictionary with the namespaces
    '''
    buffer = cStringIO.StringIO()
    wrapper = codecs.getwriter(settings.encoding)(buffer)
    wrapper.write("<?xml version='1.0' encoding='UTF-8' ?>\n")
    re_version = re.compile('\"\d\.\d\"')
    for x, raw_data in enumerate(fh):
        raw_data = ''.join(raw_data.strip())
        if x == 0:
            version = re.findall(re_version, raw_data)[0]
            version = version.replace('"', '')
        wrapper.write(raw_data)
        if raw_data.find('</siteinfo>') > -1:
            wrapper.write('</mediawiki>')
            article = wrapper.getvalue()
            elem = cElementTree.XML(article)
            break
    xml_namespace = settings.xml_namespace.replace('0.4', version)
    elem = remove_xml_namespace(elem, xml_namespace)
    siteinfo = elem.find('siteinfo')
    namespaces = siteinfo.find('namespaces')
    namespaces = create_namespace_dict(namespaces)
    return namespaces, xml_namespace



def read_input(fh):
    buffer = cStringIO.StringIO()
    wrapper = codecs.getwriter(settings.encoding)(buffer)
    wrapper.write("<?xml version='1.0' encoding='UTF-8' ?>\n")
    start_parsing = False

    for raw_data in fh:
        if raw_data == '\n':
            continue
        if start_parsing == False and raw_data.find('<page>') > -1:
            start_parsing = True
        if start_parsing:
            raw_data = ''.join(raw_data.strip())
            wrapper.write(raw_data)
            if raw_data.find('</page>') > -1:
                article = wrapper.getvalue()
                size = len(article)
                #article.encode(settings.encoding)
                article = cElementTree.XML(article)
                yield article, size
                '''
                #This looks counter intuitive but Python continues with this 
                call after it has finished the yield statement
                '''
                buffer = cStringIO.StringIO()
                wrapper = codecs.getwriter(settings.encoding)(buffer)
                wrapper.write("<?xml version='1.0' encoding='UTF-8' ?>\n")
    fh.close()


def debug():
    fh = codecs.open('c:\\wikimedia\\en\\wiki\dewiki-latest-stub-meta-history.xml', 'r', 'utf-8')
    for article in read_input(fh):
        print article
    extract_meta_information(fh)
    fh.close()


if __name__ == '__main__':
    debug()
