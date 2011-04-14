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

import hashlib

def validate_hostname(address):
    '''
    This is not a foolproof solution at all. The problem is that it's really 
    hard to determine whether a string is a hostname or not **reliably**. This 
    is a very fast rule of thumb. Will lead to false positives, 
    but that's life :)
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


def extract_revision_text(revision):
    return revision.text
#    rev = revision.find('ns0:text')
#    if rev != None:
#        if rev.text == None:
#            rev = fix_revision_text(revision)
#        return rev.text.encode('utf-8')
#    else:
#        return ''


def parse_title(title):
    return title.text


def parse_title_meta_data(title, namespace):
    '''
    This function categorizes an article to assist the Wikimedia Taxonomy
    project. See 
    http://meta.wikimedia.org/wiki/Contribution_Taxonomy_Project/Research_Questions
    '''
    title_meta = {}
    if not namespace:
        return title_meta

    title_meta['title'] = title
    ns = namespace['namespace']
    title_meta['ns'] = ns
    if title.startswith('List of'):
        title_meta['category'] = 'List'
    elif ns == 4 or ns == 5:
        if title.find('Articles for deletion') > -1:
            title_meta['category'] = 'Deletion'
        elif title.find('Mediation Committee') > -1:
            title_meta['category'] = 'Mediation'
        elif title.find('Mediation Cabal') > -1:
            title_meta['category'] = 'Mediation'
        elif title.find('Arbitration') > -1:
            title_meta['category'] = 'Arbitration'
        elif title.find('Featured Articles') > -1:
            title_meta['category'] = 'Featured Article'
        elif title.find('Featured picture candidates') > -1:
            title_meta['category'] = 'Featured Pictures'
        elif title.find('Featured sound candidates') > -1:
            title_meta['category'] = 'Featured Sounds'
        elif title.find('Featured list candidates') > -1:
            title_meta['category'] = 'Featured Lists'
        elif title.find('Featured portal candidates') > -1:
            title_meta['category'] = 'Featured Portal'
        elif title.find('Featured topic candidates') > -1:
            title_meta['category'] = 'Featured Topic'
        elif title.find('Good Article') > -1:
            title_meta['category'] = 'Good Article'
    return title_meta


def extract_username(contributor, xml_namespace):
    contributor = contributor.find('%s%s' % (xml_namespace, 'username'))
    if contributor != None:
        return contributor.text
    else:
        return None


def determine_username_is_bot(contributor, bots, xml_namespace):
    '''
    #contributor is an xml element containing the id of the contributor
    @bots should have a dict with all the bot ids and bot names
    @Return False if username id is not in bot dict id or True if username id
    is a bot id.
    '''
    username = contributor.find('%s%s' % (xml_namespace, 'username'))
    if username == None:
        return 0
    else:
        if username.text in bots:
            return 1
        else:
            return 0


def extract_contributor_id(revision, xml_namespace):
    '''
    @contributor is the xml contributor node containing a number of attributes
    Currently, we are only interested in registered contributors, hence we
    ignore anonymous editors. 
    '''
    if revision.get('deleted'):
        # ASK: Not sure if this is the best way to code deleted contributors.
        return None
    elem = revision.find('%s%s' % (xml_namespace, 'id'))
    if elem != None:
        return {'id':elem.text}
    else:
        elem = revision.find('%s%s' % (xml_namespace, 'ip'))
        if elem == None or elem.text == None:
            return None
        elif validate_ip(elem.text) == False and validate_hostname(elem.text) == False:
            return {'username':elem.text, 'id': elem.text}
        else:
            return None


def fix_revision_text(revision):
    if revision.text == None:
        revision.text = ''
    return revision


def create_md5hash(text):
    hash = {}
    if text != None:
        m = hashlib.md5()
        m.update(text)
        #echo m.digest()
        hash['hash'] = m.hexdigest()
    else:
        hash['hash'] = -1
    return hash


def calculate_delta_article_size(size, text):
    if 'prev_size' not in size:
        size['prev_size'] = 0
        size['cur_size'] = len(text)
        size['delta'] = len(text)
    else:
        size['prev_size'] = size['cur_size']
        delta = len(text) - size['prev_size']
        size['cur_size'] = len(text)
        size['delta'] = delta
    return size


def parse_contributor(revision, bots, xml_namespace):
    username = extract_username(revision, xml_namespace)
    user_id = extract_contributor_id(revision, xml_namespace)
    bot = determine_username_is_bot(revision, bots, xml_namespace)
    editor = {}
    editor['username'] = username
    editor['bot'] = bot
    if user_id != None:
        editor.update(user_id)
    else:
        editor = False
    return editor


def determine_namespace(title, namespaces, include_ns):
    '''
    You can only determine whether an article belongs to the Main Namespace
    by ruling out that it does not belong to any other namepace
    '''
    ns = {}
    if title != None:
        for key in include_ns:
            namespace = namespaces.pop(key, None)
            if namespace and title.startswith(namespace):
                ns['namespace'] = key
        if ns == {}:
            for namespace in namespaces.itervalues():
                if namespace and title.startswith(namespace):
                    '''article does not belong to any of the include_ns
                    namespaces'''
                    return False
            ns = 0
    else:
        ns = False
    return ns


def is_revision_reverted(hash_cur, hashes):
    revert = {}
    if hash_cur in hashes and hash_cur != -1:
        revert['revert'] = 1
    else:
        revert['revert'] = 0
    return revert


def extract_revision_id(revision_id):
    if revision_id != None:
        return revision_id.text
    else:
        return None


def extract_comment_text(revision_id, revision):
    comment = {}
    text = revision.find('comment')
    if text != None and text.text != None:
        comment[revision_id] = text.text.encode('utf-8')
    return comment


def create_namespace_dict(siteinfo, xml_namespace):
    '''
    This function determines the local names of the different namespaces.
    '''
    namespaces = {}
    print 'Detected xml namespace: %s' % xml_namespace
    print 'Constructing namespace dictionary'
    elements = siteinfo.find('%s%s' % (xml_namespace, 'namespaces'))
    for elem in elements.getchildren():
        key = int(elem.get('key'))
        namespaces[key] = elem.text #extract_text(ns)
        text = elem.text if elem.text != None else ''
        try:
            print key, text.encode('utf-8')
        except UnicodeEncodeError:
            print key
        elem.clear()
    if namespaces == {}:
        print 'Could not determine namespaces. Exiting.'
        sys.exit(-1)
    return namespaces


def determine_xml_namespace(siteinfo):
    '''
    This function determines the xml_namespace version
    '''
    for elem in siteinfo    :
        if elem.tag.endswith('sitename'):
            xml_namespace = elem.tag
            pos = xml_namespace.find('sitename')
            xml_namespace = xml_namespace[0:pos]
            elem.clear()
            return xml_namespace
        else:
            elem.clear()
