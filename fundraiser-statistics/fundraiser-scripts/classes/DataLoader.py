
__author__ = "Ryan Faulkner"
__revision__ = "$Rev$"
__date__ = "April 8th, 2010"


import sys
import MySQLdb
        
        
"""

    CLASS :: DataLoader
    
    METHODS:
            init_db         -
            close_db        -
"""
class DataLoader(object):

    # Database and Cursor objects
    db = None
    cur = None
    
    def init_db(self):
        """ Establish connection """
        #db = MySQLdb.connect(host='db10.pmtpa.wmnet', user='rfaulk', db='faulkner')
        self.db = MySQLdb.connect(host='127.0.0.1', user='rfaulk', db='faulkner', port=3307)
        #self.db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')

        """ Create cursor """
        self.cur = self.db.cursor()
    
    def close_db(self):
        self.cur.close()
        self.db.close()
        
        
class IntervalReportingLoader(DataLoader):
    
    def run_query(self):
        return
    
class BannerLPReportingLoader(DataLoader):
    
    def run_query(self):
        return