__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-11-22'
__version__ = '0.1'

import xml.etree.cElementTree as cElementTree
import cStringIO
import os
import sys
import codecs
import multiprocessing
sys.path.append('..')
import cProfile

import configuration
settings = configuration.Settings()

from etl import extract
from utils import models
from wikitree import xml
from utils import utils
from etl import chunker


def extract_article_talk_pages(page, output, **kwargs):
    tags = {'title': xml.extract_text,
            'id': xml.extract_text,
            }
    headers = ['id', 'title']
    vars = {}
    elements = page.getchildren()
    for tag, function in tags.iteritems():
        xml_node = xml.retrieve_xml_node(elements, tag)
        vars[tag] = function(xml_node, kwargs)

    data = []
    for head in headers:
        data.append(vars[head])
    utils.write_list_to_csv(data, output)


def map_article_talk_ids(language_code):
    ns = chunker.load_namespace(language_code)
    talk_ns = ns['1'].get(u'*', None)
    input = os.path.join(settings.input_location, 'en', 'wiki', 'article_talk')
    files = utils.retrieve_file_list(input, 'txt')
    articles = {}
    talks = {}
    for file in files:
        fh = utils.create_txt_filehandle(input, file, 'r', settings.encoding)
        for line in fh:
            line = line.replace('\n', '')
            id, article = line.split('\t')
            if not article.startswith(talk_ns):
                articles[article] = {}
                articles[article]['id'] = id
            else:
                talks[article] = id
        fh.close()
    utils.store_object(articles, settings.binary_location, 'articles.bin')
    utils.store_object(talks, settings.binary_location, 'talks.bin')

    for article in articles:
        talk = '%s:%s' % (talk_ns, article)
        if talk in talks:
            articles[article]['talk_id'] = talks[talk]

    utils.store_object(articles, settings.binary_location, 'articles_talks.bin')


def article_to_talk_launcher(**kwargs):
    file = 'dewiki-latest-stub-meta-current.xml'#'enwiki-20100916-stub-meta-history.xml'
    include = [0, 1]
    language_code = 'en'
    project = 'wiki'
    input = os.path.join(settings.input_location, 'en', 'wiki')
    output = os.path.join(settings.input_location, 'en', 'wiki', 'chunks')
    chunker.split_file(input, file, project, language_code, include, format='xml', zip=True)
    files = utils.retrieve_file_list(output, 'xml')


    tasks = multiprocessing.JoinableQueue()
    consumers = [extract.XMLFileConsumer(tasks, None) for i in xrange(settings.number_of_processes)]
    input = output
    output = os.path.join(settings.input_location, 'en', 'wiki', 'article_talk')
    for file in files:
        tasks.put(extract.XMLFile(input, output, file, [], extract_article_talk_pages, destination='file'))
    for x in xrange(settings.number_of_processes):
        tasks.put(None)

    print tasks.qsize()
    for w in consumers:
        w.start()

    tasks.join()


def debug_map_article_talk_ids():
    map_article_talk_ids('de')


def debug_article_to_talk():
    input = os.path.join(settings.input_location, 'en', 'wiki', 'chunks', '0.xml')
    output = os.path.join(settings.input_location, 'en', 'wiki', 'txt', 'test.txt')
    f = codecs.open(output, 'w', encoding=settings.encoding)
    fh = open(input, 'r')
    data = xml.read_input(fh)
    for raw_data in data:
        xml_buffer = cStringIO.StringIO()
        raw_data.insert(0, '<?xml version="1.0" encoding="UTF-8" ?>\n')
        raw_data = ''.join(raw_data)
        xml_buffer.write(raw_data)
        elem = cElementTree.XML(xml_buffer.getvalue())
        extract_article_talk_pages(elem, f)
    f.close()


if __name__ == '__main__':
    #cProfile.run('article_to_talk_launcher()')
    #debug_article_to_talk()
    debug_map_article_talk_ids()
    #article_to_talk_launcher()
