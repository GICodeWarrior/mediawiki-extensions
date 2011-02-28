
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
			campaign = args[2]
			sql_stmnt = sql_stmnt % ('%', '%', '%', '%', start_time, end_time, '%', '%', '%', '%', start_time, end_time, '%', '%', '%', '%', start_time, end_time, campaign, '%', '%', '%', '%', start_time, end_time, campaign)
		
		elif query_name == 'report_latest_campaign':
			start_time = args[0]
			sql_stmnt = sql_stmnt % (start_time)
			
		elif query_name == 'report_confidence_banner':
			start = args[0]
			end = args[1]
			cmpgn = args[2]
			banner = args[3]
			sql_stmnt = sql_stmnt % ('%','%','%','%','10','10', start, end, banner, '%','%','%','%','10','10', start, end, cmpgn, banner, \
			'%','%','%','%','10','10', start, end, cmpgn, banner)
		
		elif query_name == 'report_confidence_lp':
			start = args[0]
			end = args[1]
			cmpgn = args[2]
			banner = args[3]
			sql_stmnt = sql_stmnt % ('%','%','%','%','10','10', start, end, cmpgn, banner, \
			'%','%','%','%','10','10', start, end, cmpgn, banner)
		
		elif query_name == 'report_banner_impressions_by_hour':
			start = args[0]
			end = args[1]
			sql_stmnt = sql_stmnt % ('%','%','%','%', start, end)
		
		elif query_name == 'report_lp_views_by_hour':
			start = args[0]
			end = args[1]
			sql_stmnt = sql_stmnt % ('%','%','%','%', start, end)
		
		elif query_name == 'report_banner_confidence':
			start = args[0]
			end = args[1]
			banner = args[2]
			campaign = args[3]
			sql_stmnt = sql_stmnt % (start, end, banner, start, end, campaign, start, end, campaign, banner)
		
		elif query_name == 'report_LP_confidence':
			start = args[0]
			end = args[1]
			lp = args[2]
			campaign = args[3]
			sql_stmnt = sql_stmnt % (start, end, campaign, lp, start, end, campaign, lp)
		
		elif query_name == 'report_bannerLP_confidence':
			start = args[0]
			end = args[1]
			banner = args[2]
			lp = args[3]
			campaign = args[4]
			sql_stmnt = sql_stmnt % (start, end, banner, start, end, banner, campaign, start, end, banner, lp, campaign, start, end, banner, lp, campaign)
			
		elif query_name == 'report_ecomm_by_amount':
			start_time = args[0]
			end_time = args[1]
			sql_stmnt = sql_stmnt % ('%', '%',  '%',  '%', start_time, end_time)
		
		elif query_name == 'report_ecomm_by_contact':
			where_str = args[0]
			sql_stmnt = sql_stmnt % ('%', '%',  '%',  '%', where_str)
			
		else:
			return 'no such table\n'

		return sql_stmnt

	def get_query(self, query_name):
		if query_name == 'report_campaign_logs_by_min':
			return ''
		elif query_name == '':
			return ''
		else:
			return 'no such table'

	def get_query_header(self, query_name):
		if query_name == 'report_contribution_tracking':
			return ['Time','Banner','Landing Page','Campaign','Converted Amount', 'Suffix']
		elif query_name == 'report_ecomm_by_amount':
			return ['Timestamp','First Name','Last Name','Country','ISO Code', 'Amount']
		elif query_name == 'report_ecomm_by_contact':
			return ['Timestamp','First Name','Last Name','Country','ISO Code', 'Amount']
		else:
			return 'no such table'

	def get_count_index(self, query_name):
		if query_name == 'report_lp_views_by_hour':
			return 1
		elif query_name == 'report_banner_impressions_by_hour':
			return 1
		else:
			return -1
			
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
		elif query_name == 'report_latest_campaign':
			return 1
		elif query_name == 'report_banner_impressions_by_hour':
			return 0
		elif query_name == 'report_lp_views_by_hour':
			return 0
		else:
			return -1

	def get_campaign_index(self, query_name):
		if query_name == 'report_campaign_logs_by_min':
			return 2
		elif query_name == 'report_campaign_logs_by_hr':
			return 1
		elif query_name == 'report_contribution_tracking':
			return 3
		elif query_name == 'report_bannerLP_metrics':
			return 1
		elif query_name == 'report_latest_campaign':
			return 0
		else:
			return -1

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
			return -1

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
			return -1

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
			elif metric_name == 'completion_rate':
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
		elif query_name == 'report_banner_confidence':
			if metric_name == 'click_rate':
				return 7
			elif metric_name == 'don_per_imp':
				return 9
			elif metric_name == 'amt_per_imp':
				return 10
			elif metric_name == 'amt50_per_imp':
				return 14
			elif metric_name == 'amt100_per_imp':
				return 15
			else:
				return -1
		elif query_name == 'report_LP_confidence':
			if metric_name == 'completion_rate':
				return 5
			elif metric_name == 'don_per_view':
				return 6
			elif metric_name == 'amt_per_view':
				return 7
			elif metric_name == 'amt_per_donation':
				return 8
			elif metric_name == 'amt50_per_view':
				return 9
			elif metric_name == 'amt100_per_view':
				return 10
			else:
				return -1
		elif query_name == 'report_bannerLP_confidence':
			if metric_name == 'click_rate':
				return 7
			elif metric_name == 'completion_rate':
				return 8
			elif metric_name == 'don_per_imp':
				return 9
			elif metric_name == 'amt_per_imp':
				return 10
			elif metric_name == 'don_per_view':
				return 11
			elif metric_name == 'amt_per_view':
				return 12
			elif metric_name == 'amt_per_donation':
				return 13
			elif metric_name == 'amt50_per_imp':
				return 14
			elif metric_name == 'amt100_per_imp':
				return 15
			else:
				return -1
		else:
			return 'no such table'
	
	def get_plot_title(self, query_name):
		if query_name == 'report_banner_impressions_by_hour':
			return 'Banner Impressions Over the Past 24 Hours'
		elif query_name == 'report_lp_views_by_hour':
			return 'Landing Page Views Over the Past 24 Hours'
		else:
			return 'no such table'
		
	def get_plot_ylabel(self, query_name):
		if query_name == 'report_banner_impressions_by_hour':
			return 'IMPRESSIONS'
		elif query_name == 'report_lp_views_by_hour':
			return 'VIEWS'
		else:
			return'no such table'