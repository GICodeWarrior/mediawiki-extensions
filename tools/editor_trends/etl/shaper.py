

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-11-24'
__version__ = '0.1'

import datetime
import math


def add_datatype(datatype=0.0):
    if datatype == 'dict':
        d = dict()
    elif datatype == 'list':
        d = list()
    elif datatype == 'set':
        d = set()
    else:
        d = 0.0
    return d


def create_clock():
    d = {}
    for i in xrange(0, 24):
        d[i] = 0.0
    return d

def create_datacontainer(datatype):
    '''
    This function initializes an empty dictionary with as key the year (starting
    2001 and running through) and as value @init_value, in most cases this will
    be zero so the dictionary will act as a running tally for a variable but
    @init_value can also a list, [], or a dictionary, {}, or a set, set().  
    '''
    data = {}
    year = datetime.datetime.now().year + 1
    for x in xrange(2001, year):
        data[str(x)] = add_datatype(datatype)
#        if datatype == 'dict':
#            data[str(x)] = dict()
#        elif datatype == 'list':
#            data[str(x)] = list()
#        elif datatype == 'set':
#            data[str(x)] = set()
#        else:
#            data[str(x)] = 0.0
    return data


def add_months_to_datacontainer(datacontainer, datatype):
    for dc in datacontainer:
        datacontainer[dc] = {}
        for x in xrange(1, 13):
            datacontainer[dc][str(x)] = add_datatype(datatype)
#            if datatype == 'dict':
#                datacontainer[dc][str(x)] = dict()
#            elif datatype == 'list':
#                datacontainer[dc][str(x)] = list()
#            elif datatype == 'set':
#                datacontainer[dc][str(x)] = set()
#            else:
#                datacontainer[dc][str(x)] = 0.0
#            #else:
            #    datacontainer[dc][str(x)] = 0.0
    return datacontainer


def get_standard_deviation(numberList):
    mean = get_mean(numberList)
    std = 0
    n = len(numberList)
    for i in numberList:
        std = std + (i - mean) ** 2
    return math.sqrt(std / float(n - 1))


def get_median(numberList):
    #print numberList
    if numberList == []: return '.'
    theValues = sorted(numberList)
    theValues = [float(x) for x in theValues]
    if len(theValues) % 2 == 1:
        return theValues[(len(theValues) + 1) / 2 - 1]
    else:
        lower = theValues[len(theValues) / 2 - 1]
        upper = theValues[len(theValues) / 2]
        #print upper, lower
    return (lower + upper) / 2


def get_mean(numberList):
    #print numberList
    if numberList == []: return '.'
    floatNums = [float(x) for x in numberList]
    return sum(floatNums) / len(numberList)
