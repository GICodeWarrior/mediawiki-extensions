__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-11-09'
__version__ = '0.1'

import datetime
import calendar
import time
from database import db


def test_date():

    mongo = db.init_mongo_db('unit_test')
    collection = mongo['foo']
    d1 = datetime.datetime(2007, 1, 1)
    d2 = datetime.datetime(2006, 12, 31)

    if d1.utcoffset() is not None:
        d1 = d1 - d1.utcoffset()
    millis = int(calendar.timegm(d1.timetuple()) * 1000 + d1.microsecond / 1000)
    millis = millis /1000
    d3 = time.gmtime(millis)
    #d3 = datetime.date(2007, 1, 1)
    collection.insert({'date': d1})
    collection.insert({'date': d2})
    #collection.insert({'date': d3})

