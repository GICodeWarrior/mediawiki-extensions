

"""

compute_confidence.py

wikimediafoundation.org
Ryan Faulkner
January 11th, 2011


Generates confidence estimate for a test


class ConfidenceTesting

"""

import sys
import math
import datetime as dt
import MySQLdb
import pylab

import matplotlib
matplotlib.use('Agg')

import miner_help as mh
import query_store as qs

class ConfidenceTest:

	# Database and Cursor objects
	db = None
	cur = None
		
	def init_db(self):
		""" Establish connection """
		#db = MySQLdb.connect(host='db10.pmtpa.wmnet', user='rfaulk', db='faulkner')
		self.db = MySQLdb.connect(host='127.0.0.1', user='rfaulk', db='faulkner', port=3307)
		#self.db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')

		""" Create cursor """
		self.cur = self.db.cursor()

	def close_db(self):
		self.cur.close()
		self.db.close()
		

	"""
		ConfidenceTesting :: query_tables
	"""
	# query_name = 'report_banner_confidence'
	# metric_name = 'don_per_imp'
	def query_tables(self, query_name, metric_name, campaign, item_1, item_2, start_time, end_time, interval, num_samples):
		
		ret = self.get_time_lists(start_time, end_time, interval, num_samples)
		times = ret[0]
		times_indices = ret[1]
		
		self.init_db()
		query_obj = qs.query_store()
		
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		
		metric_index = query_obj.get_metric_index(query_name, metric_name)
		metrics_1 = []
		metrics_2 = []
		
		for i in range(len(times) - 1):
			
			print '\nExecuting number ' + str(i) + ' batch of of data.'
			t1 = times[i]
			t2 = times[i+1]
			
			formatted_sql_stmnt_1 = query_obj.format_query(query_name, sql_stmnt, [t1, t2, item_1, campaign])
			formatted_sql_stmnt_2 = query_obj.format_query(query_name, sql_stmnt, [t1, t2, item_2, campaign])
			
			try:
				err_msg = formatted_sql_stmnt_1
				
				self.cur.execute(formatted_sql_stmnt_1)
				results_1 = self.cur.fetchone()  # there should only be a single row
				
				err_msg = formatted_sql_stmnt_2
				
				self.cur.execute(formatted_sql_stmnt_2)
				results_2 = self.cur.fetchone()  # there should only be a single row
			except:
				self.db.rollback()
				sys.exit("Database Interface Exception:\n" + err_msg)
			
			#print results_1[metric_index]
			#print results_2[metric_index]
			
			metrics_1.append(results_1[metric_index])
			metrics_2.append(results_2[metric_index])
		
		#print metrics_1
		#print metrics_2
		
		self.close_db()
		
		# return the metric values at each time
		return [metrics_1, metrics_2, times_indices]
		
		

	"""
		ConfidenceTesting :: get_time_lists
		
		num_samples is the 
		interval - intervals at which samples are drawn within the range, units = minutes
		start_time, end_time - timestamps 'yyyymmddhhmmss'
	"""
	def get_time_lists(self, start_time, end_time, interval, num_samples):

		# range must be divisible by interval - convert to hours
		range = float(interval * num_samples) / 60
		
		# Compose times
		start_datetime = dt.datetime(int(start_time[0:4]), int(start_time[4:6]), int(start_time[6:8]), int(start_time[8:10]), int(start_time[10:12]), int(start_time[12:14]))
		end_datetime = dt.datetime(int(end_time[0:4]), int(end_time[4:6]), int(end_time[6:8]), int(end_time[8:10]), int(end_time[10:12]), int(end_time[12:14]))

		# current timestamp and hour index
		curr_datetime = start_datetime
		curr_timestamp = start_time
		curr_hour_index = 0.0

		# lists to store timestamps and indices
		times = []
		time_indices = []

		sample_count = 0

		# build a list of timestamps and time indices for plotting
		# increment the time
		while curr_datetime < end_datetime:
			
			# for timestamp formatting
			month_str_fill = ''
			day_str_fill = ''
			hour_str_fill = ''
			minute_str_fill = ''
			if curr_datetime.month < 10:
				month_str_fill = '0'
			if curr_datetime.day < 10:
				month_str_fill = '0'
			if curr_datetime.hour < 10:
				hour_str_fill = '0'
			if curr_datetime.minute < 10:
				minute_str_fill = '0'
			
			curr_timestamp = str(curr_datetime.year) + month_str_fill + str(curr_datetime.month) + day_str_fill + str(curr_datetime.day) + hour_str_fill+ str(curr_datetime.hour) + minute_str_fill+ str(curr_datetime.minute) + '00'
			times.append(curr_timestamp)
			
			# increment curr_hour_index if the 
			if sample_count == num_samples: 
				time_indices.append(curr_hour_index + range / 2)
				curr_hour_index = curr_hour_index + range
				sample_count = 0
			else:
				sample_count = sample_count + 1 
					
				
			# increment the time by interval minutes
			td = dt.timedelta(minutes=interval)
			curr_datetime = curr_datetime + td
		
		# append the last items onto time lists
		times.append(end_time)
		# added_index = float(end_datetime.hour - curr_datetime.hour) + float(end_datetime.minute - curr_datetime.minute) / 60
		curr_hour_index = float(curr_hour_index) + range / 2
		time_indices.append(curr_hour_index)
				
		return [times, time_indices]
		# compute parameters for each sample range (mean, standard deviation)
		
	
	
	"""
		ConfidenceTesting :: gen_plot
		
		plot the test results with errorbars
	"""
	def gen_plot(self,means_1, means_2, std_devs_1, std_devs_2, times_indices, title, xlabel, ylabel, ranges, subplot_index, fname):
		
		pylab.subplot(subplot_index)
		pylab.figure(num=None,figsize=[26,14])	
		
		pylab.errorbar(times_indices, means_1, yerr=std_devs_1, fmt='-xb')
		pylab.errorbar(times_indices, means_2, yerr=std_devs_2, fmt='-dr')
		# pylab.hist(counts, times)
		
		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		pylab.ylim(ranges[2], ranges[3])
		
		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname, format='png')
		
		
	def run_test(self, test_name, query_name, metric_name, campaign, item_1, item_2, start_time, end_time, interval, num_samples):
		
		query_obj = qs.query_store()
		
		# Retrieve values from database
		ret = self.query_tables(query_name, metric_name, campaign, item_1, item_2, start_time, end_time, interval, num_samples)
		metrics_1 = ret[0]
		metrics_2 = ret[1]
		times_indices = ret[2]
		
		# run the confidence test
		ret = self.confidence_test(metrics_1, metrics_2, num_samples)
		means_1 = ret[0]
		means_2 = ret[1]
		std_devs_1 = ret[2]
		std_devs_2 = ret[3]
		
		#print means_1
		#print means_2
		#print std_devs_1
		#print std_devs_2
		#print times_indices
		
		# plot the results
		xlabel = 'Hours'
		subplot_index = 111
		fname = test_name + '.png'
		
		title = query_obj.get_plot_title(test_name)
		title = title + ' -- ' + start_time + ' - ' + end_time
		
		max_mean = max(max(means_1),max(means_2))
		max_sd = max(max(std_devs_1),max(std_devs_2))
		max_y = float(max_mean) + float(max_sd) 
		max_y = max_y + 0.1 * max_y
		max_x = float(math.ceil(max(times_indices))) + 1.0
		ranges = [-0.5, max_x, 0, max_y]
		
		ylabel = query_obj.get_plot_ylabel(metric_name)
		self.gen_plot(means_1, means_2, std_devs_1, std_devs_2, times_indices, title, xlabel, ylabel, ranges, subplot_index, fname)
		
		return
		
		
	"""
		assess the confidence of the winner - define in subclass
	"""
	def confidence_test(self, metrics_1, metrics_2, time_indices, num_samples):
		return

"""

Implements a Wald test where the distribution of donations over a given period are assumed to be normal

"""
class WaldTest(ConfidenceTest):
	
	def confidence_test(self, metrics_1, metrics_2, num_samples):
		
		# Partition over different 
		num_trials = math.ceil(len(metrics_1) / num_samples)
		means_1 = []
		std_devs_1 = []
		means_2 = []
		std_devs_2 = []
		
		m_tot = 0
		sd_tot = 0
		
		# print num_trials
		for i in range(int(num_trials)):
			
			m1 = 0
			m2 = 0
			sd1 = 0
			sd2 = 0
				
			for j in range(num_samples):
				index = i + j
		
				# Compute mean for each group
				m1 = m1 + metrics_1[index]
				m2 = m2 + metrics_2[index]
			
			m1 = m1 / num_samples
			m2 = m2 / num_samples
			
			for j in range(num_samples):
				index = i + j
				
				# Compute standard deviation
				sd1 = sd1 + math.pow((metrics_1[i] - m1), 2) 
				sd2 = sd2 + math.pow((metrics_2[i] - m2), 2)
			
			# Perform wald		
			sd = math.pow(sd1 / num_samples + sd2 / num_samples, 0.5)
			m = math.fabs(m1 - m2) 
			
			means_1.append(float(m1))
			means_2.append(float(m2))
			std_devs_1.append(math.pow(sd1 / num_samples, 0.5))
			std_devs_2.append(math.pow(sd2 / num_samples, 0.5))
			
			m_tot  = m_tot + m
			sd_tot  = sd_tot + sd
			
			# print m1
			# print m2
			# print m
			# print sd
			
		W = m_tot / sd_tot
		# print W
			
		# determine the probability that the 
		if (W >= 1.9):
			print '95% confident about the winner.'
			P = 0.95
		elif (W >= 1.6):
			print '89% confident about the winner.'
			P = 0.89
		elif (W >= 1.3):
			print '81% confident about the winner.'
			P = 0.81
		elif (W >= 1.0):
			print '73% confident about the winner.'
			P = 0.73
		elif (W >= 0.9):
			print '68% confident about the winner.'
			P = 0.68
		elif (W >= 0.8):
			print '63% confident about the winner.'
			P = 0.63
		elif (W >= 0.7):
			print '52% confident about the winner.'
			P = 0.52
		elif (W >= 0.6):
			print '45% confident about the winner.'
			P = 0.45
		elif (W >= 0.5):
			print '38% confident about the winner.'
			P = 0.38
		elif (W >= 0.4):
			print '31% confident about the winner.'
			P = 0.31
		elif (W >= 0.3):
			print '24% confident about the winner.'
			P = 0.24
		elif (W >= 0.2):
			print '16% confident about the winner.'
			P = 0.16
		elif (W >= 0.1):
			print '8% confident about the winner.'
			P = 0.08
		else:
			print 'There is no clear winner.'
			P = 0.08
	
		
		return [means_1, means_2, std_devs_1, std_devs_2]
		

"""

Implements a Student's T test where the distribution of donations over a given period are assumed to resemble those of a students t distribution

"""
class TTest(ConfidenceTest):
	
	def confidence_test(self, metrics_1, metrics_2, time_indices, num_samples):
		
		# Partition over different 
		
		
		# Compute mean for each group
		m1 = sum(metrics_1) / len(metrics_1)
		m2 = sum(metrics_2) / len(metrics_2)
		
		# Compute standard deviation
		sd1 = 0
		sd2 = 0
		for i in range(len(metrics_1)):
			sd1 = sd1 + math.pow((metrics_1[i] - m1), 2) 
			sd2 = sd2 + math.pow((metrics_2[i] - m2), 2)
			
		sd1 = pow(sd1 / len(metrics_1), 0.5)
		sd2 = pow(sd2 / len(metrics_2), 0.5)
		
		# degrees of freedom
		
		# Perform wald
		m1
		
		print m1
		print m2
		print sd1
		print sd2
		
		return
		