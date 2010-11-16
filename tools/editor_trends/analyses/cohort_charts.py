__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-11-10'
__version__ = '0.1'

import configuration
settings = configuration.Settings()
from utils import utils

def prepare_cohort_dataset():
    dataset = utils.load_object(settings.binary_location, 'cohort_data.bin')
    fh = utils.create_txt_filehandle(settings.dataset_location, 'cohort_data.txt', 'w', settings.encoding)

    years = dataset.keys()
    years.sort()
    periods = dataset[2001].keys()
    periods.sort()
    periods.remove('n')
    headers = ['months_%s' % i for i in periods]
    headers.insert(0, 'year')
    utils.write_list_to_csv(headers, fh)
    for year in years:
        n = float(dataset[year].pop('n'))
        obs = [100 * float(dataset[year][p]) / n for p in periods]
        raw = [dataset[year][p] for p in periods]
        print sum(obs)
        obs.insert(0, year)
        utils.write_list_to_csv(obs, fh, newline=False)
        utils.write_list_to_csv(raw, fh)
    fh.close()
