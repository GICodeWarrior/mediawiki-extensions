"""

WSOR dataloader class for the MySQL slave of enwiki and user dbs

"""


""" Meta """
__author__ = "Ryan Faulkner"
__revision__ = "$Rev$"
__date__ = "June 27th, 2011"


""" Import python base modules """
import sys, getopt, re, datetime, logging, MySQLdb, settings, operator
import networkx as nx

""" Import Analytics modules """
from Fundraiser_Tools.classes.DataLoader import DataLoader

""" Configure the logger """
LOGGING_STREAM = sys.stderr
logging.basicConfig(level=logging.DEBUG, stream=LOGGING_STREAM, format='%(asctime)s %(levelname)-8s %(message)s', datefmt='%b-%d %H:%M:%S')



"""
    Inherits DataLoader
    
    DataLoader class for the WSOR MySQL Slave
    
"""
class WSORSlaveDataLoader(DataLoader):
    
    def __init__(self):
        
        self.init_db()
        
    def __del__(self):
        
        self.close_db()
       
        
    """
        Override init_db to connect to the slave
    """
    def init_db(self):
            
        logging.info('Attempting to establish a connection to the database.')
            
        """ Establish connection """
        try:
            self._db_ = MySQLdb.connect(host=settings.__db_server__, user=settings.__user__, db=settings.__db__, port=settings.__db_port__, passwd=settings.__pass__)            
            self._db_enwiki_ = MySQLdb.connect(host=settings.__db_server__, user=settings.__user__, db=settings.__db_enwikislave__, port=settings.__db_port__, passwd=settings.__pass__)
            logging.info('Successfully connected.')
        except:
            logging.DEBUG('Could not establish a connection to %s @ %s : %s' % (settings.__user__, settings.__db_server__, settings.__db__))
            return
                    
        """ Create cursor """
        self._cur_ = self._db_.cursor()
        self._cur_enwiki_ = self._db_enwiki_.cursor()


    def close_db(self):
        
        self._cur_.close()
        self._db_.close()
        
        self._cur_enwiki_.close()
        self._db_enwiki_.close()


"""
    Inherits WSORSlaveDataLoader
    
    DataLoader class for querying category tables
    
"""
class CategoryLoader(WSORSlaveDataLoader):
    
    def __init__(self):
        
        self.__DEBUG__ = True
        
        self._query_names_['build_subcat_tbl'] = "CREATE TABLE rfaulk.categorylinks_cp select * from enwiki.categorylinks where cl_type = 'subcat'"
        self._query_names_['drop_subcat_tbl'] = "drop table if exists rfaulk.categorylinks_cp;"
        self._query_names_['get_first_rec'] = "select cl_from from categorylinks_cp limit 1"
        self._query_names_['get_category_page_title'] = "select page_title from enwiki.page where page_id = %s"
        self._query_names_['get_category_page_id'] = "select page_id from enwiki.page where page_title = '%s' and page_namespace = 14"
        self._query_names_['get_subcategories'] = "select cl_to from categorylinks_cp where cl_from = %s"
        self._query_names_['delete_from_recs'] = "delete from rfaulk.categorylinks_cp where cl_from = %s"
        self._query_names_['is_empty'] = "select * from rfaulk.categorylinks_cp limit 1"
        self._query_names_['get_category_links'] = "select cl_from, cl_to from categorylinks_cp limit 10000"
        
        WSORSlaveDataLoader.__init__(self)    
        logging.info('Creating CategoryLoader')
    
    """
        Retrieves all rows out of the category links table
    """
    def get_category_links(self):
        
        try:
            sql = self._query_names_['get_category_links']
            logging.info('Executing: ' + sql)
            results = self.execute_SQL(sql)

        except:

            logging.error('Could not retrieve page_id.')
            return -1
        
        return results
    
    

    """
        Retrives the integer page id
    """    
    def get_page_id(self, page_title):
        
        try:
            sql = self._query_names_['get_category_page_id'] % page_title
            #logging.info('Executing: ' + sql)
            results = self.execute_SQL(sql)
            id = int(results[0][0])
        
        except Exception as inst:
            
            logging.error('Could not retrieve page_id.')
            return -1
        
        return id

    """
        Retrives the string page title
    """    
    def get_page_title(self, page_id):
        
        try:
            sql = self._query_names_['get_category_page_title'] % page_id
            #logging.info('Executing: ' + sql)
            results = self.execute_SQL(sql)
            title = str(results[0][0])
        
        except Exception as inst:
            
            logging.error('Could not retrieve page_title.')
            return -1
        
        return title
        
    """
        Look at the first category in caegorylinks_cp
    """
    def get_first_record_from_category_links(self):
        
        try:
            
            sql = self._query_names_['get_first_rec']
            #logging.info('Executing: ' + sql)
            results = self.execute_SQL(sql)
            
            #logging.info('Retrieved first row from rfaulk.categorylinks_cp.')
            category_page_id = int(results[0][0])
            category_page_title = self.get_page_title(category_page_id)
                        
        except Exception as inst:
            
            logging.error('Could not retrieve page_title.')
            return ''
                    
        return category_page_title
    
    
    """
        Finds and returns a list of sub categories
    """
    def get_subcategories(self, category_title):
        
        subcategories = list()
        
        # category_upper, category_lower, category_camel = self.normalize_field_cl_from(category)
        
        """ Retrieve the sub categories and add to list """
        category_page_id = self.get_page_id(category_title)
        category_page_id_str = str(category_page_id)
        sql_select = self._query_names_['get_subcategories'] % category_page_id_str
        sql_delete = self._query_names_['delete_from_recs'] % category_page_id_str
        
        try:
            #logging.info('Executing: ' + sql_select)
            results = self.execute_SQL(sql_select)
            #logging.info('Retrieved sub-categories of %s.' % category_page_id_str)
            
            for row in results:
                subcategories.append(row[0])
            
            #logging.info('Executing: ' + sql_delete)
            self.execute_SQL(sql_delete)
            #logging.info('Removed references from the category with page_id %s.' % category_page_id_str)
               
        except Exception as inst:
            
            logging.error('Could not retrieve sub-categories.')
            return []
            
        return subcategories

        
        
    """
        Recursively builds subtree of categories
    """
    def build_category_tree(self, directed_graph, category_title):
        
        # logging.info('Creating directed links for category: %s' % category_title)
        
        """ Get sub-categories """
        sub_categories = self.get_subcategories(category_title)
        
        """ Build nodes for each """
        for sub_cat in sub_categories:
            
            directed_graph.add_weighted_edges_from([(category_title, sub_cat,1)])
            self.build_category_tree(directed_graph, sub_cat)
            
        return directed_graph
    
    
    """
        Execution entry point of the class - builds a full category hierarchy from categorylinks
        
        CURRENTLY THE EDGES ARE PROCESSED IN A NON=-RECURSIVE WAY, this is much faster
    """ 
    def extract_hierarchy(self):
                        
        self.drop_category_links_cp_table()
        self.create_category_links_cp_table()
                    
        """ Create graph """
        logging.info('Initializing directed graph...')
        directed_graph = nx.DiGraph()
        
        """ while there are rows left in categorylinks_cp  """
        
        """
        while(not self.is_empty()):
        
            category_title = self.get_first_record_from_category_links()
            self.build_category_tree(directed_graph, category_title)            
            directed_graph.add_weighted_edges_from([('ALL', category_title, 1)])
        """
        
        links = self.get_category_links()
        count = 0
        
        out_degrees = dict()
        in_degrees = dict()
        subcategories = dict()
        
        """ Process subcategory links """
        for row in links:
            
            cl_from = int(row[0])
            cl_to = str(row[1])
            cl_from = self.get_page_title(cl_from)
        
            try:
                subcategories[cl_from].append(cl_to)
            
            except KeyError:    
                subcategories[cl_from] = list()
                subcategories[cl_from].append(cl_to)
                
            try:
                out_degrees[cl_from] = out_degrees[cl_from] + 1
            except KeyError:
                out_degrees[cl_from] = 1
            
            try:
                in_degrees[cl_to] = in_degrees[cl_to] + 1
            except KeyError:
                in_degrees[cl_to] = 1
                     
            directed_graph.add_weighted_edges_from([(cl_from, cl_to, 1)])
            
            if self.__DEBUG__ and count % 1000 == 0:
                
                logging.debug('%s: %s -> %s' % (str(count), cl_from, cl_to))
            
            count = count + 1
        
        logging.info('Sorting in degree list.')
        sorted_in_degrees = sorted(in_degrees.iteritems(), key=operator.itemgetter(1), reverse=True)
        logging.info('Sorting out degree list.')
        sorted_out_degrees = sorted(out_degrees.iteritems(), key=operator.itemgetter(1), reverse=True)
        
        in_only, out_only = self.get_uni_directionally_linked_categories(sorted_in_degrees, sorted_out_degrees)
        
        logging.info('Category links finished processing.')
        
        return directed_graph, in_degrees, out_degrees, sorted_in_degrees, sorted_out_degrees, subcategories, in_only, out_only
    
    
    """
        Returns 
    """
    def get_uni_directionally_linked_categories(self, in_degrees, out_degrees):
        
        logging.info('Generating lists of categories have either only in degrees or out degrees.')
        
        in_keys = list()
        for i in in_degrees:
            in_keys.append(i[0])
        
        out_keys = list()
        for i in out_degrees:
            out_keys.append(i[0])
        
        in_only = list()
        out_only = list()
        
        for i in in_degrees:
            if not(i[0] in out_keys):
                in_only.append(i) 
            
        for i in out_degrees:
            if not(i[0] in in_keys):
                out_only.append(i)
        
        return in_only, out_only
    
    
    """ drop rfaulk.categorylinks_cp """
    def drop_category_links_cp_table(self):
        
        try:
            sql = self._query_names_['drop_subcat_tbl']
            logging.info('Executing: ' + sql)
            
            self._cur_.execute(sql)
            logging.info('Dropped rfaulk.categorylinks_cp table.')
            
        except Exception as inst:
            
            logging.error('Could not execute: %s\n' % sql)
            logging.error(str(type(inst)))      # the exception instance
            logging.error(str(inst.args))       # arguments stored in .args
            logging.error(inst.__str__())       # __str__ allows args to printed directly


    """ create rfaulk.categorylinks_cp """            
    def create_category_links_cp_table(self):
        
        try:
            sql = self._query_names_['build_subcat_tbl']
            logging.info('Executing: ' + sql)
            
            self._cur_.execute(sql)
            logging.info('Created rfaulk.categorylinks_cp table from enwiki.categorylinks_cp.')
            
        except Exception as inst:
            
            logging.error('Could not execute: %s\n' % sql)
            logging.error(str(type(inst)))      # the exception instance
            logging.error(str(inst.args))       # arguments stored in .args
            logging.error(inst.__str__())       # __str__ allows args to printed directly

            
        
    """
        Are there any records remaining in rfaulk.categorylinks_cp ??
    """
    def is_empty(self):
        
        sql = self._query_names_['is_empty']
        
        try:
            self._cur_.execute(sql)
            rows = self._cur_.fetchone()
            
        except Exception as inst:
            
            logging.error('Could not execute: %s\n' % sql)
            logging.error(str(type(inst)))      # the exception instance
            logging.error(str(inst.args))       # arguments stored in .args
            logging.error(inst.__str__())       # __str__ allows args to printed directly
            
            return True
    
        if len(rows) > 0:
            return False
        else:
            return True
    

        
"""
    Inherits WSORSlaveDataLoader
    
    DataLoader class for vandal reversion related queries
    
"""
class VandalLoader(WSORSlaveDataLoader):
    
    
    def __init__(self, query_key):
        
        WSORSlaveDataLoader.__init__(self)    
        logging.info('Creating VadalLoader')
    
        """ 
            DEFINE SQL queries
        """
        self._query_names_['query_test'] = 'select count(*) from revert_20110115'
        self._query_names_['query_vandal_count'] = 'select revision_id, sum(is_vandalism) from revert_20110115 group by 1'
        self._query_names_['query_total_reverts'] = ''
    
        """ 
            ASSIGN query 
        """
        try:
            self._sql_ = self._query_names_[query_key]
        except KeyError:
            logging.debug('Query does not exist\n')
        
        
    """
        Main execution body and data handling for the loader object
    """
    def run_query(self):
        
        self.init_db()
        
        try:
            logging.info('Running VandalLoader')
            self._cur_.execute(self._sql_)
                
            """ GET THE COLUMN NAMES FROM THE QUERY RESULTS """
            self._col_names_ = list()
            for i in self._cur_.description:
                self._col_names_.append(i[0])
                
            self._results_ = self._cur_.fetchall()
            
            logging.info('Execution Complete.')
            
        except Exception as inst:
            
            logging.error('Could not execute: %s\n' % self._sql_)
            logging.error(str(type(inst)))      # the exception instance
            logging.error(str(inst.args))       # arguments stored in .args
            logging.error(inst.__str__())       # __str__ allows args to printed directly
            
            # self._db_.rollback()
                        
        return self._results_
    
