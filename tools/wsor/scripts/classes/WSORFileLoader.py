"""

    WSOR dataloader class to process file contents
    
    
        e.g. '/home/rfaulkner/trunk/projects/data/en.editor_first_and_last.20.tsv'

"""


""" Meta """
__author__ = "Ryan Faulkner"
__revision__ = "$Rev$"
__date__ = "July 11th, 2011"


""" Import python base modules """
import sys, getopt, re, datetime, logging, settings

""" Modify the classpath to include local projects """
sys.path.append(settings.__project_home__)

""" Import Analytics modules """
import WSOR.scripts.classes.WSORSlaveDataLoader as WSORSDL

""" Configure the logger """
LOGGING_STREAM = sys.stderr
logging.basicConfig(level=logging.DEBUG, stream=LOGGING_STREAM, format='%(asctime)s %(levelname)-8s %(message)s', datefmt='%b-%d %H:%M:%S')


"""
    
    DataLoader class to import file based data
    
"""
class WSORFileLoader(object):
  
    def __init__(self):
        
        logging.info('Creating object %s' % str(type(self)))
        self.contents = dict()
        
        return

    """
        The base class simply spills the file contents
    """
    def process_file(self, filename):
        file = open(filename, 'r')
    
        file_contents = ''
        line = file.readline()
        while (line != ''):
            file_contents = file_contents + line
            line = file.readline()
        
        file.close()
        
        return file_contents


"""
    
    File reader for token separated value text files 
    
    Maintains a dictionary that stores lists for each token field.
    
    This also inherits the database methods
    
"""
class WSORTokenizedTextFileLoader(WSORFileLoader, WSORSDL.WSORSlaveDataLoader):
  
    def __init__(self, token_separator):
        
        """ Call the parent constructor"""
        WSORFileLoader.__init__(self)

        self.token_separator = token_separator
        
        return
    
    """
        Get method for data object
    """
    def get_records(self):
        return self.contents
    
    """
        Pre-processing and helper for process_file 
    """
    def process_file_header(self, filename):
        
        """ Open the file and read the first line """
        file = open(filename, 'r')
        line = file.readline()
        self.file_header_contents = line.split(self.token_separator)
            
        for field in self.file_header_contents:
            self.contents[field] = list()
        
        logging.info('File header processed: %s' % str(self.file_header_contents))
        
        """ return the file object rather than assigning as a member since it's state may change """
        return file

        
    """
        Override to process a token separator text file
    """      
    def process_file(self, filename):
    
        """ Process the header - get an index of fields """    
        file = self.process_file_header(filename)
        field_index = range(len(self.contents.keys()))
        
        """ process the remainder of the file """
        logging.info('Processing rows...')
        
        line = file.readline()
        while (line != ''):
            
            try:
                line = file.readline()
                elems = line.split(self.token_separator)
                
                if len(elems) < len(field_index):
                    raise IndexError('Too few elements in record.  Omitting row.')
                    
                for i in field_index:
                    field = self.file_header_contents[i]
                    elem = elems[i]
                    self.contents[field].append(elem)
            
            except Exception as inst:
                
                logging.error('Error processing row:')
                #logging.error(type(inst))     # the exception instance
                #logging.error(inst.args)      # arguments stored in .args
                logging.error(inst)           # __str__ allows args to printed directly
                
                pass
            
        logging.info('Processing complete.')
        file.close()
        
        return self.contents
    
    """
        Output data to a token separated file
    """
    def write_dict_to_file(self, dict_obj, filename):
        
        fields = dict_obj.keys()
        num_fields = len(fields)
        field_index = range(len(fields))
        
        """ Although the number of entries for each field should be the same always take the key with the fewest elements """
        num_records = len(dict_obj[fields[0]])
        for field in fields:
            if len(dict_obj[field]) < num_records:
                num_records = len(dict_obj[field])
            
        index = range(num_records)
        
        file = open(filename, 'w')
        
        try:
            """ Write the header """
            for fi in field_index:
                if fi == num_fields - 1:
                    file.write(fields[fi] + '\n')
                else:
                    file.write(fields[fi] + self.token_separator)
            
            """ Write the data """ 
            for i in index:
                for fi in field_index:
                    if fi == num_fields - 1 and i != num_records - 1:
                        file.write(str(dict_obj[fields[fi]][i]) + '\n')
                    elif i != num_records - 1:
                        file.write(str(dict_obj[fields[fi]][i]) + self.token_separator)
                    else:
                        file.write(str(dict_obj[fields[fi]][i]))
        
        except Exception as e:     
            
            logging.error(e)       
        
        finally:
            
                file.close()

        
        
"""
   
   Custom loader that operates on rows in /home/rfaulkner/trunk/projects/data/en.editor_first_and_last.20.tsv
   
   This file stores the first and last edit info of 500K users
    
    ['fes_edits',
     'user_id',
     'last10_reverted',
     'fes_vandalism',
     'first_edit',
     'last10_edits',
     'fes_reverted',
     'last_edit',
     'fes_deleted',
     'user_name',
     'last10_vandalism',
     'last10_deleted\n']
        
"""
class WSOR_custom1_Loader(WSORTokenizedTextFileLoader):
    
    def __init__(self):
        
        self._filename_ = '/home/rfaulkner/trunk/projects/data/en.editor_first_and_last.20.tsv'
        
        WSORTokenizedTextFileLoader.__init__(self, '\t')
        self.process_file(self._filename_)
        
    def find_coverted_users(self, portion):
        
        converted_users = dict()
        #converted_users['last10_vandalism'] = list()
        converted_users['user_id'] = list()
        converted_users['user_name'] = list()
        
        index = range(len(self.contents[self.contents.keys()[0]]))
        
        """
        for i in index:
            if int(self.contents['last10_vandalism'][i]) >  portion:
                
                converted_users['last10_vandalism'].append(self.contents['last10_vandalism'][i])
                converted_users['user_id'].append(self.contents['user_id'][i])
                converted_users['user_name'].append(self.contents['user_name'][i])
        """
        
        """
            Get all users that have:
            
                1. A fisrt edit session of vandalism
                2. No vandalism in their last 10 edits
        """
        for i in index:
            if int(self.contents['last10_vandalism'][i]) == 0 and int(self.contents['fes_vandalism'][i]) > 0:
                
                #converted_users['last10_vandalism'].append(self.contents['last10_vandalism'][i])
                converted_users['user_id'].append(self.contents['user_id'][i])
                converted_users['user_name'].append(self.contents['user_name'][i])
        
        return converted_users
    
    
    def get_user_revisions(self, user_id):
        
        self.init_db()
        
        sql_stmnt = 'select * from  where rev_user = %s' % str(user_id)
        
        logging.info('Running query on revision table...')
        
        try:
            self._cur_.execute(sql_stmnt)
            
            """ GET THE COLUMN NAMES FROM THE QUERY RESULTS """
            self._col_names_ = list()
            for i in self._cur_.description:
                self._col_names_.append(i[0])
                
            self._results_ = self._cur_.fetchall()
                            
        except Exception as inst:
            
            logging.error(type(inst))     # the exception instance
            logging.error(inst.args)      # arguments stored in .args
            logging.error(inst)           # __str__ allows args to printed directly
            

            
        
        self.close_db()
        
        