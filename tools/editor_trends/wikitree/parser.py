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

import cStringIO
import codecs
import xml.etree.cElementTree as cElementTree

import configuration
settings = configuration.Settings()
from utils import utils

def convert_html_entities(text):
    return utils.unescape(text)


def extract_text(elem, **kwargs):
    if elem != None and elem.text != None:
        #try:
        return elem.text    #.decode(settings.encoding)
        #except UnicodeDecodeError:
        #return None


def retrieve_xml_node(xml_nodes, name):
    for xml_node in xml_nodes:
        if xml_node.tag == name:
            return xml_node
    return None #maybe this should be replaced with an NotFoundError

def determine_element(line):
    pos = line.find(' ')
    elem = line[:pos] + '>'


def read_input(file):
    buffer = cStringIO.StringIO()
    wrapper = codecs.getwriter(settings.encoding)(buffer)
    wrapper.write("<?xml version='1.0' encoding='UTF-8' ?>\n")
    start_parsing = False

    for raw_data in file:
        if raw_data == '\n':
            continue
        if start_parsing == False and raw_data.find('<page>') > -1:
            start_parsing = True
        if start_parsing:
            raw_data = ''.join(raw_data.strip())
            wrapper.write(raw_data)
            if raw_data.find('</page>') > -1:
                article = wrapper.getvalue()
                #article.encode(settings.encoding)
                article = cElementTree.XML(article)
                yield article
                '''
                #This looks counter intuitive but Python continues with this call
                after it has finished the yield statement
                '''
                buffer = cStringIO.StringIO()
                wrapper = codecs.getwriter(settings.encoding)(buffer)
                wrapper.write("<?xml version='1.0' encoding='UTF-8' ?>\n")
    file.close()
