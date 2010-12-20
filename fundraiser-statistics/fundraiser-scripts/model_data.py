
"""

model_data.py

wikimediafoundation.org
Ryan Faulkner
Novemner 7th, 2010

"""

# =============================================
# Pulls metrics from database to perform statistical analysis
# =============================================

import MySQLdb
import sys
import numpy as np
import urlparse as up
import cgi

# 	import scipy.special as spec
import scipy.stats.distributions as dist
import math
import numpy

"""

method :: compile_test_instance_data:

sql_file_name - stores the select statement
start_time - char string of start time 'yyyymmddhhmmss'
end_time - char string of end time

"""

def compile_test_instance_data(db, cur, sql_file_name_2step, sql_file_name_1step, start_time, end_time):


	insert_stmnt_ti = "insert into test_instance (test_start_time, test_end_time) values "

	insert_stmnt_tdesc = "insert into test_description (banner, landing_page) values "

	insert_stmnt_tim = "insert into test_instance_metrics (test_instance_id, test_description_id, impressions, visits, clicks, donations, amount, max_amt, "  \
	+ " cc_clicks, pp_clicks, cc_donations, pp_donations, cc_amt, pp_amt, max_cc_amt, max_pp_amt ) values "

	"""
	insert a test instance

	"""
	try:
		val = '(convert(\'' +  start_time + '\', datetime),convert(\''  + end_time + '\', datetime));'
		cur.execute(insert_stmnt_ti + val)

		cur.execute("select max(id) from test_instance;")
		inst_row = cur.fetchone()
		inst_id = inst_row[0]

	except:
		db.rollback()
		sys.exit("Database Interface Exception: Could not execute statement:\n" + insert_stmnt_ti + val)


	"""
	Read the sql file corresponding to the select statement and populate the test_instance_metrics and test_description tables

	Query and insert 2step analytics

	"""
	sql_file = open(sql_file_name_2step, 'r')

	select_stmnt = ''
	line = sql_file.readline()
	while (line != ''):
		select_stmnt = select_stmnt + line
		line = sql_file.readline()


	# Add values to the format string
	select_stmnt = select_stmnt % (start_time, end_time,  start_time, end_time,  start_time, end_time,'%','%','%','%')
	# print select_stmnt
	try:
		err_msg = 'Couldn\'t select analytics and subsequently insert into description and analytics tables\n'

		cur.execute(select_stmnt)

		results = cur.fetchall()
		for row in results:

			cpRow = []
			for i in range(len(row)):
				if row[i] == None:
					cpRow.append('0')
				else:
					cpRow.append(row[i])


			val = '(\'' + cpRow[0] + '\',\'' +  cpRow[1] + '\')'

			cur.execute(insert_stmnt_tdesc + val)

			cur.execute("select max(id) from test_description;")
			desc_row = cur.fetchone()
			desc_id = int(desc_row[0])

			# (inst_id desc_id row[3-17])
			val = ' (' + str(inst_id) + ',' +  str(desc_id) + ',' + str(cpRow[2])   + ',' + str(cpRow[3])  + ',' + str(cpRow[4])  + ',' + str(cpRow[5] )+ ',' + str(cpRow[6])  + ',' + str(cpRow[7])  + ',' \
			+ str(cpRow[8]) + ',' + str(cpRow[9] ) + ',' + str(cpRow[10] ) + ',' + str(cpRow[11])  + ',' + str(cpRow[12])  + ',' + str(cpRow[13])  + ',' + str(cpRow[14]) + ',' + str(cpRow[15]) +')'

			# print insert_stmnt_tim + val
			cur.execute(insert_stmnt_tim + val)



	except:
		db.rollback()
		sys.exit("Database Interface Exception:\n" + err_msg)

	""" Query and insert 1step analytics """

	sql_file = open(sql_file_name_1step, 'r')

	select_stmnt = ''
	line = sql_file.readline()
	while (line != ''):
		select_stmnt = select_stmnt + line
		line = sql_file.readline()

	# Add values to the format string
	select_stmnt = select_stmnt % (start_time, end_time, start_time, end_time,'%','%')

	try:
		err_msg = 'Couldn\'t select analytics and subsequently insert into description and analytics tables\n'

		cur.execute(select_stmnt)

		results = cur.fetchall()

		for row in results:

			cpRow = []
			for i in range(len(row)):
				if row[i] == None:
					cpRow.append('0')
				else:
					cpRow.append(row[i])


			val = '(\'' + cpRow[0] + '\',\'' +  cpRow[1] + '\')'

			cur.execute(insert_stmnt_tdesc + val)

			cur.execute("select max(id) from test_description;")
			desc_row = cur.fetchone()
			desc_id = int(desc_row[0])

			# (inst_id desc_id row[3-17])
			val = ' (' + str(inst_id) + ',' +  str(desc_id) + ',' + str(cpRow[2])   + ',' + str(cpRow[3])  + ',' + str(cpRow[4])  + ',' + str(cpRow[5] )+ ',' + str(cpRow[6])  + ',' + str(cpRow[7])  + ',' \
			+ str(cpRow[8]) + ',' + str(cpRow[9] ) + ',' + str(cpRow[10] ) + ',' + str(cpRow[11])  + ',' + str(cpRow[12])  + ',' + str(cpRow[13])  + ',' + str(cpRow[14])  + ',' +  str(cpRow[15]) + ')'

			# print insert_stmnt_tim + val
			cur.execute(insert_stmnt_tim + val)

	except:
		db.rollback()
		sys.exit("Database Interface Exception:\n" + err_msg)

	# commit insert ops
	db.commit()

	#return the test run id
	return inst_id


"""

method :: compute_confidence:

n - number of trials
k - number of successes

"""

def compute_confidence(n1, k1, n2, k2):

	# which rate is larger
	top_rate = 1 if k1 / n1 >  k2 / n2 else 2

	# Get sample means
	p1 = float(k1) / float(n1)
	p2 = float(k2) / float(n2)

	abs_diff = math.fabs(p1 - p2)

	variance = p1 * (1 - p1) / n1 + p2 * (1 - p2) / n2
	std_dev = math.sqrt(variance)
	range = 1.96		# the units of standard deviations yielding a 95% interval about the mean

	# determine the p-value - the range of dist.norm.cdf is (0, 0.5)
	p_value = 2 * dist.norm.cdf(-abs_diff/2, 0, std_dev)

	significant = 0.05
	isSig = 0

	if p_value < significant:
		isSig = 1

	r = [top_rate, p_value, isSig]

	return r


def measure_test_metrics(db, cur, test_id):

	# index the rows
	index_visits = 1
	index_clicks = 2
	index_donations = 3

	# metric keys
	cpv = "clicks_per_visit"
	dpv = "donations_per_visit"
	dpc = "donations_per_clicks"

	# select all values
	select_stmnt = "select utm_source, visits, clicks, donations from report_test where test_id = " + str(test_id) + ';'
	vals = dict()

	try:
		err_msg = select_stmnt
		cur.execute(select_stmnt)
		results = cur.fetchall()

		for row in results:
			# {utm : [visits, clicks, donations]}
			vals[row[0]] = [int(row[index_visits]), int(row[index_clicks]), int(row[index_donations])]
	except:
		db.rollback()
		sys.exit("Database Interface Exception:\n" + err_msg)

	# print vals

	valKeys = vals.keys()
	numKeys = len(valKeys)
	num_tests = 3

	#winners = np.zeros((numKeys,numKeys,num_tests))
	#significance = np.zeros((numKeys,numKeys,num_tests))
	#p_values = np.zeros((numKeys,numKeys,num_tests))

	""" Process significance values for each test pair """
	for v1 in range(len(valKeys)):
		for v2 in range(v1+1,len(valKeys)):

			utm_1 = valKeys[v1]
			utm_2 = valKeys[v2]

			print "TESTING " + valKeys[v1] + " AGAINST " + valKeys[v2] + ":\n"

			visits_1 = vals[valKeys[v1]][index_visits-1]
			visits_2 = vals[valKeys[v2]][index_visits-1]

			clicks_1 = vals[valKeys[v1]][index_clicks-1]
			clicks_2 = vals[valKeys[v2]][index_clicks-1]

			donations_1 = vals[valKeys[v1]][index_donations-1]
			donations_2 = vals[valKeys[v2]][index_donations-1]

			# Perform tests
			# test 1 - clicks per visit
			# test 2 - visit per donation
			# test 3 - donations per click
			if visits_1 != 0 and visits_2 != 0:
				t1 = compute_confidence(visits_1, clicks_1, visits_2, clicks_2)
				t2 = compute_confidence(visits_1, donations_1, visits_2, donations_2)

				# test 1 results
				#winners[v1][v2][0] = t1[0]
				#significance[v1][v2][0] = t1[1]
				#p_values[v1][v2][0] = t1[2]

				# test 2 results
				#winners[v1][v2][1] = t2[0]
				#significance[v1][v2][1] = t2[1]
				#p_values[v1][v2][1] = t2[2]

				win1 = valKeys[v1] if t1[0] == 1 else valKeys[v2]
				win2 = valKeys[v1] if t2[0] == 1 else valKeys[v2]

				# print "t1 winner: " + win1 + ", is sig? " + str(t1[1] )+ ", p-value: " + str(t1[2])
				# print "t2 winner " + win2 + ", is sig? " + str(t2[1] )+ ", p-value: " + str(t2[2])
			else:
				t1 = [-1,-1,-1]
				t2 = [-1,-1,-1]
				# test 1 results
				#winners[v1][v2][0] = -1
				#significance[v1][v2][0] = -1
				#p_values[v1][v2][0] = -1

				# test 2 results
				#winners[v1][v2][1] = -1
				#significance[v1][v2][1] = -1
				#p_values[v1][v2][1] = -1


			t3 = compute_confidence(clicks_1, donations_1, clicks_2, donations_2)
			win3 = valKeys[v1] if t3[0] == 1 else valKeys[v2]

			# test 3 results
			#winners[v1][v2][2] = t3[0]
			#significance[v1][v2][2] = t3[1]
			#p_values[v1][v2][2] = t3[2]

			# print "t3 winner " + win3 + ", is sig? " + str(t3[1]) + ", p-value: " + str(t3[2])

			""" Insert test results """
			insert_stmnt = "insert into test_stats (test_id, utm_1, utm_2, metric_name, winner_utm, p_value, is_significant) values "

			try:
				val = "(" + str(test_id) + ",\'"+ utm_1 + "\',\'" + utm_2 +  "\',\'" + cpv +  "\',\'" + win1 +  "\'," + t1[1], + "," +  t1[2] + ")"
				cur.execute(insert_stmnt + val)
				val = "(" + str(test_id) + ",\'" + utm_1 + "\',\'" + utm_2 +  "\',\'" + dpv +  "\',\'" + win2 +  "\'," + t2[1], + "," +  t2[2] + ")"
				cur.execute(insert_stmnt + val)
				val = "(" + str(test_id) + ",\'" + utm_1 + "\',\'" + utm_2 +  "\',\'" + dpc +  "\',\'" + win3 +  "\'," + t3[1], + "," +  t3[2] + ")"
				cur.execute(insert_stmnt + val)
			except:
				db.rollback()
				sys.exit("Database Interface Exception:\n" + err_msg)


			# for i in range(num_tests):
