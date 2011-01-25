__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__email__ = 'dvanliere at gmail dot com'
__date__ = '2010-11-17'
__version__ = '0.1'

import sys
import os
sys.path.append('..')

import configuration
settings = configuration.Settings()

from utils import file_utils

def main():
    input = os.path.join(settings.input_location, 'en', 'wiki', 'sorted')
    files = file_utils.retrieve_file_list(input, 'txt', mask='merged_final')
    editors = {}
    for file in files:
        fh = file_utils.create_txt_filehandle(input, file, 'r', settings.encoding)
        for line in fh:
            author = line.split('\t')[0]
            if author not in editors:
                editors[author] = 0
            editors[author] += 1
        fh.close()
    file_utils.store_object(editors, settings.binary_location, 'editors_count4.bin')
    print 'Number of editors: %s' % len(editors)


if __name__ == '__main__':
    main()
