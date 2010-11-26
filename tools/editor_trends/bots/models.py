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
__date__ = '2010-11-26'
__version__ = '0.1'

import datetime
import sys
sys.path.append('..')

import configuration
settings = configuration.Settings()

from etl import shaper
from utils import utils


class Bot(object):

    def __init__(self, name):
        self.name = name
        self.projects = []
        self.time = shaper.create_datacontainer(datatype='list')
        self.verified = True

    def hours_active(self):
        self.clock = shaper.create_clock()
        years = self.time.keys()
        for year in years:
            for obs in self.time[year]:
                self.clock[obs.hour] = 1

    def add_clock_data(self):
        hours = self.clock.keys()
        hours.sort()
        for hour in hours:
            self.data.append(self.clock[hour])
    
        

    def avg_lag_between_edits(self):
        years = self.time.keys()
        edits = []
        for year in years:
            for x in self.time[year]:
                edits.append(x)
        
        if edits != []:
            edits.sort()
            dt = datetime.timedelta()
            for i, edit in enumerate(edits):
                if i == len(edits) -1:
                    break
                dt += edits[i + 1] - edits[i]
            dt = dt / len(edits)
            self.dt = dt
            self.n = i 
        else:
            self.dt = None
    
    def write_training_dataset(self, fh):
        self.data = []
        self.data.append(self.name)
        self.data.append(self.verified)
        self.add_clock_data()
        self.data.append(self.dt)
        utils.write_list_to_csv(self.data, fh, recursive=False, newline=True)
        


if __name__ == '__main__':
    pass
