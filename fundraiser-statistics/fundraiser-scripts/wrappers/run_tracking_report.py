

"""

run_tracking_report.py

wikimediafoundation.org
Ryan Faulkner
November 23rd, 2010


Wrapper script for test_reporting.py

"""
import sys
import datetime
import MySQLdb

import test_reporting
import query_store as qs


""" Establish connection """
db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')
# db = MySQLdb.connect(host='127.0.0.1', user='rfaulk', passwd='baggin5', db='faulkner', port=3307)

""" Create cursor """
cur = db.cursor()

query_obj = qs.query_store()


# Current date & time
now = datetime.datetime.now()

""" Build tables for analytics a fixed number of hours back """
if len(sys.argv) > 1:

	# ESTABLISH THE START TIME TO PULL ANALYTICS
	hours_back = -int(sys.argv[1])
	delta = datetime.timedelta(hours=hours_back)

	time_obj = now + delta

	if time_obj.month < 10:
		month = '0' + str(time_obj.month)
	else:
		month = str(time_obj.month)

	if time_obj.day < 10:
		day = '0' + str(time_obj.day)
	else:
		day = str(time_obj.day)

	if time_obj.hour < 10:
		hour = '0' + str(time_obj.hour)
	else:
		hour = str(time_obj.hour)


	start_time = str(time_obj.year) + month + day + hour + '0000'

	print '\n\nGenerating analytics for ' + str(-hours_back) + ' hours back. The start time is: ' + start_time + ' ... \n'

	# FORMAT HEADERS & QUERY NAME
	query_name = 'report_contribution_tracking'
	header = query_obj.get_query_header(query_name)

else:
	sys.exit('Please enter the number of hours back to query.\n')
	
# contruct HTML table
end_time = ''
test_reporting.build_html_table_from_list(db, cur, header, './sql/', './html/', query_name, start_time, end_time)

cur.close()
db.close()
