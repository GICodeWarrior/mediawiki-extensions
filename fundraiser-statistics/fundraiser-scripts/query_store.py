
"""

query_store.py

wikimediafoundation.org
Ryan Faulkner
November 28th, 2010


Class that contains and organizes query info


"""

class query_store:

	def format_query(self, query_name, sql_stmnt, args):
		
		if query_name == 'report_campaign_ecomm':
			start_time = args[0]
			sql_stmnt = sql_stmnt % (start_time)

		elif query_name == 'report_campaign_logs':
			start_time = args[0]
			sql_stmnt = sql_stmnt % (start_time, start_time, start_time)

		elif query_name == 'report_campaign_ecomm_by_hr':
			start_time = args[0]
			sql_stmnt = sql_stmnt % ('%', '%', '%', '%', start_time)

		elif query_name == 'report_campaign_logs_by_hr':
			start_time = args[0]
			sql_stmnt = sql_stmnt % ('%', '%', '%', '%', start_time, '%', '%', '%', '%', \
			start_time, '%', '%', '%', '%', start_time, '%')

		elif query_name == 'report_impressions_country':
			start_time = args[0]
			sql_stmnt = sql_stmnt % ('%', '%', '%', start_time)

		elif query_name == 'report_campaign_logs_by_min':
			start_time = args[0]
			sql_stmnt = sql_stmnt % ('%', '%', '%', '%', start_time, '%', '%', '%', '%', \
			start_time, '%', '%', '%', '%', start_time)
		
		elif query_name == 'report_non_US_clicks':
			start_time = args[0]
			sql_stmnt = sql_stmnt % ('%', '%', '%', start_time, '%', '%', '%', start_time)
		
		elif query_name == 'report_contribution_tracking':
			start_time = args[0]
			sql_stmnt = sql_stmnt % ('%', '%', '%', '%', '%',start_time)
		
		elif query_name == 'report_total_amounts_by_hr':
			start_time = args[0]
			end_time = args[1]			
			sql_stmnt = sql_stmnt % ('%', '%', '%', ' %H', start_time, end_time)
		
		elif query_name == 'report_total_amounts_by_day':
			start_time = args[0]
			end_time = args[1]
			sql_stmnt = sql_stmnt % ('%', '%', '%', '', start_time, end_time)
		
		elif query_name == 'report_bannerLP_metrics':
			start_time = args[0]
			end_time = args[1]
			sql_stmnt = sql_stmnt % ('%', '%', '%', '%', start_time, end_time, '%', '%', '%', '%', start_time, end_time, '%', '%', '%', '%', start_time, end_time, '%', '%', '%', '%', start_time, end_time)
			
		else:
			print 'no such table\n'

		return sql_stmnt

	def get_query(self, query_name):
		if query_name == 'report_campaign_logs_by_min':
			return ''
		elif query_name == '':
			return ''
		else:
			'no such table'

	def get_query_header(self, query_name):
		if query_name == 'report_contribution_tracking':
			return ['Time','Banner','Landing Page','Campaign','Converted Amount', 'Suffix']
		elif query_name == '':
			return ''
		else:
			'no such table'

	def get_time_index(self, query_name):
		if query_name == 'report_campaign_logs_by_min':
			return 0
		elif query_name == 'report_campaign_logs_by_hr':
			return 0
		elif query_name == 'report_non_US_clicks':
			return 0
		elif query_name == 'report_contribution_tracking':
			return 0
		elif query_name == 'report_bannerLP_metrics':
			return 0
		else:
			'no such table'

	def get_campaign_index(self, query_name):
		if query_name == 'report_campaign_logs_by_min':
			return 2
		elif query_name == 'report_campaign_logs_by_hr':
			return 1
		elif query_name == 'report_contribution_tracking':
			return 3
		elif query_name == 'report_bannerLP_metrics':
			return 1
		else:
			'no such table'

	def get_banner_index(self, query_name):
		if query_name == 'report_campaign_logs_by_min':
			return 3
		elif query_name == 'report_campaign_logs_by_hr':
			return 2
		elif query_name == 'report_contribution_tracking':
			return 1
		elif query_name == 'report_bannerLP_metrics':
			return 1
		else:
			'no such table'

	def get_landing_page_index(self, query_name):
		if query_name == 'report_campaign_logs_by_min':
			return 4
		elif query_name == 'report_campaign_logs_by_hr':
			return 3
		elif query_name == 'report_non_US_clicks':
			return 2
		elif query_name == 'report_contribution_tracking':
			return 2
		elif query_name == 'report_bannerLP_metrics':
			return 1
		else:
			'no such table'

	def get_metric_index(self, query_name, metric_name):
		if query_name == 'report_campaign_logs_by_min':
			if metric_name == 'click_rate':
				return 9
		elif query_name == 'report_campaign_logs_by_hr':
			if metric_name == 'click_rate':
				return 8
		elif query_name == 'report_contribution_tracking':
			if metric_name == 'converted_amount':
				return 4
		elif query_name == 'report_bannerLP_metrics':
			if metric_name == 'total_impressions':
				return 2
			elif metric_name == 'impressions':
				return 3
			elif metric_name == 'views':
				return 4
			elif metric_name == 'clicks':
				return 5
			elif metric_name == 'donations':
				return 6
			elif metric_name == 'amount':
				return 7
			elif metric_name == 'click_rate':
				return 8
			elif metric_name == 'conversion_rate':
				return 9
			elif metric_name == 'don_per_imp':
				return 10
			elif metric_name == 'amt_per_imp':
				return 11
			elif metric_name == 'don_per_view':
				return 12
			elif metric_name == 'amt_per_view':
				return 13
			elif metric_name == 'amt_per_donation':
				return 14
			elif metric_name == 'max_amt':
				return 15
			elif metric_name == 'pp_don':
				return 16
			elif metric_name == 'cc_don':
				return 17
			elif metric_name == 'paypal_click_thru':
				return 18
			elif metric_name == 'creditcard_click_thru':
				return 19
			else:
				return -1
		else:
			'no such table'
