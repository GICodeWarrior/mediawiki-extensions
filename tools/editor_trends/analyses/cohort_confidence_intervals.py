__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-11-24'
__version__ = '0.1'

import sys
sys.path.append('..')

import configuration
settings  = configuration.Settings()
from utils import utils
from database import db


def dataset_edits_by_month(dbname, **kwargs):
    dbname = kwargs.pop('dbname')
    mongo = db.init_mongo_db(dbname)
    editors = mongo['dataset']
    name = dbname + '_edits_by_month.csv'
    fh = utils.create_txt_filehandle(settings.dataset_location, name, 'w', settings.encoding)
    x = 0
    vars_to_expand = ['monthly_edits']
    while True:
        try:
            id = input_queue.get(block=False)
            print input_queue.qsize()
            obs = editors.find_one({'editor': id})
            obs = expand_observations(obs, vars_to_expand)
            if x == 0:
                headers = obs.keys()
                headers.sort()
                headers = expand_headers(headers, vars_to_expand, obs)
                utils.write_list_to_csv(headers, fh)
            data = []
            keys = obs.keys()
            keys.sort()
            for key in keys:
                data.append(obs[key])
            utils.write_list_to_csv(data, fh)

            x += 1
        except Empty:
            break
    fh.close() 


if __name__ == '__main__':
    
    