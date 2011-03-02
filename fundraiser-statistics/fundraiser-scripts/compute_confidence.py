

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
	def gen_plot(self,means_1, means_2, std_devs_1, std_devs_2, times_indices, title, xlabel, ylabel, ranges, subplot_index, labels, fname):
		
		pylab.subplot(subplot_index)
		pylab.figure(num=None,figsize=[26,14])	
		
		e1 = pylab.errorbar(times_indices, means_1, yerr=std_devs_1, fmt='-xb')
		e2 = pylab.errorbar(times_indices, means_2, yerr=std_devs_2, fmt='-dr')
		# pylab.hist(counts, times)
		
		pylab.grid()
		pylab.ylim(ranges[2], ranges[3])
		pylab.xlim(ranges[0], ranges[1])
		pylab.legend([e1[0], e2[0]], labels,loc=2)
		
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
		confidence = ret[4]
		
		# Pad data with beginning and end points
		times_indices.insert(len(times_indices), math.ceil(times_indices[-1]))
		times_indices.insert(0, 0)
		
		means_1.insert(len(means_1),means_1[-1])
		means_2.insert(len(means_2),means_2[-1])
		means_1.insert(0,means_1[0])
		means_2.insert(0,means_2[0])
		
		std_devs_1.insert(len(std_devs_1),0)
		std_devs_2.insert(len(std_devs_2),0)
		std_devs_1.insert(0,0)
		std_devs_2.insert(0,0)
	
		
		# plot the results
		xlabel = 'Hours'
		subplot_index = 111
		fname = test_name + '.png'
		
		title = confidence + '\n\n' + test_name + ' -- ' + start_time + ' - ' + end_time
		
		max_mean = max(max(means_1),max(means_2))
		max_sd = max(max(std_devs_1),max(std_devs_2))
		max_y = float(max_mean) + float(max_sd) 
		max_y = max_y + 0.1 * max_y
		max_x = float(math.ceil(max(times_indices))) + 1.0
		ranges = [-0.5, max_x, 0, max_y]
		
		ylabel = metric_name
		labels = [item_1, item_2]
		
		self.gen_plot(means_1, means_2, std_devs_1, std_devs_2, times_indices, title, xlabel, ylabel, ranges, subplot_index, labels, fname)
		
		""" Print out results """ 
		self.print_metrics(test_name + '.txt', title, means_1, means_2, std_devs_1, std_devs_2, times_indices, labels)
		
		return
		
		
	"""
		assess the confidence of the winner - define in subclass
	"""
	def confidence_test(self, metrics_1, metrics_2, time_indices, num_samples):
		return
		
	
	"""
		assess the confidence of the winner - define in subclass
	"""
	def compute_parameters(self, metrics_1, metrics_2, num_samples):
		
		# A trial represents a group of samples over which parameters are computed 
		num_trials = int(math.ceil(len(metrics_1) / num_samples))
		
		means_1 = []
		means_2 = []
		vars_1 = []
		vars_2 = []
		
		m_tot = 0
		sd_tot = 0
		
		
		# Compute the mean and variance for each group across all trials
		for i in range(num_trials):
			
			m1 = 0		# mean of group 1
			m2 = 0		# mean of group 2
			var1 = 0		# variance of group 1
			var2 = 0		# variance of group 2
				
			for j in range(num_samples):
				index = i  * num_samples + j
		
				# Compute mean for each group
				m1 = m1 + metrics_1[index]
				m2 = m2 + metrics_2[index]
			
			m1 = m1 / num_samples
			m2 = m2 / num_samples
			
			# Compute Sample Variance for each group
			for j in range(num_samples):
				index = i + j
				
				var1 = var1 + math.pow((metrics_1[i] - m1), 2) 
				var2 = var2 + math.pow((metrics_2[i] - m2), 2)
			
			means_1.append(float(m1))
			means_2.append(float(m2))
			vars_1.append(var1 / num_samples)
			vars_2.append(var2 / num_samples)
			
			
		return [num_trials, means_1, means_2, vars_1, vars_2]


	""" Print in Tabular form the means and standard deviation of each group over each interval """
	def print_metrics(self, filename, metric_name, means_1, means_2, std_devs_1, std_devs_2, times_indices, labels):
		
		file = open(filename, 'w')
		
		# Compute % increase and report
		av_means_1 = sum(means_1) / len(means_1)
		av_means_2 = sum(means_2) / len(means_2)
		percent_increase = math.fabs(av_means_1 - av_means_2) / min(av_means_1,av_means_2) * 100.0
		
		if av_means_1 > av_means_2:
			winner = labels[0]
		else:
			winner = labels[1]
			
		win_str =  "\nThe winner " + winner + " had a %.2f%s increase."
		win_str = win_str % (percent_increase, '%')
		
		print  '\n\n' +  metric_name 
		print win_str
		print '\ninterval\tmean1\t\tmean2\t\tstddev1\t\tstddev2\n'
		file.write('\n\n' +  metric_name)
		file.write('\n\ninterval\tmean1\t\tmean2\t\tstddev1\t\tstddev2\n\n')
		file.write(win_str)
		
		for i in range(1,len(times_indices) - 1):
			line_args = str(i) + '\t\t' + '%.5f\t\t' + '%.5f\t\t' + '%.5f\t\t' + '%.5f\n'
			line_str = line_args % (means_1[i], means_2[i], std_devs_1[i], std_devs_2[i])
			print  line_str
			file.write(line_str)
			
		file.close()
		
		
"""

Implements a Wald test where the distribution of donations over a given period are assumed to be normal

http://en.wikipedia.org/wiki/Wald_test

"""
class WaldTest(ConfidenceTest):
	
	def confidence_test(self, metrics_1, metrics_2, num_samples):
		
		ret = self.compute_parameters(metrics_1, metrics_2, num_samples)
		num_trials = ret[0]
		means_1 = ret[1]
		means_2 = ret[2]
		vars_1 = ret[3]
		vars_2 = ret[4]
		
		""" Compute std devs """
		std_devs_1 = []
		std_devs_2 = []
		for i in range(len(vars_1)):
			std_devs_1.append(math.pow(vars_1[i], 0.5))
			std_devs_2.append(math.pow(vars_2[i], 0.5))
		
		m_tot = 0
		sd_tot = 0
		
		# Compute the parameters for the Wald test
		# The difference of the means and the sum of the variances is used to compose the random variable W = X1 - X2 for each trial
		# where X{1,2} is the random variable corresponding to the group {1,2}
		for i in range(num_trials):
			
			# Perform wald - compose W = X1 - X2 for each trial
			sd = math.pow(vars_1[i] + vars_2[i], 0.5)
			m = math.fabs(means_1[i] - means_2[i]) 
			
			m_tot  = m_tot + m
			sd_tot  = sd_tot + sd
			
			
		W = m_tot / sd_tot
		# print W
			
		# determine the probability that the 
		if (W >= 1.9):
			conf_str = '95% confident about the winner.'
			P = 0.95
		elif (W >= 1.6):
			conf_str = '89% confident about the winner.'
			P = 0.89
		elif (W >= 1.3):
			conf_str = '81% confident about the winner.'
			P = 0.81
		elif (W >= 1.0):
			conf_str = '73% confident about the winner.'
			P = 0.73
		elif (W >= 0.9):
			conf_str = '68% confident about the winner.'
			P = 0.68
		elif (W >= 0.8):
			conf_str = '63% confident about the winner.'
			P = 0.63
		elif (W >= 0.7):
			conf_str = '52% confident about the winner.'
			P = 0.52
		elif (W >= 0.6):
			conf_str = '45% confident about the winner.'
			P = 0.45
		elif (W >= 0.5):
			conf_str = '38% confident about the winner.'
			P = 0.38
		elif (W >= 0.4):
			conf_str = '31% confident about the winner.'
			P = 0.31
		elif (W >= 0.3):
			conf_str = '24% confident about the winner.'
			P = 0.24
		elif (W >= 0.2):
			conf_str = '16% confident about the winner.'
			P = 0.16
		elif (W >= 0.1):
			conf_str = '8% confident about the winner.'
			P = 0.08
		else:
			conf_str = 'There is no clear winner.'
			P = 0.08
	
		
		return [means_1, means_2, std_devs_1, std_devs_2, conf_str]
		

"""

Implements a Student's T test where the distribution of donations over a given period are assumed to resemble those of a students t distribution

http://en.wikipedia.org/wiki/Student%27s_t-test

"""
class TTest(ConfidenceTest):
	
	def confidence_test(self, metrics_1, metrics_2, num_samples):
		
		# retrieve means and variances
		ret = self.compute_parameters(metrics_1, metrics_2, num_samples)
		num_trials = ret[0]
		means_1 = ret[1]
		means_2 = ret[2]
		vars_1 = ret[3]
		vars_2 = ret[4]
		
		""" Compute std devs """
		std_devs_1 = []
		std_devs_2 = []
		for i in range(len(vars_1)):
			std_devs_1.append(math.pow(vars_1[i], 0.5))
			std_devs_2.append(math.pow(vars_2[i], 0.5))
			
		m_tot = 0
		var_1_tot = 0
		var_2_tot = 0
		
		# Compute the parameters for the Wald test
		# The difference of the means and the sum of the variances is used to compose the random variable W = X1 - X2 for each trial
		# where X{1,2} is the random variable corresponding to the group {1,2}
		for i in range(num_trials): 
		
			m_tot  = m_tot + math.fabs(means_1[i] - means_2[i])
			var_1_tot  = var_1_tot + vars_1[i]
			var_2_tot  = var_2_tot + vars_2[i]
			
		m = m_tot / num_trials
		s_1 = var_1_tot / num_trials
		s_2 = var_2_tot / num_trials
		
		total_samples = len(metrics_1)
		
		t = m / math.pow((s_1 + s_2) / total_samples, 0.5)
		degrees_of_freedom = (math.pow(s_1 / total_samples + s_2 / total_samples, 2) / (math.pow(s_1 / total_samples, 2) + math.pow(s_2 / total_samples, 2))) * total_samples
			
		
		""" lookup confidence """
		
		#print ''
		#print t 
		#print degrees_of_freedom
		
		# get t and df
		degrees_of_freedom = math.ceil(degrees_of_freedom)
		if degrees_of_freedom > 30:
			degrees_of_freedom = 99
			
		select_stmnt = 'select max(p) from t_test where degrees_of_freedom = ' + str(degrees_of_freedom) + ' and t >= ' + str(t)
		
		self.init_db()
		
		try:
			self.cur.execute(select_stmnt)
			results = self.cur.fetchone()
				
			if results[0] != None:
				p = float(results[0])
			else:
				p = .0005
		except:
			self.db.rollback()
			self.db.close()
			sys.exit('Could not execute: ' + select_stmnt)
			
		#print p 
		self.db.close()
		
		conf_str =  str((1 - p) * 100) + '% confident about the winner.'
		
		return [means_1, means_2, std_devs_1, std_devs_2, conf_str]
		
"""

Implements a Chi Square test where the distribution of donations over a given period are assumed to resemble those of a students t distribution

http://en.wikipedia.org/wiki/Chi-square_test

"""
class ChiSquareTest(ConfidenceTest):
	def confidence_test(self, metrics_1, metrics_2, num_samples):
		return
	