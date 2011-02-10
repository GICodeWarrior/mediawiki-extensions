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
__date__ = '2011-02-10'
__version__ = '0.1'

import sys
sys.path.append('../libs/')

from wurfl import devices
from pywurfl.algorithms import TwoStepAnalysis

try:
    import psyco
    psyco.full()
except ImportError:
    pass

fh = open('../deployment/india.log-20110209', 'r')
search_algorithm = TwoStepAnalysis(devices)

phones = {}

for line in fh:
    line = line.split(' ')
    if len(line) != 14:
        continue
    browser = line[13]
    browser = browser.replace('%', ' ')
    browser = unicode(browser)
    device = devices.select_ua(browser, search=search_algorithm)
    if not device.devid == 'generic_web_browser' and not device.devid == 'generic' and not device.devid == 'generic_web_crawler':
        #print device.devid, device.devua, device.device_os
        phones.setdefault(device.devid, 0)
        phones[device.devid] += 1

for phone in phones:
    print phone, phones[phone]

fh.close()

