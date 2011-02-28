
"""

mine_contacts.py

wikimediafoundation.org
Ryan Faulkner
February 11th, 2010

"""

# =============================================
# Pulls metrics from database to perform statistical analysis
# =============================================

import sys
import getopt
import re
import datetime

import MySQLdb
import HTML

import test_reporting as tr
import miner_help as mh
import query_store as qs
import fundraiser_reporting as fr



class contact_handler(tr.data_handler, fr.TimestampProcesser):

	__query_obj = qs.query_store()
	__file_name = './csv/Rebeccas_Contacts_Donation_Alerts_mod.csv'
	__sql_path = './sql/'
	__html_path = './html/'
	__query_handle_contact = 'report_ecomm_by_contact'
	__query_handle_amount = 'report_ecomm_by_amount'
		
	
	
	def __init__(self):		
		super(tr.data_handler, self).__init__()
		
	"""
	
	method :: parse_contacts:
	
	Constants:  
	=========
	
	file_name = ./csv/Rebeccas_Contacts_Donation_Alerts.csv
	
	"""
	
	def parse_contacts(self):
		
		# Initialization - open the file
		# FileName = sys.argv[1];
		if (re.search('\.gz',self.__file_name)):
			file_obj = gzip.open(self.__file_name, 'r')
		else:
			file_obj = open(self.__file_name, 'r')
			
		
		# Sample from csv file
		# Internal Contact ID,	Sort Name,	First Name,	Last Name,	Contact Type
		# 120842,	"Abramowicz, David",	David,	Abramowicz,	Individual
		index_first_name = 3
		index_last_name = 4
		contact_list = list()
		
		
		# PROCESS LOG FILE
		# ================
		line = file_obj.readline()
		while (line != ''):
			
			lineArgs = line.split(',')		
			# print lineArgs[index_first_name] + ' ' + lineArgs[index_last_name]
			contact_list.append([lineArgs[index_first_name], lineArgs[index_last_name]])
			line = file_obj.readline()
	
		return contact_list


	"""
	
	Civi Reporting - Create a table from a list of contacts
	
	This method looks at 
	
	Constants:  
	=========
	
	file_name = ./sql/Rebeccas_Contacts_Donation_Alerts.csv
	
	
	"""
	def build_html_table_by_contact(self):
		
		
		# get the contacts from the list
		list = self.parse_contacts()
		
		table_data = []
		sql_stmnt = mh.read_sql(self.__sql_path + self.__query_handle_contact + '.sql');
		
		# open the html files for writing
		f = open(self.__html_path + self.__query_handle_contact + '.html', 'w')
		
		# construct contact where string
		# iterate through the list
		where_str = 'where '
		first_item = 0
		for i in list[1:]:
			
			# only process People now - not organizations or Households
			if not(re.search('Organization', i[0]) or re.search('Organization', i[1]) or re.search('Household', i[0]) or re.search('Household', i[1])):
				if not(first_item):
					first_item = 1
				else:
					where_str = where_str + ' or '
				
				where_str = where_str + '(first_name = \'' + i[0].strip() + '\' and last_name = \'' + i[1].strip() + '\')'
		
		# Formats the statement according to query type
		select_stmnt = self.__query_obj.format_query(self.__query_handle_contact, sql_stmnt, [where_str])
		print select_stmnt
		
		# initialize the db and execute the query
		self.init_db()
		
		try:
			
			# execute statement gathering amounts
			err_msg = select_stmnt
			self._cur.execute(select_stmnt)
			results = self._cur.fetchall()
		
			for row in results:
				cpRow = self.listify(row)
				table_data.append(cpRow)
						
		except:
			self._db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		self.close_db()
		
		# Construct the html table
		header = self.__query_obj.get_query_header(self.__query_handle_contact)
		t = HTML.table(table_data, header_row=header)
		htmlcode = str(t)
		
		f.write(htmlcode)
		f.close()
		
		return htmlcode



	"""
	
	Civi Reporting - Create a table from a list of contacts
	Creates two html tables
	
	"""
	def build_html_table_by_amount(self):

		
		# Initialize times  
		now = datetime.datetime.now()
		hours_back = 24 * 7
		
		start_time, end_time = self.gen_date_strings_hr(now, hours_back)
		
		# Prepare SQL statements and tables
		table_data = []
		sql_stmnt = mh.read_sql(self.__sql_path + self.__query_handle_amount + '.sql');
		
		# open the html files for writing
		f = open(self.__html_path + self.__query_handle_amount + '.html', 'w')
		
		# Formats the statement according to query type
		select_stmnt = self.__query_obj.format_query(self.__query_handle_amount, sql_stmnt, [start_time, end_time])

		# initialize the db and execute the query
		self.init_db()
		
		try:
			
			# execute statement gathering amounts
			err_msg = select_stmnt
			self._cur.execute(select_stmnt)
			results = self._cur.fetchall()
			
			for row in results:
				cpRow = self.listify(row)
				table_data.append(cpRow)
			
			
		except:
			self._db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		self.close_db()
		
		# Construct the html table
		header = self.__query_obj.get_query_header(self.__query_handle_amount)
		t = HTML.table(table_data, header_row=header)
		htmlcode = str(t)
		
		f.write(htmlcode)
		f.close()
		
		return htmlcode
	
	
	
"""

method :: main

to parse contact names invoke:

rfaulkner@wmf128:~/trunk/projects/fundraiser-statistics/fundraiser-scripts$ python mine_contacts.py /home/rfaulkner/trunk/docs/Rebeccas_Contacts_Donation_Alerts.csv

"""

class Usage(Exception):
    def __init__(self, msg):
        self.msg = msg

def main(argv=None):
	if argv is None:
		argv = sys.argv
	try:
		try:
			opts, args = getopt.getopt(argv[1:], "h", ["help"])
		except getopt.error, msg:
			raise Usage(msg)
				
	# more code, unchanged
	except Usage, err:
		print >>sys.stderr, err.msg
		print >>sys.stderr, "for help use --help"
		return 2

	contact_handler_obj = contact_handler()
	
	# Construct HTML table - conditioned on input
	if len(args) > 0:
		if args[0] == 'c':
			contact_handler_obj.build_html_table_by_contact()
		elif args[0] == 'a':
			contact_handler_obj.build_html_table_by_amount()
		else:
			print 'Invalid option: enter "c" for civi contacts or "a" for amounts'
	else:
		print 'Invalid args: need at least one argument; enter "c" for civi contacts or "a" for amounts'
	
if __name__ == "__main__":
    sys.exit(main())
