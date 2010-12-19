
"""

data_aggregation_script.py

wikimediafoundation.org
Ryan Faulkner
Novemner 8th, 2010

"""

import sys
import MySQLdb
import model_data as md


"""
Parse the input args

"""
try:
	start_time = sys.argv[1]
	end_time = sys.argv[2]
	banner = sys.argv[3]
	# sql_file_name = sys.argv[3]
	
except IndexError:
	sys.exit('Please enter a UTC start and end time: \n' \
	+ ' e.g. $data_aggregation_scipt.py 20101010000000 20101010010000 2010_testing50\n')
	
	

"""
INITIALIZE DB ACCESS

"""

""" Establish connection """
# db = MySQLdb.connect(host='localhost', user='root', passwd='baggin5', db='faulkner')
db = MySQLdb.connect(host='db10.pmtpa.wmnet', user='rfaulk', db='faulkner')

""" Create cursor """
cur = db.cursor()


"""
Generate a unique test ID

"""

sql_file_name_2step = './sql/full_analytics_2step.sql'
sql_file_name_1step = './sql/full_analytics_1step.sql'
# sql_file_name = './sql/test.sql'
# sql_file_name = './sql/landpage_test.sql'
# start_time = '20101104234000' 
# end_time = '20101105010000'

md.compile_test_instance_data(db, cur, sql_file_name_2step, sql_file_name_1step, start_time, end_time)

# Close connection
cur.close()
db.close()
