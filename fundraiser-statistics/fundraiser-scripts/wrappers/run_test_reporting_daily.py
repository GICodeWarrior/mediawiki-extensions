

"""

run_test_reporting.py

wikimediafoundation.org
Ryan Faulkner
November 23rd, 2010


Wrapper script for test_reporting.py

"""
import sys
import datetime
import MySQLdb

import test_reporting



""" Establish connection """
db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')
# db = MySQLdb.connect(host='127.0.0.1', user='rfaulk', passwd='baggin5', db='faulkner', port=3307)

""" Create cursor """
cur = db.cursor()

# Current date & time
now = datetime.datetime.now()

""" Build tables for analytics a fixed number of hours back """
if len(sys.argv) > 1:

	# ESTABLISH THE START TIME TO PULL ANALYTICS
	days_back = -int(sys.argv[1])
	delta = datetime.timedelta(hours=days_back)

	time_obj = now + delta

	if time_obj.month < 10:
		month = '0' + str(time_obj.month)
	else:
		month = str(time_obj.month)

	if time_obj.day < 10:
		day = '0' + str(time_obj.day)
	else:
		day = str(time_obj.day)


	start_time = str(time_obj.year) + month + day + '000000'

	print '\n\nGenerating analytics for ' + str(-days_back) + ' hours back. The start time is: ' + start_time + ' ... \n'

	# FORMAT HEADERS & QUERY NAME
	query_name_imp_country = 'report_impressions_country'
	header_imp_country = ['Day', 'Country','Impressions']


else:

	start_time = '20101112000000'

	print '\n\nGenerating analytics since: ' + start_time +' ... \n'

	# FORMAT HEADERS & QUERY NAME
	query_name_imp_country = 'report_impressions_country'
	header_imp_country = ['Day', 'Country','Impressions']


end_time = ''

# Build HTML from query
test_reporting.build_html_table_from_list(db, cur, header_imp_country, './sql/', './html/', query_name_imp_country, start_time, end_time)

cur.close()
db.close()
