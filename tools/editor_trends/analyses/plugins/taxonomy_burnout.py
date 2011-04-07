#!/usr/bin/python
# -*- coding: utf-8 -*-
'''
Copyright (C) 2011 by Ryan Faulkner (rfaulkner@wikimedia.org)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details, at
http://www.fsf.org/licenses/gpl.html
'''

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@wikimedia.org',
                            'Ryan Faulkner (rfaulkner@wikimedia.org)'])
__email__ = 'dvanliere at wikimedia dot org'
__date__ = '2011-01-25'
__version__ = '0.1'

from datetime import date

'''
    taxonomy_burnout
    ================
    
    This is a Taxonomy project metric.  The "Editor Burnout" metric is intended to measure 
    editors that make a large number of edits in a single month and then make relatively few
    in the following months.  The exact number of edits and months are defined by the 
    following gloabal variables:
    
    ONE_MONTH_EDIT_COUNT_CUTOFF
    MONTHS_AFTER_CUTOFF_TO_RECORD_BURNOUT
    
    While the average number of edits per month beyond MONTHS_AFTER_CUTOFF_TO_RECORD_BURNOUT 
    that classify an editor as a "burned out" is defined in:
    
    CUTOFF_RATE_FOR_BURNOUT_EDITORS
    
    More documentation may be found at: 
    
    http://meta.wikimedia.org/wiki/Contribution_Taxonomy_Project/Research_Questions
    
    If you have questions about how to use this plugin, please visit:
    http://meta.wikimedia.org/wiki/Wikilytics_Plugins
    
'''
def taxonomy_burnout(var, editor, **kwargs):
    
    """ These parameters can be used to tune the burnout analyses """
    global MONTHS_AFTER_CUTOFF_TO_RECORD_BURNOUT
    global CUTOFF_RATE_FOR_BURNOUT_EDITORS
    global ONE_MONTH_EDIT_COUNT_CUTOFF
    
    MONTHS_AFTER_CUTOFF_TO_RECORD_BURNOUT = 6
    CUTOFF_RATE_FOR_BURNOUT_EDITORS = 10
    ONE_MONTH_EDIT_COUNT_CUTOFF = 149
    
    
    """ Record editor properties """
    new_wikipedian = editor['new_wikipedian']
    edits = editor['edit_count']
    cutoff = kwargs.get('cutoff', ONE_MONTH_EDIT_COUNT_CUTOFF)
    username = editor['username']

    made_cutoff = False
    burnout = False
    
    total_edits_since_cutoff = 0.0
    total_months_since_cutoff = 0.0
    
    zero_edit_months = dict()

    """ 
        new_wikipedian is False if the user is not classified as a wikipedian 
        and returns the date of their becoming a Wikipedian otherwise 
        
        In that case iterate through the months to present trying to find:
            (1) If they meet ONE_MONTH_EDIT_COUNT_CUTOFF 
            (2) If the fall into the burnout category thereafter
    """ 
            
    if new_wikipedian:
        years = edits.keys()
        
        for year in years:
            months = edits[year].keys()
            
            for month in months:
                
                if edits[year][month].get('0', 0) > cutoff:
                    made_cutoff = True
                if made_cutoff == True:
                    
                    """ Count every month after the cutoff is made """
                    total_months_since_cutoff += 1.0
                    
                    """ Handle cases where no edits were recorded for a given month """
                    try:
                        edit_count_month = edits[year][month].get('0', 0)
                    except (AttributeError, KeyError):
                        edit_count_month = 0
                        
                        """ Record that this editor had no edits on this month """
                        try:
                            zero_edit_months[username].append(date(year, month, 1))
                        except KeyError:
                            zero_edit_months[username] = list()
                            zero_edit_months[username].append(date(year, month, 1))
                            
                    total_edits_since_cutoff = total_edits_since_cutoff + edit_count_month
                            
                    if total_edits_since_cutoff / total_months_since_cutoff < CUTOFF_RATE_FOR_BURNOUT_EDITORS and \
                    total_months_since_cutoff > MONTHS_AFTER_CUTOFF_TO_RECORD_BURNOUT and burnout == False:
                         burnout = True
                         burnout_date = date(year, month, 1)
                             
        if burnout:
            avg_edit = total_edits_since_cutoff / total_months_since_cutoff

            try:
                var.add(burnout_date, avg_edit, {'username' : username})
            except Exception as error:
                print 'user: %s error: %s' % (username, error)

    return var
