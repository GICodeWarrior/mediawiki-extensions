

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
