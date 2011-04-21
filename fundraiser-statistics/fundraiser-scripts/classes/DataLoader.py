"""

This module provides access to the datasource and enables querying.  The class
atructure defined has DataLoader as the base which outlines the basic members
and functionality.  This interface is extended for interaction with specific 
sources of data.

These classes are used to define the data sources for the DataReporting family of 
classes in an Adapter structural pattern. 

"""

__author__ = "Ryan Faulkner"
__revision__ = "$Rev$"
__date__ = "April 8th, 2010"


import sys
import MySQLdb
import math
import datetime

import miner_help as mh
import QueryData as QD
import TimestampProcessor as TP
        
"""

    CLASS :: DataLoader
    
    METHODS:
            init_db         -
            close_db        -
"""
class DataLoader(object):

    """ Database and Cursor objects """
    _db_ = None
    _cur_ = None
    _sql_path_ = '../sql/'    # Relative path for SQL files to be processed
    _query_names_ = dict()
    
    def init_db(self):
        
        """ Establish connection """
        #db = MySQLdb.connect(host='db10.pmtpa.wmnet', user='rfaulk', db='faulkner')
        self._db_ = MySQLdb.connect(host='127.0.0.1', user='rfaulk', db='faulkner', port=3307)
        #self.db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')
        
        """ Create cursor """
        self._cur_ = self._db_.cursor()
    
    def close_db(self):
        self._cur_.close()
        self._db_.close()
    
    """
        <DESCRIPTION>
        
        INPUT:
                query_type        -
                
            
        RETURN: 
                        - 
                
    """
    def get_sql_filename_for_query(self, query_type):
        return ''
        
class IntervalReportingLoader(DataLoader):
     
    def __init__(self):
         self._query_names_['banner'] = 'report_banner_metrics_minutely'
         self._query_names_['LP'] = 'report_LP_metrics_minutely'
         self._query_names_['campaign'] = 'report_campaign_metrics_minutely'
         self._query_names_['campaign_total'] = 'report_campaign_metrics_minutely_total'
         
    def get_sql_filename_for_query(self, query_type):
        return self._query_names_[query_type]
         
    """
        <DESCRIPTION>
        
        INPUT:
                start_time        - start timestamp for reporting 
                end_time          - end timestamp for reporting
                interval          - minutely interval at which to report metrics
                query_type        - query type: 'banner', 'campaign', 'LP'
                metric_name       - the metric to report
                campaign          - the campaign on which to select
                
            
        RETURN: 
                metrics        - dict containing metric measure for each time index for each donation pipeline handle (e.g. banner names) 
                times          - dict containing time index for each donation pipeline handle (e.g. banner names)
    """
    def run_query(self, start_time, end_time, interval, query_type, metric_name, campaign):
        
        self.init_db()
        
        try:
            query_name = self.get_sql_filename_for_query(query_type)
        except KeyError:
            print 'Could not find a query for type: ' + query_type  
            sys.exit(2)
        
        metrics = mh.AutoVivification()
        times = mh.AutoVivification()
        times_norm = mh.AutoVivification()
        
        """ Compose datetime objects to represent the first and last intervals """
        start_time_obj = TP.timestamp_to_obj(start_time, 1)
        start_time_obj = start_time_obj.replace(minute=int(math.floor(start_time_obj.minute / interval) * interval))
        start_time_obj_str = TP.timestamp_from_obj(start_time_obj, 1, 3)
        
        end_time_obj = TP.timestamp_to_obj(end_time, 1)
        # end_time_obj = end_time_obj + datetime.timedelta(seconds=-1)
        end_time_obj = end_time_obj.replace(minute=int(math.floor(end_time_obj.minute / interval) * interval))            
        end_time_obj_str = TP.timestamp_from_obj(end_time_obj, 1, 3)
        
        
        """ Load the SQL File & Format """
        filename = self._sql_path_+ query_name + '.sql'
        sql_stmnt = mh.read_sql(filename)
        
        sql_stmnt = QD.format_query(query_name, sql_stmnt, [start_time, end_time, campaign, interval])
        
        """ Get Indexes into Query """
        key_index = QD.get_key_index(query_name)
            
        metric_index = QD.get_metric_index(query_name, metric_name)
        time_index = QD.get_time_index(query_name)
        
        """ Compose the data for each separate donor pipeline artifact """
        try:
            err_msg = sql_stmnt
            self._cur_.execute(sql_stmnt)
            
            results = self._cur_.fetchall()
            final_time = dict()                                     # stores the last timestamp seen
            interval_obj = datetime.timedelta(minutes=interval)        # timedelta object used to shift times by _interval_ minutes
            
            for row in results:
                
                key_name = row[key_index]
                time_obj = TP.timestamp_to_obj(row[time_index], 1)  # format = 1, 14-digit TS 
                
                """ For each new dictionary index by key name start a new list if its not already there """    
                try:
                    metrics[key_name].append(row[metric_index])
                    times[key_name].append(time_obj + interval_obj)
                    final_time[key_name] = row[time_index]
                except:
                    metrics[key_name] = list()
                    times[key_name] = list()
                    
                    """ If the first element is not the start time add it 
                        this will be the case if there is no data for the first interval 
                        NOTE:   two datapoints are added at the beginning to define the first interval """
                    times[key_name].append(start_time_obj)
                    times[key_name].append(start_time_obj + interval_obj)
                    
                    if start_time_obj_str != row[time_index]:
                        metrics[key_name].append(0.0)
                        metrics[key_name].append(0.0)
                        
                        times[key_name].append(time_obj)
                        times[key_name].append(time_obj + interval_obj)
                    
                    metrics[key_name].append(row[metric_index])
                    metrics[key_name].append(row[metric_index])
                    
                    final_time[key_name] = row[time_index]
            
            
        except Exception as inst:
            print type(inst)     # the exception instance
            print inst.args      # arguments stored in .args
            print inst           # __str__ allows args to printed directly
            
            self._db_.rollback()
            sys.exit(0)
        

        """ Ensure that the last time in the list is the endtime less the interval """
        
        for key in times.keys():
            if final_time[key] != end_time_obj_str:
                times[key].append(end_time_obj)
                metrics[key].append(0.0)
        
        self.close_db()
        
        """ Convert counts to float (from Decimal) to prevent exception when bar plotting
            Bbox::update_numerix_xy expected numerix array """
        for key in metrics.keys():
            metrics_new = list()
            for i in range(len(metrics[key])):
                metrics_new.append(float(metrics[key][i]))
            metrics[key] = metrics_new
        
        return [metrics, times]

"""


"""
class CampaignIntervalReportingLoader(IntervalReportingLoader):
    
    def __init__(self):
        IntervalReportingLoader.__init__(self)
        
    """
        <DESCRIPTION>
        
        INPUT:
                start_time        - start timestamp for reporting 
                end_time          - end timestamp for reporting
                interval          - minutely interval at which to report metrics
                query_type        - query type: 'banner', 'campaign', 'LP'
                metric_name       - the metric to report
                campaign          - the campaign on which to select
                
            
        RETURN: 
                metrics        - dict containing metric measure for each time index for each donation pipeline handle (e.g. banner names) 
                times          - dict containing time index for each donation pipeline handle (e.g. banner names)
    """
    def run_query(self, start_time, end_time, interval, query_type, metric_name, campaign):
        
        query_type_1 = 'campaign'
        query_type_2 = 'campaign_total'
        
        """ Execute the standard interval reporting query """
        metrics, times = IntervalReportingLoader.run_query(self, start_time, end_time, interval, query_type_1, metric_name, campaign)
        
        """ Get the totals for campaign views and donations """
        metrics_total, times_total = IntervalReportingLoader.run_query(self, start_time, end_time, interval, query_type_2, metric_name, campaign)
        
        """ Combine the results for the campaign totals with (banner, landing page, campaign) """
        for key in metrics_total.keys():
            metrics[key] = metrics_total[key]
            times[key] = times_total[key]

            
        return [metrics, times]

    
class BannerLPReportingLoader(DataLoader):
    
    def run_query(self):
        return


    
class HypothesisTestLoader(DataLoader):
    
    """
        Execute data acquisition for hypothesis tester
        
        INPUT:
            query_name     -   
            metric_name    -
            campaign       - 
            item_1         -   
            item_2         -   
            start_time     -   
            end_time       - 
            interval       - 
            num_samples    -
            
        RETURN:
            metrics_1        -
            metrics_2        -
            times_indices    -
       
    """
    def run_query(self, query_name, metric_name, campaign, item_1, item_2, start_time, end_time, interval, num_samples):
        
        """ retrieve time lists with timestamp format 1 (yyyyMMddhhmmss) """
        ret = TP.get_time_lists(start_time, end_time, interval, num_samples, 1)
        times = ret[0]
        times_indices = ret[1]
        
        self.init_db()
        
        filename = self._sql_path_ + query_name + '.sql'
        sql_stmnt = mh.read_sql(filename)
        
        metric_index = QD.get_metric_index(query_name, metric_name)
        metrics_1 = []
        metrics_2 = []
        
        for i in range(len(times) - 1):
            
            # print '\nExecuting number ' + str(i) + ' batch of of data.'
            t1 = times[i]
            t2 = times[i+1]
            
            formatted_sql_stmnt_1 = QD.format_query(query_name, sql_stmnt, [t1, t2, item_1, campaign])
            formatted_sql_stmnt_2 = QD.format_query(query_name, sql_stmnt, [t1, t2, item_2, campaign])
            
            try:
                err_msg = formatted_sql_stmnt_1
                
                self._cur_.execute(formatted_sql_stmnt_1)
                results_1 = self._cur_.fetchone()  # there should only be a single row
                
                err_msg = formatted_sql_stmnt_2
                
                self._cur_.execute(formatted_sql_stmnt_2)
                results_2 = self._cur_.fetchone()  # there should only be a single row
            
            except Exception as inst:
                print type(inst)     # the exception instance
                print inst.args      # arguments stored in .args
                print inst           # __str__ allows args to printed directly
                    
                self._db_.rollback()
                sys.exit("Database Interface Exception:\n" + err_msg)
            
            """ If no results are returned in this set the sample value is 0.0 
                !! MODIFY -- these results should not count as data points !! """    
            try:
                metrics_1.append(results_1[metric_index])
            except TypeError:
                metrics_1.append(0.0)
            try:
                metrics_2.append(results_2[metric_index])
            except TypeError:
                metrics_2.append(0.0)
        
        #print metrics_1
        #print metrics_2

        self.close_db()
        
        # return the metric values at each time
        return [metrics_1, metrics_2, times_indices]
    
    

"""

    CLASS :: TTestLoaderHelp
    
    Provides data access particular to the t-test
    
    METHODS:
            init_db         -
            close_db        -
"""
class TTestLoaderHelp(DataLoader):
    
    """
    This method knows about faulkner.t_test.  This is a lookup table for p-values
    given the degrees of freedom and statistic t test
    
    INPUT:
        degrees_of_freedom     -   
        t                      -

    RETURN:
        p        -
   
    """
    def get_pValue(self, degrees_of_freedom, t):
        
        self.init_db()
        
        select_stmnt = 'select max(p) from t_test where degrees_of_freedom = ' + str(degrees_of_freedom) + ' and t >= ' + str(t)

        try:
            self._cur_.execute(select_stmnt)
            results = self._cur_.fetchone()
                
            if results[0] != None:
                p = float(results[0])
            else:
                p = .0005
        except:
            self._db_.rollback()
            self._db_.close()
            sys.exit('Could not execute: ' + select_stmnt)
            
        self._db_.close()
        
        return p
    