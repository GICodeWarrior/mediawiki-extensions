"""

WSOR dataloader class for the MySQL slave of enwiki and user dbs

"""


""" Meta """
__author__ = "Ryan Faulkner"
__revision__ = "$Rev$"
__date__ = "June 27th, 2011"


""" Import python base modules """
import sys, getopt, re, datetime, logging, MySQLdb, operator, pickle, shelve, random
import networkx as nx

""" Import Analytics modules """
from Fundraiser_Tools.classes.DataLoader import DataLoader
import WSOR.scripts.classes.settings as settings

""" Configure the logger """
LOGGING_STREAM = sys.stderr
logging.basicConfig(level=logging.DEBUG, stream=LOGGING_STREAM, format='%(asctime)s %(levelname)-8s %(message)s', datefmt='%b-%d %H:%M:%S')
# logging.basicConfig(level=logging.DEBUG, filename="categories.log", filemode='w', format='%(asctime)s %(levelname)-8s %(message)s', datefmt='%b-%d %H:%M:%S')




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
        copy the session variables to file
    """
    def pickle_var(self, var, filename):
        
        pickle.dump( var, open( settings.__data_file_dir__ + filename, "wb" ) )


    """
        unpack the session variables to file
    """
    def unpickle_var(self, filename):
        
        return pickle.load( open( settings.__data_file_dir__ + filename ) )


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
        self._query_names_['get_category_page_title'] = "select page_id, page_title from enwiki.page where %s"
        self._query_names_['get_category_page_id'] = "select page_id from enwiki.page where page_title = '%s' and page_namespace = 14"
        self._query_names_['get_subcategories'] = "select cl_to from categorylinks_cp where cl_from = %s"
        self._query_names_['delete_from_recs'] = "delete from rfaulk.categorylinks_cp where cl_from = %s"
        self._query_names_['is_empty'] = "select * from rfaulk.categorylinks_cp limit 1"
        self._query_names_['get_category_links'] = "select cl_from, cl_to from categorylinks_cp"
        self._query_names_['get_page_categories'] = "select cl_from, cl_to from enwiki.categorylinks where %s order by 1"
        self._query_names_['get_all_page_ids'] = "select page_id from enwiki.page where page_namespace = 0 and page_len > 1000"
        
        self._query_names_['create_page_category'] = "create table rfaulk.page_category (page_id int(8) unsigned, page_title varbinary(255), category varbinary(255));"
        self._query_names_['drop_page_category'] = "drop table if exists rfaulk.page_category;"
        self._query_names_['insert_page_category'] = "insert into rfaulk.page_category values %s;"
        
        
        WSORSlaveDataLoader.__init__(self)    
        logging.info('Creating CategoryLoader')
        
        self._max_depth_ = 100
        self._top_level_cats_ = ['Natural_sciences', 'Applied_sciences', 'Mathematics', 'Literature', 'Visual_arts', 'Social_sciences', 'Film', 'Music', 'Television', 'Biography', 'Religion', 'Culture', 'Philosophy', 'Sports', 'Places']
        # self._top_level_cats_ = ['Natural_sciences', 'Mathematics', 'Arts', 'Social_sciences', 'Entertainment', 'Biography', 'Religion', 'Culture', 'Philosophy', 'Sports']
        self._block_words_ = ['categories', 'Categories', 'topic', 'Topic']
        self._block_cats_ = ['']
        self._topic_trees_ = dict()

                    
    """
        Retrieves all rows out of the category links table
    """
    def get_category_links(self):
        
        try:
            sql = self._query_names_['get_category_links']
            logging.info('Executing: ' + sql)
            results = self.execute_SQL(sql)

        except:

            logging.error('Could not retrieve category links.')
            return -1
        
        return results
    
    """
        Extract the categories for a given article
    """
    def get_page_categories(self, page_id_list):
        
        categories = dict()
        where_clause = ''
        
        """ Initialize category lists for each page """
        for id in page_id_list:
            categories[id] = list()
                        
        try:
            
            for id in page_id_list:
                where_clause = where_clause + 'cl_from = %s or ' % str(id)
            where_clause = where_clause[:-4]
            
            sql = self._query_names_['get_page_categories'] % where_clause
            
            logging.info('Retrieving page categories ...')            
            results = self.execute_SQL(sql)                        
            
            """ walk through results and add to category lists """
            for row in results:
                id = int(row[0])
                categories[id].append(row[1])
                    
        except Exception as inst:
            
            logging.error('Could not retrieve page categories.')
            logging.error(str(type(inst)))      # the exception instance
            logging.error(str(inst.args))       # arguments stored in .args
            logging.error(inst.__str__())       # __str__ allows args to printed directly
            
            return {}
        
        return categories
    
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
        
        This either manages a list of ids or a single id
    """    
    def get_page_title(self, page_id):
        
        logging.info('Getting page titles ...')
        is_list = isinstance(page_id, (list))
                      
        try:
            if not(is_list):
                where_clause = 'page_id = %s' % str(page_id)
            else:
                where_clause = ''
                for id in page_id:
                    where_clause = where_clause + 'page_id = %s or ' % str(id)
                where_clause = where_clause[:-4]
                        
            sql = self._query_names_['get_category_page_title'] % where_clause
            results = self.execute_SQL(sql)
            
            if not(is_list):
                title = str(results[0][1])
            else:
                title = dict()
                
                for row in results:
                    title[int(row[0])] = str(row[1])
                
        except Exception as inst:
            
            logging.error('Could not retrieve page_title for page_id = %s.' % page_id)            
            self._log_file.write('Could not retrieve page_title for page_id = %s.\n' % (page_id))
            
            return ''
        
        return title
        
    
    """
        Execution entry point of the class - builds a full category hierarchy from categorylinks
        
        CURRENTLY THE EDGES ARE PROCESSED IN A NON=-RECURSIVE WAY, this is much faster
    """ 
    def extract_hierarchy(self):
                        
        #self.drop_category_links_cp_table()
        #self.create_category_links_cp_table()
        
        self._log_file = open('category_miner.log', 'w')
        
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
            
            cl_from = str(row[1])
            cl_to = int(row[0])
            cl_to = self.get_page_title(cl_to)
        
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
            
            if self.__DEBUG__ and (cl_from == 'Probability' or cl_from == 'Mathematics' or cl_from == 'Science' or cl_from == 'Arts'):
            #if self.__DEBUG__ and count % 1000 == 0 :
                
                logging.debug('%s: %s -> %s' % (str(count), cl_from, cl_to))
                self._log_file.write('%s: %s -> %s\n' % (str(count), cl_from, cl_to))
                
            count = count + 1
        
        logging.info('Sorting in degree list.')
        sorted_in_degrees = sorted(in_degrees.iteritems(), key=operator.itemgetter(1), reverse=True)
        logging.info('Sorting out degree list.')
        sorted_out_degrees = sorted(out_degrees.iteritems(), key=operator.itemgetter(1), reverse=True)
        
        in_only, out_only = self.get_uni_directionally_linked_categories(sorted_in_degrees, sorted_out_degrees, in_degrees, out_degrees)
        
        logging.info('Category links finished processing.')
        self._log_file.close()
        
        return directed_graph, in_degrees, out_degrees, sorted_in_degrees, sorted_out_degrees, subcategories, in_only, out_only
    
    
    """
        Looks at the in and out degrees and constructs lists of nodes having only edges out and edges in 
    """
    def get_uni_directionally_linked_categories(self, in_degrees, out_degrees, in_degrees_by_key, out_degrees_by_key ):
        
        logging.info('Generating lists of categories have either only in degrees or out degrees.')
        
        in_only = list()
        out_only = list()
        
        for i in in_degrees:
            try:
                out_degrees_by_key[i[0]]
            except KeyError:
                in_only.append(i)
                
        for i in out_degrees:
            try:
                in_degrees_by_key[i[0]]
            except KeyError:
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
        Are there any records remaining in rfaulk.categorylinks_cp ??
        
        Use a trace to detect any loops
    """
    def construct_topic_tree(self, subcategories):
        
        """ Create graph """
        
        logging.info('Initializing directed graph...')
        graph = nx.Graph()        
        self._count_ = 1
        
        subcategories['top_level_categories'] = self._top_level_cats_
        topic = 'top_level_categories'
        
        depth = 0
        logging.info('Recursively contructing graph, MAX DEPTH = %s ...' % self._max_depth_)
        shortest_paths, topic_counts = self._recursive_construct_topic_tree(graph, topic, subcategories, depth)
        
        
        """ Pickle the result """
        #logging.info('Pickling the shortest paths ...')
        #self.pickle_var(shortest_paths, 'shortest_paths.p')
        
        """ Shelve the result """
        logging.info('Shelve the shortest paths ...')
        d = shelve.open( settings.__data_file_dir__ + 'shortest_paths.s')
        d['shortest_paths'] = shortest_paths
        d.close()
        
        return graph, shortest_paths
        
    """
        Recursively build the graph structure for categories based on the subcategory list
        
        @param graph: NetworkX graph structure to store category linkage
        @param topic: String topic name on which to build a recursive structure
        @param subcategories: Disctionary of subcategory lists
        @param depth: integer depth of the call within the recursion
        
    """
    def _recursive_construct_topic_tree(self, graph, topic, subcategories, depth):
                    
        topic_counts = 1
        depth = depth + 1
        self._count_ = self._count_ + 1
        
        if self._count_ % 10000 == 0:
            logging.info('Processed %s nodes. Graph size = %s.' % (str(self._count_), str(graph.number_of_nodes())))
        
        """ Extract the subtopics of topic """
        try:
            topic_subcategories = subcategories[topic]            
            new_subcategories = topic_subcategories[:]
            
            """ Filter meta categories based on block words """            
            for sub_topic in topic_subcategories:
                for block_word in self._block_words_:
                    if re.search(block_word, sub_topic):
                        new_subcategories.remove(sub_topic)
                for block_cat in self._block_cats_:
                    if block_cat == sub_topic:
                        new_subcategories.remove(sub_topic)
  
            topic_subcategories = new_subcategories
            
        except KeyError:
            """ There are no subcategories for this topic """
            return 1    # there is a topic count of 1
        
        """ Recursively build linkages for each .
            DFS determining topic tree - this provides  """
        for sub_topic in topic_subcategories:
            
            if depth == 1:
                logging.info('Processing top level catgory: %s' % sub_topic)

            if not(graph.has_node(sub_topic)):
                                
                graph.add_edge(topic, sub_topic) 
                
                """ Only go deeper if the maximum recursive depth has not been reached """
                if depth < self._max_depth_: 
                    sub_topic_counts = self._recursive_construct_topic_tree(graph, sub_topic, subcategories, depth)
                else:
                    sub_topic_counts = 1
                    
                topic_counts = topic_counts + sub_topic_counts 
                
            else:
                
                """ Add the 'loop' edge if and only if it is not a top level catagory """
                if not(sub_topic in self._top_level_cats_):
                    graph.add_edge(topic, sub_topic) 
                    topic_counts = topic_counts + 1
        
        """ After the recursion is complete compute the shortest paths """
        if depth == 1:
        
            shortest_paths = dict()
            
            for sub_topic in self._top_level_cats_:
                logging.info('Computing shortest paths for %s ...' % sub_topic)
                shortest_paths[sub_topic] = nx.single_source_dijkstra_path(graph, sub_topic)
                
                """ Store the lengths rather than the paths """
                for target in shortest_paths[sub_topic]:
                    shortest_paths[sub_topic][target] = len(shortest_paths[sub_topic][target])
                    
            return shortest_paths, topic_counts
        
        return topic_counts
    
    """
        Pickles variables that store the state of the category graph 
    """
    def pickle_all(self, directed_graph, in_degrees, out_degrees, sorted_in_degrees, sorted_out_degrees, subcategories, in_only, out_only):
        
        self.pickle_var(directed_graph, 'full_topic_graph.p')
        self.pickle_var(in_degrees, 'in_degrees_dict.p')
        self.pickle_var(out_degrees, 'out_degrees_dict.p')
        self.pickle_var(sorted_out_degrees, 'sorted_out_degrees_dict.p')
        self.pickle_var(sorted_in_degrees, 'sorted_in_degrees_dict.p')
        self.pickle_var(subcategories, 'subcategories.p')
        self.pickle_var(in_only, 'in_only.p')
        self.pickle_var(out_only, 'out_only.p')

    """
        @param page_ids: a list of pages to classify
    """
    def find_top_level_category(self, page_ids, shortest_paths):
        
        # self._topic_trees_ = dict()
        titles = dict()
        depths = dict()
        page_categories = dict()
        page_tl_cat = dict()
        cat_winner = dict()
        win_count = dict()
        
        """ Get categories for pages - Initialize depth dictionaries for top level categories """
        logging.info('Initializing data structures ...')
        page_categories = self.get_page_categories(page_ids)
        titles = self.get_page_title(page_ids)
        
        for page_id in page_ids:
            # page_categories[page_id] = self.get_page_categories(page_id)
            title = titles[page_id]
            depths[title] = dict()
            
            """ Initialize dictionaries to store the depth scores for top level categories """
            for category in page_categories[page_id]:
                depths[title][category] = dict()

        """ Iterate through each page, category, and top level category
            Perform a breadth first search for the node to determine the dept """
        logging.info('Finding category depths in each topic tree ...')
        
        for page_id in page_ids:
                        
            # logging.info('For %s classifying categories: %s...' % (title, str(page_categories[page_id])))            
            title = titles[page_id]
            cat_winner[title] = dict()
            
            """ Initialize the number of top level categorizations for each top level category """
            win_count[title] = dict()
            for tl_cat in self._top_level_cats_:
                win_count[title][tl_cat] = 0
            
            """ Go through each category for a page and find out which top level cat is closest """
            for category in page_categories[page_id]:
                
                cat_winner[title][category] = list()
                min_depth = self._max_depth_
                for tl_cat in self._top_level_cats_:
                    
                    """ Use shortest paths """
                    try:
                        depths[title][category][tl_cat] = shortest_paths[tl_cat][category]
                    except KeyError:
                        depths[title][category][tl_cat] = 99
                    
                    if depths[title][category][tl_cat] < min_depth: 
                        cat_winner[title][category].append(tl_cat)
                        min_depth = depths[title][category][tl_cat]
                    elif depths[title][category][tl_cat] == min_depth:
                        cat_winner[title][category].append(tl_cat)                  # there can only be one winner
                
                """ Randomly choose to tie breakers """
                if len(cat_winner[title][category]) > 0:
                    random.shuffle(cat_winner[title][category])
                    cat_winner[title][category] = cat_winner[title][category][0]
                else: 
                    cat_winner[title][category] = None
                    
                winner = cat_winner[title][category] # this a top level category
                if not(winner == None):
                    win_count[title][winner] = win_count[title][winner] + 1
            
            """ Classify the top level categories for each page """
            page_tl_cat[title] = None
            best_count = 0
            for tl_cat in self._top_level_cats_:
                if win_count[title][tl_cat] > best_count:
                    page_tl_cat[title] = tl_cat
                    best_count = win_count[title][tl_cat]
                elif win_count[title][tl_cat] == best_count and best_count > 0:
                    page_tl_cat[title] = page_tl_cat[title] + ' / ' + tl_cat
                    
        return titles, page_tl_cat # , depths, cat_winner
    
    """
        Builds a table containing all main namespace pages and their chosen categories
    """
    def determine_all_page_categories(self):
        
        sql_create = self._query_names_['create_page_category']
        sql_drop = self._query_names_['drop_page_category']
        sql_insert = self._query_names_['insert_page_category']
        
        logging.info('CATEGORIZING PAGES: Initializing tables ... ')
        self.execute_SQL(sql_drop)
        self.execute_SQL(sql_create)
        
        logging.info('CATEGORIZING PAGES: Getting all pages ... ')
        sql_get_page_ids = self._query_names_['get_all_page_ids']
        results = self.execute_SQL(sql_get_page_ids)
        
        page_ids = list()
        for row in results:
            page_ids.append(int(row[0]))
        
        logging.info('CATEGORIZING PAGES: Unshelving shortest paths ... ')
        # shortest_paths = self.unpickle_var('shortest_paths.p')
        
        d = shelve.open( settings.__data_file_dir__ + 'shortest_paths.s')
        shortest_paths = d['shortest_paths']
        
        logging.info('CATEGORIZING PAGES: Computing categories ... ')
        titles, page_tl_cat = self.find_top_level_category(page_ids, shortest_paths)
        ids = dict((i,v) for v,i in titles.iteritems())
        
        logging.info('CATEGORIZING PAGES: Performing inserts ... ')
        page_id_str = ''
        for title in page_tl_cat:
            id = ids[title]
            category = page_tl_cat[title]
            
            parts = title.split("'")
            new_title = parts[0]
            parts = parts[1:]
            for part in parts:
                 new_title = new_title + " " + part
                 
            page_id_str = "(%s,'%s','%s')" % (id, new_title, category)
            try:
                self.execute_SQL(sql_insert %  page_id_str)
            except:
                logging.info('Could not insert: %s ... ' % new_title)
                pass
            # page_ids.append(str(row[0]))
       # page_id_str = page_id_str[:-1]
        
        #logging.info('CATEGORIZING PAGES: Inserting page ids into rfaulk.page_category ... ')
        #self.execute_SQL(sql_insert %  page_id_str)
        
        d.close()
        
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
    
