

"""

fundraiser_reporting.py

wikimediafoundation.org
Ryan Faulkner
December 16th, 2010


Pulls data from storage3.faulkner and generates plots.


"""
import matplotlib
matplotlib.use('Agg')

import sys
import datetime
import MySQLdb
import pylab
import HTML

import query_store as qs
import miner_help as mh

"""

CLASS :: ^FundraiserReporting^

Base class for reporting fundraiser analytics.  Methods that are intended to be extended in derived classes include:

run_query()
run()
gen_plot()
publish_google_sheet()
write_to_html_table()


"""
class FundraiserReporting:

	# Database and Cursor objects
	db = None
	cur = None
	
	def init_db(self):
		""" Establish connection """
		#db = MySQLdb.connect(host='db10.pmtpa.wmnet', user='rfaulk', db='faulkner')
		#self.db = MySQLdb.connect(host='127.0.0.1', user='rfaulk', db='faulkner', port=3307)
		self.db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')

		""" Create cursor """
		self.cur = self.db.cursor()
	
	def close_db(self):
		self.cur.close()
		self.db.close()
	
	
	"""
	
		Takes as input and converts it to a set of hours counting back from 0
		
		time_lists 		- a list of timestamp lists
		time_norm 	- a dictionary of normalized times
		
	"""
	def normalize_timestamps(self, time_lists):
		
		# Convert lists into dictionaries before processing
		# it is assumed that lists are composed of only simple types
		isList = 0
		if type(time_lists) is list:
			isList = 1
			
			old_list = time_lists
			time_lists = mh.AutoVivification()
			
			key = 'key'
			time_lists[key] = list()
			
			for i in range(len(old_list)):
				time_lists[key].append(old_list[i])
		
		
		# Find the earliest date
		max_i = 0
		
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day_int = int(date_str[8:10])
				hr_int = int(date_str[11:13])
				date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				if date_int > max_i:
					max_i = date_int
					max_day = day_int
					max_hr = hr_int 
		
		
		# Normalize dates
		time_norm = mh.AutoVivification()
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day = int(date_str[8:10])
				hr = int(date_str[11:13])
				# date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				elem = (day - max_day) * 24 + (hr - max_hr)
				try: 
					time_norm[key].append(elem)
				except:
					time_norm[key] = list()
					time_norm[key].append(elem)
		
		# If the original argument was a list put it back in that form 
		if isList:
			time_norm = time_norm[key]
			
		return time_norm
				
	"""
	
	input - python datetime object
	returns - formatted datetime strings
	
	"""
	def gen_date_strings_hr(self, now, hours_back):
		
		delta = datetime.timedelta(hours=-hours_back)

		time_obj = now + delta
		now = now + datetime.timedelta(hours=-1) # Move an hour back to terminate at 55 minute
		
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


		if now.month < 10:
			month_e = '0' + str(now.month)
		else:
			month_e = str(now.month)

		if now.day < 10:
			day_e = '0' + str(now.day)
		else:
			day_e = str(now.day)

		if now.hour < 10:
			hour_e = '0' + str(now.hour)
		else:
			hour_e = str(now.hour)
		
		start_time = str(time_obj.year) + month + day + hour + '0000'
		end_time = str(now.year) + month_e + day_e + hour_e + '5500'
		
		return [start_time, end_time]
			
	"""
	
	input - python datetime object
	returns - formatted datetime strings
	
	"""
	def gen_date_strings_day(self, now, days_back):
		
		delta = datetime.timedelta(days=-days_back)
		time_obj = now + delta

		""" FORMAT DATE STRINGS """

		if time_obj.month < 10:
			month = '0' + str(time_obj.month)
		else:
			month = str(time_obj.month)

		if time_obj.day < 10:
			day = '0' + str(time_obj.day)
		else:
			day = str(time_obj.day)

		if now.month < 10:
			month_e = '0' + str(now.month)
		else:
			month_e = str(now.month)

		if (now.day) < 10:
			day_e = '0' + str(now.day)
		else:
			day_e = str(now.day)

		start_time = str(time_obj.year) + month + day + '000000'
		end_time = str(now.year) + month_e + day_e + '000000'
	
		return [start_time, end_time]
	
	"""

	def smooth::

	Smooths a list of values

	"""
	def smooth(values, window_length):

		window_length = int(math.floor(window_length / 2))

		if window_length < 1:
			return values

		list_len = len(values)
		new_values = list()

		for i in range(list_len):
			index_left = max([0, i - window_length])
			index_right = min([list_len - 1, i + window_length])

			width = index_right - index_left + 1
			
			new_val = sum(values[index_left : (index_right + 1)]) / width
			new_values.append(new_val)

		return new_values
	
	"""
	
	workaround for issue with tuple objects in HTML.py 
	MySQLdb returns unfamiliar tuple elements from its fetchall method
	this is probably a version problem since the issue popped up in 2.5 but not 2.6
	
	"""
	def listify(row):
		l = []
		for i in row:
			l.append(i)
		return l
		

	"""
	
	To be overloaded by subclasses for specific types of queries
	
	"""
	def run_query(self, start_time, end_time, query_name, metric_name):
		return
		
	
	"""
	
	To be overloaded by subclasses for different plotting behaviour
	
	"""
	def gen_plot(self,x, y_lists, labels, title, xlabel, ylabel, subplot_index, fname):
		return

	"""
	
	To be overloaded by subclasses for writing tables - this functionality currently exists outside of this class structure (test_reporting.py)
	
	"""
	def write_to_html_table(self):
		return
	
	
	
	"""
	
	The access point of FundraiserReporting and derived objects.  Will be used for executing and orchestrating the creation of plots, tables etc.
	To be overloaded by subclasses 
	
	"""
	def run(self):
		return
		


"""

CLASS :: ^TotalAmountsReporting^

This subclass handles reporting on total amounts for the fundraiser.

"""

class TotalAmountsReporting(FundraiserReporting):
	
	def __init__(self):
		self.data = []
		
	def run_query(self, start_time, end_time, query_name, descriptor):
		
		self.init_db()
		
		query_obj = qs.query_store()

		# Load the SQL File & Format
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		sql_stmnt = query_obj.format_query(query_name + descriptor, sql_stmnt, [start_time, end_time])
		
		labels = [None] * 20 
		labels[0] = 'clicks'
		labels[1] = 'donations'
		labels[2] = 'total amount'
		labels[3] = 'banner amount'
		labels[4] = 'US amount'
		labels[5] = 'EN amount'
		labels[6] = 'Other Amount'
		labels[7] = 'Email Amount'
		labels[8] = 'Recurring Guess'
		labels[9] = 'completion_rate'
		labels[10] = 'pp_clicks'
		labels[11] = 'pp_donations'
		labels[12] = 'pp_completion'
		labels[13] = 'pp_amount'
		labels[14] = 'pp_max_amount'
		labels[15] = 'cc_clicks'
		labels[16] = 'cc_donations'
		labels[17] = 'cc_completion'
		labels[18] = 'cc_amount'
		labels[19] = 'cc_max_amount'

		
		num_keys = len(labels)
		
		lists = list()
		for i in range(num_keys):
			lists.append(list())
		
		# Composes the data for each banner
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)

			# This query store records according to dates
			results = self.cur.fetchall()
			for row in results:
				for i in range(num_keys):
					lists[i].append(row[i+1]) 	
				
		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		self.close_db()
		
		# Only interested in amounts
		return [labels, lists]
	
	
	
	def gen_plot(self,x, y_lists, labels, title, xlabel, ylabel, ranges, subplot_index, fname):
		pylab.subplot(subplot_index)
		num_keys = len(y_lists)
		
		pylab.figure(num=None,figsize=[26,14])
		line_types = ['b-o','g-o','r-o','c-o','m-o','k-o','b--o','g--o','r--o','c--o','m--o','k--o']
		
		for i in range(num_keys):
			pylab.plot(x, y_lists[i], line_types[i])

		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		pylab.legend(labels,loc=2)

		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname+'.png', format='png')
	
	
	
	def run_hr(self, type):
		
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta


		# ESTABLISH THE START TIME TO PULL ANALYTICS
		hours_back = 24
		times = self.gen_date_strings_hr(now, hours_back)
		
		start_time = times[0]
		end_time = times[1]

		print '\nGenerating analytics total amount for ' + str(hours_back) + ' hours back. The start and end times are: ' + start_time + ' - ' + end_time +' ... \n'

		# QUERY NAME
		query_name = 'report_total_amounts'
		

		# RUN BY HOUR
		descriptor = '_by_hr'
		return_val = self.run_query(start_time, end_time, query_name, descriptor)
		
		labels = return_val[0] 	# curve labels
		counts = return_val[1]	# curve data - lists
		
		r = self.get_query_fields(labels, counts, type, start_time, end_time)
		labels = r[0]
		counts = r[1]
		title = r[2]
		ylabel = r[3]
		
		xlabel = 'Time - Hours'
		subplot_index = 111
		
		# plot the curves
		time_range = range(len(counts[0]))
		for i in range(len(counts[0])):
			time_range[i] = time_range[i] - len(counts[0])
		
		ranges = [min(time_range), max(time_range)]
		
		fname = query_name + descriptor + '_' + type
		self.gen_plot(time_range, counts, labels, title, xlabel, ylabel, ranges, subplot_index, fname)
		
	
	
	def run_day(self):
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta


		# ESTABLISH THE START TIME TO PULL ANALYTICS
		days_back = 7
		times = self.gen_date_strings_day(now, days_back)
		
		start_time = times[0]
		end_time = times[1]

		print '\nGenerating analytics total amount for ' + str(days_back) + ' days back. The start and end times are: ' + start_time + ' - ' + end_time +' ... \n'


		# FORMAT HEADERS & QUERY NAME
		query_name = 'report_total_amounts'
		descriptor = '_by_day'
		return_val = self.run_query(start_time, end_time, query_name, descriptor)

		labels = return_val[0]
		counts = return_val[1]

		r = self.get_query_fields(labels, counts, 'BAN_EM', start_time, end_time)
		labels = r[0]
		counts = r[1]
		title = r[2]
		ylabel = r[3]
		
		xlabel = 'Time - Days'
		subplot_index = 111
		
		# Plot values
		time_range = range(len(counts[0]))
		for i in range(len(counts[0])):
			time_range[i] = time_range[i] - len(counts[0])
		
		ranges = [min(time_range), max(time_range)]
		
		self.gen_plot(time_range, counts, labels, title, xlabel, ylabel, ranges, subplot_index, query_name+descriptor)
		
		
	def get_query_fields(self, labels, counts, type, start_time, end_time):
		
		if type == 'BAN_EM':
			indices = range(2,9)
			title = 'Total Amounts: ' + start_time + ' -- ' + end_time
			ylabel = 'Amount'
		elif type == 'CC_PP_completion':
			indices = [12,17]
			title = 'Credit Card & Paypal Completion Rates: ' + start_time + ' -- ' + end_time
			ylabel = 'Rate'			
		elif type == 'CC_PP_amount':
			indices = [13,18]
			title = 'Credit Card & Paypal Total Amounts: ' + start_time + ' -- ' + end_time
			ylabel = 'Amount'
		else:
			sys.exit("Total Amounts: You must enter a valid report type.\n" )
		
		# Exract relevant labels and values
		labels_temp = list()
		counts_temp = list()
		
		for i in range(len(labels)):
			if i in indices:
				labels_temp.append(labels[i])
				counts_temp.append(counts[i])

		return [labels_temp, counts_temp, title, ylabel]
		

"""

CLASS :: ^BannerLPReporting^

This subclass handles reporting on banners and landing pages for the fundraiser.

"""

class BannerLPReporting(FundraiserReporting):
	
		
	def __init__(self, *args):
		
		if len(args) == 2:
			self.campaign = args[0]
			self.start_time = args[1]
		else:
			self.campaign = None
			self.start_time = None
		
	def run_query(self,start_time, end_time, campaign, query_name, metric_name):
		
		self.init_db()
		
		query_obj = qs.query_store()

		metric_lists = mh.AutoVivification()
		time_lists = mh.AutoVivification()
		# table_data = []		# store the results in a table for reporting
		
		# Load the SQL File & Format
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		
		query_name  = 'report_bannerLP_metrics'  # rename query to work with query store
		sql_stmnt = query_obj.format_query(query_name, sql_stmnt, [start_time, end_time, campaign])
		# print sql_stmnt
		key_index = query_obj.get_banner_index(query_name)
		time_index = query_obj.get_time_index(query_name)
		metric_index = query_obj.get_metric_index(query_name, metric_name)
		
		# Composes the data for each banner
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			results = self.cur.fetchall()
			
			# Compile Table Data
			# cpRow = self.listify(row)
			# table_data.append(cpRow)
			
			for row in results:

				key_name = row[key_index]
				
				try:
					metric_lists[key_name].append(row[metric_index])
					time_lists[key_name].append(row[time_index])
				except:
					metric_lists[key_name] = list()
					time_lists[key_name] = list()

					metric_lists[key_name].append(row[metric_index])
					time_lists[key_name].append(row[time_index])

		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		""" Convert Times to Integers """
		# Find the earliest date
		max_i = 0
		
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day_int = int(date_str[8:10])
				hr_int = int(date_str[11:13])
				date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				if date_int > max_i:
					max_i = date_int
					max_day = day_int
					max_hr = hr_int 
		
		
		# Normalize dates
		time_norm = mh.AutoVivification()
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day = int(date_str[8:10])
				hr = int(date_str[11:13])
				# date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				elem = (day - max_day) * 24 + (hr - max_hr)
				try: 
					time_norm[key].append(elem)
				except:
					time_norm[key] = list()
					time_norm[key].append(elem)
					
		# smooth out the values
		#window_length = 20
		#for banner in metric_lists.keys():
		#	metric_lists[banner] = smooth(metric_lists[banner], window_length)

		self.close_db()
		
		# return [metric_lists, time_norm, table_data]
		return [metric_lists, time_norm]
		
		
	def gen_plot(self,counts, times, title, xlabel, ylabel, ranges, subplot_index, fname):
		pylab.subplot(subplot_index)
		pylab.figure(num=None,figsize=[26,14])	
		count_keys = counts.keys()
		
		line_types = ['b-o','g-o','r-o','c-o','m-o','k-o','y-o','b--d','g--d','r--d','c--d','m--d','k--d','y--d','b-.s','g-.s','r-.s','c-.s','m-.s','k-.s','y-.s']
		
		count = 0
		for key in counts.keys():
			pylab.plot(times[key], counts[key], line_types[count])
			count = count + 1

		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		pylab.legend(count_keys,loc=2)

		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname, format='png')
		
	
	"""
	
		type = 'LP' || 'BAN' || 'BAN-TEST' || 'LP-TEST'
		
	"""
	def run(self, type, metric_name):
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta
		
		# ESTABLISH THE START TIME TO PULL ANALYTICS
		hours_back = 24
		times = self.gen_date_strings_hr(now, hours_back)
		
		start_time = times[0]
		end_time = times[1]
		
		print '\nGenerating ' + type +' for ' + str(hours_back) + ' hours back. The start and end times are: ' + start_time + ' - ' + end_time +' ... \n'
		
		if type == 'LP':
			query_name = 'report_LP_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = '[0-9](JA|SA|EA)[0-9]'
			else:
				campaign = self.campaign 
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time 
			fname = query_name + '_' + metric_name + '.png'			
		elif type == 'BAN':
			query_name = 'report_banner_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = '[0-9](JA|SA|EA)[0-9]'
			else:
				campaign = self.campaign 
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time 
			fname = query_name + '_' + metric_name + '.png'
		elif type == 'BAN-TEST':
			r = self.get_latest_campaign()
			query_name = 'report_banner_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = r[0]
				start_time = r[1]
			else:
				campaign = self.campaign 
				start_time = self.start_time
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time + ', CAMPAIGN =' + campaign 
			fname = query_name + '_' + metric_name + '_latest' + '.png'
		elif type == 'LP-TEST':
			r = self.get_latest_campaign()
			query_name = 'report_LP_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = r[0]
				start_time = r[1]
			else:
				campaign = self.campaign 
				start_time = self.start_time
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time + ', CAMPAIGN =' + campaign 
			fname = query_name + '_' + metric_name + '_latest' + '.png'
		else:
			sys.exit("Invalid type name - must be 'LP' or 'BAN'.")	
		
		return_val = self.run_query(start_time, end_time, campaign, query_name, metric_name)
		metrics = return_val[0]
		times = return_val[1]
		
		# title = metric_name + ': ' + start_time + ' -- ' + end_time
		xlabel = 'Time - Hours'
		ylabel = metric_name
		subplot_index = 111
		
		min_time = 99
		for key in times.keys():
			min_elem = min(times[key])
			if min_elem < min_time:
				min_time = min_elem
		
		ranges = [min_time, 0]
		
		self.gen_plot(metrics, times, title, xlabel, ylabel, ranges, subplot_index, fname)
		
		return [metrics, times]
	
	
	def get_latest_campaign(self):
		
		query_name = 'report_latest_campaign'
		self.init_db()
		
		# Look at campaigns over the past 24 hours
		now = datetime.datetime.now()
		hours_back = 72
		times = self.gen_date_strings_hr(now, hours_back)
		
		query_obj = qs.query_store()
		sql_stmnt = mh.read_sql('./sql/report_latest_campaign.sql')
		sql_stmnt = query_obj.format_query(query_name, sql_stmnt, [times[0]])
		
		campaign_index = query_obj.get_campaign_index(query_name)
		time_index = query_obj.get_time_index(query_name)
		
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			row = self.cur.fetchone()
		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
			
		campaign = row[campaign_index]
		timestamp = row[time_index] 
			
		self.close_db()
		
		return [campaign, timestamp]



	
	"""
	
		Takes as input and converts it to a set of hours counting back from 0
		
		time_lists 		- a dictionary of timestamp lists
		time_norm 	- a dictionary of normalized times
		
	"""
	def normalize_timestamps(self, time_lists):
		# Find the earliest date
		max_i = 0
		
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day_int = int(date_str[8:10])
				hr_int = int(date_str[11:13])
				date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				if date_int > max_i:
					max_i = date_int
					max_day = day_int
					max_hr = hr_int 
		
		
		# Normalize dates
		time_norm = mh.AutoVivification()
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day = int(date_str[8:10])
				hr = int(date_str[11:13])
				# date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				elem = (day - max_day) * 24 + (hr - max_hr)
				try: 
					time_norm[key].append(elem)
				except:
					time_norm[key] = list()
					time_norm[key].append(elem)
		
		return time_norm

"""

CLASS :: ^MinerReporting^

This subclass handles reporting on raw values imported into the database.

"""

class MinerReporting(FundraiserReporting):
	
	def run_query(self, start_time, end_time, query_name):
		
		self.init_db()
		
		query_obj = qs.query_store()

		counts = list()
		times = list()
			
		# Load the SQL File & Format
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		
		sql_stmnt = query_obj.format_query(query_name, sql_stmnt, [start_time, end_time])
		#print sql_stmnt
		
		# Get Indexes into Query
		count_index = query_obj.get_count_index(query_name)
		time_index = query_obj.get_time_index(query_name)

		# Composes the data for each banner
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			results = self.cur.fetchall()
			
			for row in results:
				counts.append(row[count_index])
				times.append(row[time_index])
				
		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		""" Convert Times to Integers """
		time_norm =  self.normalize_timestamps(times)
					

		self.close_db()
		
		return [counts, time_norm]
	

	# Create histograms for hourly counts
	def gen_plot(self,counts, times, title, xlabel, ylabel, ranges, subplot_index, fname):
		
		pylab.subplot(subplot_index)
		pylab.figure(num=None,figsize=[26,14])	
		
		# pylab.plot(times, counts)
		# pylab.hist(counts, times)
		pylab.bar(times, counts, width=0.5)
		
		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		
		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname, format='png')
	
		
		
	def run(self, query_name):
		
		query_obj = qs.query_store()
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta
		
		# ESTABLISH THE START TIME TO PULL ANALYTICS
		hours_back = 24
		times = self.gen_date_strings_hr(now, hours_back)
		
		start_time = times[0]
		end_time = times[1]
		
		print '\nGenerating ' + query_name +', start and end times are: ' + start_time + ' - ' + end_time +' ... \n'
		
		# Run Query
		return_val = self.run_query(start_time, end_time, query_name)
		counts = return_val[0]
		times = return_val[1]
		
		# Normalize times
		min_time = min(times)
		ranges = [min_time, 0]
		
		xlabel = 'Hours'
		subplot_index = 111
		fname = query_name + '.png'
		
		title = query_obj.get_plot_title(query_name)
		title = title + ' -- ' + start_time + ' - ' + end_time
		ylabel = query_obj.get_plot_ylabel(query_name)
		
		# Convert counts to float (from Decimal) to prevent exception when bar plotting
		# Bbox::update_numerix_xy expected numerix array
		counts_new = list()
		for i in range(len(counts)):
			counts_new.append(float(counts[i]))
		counts = counts_new
			
		# Generate Histogram
		self.gen_plot(counts, times, title, xlabel, ylabel, ranges, subplot_index, fname)
		
	
"""

INCOMPLETE - 
CLASS :: ^ConfidenceReporting^

To be called primarily for reporting 

"""

class ConfidenceReporting(FundraiserReporting):
	
	def __init__(self, query_name, cmpgn_1, cmpgn_2, item_1, item_2, start_time , end_time, metric):
		self.query_name = query_name
		self.cmpgn_1 = cmpgn_1
		self.cmpgn_2 = cmpgn_2
		self.item_1 = item_1
		self.item_2 = item_2
		self.start_time = start_time
		self.end_time = end_time
		self.metric = metric

	
	def run_query(self):
		
		self.init_db()
		query_obj = qs.query_store()
		
		metric_list_1 = mh.AutoVivification()
		metric_list_2 = mh.AutoVivification()
		time_list = mh.AutoVivification()
		
		# Load the SQL File & Format
		filename = './sql/' + self.query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		
		sql_stmnt = query_obj.format_query(self.query_name, sql_stmnt, [self.start_time, self.end_time, self.cmpgn_1, self.item_1])
		
		time_index = query_obj.get_time_index(query_name)
		metric_index = query_obj.get_metric_index(query_name, metric_name)
		
		# Composes the data for each banner
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			results = self.cur.fetchall()
			
			for row in results:

				key_name = row[key_index]
				
				try:
					metric_lists[key_name].append(row[metric_index])
					time_lists[key_name].append(row[time_index])
				except:
					metric_lists[key_name] = list()
					time_lists[key_name] = list()

					metric_lists[key_name].append(row[metric_index])
					time_lists[key_name].append(row[time_index])

		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		self.close_db()
		
	def gen_plot(self,counts, times, title, xlabel, ylabel, ranges, subplot_index, fname):
		return
		
	def run(self):
		self.run_query()
		self.gen_plot(counts, times, title, xlabel, ylabel, ranges, subplot_index, fname)
		