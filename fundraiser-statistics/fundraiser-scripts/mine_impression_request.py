
"""

mine_impression_request.py

wikimediafoundation.org
Ryan Faulkner
October 30th, 2010

"""

# =====================================
# Script to mine impression data from squid logs
# =====================================

import MySQLdb
import sys
import urlparse as up
import math

import cgi
import re
import gzip

# import numpy as np
import miner_help as mh


def mine_impression_requests(run_id, logFileName, db, cur):

	# Initialization - open the file
	# logFileName = sys.argv[1];
	if (re.search('\.gz',logFileName)):
		logFile = gzip.open(logFileName, 'r')
	else:
		logFile = open(logFileName, 'r')

	queryIndex = 4;

	counts = mh.AutoVivification()
	insertStmt = 'INSERT INTO impression (utm_source, referrer, country, lang, counts, on_minute) values '

	min_log = -1
	hr_change = 0
	clamp = 0

	""" Clear the records for hour ahead of adding """
	time_stamps = mh.get_timestamps(logFileName)
	
	start = time_stamps[0]
	end = time_stamps[1]
	
	# Ensure that the range is correct; otherwise abort - critical that outside records are not deleted
	time_diff = mh.get_timestamps_diff(start, end) 
		
	if math.fabs(time_diff) <= 1.0:
		deleteStmnt = 'delete from impression where on_minute >= \'' + start + '\' and on_minute < \'' + end + '\';'
		
		try:
			# cur.execute(deleteStmnt)
			print >> sys.stdout, "Executed delete from impression: " + deleteStmnt
		except:
			print >> sys.stderr, "Could not execute delete:\n" + deleteStmnt + "\nResuming insert ..."
			pass
	else:
		print >> sys.stdout, "Could not execute delete statement, DIFF too large\ndiff = " + str(time_diff) + "\ntime_start = " + start + "\ntime_end = " + end + "\nResuming insert ..."
	
	
	# PROCESS LOG FILE
	# ================

	line = logFile.readline()
	while (line != ''):

		lineArgs = line.split()

		# Filter out time data by minute -- if the time is not properly formatted skip the record
		# 2010-11-12T20:56:43.237
		
		try:
			time_stamp = lineArgs[2]
			time_bits = time_stamp.split('T')
			date_fields = time_bits[0].split('-')
			time_fields = time_bits[1].split(':')
			minute = int(time_fields[1])
		except (ValueError, IndexError):
			line = logFile.readline()
			continue
			# pass
			
		# Weird and confusing logic used to deal with logs that aren't sequential

		if minute == 0 and not(hr_change) and not(clamp):
			min_log = -1

		if minute == 1:
			hr_change = 0
			clamp = 1

		# =================

		try:
			url = lineArgs[8]
		except IndexError:
			url = 'Unavailable'

		parsedUrl = up.urlparse(url)
		query = parsedUrl[queryIndex]
		queryBits = cgi.parse_qs(query)

		# Extract - project, banner, language, & country data
		project = ''
		if ('db' in queryBits.keys()):
			project = queryBits['db'][0]

		if (project == '' and 'sitename' in queryBits.keys()):
			sitename = queryBits['sitename'][0];
			if sitename:
				project = sitename
			else:
				project = 'NONE'

		if ('banner' in queryBits.keys()):
			banner = queryBits['banner'][0]
		else:
			banner = 'NONE'

		if ('userlang' in queryBits.keys()):
			lang = queryBits['userlang'][0]
		else:
			lang = 'NONE'

		if ('country' in queryBits.keys()):
			country = queryBits['country'][0]
		else:
			country = 'NONE'


		try:
			counts[banner][country][project][lang] = counts[banner][country][project][lang] + 1
		except TypeError:
			counts[banner][country][project][lang] = 1

		"""
		try:
			counts[att_1][att_2][att_3] = counts[att_1][att_2][att_3] + 1
		except TypeError:
			counts[att_1][att_2][att_3] = 1
		"""

		# Break out impression data by minute
		if min_log < minute and not(hr_change):

			if minute == 0:
				hr_change = 1

			min_log = minute
			time_stamp_in = "convert(\'" + date_fields[0] + date_fields[1] + date_fields[2] + time_fields[0] + time_fields[1]  + "00\', datetime)"


			# print time_stamp_in

			bannerKeys = counts.keys()
			for banner_ind in range(len(bannerKeys)):
				banner = bannerKeys[banner_ind]
				countryCounts = counts[banner]
				countryKeys = countryCounts.keys()

				for country_ind in range(len(countryKeys)):
					country = countryKeys[country_ind]
					projectCounts = countryCounts[country]
					projectKeys = projectCounts.keys()

					for project_ind in range(len(projectKeys)):
						project = projectKeys[project_ind]
						langCounts = projectCounts[project]
						langKeys = langCounts.keys()

						for lang_ind in range(len(langKeys)):
							lang = langKeys[lang_ind]
							count = langCounts[lang]

							try:
								val = '(\'' + banner + '\',\'' + project + '\',\'' + country + '\',\'' + lang + '\',' \
								+ str(count) + ',' + time_stamp_in + ');'
								cur.execute(insertStmt + val)
							except:
								db.rollback()
								sys.exit("Database Interface Exception - Could not execute statement:\n" + insertStmt + val)

			# Re-initialize counts
			counts = mh.AutoVivification()

		line = logFile.readline()


	# ACCESS THE DB
	# ==============



	# commit insert ops
	# db.commit()


