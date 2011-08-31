#!/usr/bin/env python

import sys
from wurfl import devices
from pywurfl.algorithms import TwoStepAnalysis

search_algorithm = TwoStepAnalysis(devices)

# input comes from STDIN (standard input)
for line in sys.stdin:
    # remove leading and trailing whitespace
    line = line.strip()
    # split the line into words
    words = line.split(" ")
    # increase counters
#    for word in words:
        # write the results to STDOUT (standard output);
        # what we output here will be the input for the
        # Reduce step, i.e. the input for reducer.py
        #
        # tab-delimited; the trivial word count is 1
    user_agent = unicode(words[len(words)-1])
    device = devices.select_ua(user_agent, search=search_algorithm)
    print '%s %s (%s %s)\t%s' % (device.brand_name, device.model_name, device.mobile_browser, device.mobile_browser_version, 1)
    
