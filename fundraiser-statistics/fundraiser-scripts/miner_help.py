

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


""" Determines the following hour based on the precise date to the hour """
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

""" Determines the previous hour based on the precise date to the hour """
def getPrevHour(year, month, day, hour):
	
	if month == 1:
		last_year = year - 1
		last_month = 12
	else:
		last_year = year
		last_month = month - 1
		
	lastDayofPrevMonth = cal.monthrange(year,last_month)[1]
		
	prev_year = year
	prev_month = month
	prev_day = day
	prev_hour = hour - 1

	if prev_hour == -1:
		prev_hour = 23
		if day == 1:
			prev_day = lastDayofPrevMonth
			prev_month = last_month
			prev_year = last_year
		else:
			prev_day = day - 1
			
	return [prev_year, prev_month, prev_day, prev_hour]


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
		
""" Extract a timestamp from the filename """
def get_timestamps(logFileName):
	
	fname_parts = logFileName.split('-')

	year = int(fname_parts[1])
	month = int(fname_parts[2])
	day = int(fname_parts[3])
	hour = int(fname_parts[4][0:2])
	
	# Is this an afternoon log?
	afternoon = (fname_parts[4][2:4] == 'PM') 
	 
	# Adjust the hour as necessary if == 12AM or *PM
	if afternoon and hour < 12:
		hour = hour + 12
		
	if not(afternoon) and hour == 12:
		hour = 0

	prev_hr = getPrevHour(year, month, day, hour)
	
	str_month = '0' + str(month) if month < 10 else str(month)
	str_day = '0' + str(day) if day < 10 else str(day)
	str_hour = '0' + str(hour) if hour < 10 else str(hour)
	
	prev_month = prev_hr[1] 
	prev_day = prev_hr[2]
	prev_hour = prev_hr[3]
	str_prev_month = '0' + str(prev_month) if prev_month < 10 else str(prev_month)
	str_prev_day = '0' + str(prev_day) if prev_day < 10 else str(prev_day)
	str_prev_hour = '0' + str(prev_hour) if prev_hour < 10 else str(prev_hour)
	
	log_end = str(year) + str_month + str_day + str_hour + '5500'
	log_start = str(prev_hr[0]) + str_prev_month + str_prev_day + str_prev_hour + '5500' 
	
	#log_start = str(year) + str(month) + str(day) + str(hour) + '5500'
	#log_end = str(prev_hr[0]) + str(prev_hr[1]) + str(prev_hr[2]) + str(prev_hr[3]) + '5500' 

	return [log_start, log_end]
	

""" Compute the difference among two timestamps """
def get_timestamps_diff(timestamp_start, timestamp_end):
	
	year_1 = int(timestamp_start[0:4])
	month_1 = int(timestamp_start[4:6])
	day_1 = int(timestamp_start[6:8])
	hr_1 = int(timestamp_start[8:10])
	min_1 = int(timestamp_start[10:12])
	
	year_2 = int(timestamp_end[0:4])
	month_2 = int(timestamp_end[4:6])
	day_2 = int(timestamp_end[6:8])
	hr_2 = int(timestamp_end[8:10])
	min_2 = int(timestamp_end[10:12])
	
	t1 = cal.datetime.datetime(year=year_1, month=month_1, day=day_1, hour=hr_1, minute=min_1,second=0)
	t2 = cal.datetime.datetime(year=year_2, month=month_2, day=day_2, hour=hr_2, minute=min_2,second=0)
	
	diff = t2 - t1
	diff = float(diff.seconds) / 3600
	
	return diff
	
""" Converts a list to a dictionary or vice versa -- INCOMPLETE MAY BE USEFUL AT SOME FUTURE POINT """
def convert_list_dict(collection):
	
	if type(collection) is dict:
		new_collection = list()
		
	elif type(collection) is list:
		new_collection = dict()
		
	else:
		print "miner_help::convert_list_dict:  Invalid type, must be a list or a dictionary."
		return 0;

	return new_collection