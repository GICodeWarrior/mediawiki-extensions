

"""

squid_miner_script.py

wikimediafoundation.org
Ryan Faulkner
November 4th, 2010

"""

"""

squid_miner_script.py:

Script to mine landing page data from squid logs

"""


import sys
import MySQLdb

import miner_help as mh
import mine_landing_pages as mlp
import mine_impression_request as mir



"""
Process command line args

1 - i for impressions, l for landingpages
2 - log file name

"""

try:
	mine_option = sys.argv[1]
	logFileName = sys.argv[2]
except IndexError:
	sys.exit('Please enter a mining option and log file path and name\n i for impressions\n l for landing pages\n' \
	+ ' e.g. $squid_miner_script.py i bannerImpressions.log\n')

if (mine_option != 'i' and mine_option != 'l') or len(mine_option) > 1 :
	sys.exit('Please select a valid mining option\n i for impressions\n 	l for landing pages\n' \
	+  ' e.g. $squid_miner_script.py i bannerImpressions.log\n')



"""

INITIALIZE DB ACCESS

"""

""" Establish connection """
# db = MySQLdb.connect(host='localhost', user='root', passwd='baggin5', db='faulkner')
# db = MySQLdb.connect(host='db10.pmtpa.wmnet', user='rfaulk', db='faulkner')
db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')

""" Create cursor """
cur = db.cursor()

""" """
insertStmt_tr = 'INSERT INTO log_run (start_time, end_time, notes) values '
selectStmt_tr = 'SELECT max(id) FROM log_run;'



"""

MODIFY LOG_RUN TABLE
Insert a new test run and get the id.

"""

fname_parts = logFileName.split('-')

year = int(fname_parts[1])
month = int(fname_parts[2])
day = int(fname_parts[3])
hour = int(fname_parts[4][0:2])
min = int(fname_parts[6][0:2])

# Is this an afternoon log?
afternoon = (fname_parts[4][2:4] == 'PM')

if afternoon and hour < 12:
	hour = hour + 12

next_hr = mh.getNextHour(year, month, day, hour)
log_start =  str(year) + '-' + str(month) + '-' + str(day) + ' ' + str(hour) + ':' + str(min) + ':00'
log_end =  str(next_hr[0]) + '-' + str(next_hr[1]) + '-' + str(next_hr[2]) + ' ' + str(next_hr[3]) + ':' + str(min) + ':00'
"""
try:
	val = '(convert(\'' + log_start + '\',datetime), convert(\'' + log_end + '\',datetime), \'Auto-Generated\');'
	cur.execute(insertStmt_tr + val)
except:
	db.rollback()
	sys.exit("Database Interface Exception: Could not execute statement:\n" + insertStmt_tr + val)

try:
	cur.execute(selectStmt_tr)
	# results = cur.fetchall()
	# for row in results:
	row = cur.fetchone()
	run_id = int(row[0])

except:
	db.rollback()
	sys.exit("Database Interface Exception: Could not execute statement:\n" + selectStmt_tr)

"""

"""

A log_run record has been created for this log
call the mining scripts for the respective

"""
run_id = 0
if mine_option == 'l':
	mlp.mine_landing_pages(run_id, logFileName, db, cur)
else:
	mir.mine_impression_requests(run_id, logFileName, db, cur)
	
# Commit to the db
db.commit()

# Close connection
cur.close()
db.close()
