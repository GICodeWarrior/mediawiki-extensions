

"""

miner_helper.py

wikimediafoundation.org
Ryan Faulkner
October 30th, 2010

"""

# ===================
# Helper script for mining
# ===================

import calendar as cal
import math

# Determines the following hour based on the precise date to the hour
def getNextHour(year, month, day, hour):

	lastDayofMonth = cal.monthrange(year,month)[1]

	next_year = year
	next_month = month
	next_day = day
	next_hour = hour + 1

	if hour == 23:
		next_hour = 0
		if day == lastDayofMonth:
			next_day = 1
			if month == 12:
				next_month = 1
				next_year = year + 1

	return [next_year, next_month, next_day, next_hour]


class AutoVivification(dict):
	"""Implementation of perl's autovivification feature."""
	def __getitem__(self, item):
		try:
			return dict.__getitem__(self, item)
		except KeyError:
			value = self[item] = type(self)()
			return value

def read_sql(filename):

	sql_file = open(filename, 'r')

	sql_stmnt = ''
	line = sql_file.readline()
	while (line != ''):
		sql_stmnt = sql_stmnt + line
		line = sql_file.readline()

	return sql_stmnt
	
def drange(start, stop, step):
	
	if step < 1:
		gain = math.floor(1 / step)
		lst = range(0, ((stop-start) * gain), 1)
		return [start + x * step for x in lst]
	else:
		return range(start, stop, step)
	

def mod_list(lst, modulus):
	return [x % modulus for x in lst]