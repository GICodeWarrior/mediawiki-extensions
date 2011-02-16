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
__email__ = 'dvanliere at gmail dot com'
__date__ = '2011-01-14'
__version__ = '0.1'

import datetime

class Timer(object):
    def __init__(self):
        self.t0 = datetime.datetime.now()

    def __str__(self):
        return 'Timer started: %s' % self.t0

    def stop(self):
        self.t1 = datetime.datetime.now()

    def elapsed(self):
        self.stop()
        print 'Processing time: %s' % (self.t1 - self.t0)


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
