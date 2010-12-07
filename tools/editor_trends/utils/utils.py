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

'''
The utils module contains helper functions that will be needed throughout.
It provides functions to read / write data to text and binary files, fix markup
and track error messages.
'''

import re
import htmlentitydefs
import cPickle
import datetime
import codecs
import os
import ctypes
import time
#import subprocess
import sys
import shutil
sys.path.append('..')

import configuration
settings = configuration.Settings()
import exceptions

try:
    import psyco
    psyco.full()
except ImportError:
    pass


RE_ERROR_LOCATION = re.compile('\d+')
RE_NUMERIC_CHARACTER = re.compile('&#?\w+;')


def convert_timestamp_to_date(timestamp):
    return datetime.datetime.strptime(timestamp[:10], settings.date_format)


def convert_timestamp_to_datetime_naive(timestamp):
    return datetime.datetime.strptime(timestamp, settings.timestamp_format)


def convert_timestamp_to_datetime_utc(timestamp):
    tz = datetime.tzinfo('utc')
    d = convert_timestamp_to_datetime_naive(timestamp)
    #return d.replace(tzinfo=tz) #enabling this line crashes pymongo
    return d



def check_if_process_is_running(pid):
    try:
        if settings.OS == 'Windows':
            PROCESS_TERMINATE = 1
            handle = ctypes.windll.kernel32.OpenProcess(PROCESS_TERMINATE, False, pid)
            ctypes.windll.kernel32.CloseHandle(handle)
            if handle != 0:
                return True
            else:
                return False
        else:
            os.kill(pid, 0)
            return True
    except Exception, error:
        print error
        return False


# error tracking related functions
def track_errors(xml_buffer, error, file, messages):
    text = extract_offending_string(xml_buffer.getvalue(), error)

    vars = {}
    vars['file'] = file
    vars['error'] = error
    vars['text'] = text
    #print file, error, text
    key = remove_error_specific_information(error)
    if key not in messages:
        messages[key] = {}
    if messages[key] == {}:
        c = 0
    else:
        counters = messages[key].keys()
        counters.sort()
        counters.reverse()
        c = counters[-1]

    messages[key][c] = {}
    for var in vars:
        messages[key][c][var] = vars[var]

    return messages


def report_error_messages(messages, function):
    store_object(messages, settings.log_location, function.func_name)
    errors = messages.keys()
    for error in errors:
        for key, value in messages[error].iteritems():
            print error, key, value


def remove_error_specific_information(e):
    pos = e.args[0].find('line')
    if pos > -1:
        return e.args[0][:pos]
    else:
        return e.args[0]


def extract_offending_string(text, error):
    '''
    This function determines the string that causes an error when feeding it to
    the XML parser. This is only useful for debugging purposes.
    '''
    location = re.findall(RE_ERROR_LOCATION, error.args[0])
    if location != []:
        location = int(location[0]) - 1
        text = text.split('\n')[location]
        text = text.decode('utf-8')
        return text
    else:
        return ''


# read / write data related functions
def read_data_from_csv(location, filename, encoding):
    '''
    @filename is the path (either absolute or relative) including the name of
    of the file
    @encoding is usually utf-8 
    '''
    fh = create_txt_filehandle(location, filename, 'r', encoding)
    for line in fh:
        yield line

    fh.close()


def create_directory(path):
    try:
        os.mkdir(path)
        return True
    except IOError:
        return False


def determine_file_extension(filename):
    pos = filename.rfind('.') + 1
    return filename[pos:]


def determine_file_mode(extension):
    '''
    Checks if a given extension is an ASCII extension or not. The settings file
    provides known ASCII extensions. 
    '''
    if extension in settings.ascii_extensions:
        return 'w'
    else:
        return 'wb'


def write_list_to_csv(data, fh, recursive=False, newline=True):
    '''
    @data is a list which can contain other lists that will be written as a
    single line to a textfile
    @fh is a handle to an open text
    
    The calling function is responsible for:
        1) closing the filehandle
    '''
    tab = False
    wrote_newline = None
    if recursive:
        recursive = False
    for x, d in enumerate(data):
        if tab:
            fh.write('\t')
        if type(d) == type([]):
            recursive = write_list_to_csv(d, fh, recursive=True, newline=False)
            #when there is a list of lists but no other elements in the first list
            #then write a newline. 
            if len(d) == len(data[x]):
                fh.write('\n')
        elif type(d) == type({}):
            tab = write_dict_to_csv(d, fh, write_key=False, newline=newline)
        else:
            fh.write('%s' % d)
            tab = True

    if recursive:
        tab = False
        return True
    if newline:
        fh.write('\n')


def write_dict_to_csv(data, fh, keys, write_key=True, newline=True):
    for key in keys:
        if write_key:
            fh.write('%s\t' % key)
        if type(data[key]) == type(list):
            write_list_to_csv(data[key], fh, recursive=False, newline=False)
        elif getattr(data[key], '__iter__', False):
            for d in data[key]:
                fh.write('%s\t' % d)
        else:
            fh.write('%s\t' % (data[key]))
    if newline:
        fh.write('\n')


def create_txt_filehandle(location, name, mode, encoding):
    filename = construct_filename(name, '.csv')
    path = os.path.join(location, filename)
    return codecs.open(path, mode, encoding=encoding)


def create_binary_filehandle(location, filename, mode):
    path = os.path.join(location, filename)
    return open(path, mode)


def construct_filename(name, extension):
    if hasattr(name, '__call__'):
        return name.func_name + extension
    else:
        return name


def delete_file(location, filename, directory=False):
    if check_file_exists(location, filename):
        if not directory:
            try:
                path = os.path.join(location, filename)
                os.remove(path)
            except WindowsError, error:
                print error
        else:
            try:
                shutil.rmtree(location)
            except Exception, error:
                print error


def check_file_exists(location, filename):
    if hasattr(filename, '__call__'):
        filename = construct_filename(filename, '.bin')
    if os.path.exists(os.path.join(location, filename)):
        return True
    else:
        return False


def which(program):
    def is_exe(fpath):
        return os.path.exists(fpath) and os.access(fpath, os.X_OK)

    fpath, fname = os.path.split(program)
    if fpath:
        if is_exe(program):
            return program
    else:
        for path in os.environ["PATH"].split(os.pathsep):
            exe_file = os.path.join(path, program)
            if is_exe(exe_file):
                return exe_file

    raise exceptions.FileNotFoundException(program)


def store_object(object, location, filename):
    if hasattr(filename, '__call__'):
        filename = construct_filename(filename, '.bin')
    if not filename.endswith('.bin'):
        filename = filename + '.bin'
    fh = create_binary_filehandle(location, filename, 'wb')
    cPickle.dump(object, fh)
    fh.close()


def load_object(location, filename):
    if hasattr(filename, '__call__'):
        filename = construct_filename(filename, '.bin')
    if not filename.endswith('.bin'):
        filename = filename + '.bin'
    fh = create_binary_filehandle(location, filename, 'rb')
    obj = cPickle.load(fh)
    fh.close()
    return obj


def clean_string(string):
    string = string.replace('\n', '')
    return string


def invert_dict(dictionary):
    '''
    @dictionary is a simple dictionary containing simple values, ie. no lists,
    or other dictionaries
    output: dictionary where key and value are swapped. 
    '''
    return dict([[v, k] for k, v in dictionary.items()])


def create_dict_from_csv_file(location, filename, encoding, keys=None):
    '''
    Constructs a dictionary from a txtfile
    The first column of the csv file should contain the main key for the dictionary.
    If there are more than one value in the values list, then a @keys variable should
    be supplied and the key sequence should match the value sequence.
    '''
    d = {}
    for line in read_data_from_csv(location, filename, encoding):
        line = clean_string(line)
        line = line.split('\t')
        key = line[0]
        values = line[1:]
        if len(values) == 1:
            d[key] = values
        else:
            assert keys != None
            d[key] = {}
            for k, v in zip(keys, values):
                d[key][k] = v
    return d


def retrieve_file_list(location, extension, mask=None):
    '''
    Retrieve a list of files from a specified location.
    @location: either an absolute or relative path
    @extension: only include files with extension (optional)
    @mask: only include files that start with mask (optional), this is
    interpreted as a regular expression. 
    
    @return: a list of files matching the criteria
    '''
    if mask:
        mask = re.compile(mask)
    else:
        mask = re.compile('[\w\d*]')
    all_files = os.listdir(location)
    files = []
    for file in all_files:
        file = file.split('.')
        if len(file) == 1:
            continue
        if re.match(mask, file[0]) and file[1].endswith(extension):
            files.append('.'.join(file))
    return files





def merge_list(datalist):
    merged = []
    for d in datalist:
        for x in datalist[d]:
            merged.append(x)
    return merged


def split_list(datalist, maxval):
    chunks = {}
    a = 0
    parts = int(round(float(len(datalist)) / maxval, 0))
    for x in xrange(maxval):
        b = a + parts
        chunks[x] = datalist[a:b]
        a = (x + 1) * parts
        if a >= len(datalist):
           break
    return chunks


# Progress bar related functions
def update_progressbar(pbar, queue):
    '''
    Updates the progressbar by determining how much work is left in a queue
    '''
    x = pbar.maxval - queue.qsize()
    '''
    Currently, calling the pbar.update function gives the following error:
    File "build\bdist.win32\egg\progressbar.py", line 352, in update
        self.fd.write(self._format_line() + '\r')
    ValueError: I/O operation on closed file
    Not sure how to fix this, that's why the line is commented.
    '''
    pbar.update(pbar.currval + x)


def humanize_time_difference(seconds_elapsed):
    """
    Returns a humanized string representing time difference.
    It will only output the first two time units, so days and
    hours, or hours and minutes, except when there are only
    seconds.
    """
    seconds_elapsed = int(seconds_elapsed)
    humanized_time = {}
    time_units = [('days', 86400), ('hours', 3600), ('minutes', 60), ('seconds', 1)]
    for time, unit in time_units:
        dt = seconds_elapsed / unit
        if dt > 0:
            humanized_time[time] = dt
            seconds_elapsed = seconds_elapsed - (unit * humanized_time[time])
    #humanized_time['seconds'] = seconds_elapsed

    x = 0
    if len(humanized_time) == 1:
        return '%s %s' % (humanized_time['seconds'], 'seconds')
    else:
        obs = []
        for time, unit in time_units:
            if time in humanized_time:
                unit = humanized_time.get(time, None)
                if humanized_time[time] == 1:
                    time = time[:-1]
                obs.append((time, unit))
                x += 1
                if x == 2:
                    return '%s %s and %s %s' % (obs[0][1], obs[0][0], obs[1][1], obs[1][0])


if __name__ == '__main__':
    tool = settings.determine_ziptool()
    path = settings.detect_installed_program(tool)
    location = os.path.join(settings.input_location, 'en', 'wiki')
    source = 'enwiki-20100916-stub-meta-history.xml'
    zip_archive(path, location, source)
