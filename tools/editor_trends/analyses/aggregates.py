__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-12-10'
__version__ = '0.1'

import datetime
import multiprocessing
import calendar
import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()
from database import db
from etl import shaper
from utils import utils


class Dataset:
    def __init__(self):
        pass


def new_editor_count(editors, dbname, collection, month=12):
    '''
    @month should be an integer in the range of 1-12. 
    '''
    assert month > 0 and month < 13
    mongo = db.init_mongo_db(dbname)
    dataset = mongo[collection + '_dataset']
    data = shaper.create_datacontainer(0)
    start_year = 2001
    end_year = datetime.datetime.now().year + 1
    while True:
        id = editors.get(block=False)
        if id == None:
            break
        editor = dataset.find_one({'editor': id}, {'edits': 1})
        new_editor = editor['edits'][9]['date'] #date that editor became a new editor

        for year in xrange(start_year, end_year):
            day = calendar.monthrange(year, month)[1]
            cut_off = datetime.datetime(year, month, day)
            if new_editor < cut_off:
                data[year] += 1

    return data


def active_editor_count(editors, dbname, collection, month=12):
    '''
    @month should be an integer in the range of 1-12. 
    '''
    assert month > 0 and month < 13
    mongo = db.init_mongo_db(dbname)
    dataset = mongo[collection + '_dataset']
    data = shaper.create_datacontainer('dict')
    data = shaper.add_months_to_datacontainer(data, 0)
    start_year = 2001
    end_year = datetime.datetime.now().year + 1
    while True:
        id = editors.get(block=False)
        if id == None:
            break
        editor = dataset.find_one({'editor': id}, {'monthly_edits': 1})
        monthly_edits = editor['monthly_edits']

        for year in xrange(start_year, end_year):
            for month in xrange(1, 13):
                if monthly_edits[str(year)][str(month)] > 4:
                    data[year][month] += 1

    return data



def new_editor_count_launcher(dbname, collection):
    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')
    tasks = multiprocessing.JoinableQueue()
    for editor in editors:
        tasks.put(editor)
    print 'The queue contains %s editors.' % tasks.qsize()
    tasks.put(None)
    data = new_editor_count(tasks, dbname, collection, month=7)
    keys = data.keys()
    keys.sort()
    file = '%s_aggrate_new_editor_count.csv' % dbname
    fh = utils.create_txt_filehandle(settings.dataset_location, file, 'w', settings.encoding)
    utils.write_list_to_csv(keys, fh, recursive=False, newline=True)
    utils.write_dict_to_csv(data, fh, keys, write_key=False, newline=True)
    fh.close()

def active_editor_count_launcher(dbname, collection):
    editors = db.retrieve_distinct_keys(dbname, collection, 'editor')
    tasks = multiprocessing.JoinableQueue()
    for editor in editors:
        tasks.put(editor)
    print 'The queue contains %s editors.' % tasks.qsize()
    tasks.put(None)
    data = active_editor_count(tasks, dbname, collection, month=7)
    keys = data.keys()
    keys.sort()
    headers = ['%s-%s' % (m, k) for k in keys for m in xrange(1, 13)]
    file = '%s_aggrate_active_editor_count.csv' % dbname
    fh = utils.create_txt_filehandle(settings.dataset_location, file, 'w', settings.encoding)
    utils.write_list_to_csv(headers, fh, recursive=False, newline=True)
    utils.write_dict_to_csv(data, fh, keys, write_key=False, newline=True)
    fh.close()


if __name__ == '__main__':
    #new_editor_count_launcher('enwiki', 'editors')
    active_editor_count_launcher('enwiki', 'editors')
