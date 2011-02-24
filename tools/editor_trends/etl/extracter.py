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
__date__ = '2010-12-13'
__version__ = '0.1'

import sys
import re
import os
import multiprocessing
import progressbar
from Queue import Empty

import wikitree.parser
from bots import detector
from utils import file_utils
from utils import compression
from utils import log

try:
    import psyco
    psyco.full()
except ImportError:
    pass


RE_NUMERIC_CHARACTER = re.compile('&#(\d+);')


def remove_numeric_character_references(rts, text):
    return re.sub(RE_NUMERIC_CHARACTER, lenient_deccharref, text).encode(rts.encoding)


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


def build_namespaces_locale(namespaces, include=['0']):
    '''
    @include is a list of namespace keys that should not be ignored, the default
    setting is to ignore all namespaces except the main namespace. 
    '''
    ns = {}
    for key, value in namespaces.iteritems():
        if key in include:
            #value = namespaces[namespace].get(u'*', None)
            #ns.append(value)
            ns[key] = value
    return ns


def parse_comments(rts, revisions, function):
    for revision in revisions:
        comment = revision.find('{%s}comment' % rts.xml_namespace)
        if comment != None and comment.text != None:
            comment.text = function(comment.text)
    return revisions


def parse_article(elem, namespaces):
    '''
    @namespaces is a list of valid namespaces that should be included in the analysis
    if the article should be ignored then this function returns false, else it returns
    the namespace identifier and namespace name. 
    '''
    title = elem.text
    if title == None:
        return False
    ns = title.split(':')
    if len(ns) == 1 and '0' in namespaces:
        return {'id': 0, 'name': 'main namespace'}
    else:
        if ns[0] in namespaces.values():
            #print namespaces, title.decode('utf-8'), ns
            return {'id': ns[0], 'name': ns[1]}
        else:
            return False


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


def extract_revision_id(revision_id, **kwargs):
    if revision_id != None:
        return revision_id.text
    else:
        return None


def extract_contributor_id(contributor, **kwargs):
    '''
    @contributor is the xml contributor node containing a number of attributes
    Currently, we are only interested in registered contributors, hence we
    ignore anonymous editors. 
    '''
    if contributor.get('deleted'):
        # ASK: Not sure if this is the best way to code deleted contributors.
        return None
    elem = contributor.find('id')
    if elem != None:
        return {'id':elem.text}
    else:
        elem = contributor.find('ip')
        if elem != None and elem.text != None \
        and validate_ip(elem.text) == False \
        and validate_hostname(elem.text) == False:
            return {'username':elem.text, 'id': elem.text}
        else:
            return None


def output_editor_information(revisions, page, bots, rts):
    '''
    @elem is an XML element containing 1 revision from a page
    @output is where to store the data,  a filehandle
    @**kwargs contains extra information 
    
    the variable tags determines which attributes are being parsed, the values 
    in this dictionary are the functions used to extract the data. 
    '''
    headers = ['id', 'date', 'article', 'username', 'revision_id']
    tags = {'contributor': {'id': extract_contributor_id,
                            'bot': determine_username_is_bot,
                            'username': extract_username,
                            },
            'timestamp': {'date': wikitree.parser.extract_text},
            'id': {'revision_id': extract_revision_id,
                   }
            }
    vars = {}
    flat = []

    for x, revision in enumerate(revisions):
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
                if isinstance(value, dict):
                    for kw in value:
                        vars[x][kw] = value[kw]
                else:
                    vars[x][function] = value

    '''
    This loop determines for each observation whether it should be stored 
    or not. 
    '''
    for x in vars:
        if vars[x]['bot'] == 1 or vars[x]['id'] == None \
        or vars[x]['username'] == None:
            continue
        else:
            f = []
            for head in headers:
                f.append(vars[x][head])
            flat.append(f)
    return flat


def add_namespace_to_output(output, namespace):
    for x, o in enumerate(output):
        o.append(namespace['id'])
        output[x] = o
    return output


def parse_dumpfile(tasks, rts, lock):
    bot_ids = detector.retrieve_bots(rts.language.code)
    location = os.path.join(rts.input_location, rts.language.code, rts.project.name)
    output = os.path.join(rts.input_location, rts.language.code, rts.project.name, 'txt')
    widgets = log.init_progressbar_widgets('Extracting data')
    filehandles = [file_utils.create_txt_filehandle(output, '%s.csv' % fh, 'a',
                rts.encoding) for fh in xrange(rts.max_filehandles)]

    while True:
        total, processed = 0.0, 0.0
        try:
            filename = tasks.get(block=False)
        except Empty:
            break
        finally:
            print tasks.qsize()
            tasks.task_done()

        if filename == None:
            print '\nThere are no more jobs in the queue left.'
            break

        filesize = file_utils.determine_filesize(location, filename)
        print 'Opening %s...' % (os.path.join(location, filename))
        print 'Filesize: %s' % filesize
        fh1 = file_utils.create_txt_filehandle(location, filename, 'r', rts.encoding)
        fh2 = file_utils.create_txt_filehandle(location, 'articles.csv', 'a', rts.encoding)
        ns, xml_namespace = wikitree.parser.extract_meta_information(fh1)
        ns = build_namespaces_locale(ns, rts.namespaces)
        rts.xml_namespace = xml_namespace

        pbar = progressbar.ProgressBar(widgets=widgets, maxval=filesize).start()
        for page, article_size in wikitree.parser.read_input(fh1):
            title = page.find('title')
            total += 1
            namespace = parse_article(title, ns)
            if namespace != False:
                article_id = page.find('id').text
                title = page.find('title').text
                revisions = page.findall('revision')
                revisions = parse_comments(rts, revisions, remove_numeric_character_references)
                output = output_editor_information(revisions, article_id, bot_ids, rts)
                output = add_namespace_to_output(output, namespace)
                write_output(output, filehandles, lock, rts)
                file_utils.write_list_to_csv([article_id, title], fh2)
                processed += 1
            page.clear()
            pbar.update(pbar.currval + article_size)

        fh1.close()
        fh2.close()
        print 'Closing %s...' % (os.path.join(location, filename))
        print 'Total pages: %s' % total
        print 'Pages processed: %s (%s)' % (processed, processed / total)

    return True


def group_observations(obs):
    '''
    This function groups observation by editor id, this way we have to make
    fewer fileopening calls. 
    '''
    d = {}
    for o in obs:
        id = o[0]
        if id not in d:
            d[id] = []
        d[id].append(o)
    return d


def write_output(observations, filehandles, lock, rts):
    observations = group_observations(observations)
    for obs in observations:
        lock.acquire() #lock the write around all edits of an editor for a particular page
        try:
            for i, o in enumerate(observations[obs]):
                if i == 0:
                    fh = filehandles[hash(rts, obs)]
                file_utils.write_list_to_csv(o, fh)

        except Exception, error:
            print 'Encountered the following error while writing data to %s: %s' % (error, fh)
        finally:
            lock.release()


def hash(rts, id):
    '''
    A very simple hash function based on modulo. The except clause has been 
    added because there are instances where the username is stored in userid
    tag and hence that's a string and not an integer. 
    '''
    try:
        return int(id) % rts.max_filehandles
    except ValueError:
        return sum([ord(i) for i in id]) % rts.max_filehandles


def prepare(output):
    res = file_utils.delete_file(output, None, directory=True)
    if res:
        res = file_utils.create_directory(output)
    return res


def unzip(properties):
    tasks = multiprocessing.JoinableQueue()
    canonical_filename = file_utils.determine_canonical_name(properties.filename)
    extension = file_utils.determine_file_extension(properties.filename)
    files = file_utils.retrieve_file_list(properties.location,
                                     extension,
                                     mask=canonical_filename)
    print properties.location
    print 'Checking if dump file has been extracted...'
    for fn in files:
        file_without_ext = fn.replace('%s%s' % ('.', extension), '')
        result = file_utils.check_file_exists(properties.location, file_without_ext)
        if not result:
            print 'Dump file %s has not yet been extracted...' % fn
            retcode = compression.launch_zip_extractor(properties.location,
                                                       fn,
                                                       properties)
        else:
            print 'Dump file has already been extracted...'
            retcode = 0
        if retcode == 0:
            tasks.put(file_without_ext)
        elif retcode != 0:
            print 'There was an error while extracting %s, please make sure \
            that %s is valid archive.' % (fn, fn)
            return False
    return tasks


def launcher(rts):
    '''
    This is the main entry point for the extact phase of the data processing
    chain. First, it will put a the files that need to be extracted in a queue
    called tasks, then it will remove some old files to make sure that there is
    no data pollution and finally it will start the parser to actually extract
    the variables from the different dump files. 
    '''
    tasks = unzip(rts)
    if not tasks:
        return False

    output = os.path.join(rts.input_location, rts.language.code,
                          rts.project.name, 'txt')
    result = prepare(output)
    if not result:
        return result

    lock = multiprocessing.Lock()

    consumers = [multiprocessing.Process(target=parse_dumpfile,
                                args=(tasks,
                                      rts,
                                      lock))
                                for x in xrange(rts.number_of_processes)]

    for x in xrange(rts.number_of_processes):
        tasks.put(None)

    for w in consumers:
        print 'Launching process...'
        w.start()

    tasks.join()

    result = sum([consumer.exitcode for consumer in consumers
                  if consumer.exitcode != None])

    if result == 0:
        return True
    else:
        return False


def debug():
    project = 'wiki'
    language_code = 'sv'
    filename = 'svwiki-latest-stub-meta-history.xml'
    parse_dumpfile(project, filename, language_code)


if __name__ == '__main__':
    debug()
