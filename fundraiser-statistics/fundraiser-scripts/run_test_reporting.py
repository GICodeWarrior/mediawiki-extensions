

"""

run_test_reporting.py

wikimediafoundation.org
Ryan Faulkner
November 23rd, 2010


Wrapper script for test_reporting.py

"""
import sys
import datetime
import MySQLdb

import test_reporting


	
""" Establish connection """
db = MySQLdb.connect(host='storage3.pmtpa.wmnet', user='rfaulk', db='faulkner')
# db = MySQLdb.connect(host='127.0.0.1', user='rfaulk', passwd='baggin5', db='faulkner', port=3307)

""" Create cursor """
cur = db.cursor()


# Current date & time
now = datetime.datetime.now()

if len(sys.argv) > 1:
	
	hours_back = -int(sys.argv[1])
	delta = datetime.timedelta(hours=hours_back)
	
	time_obj = now + delta
	
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
	
	
	start_time = str(time_obj.year) + month + day + hour + '0000'
	
	print '\n\nGenerating analytics for ' + str(-hours_back) + ' hours back. The start time is: ' + start_time + ' ... \n'
	
	query_name_ecomm = 'report_campaign_ecomm_by_hr'
	query_name_logs = 'report_campaign_logs_by_hr'
	
	header_ecomm = ['hour', 'utm_campaign','source','clicks','donations','completion_rate','amount','pp_clicks','pp_donations','pp_completion','pp_completion_pct_diff_from_avg', \
	'cc_clicks','cc_donations','cc_completion','cc_completion_pct_diff_from_avg','cc_amt','pp_amt', 'max_cc_amt','max_pp_amt', 'max_amt']

	header_logs = ['hour', 'campaign','banner','landing_page','impressions','views','donations','amount','click_rate','don_per_imp','amt_per_imp','don_per_view','amt_per_view']

else:
	start_time = '20101123180000'
	query_name_ecomm = 'report_campaign_ecomm'
	query_name_logs = 'report_campaign_logs'
	
	print '\n\nGenerating analytics since: ' + start_time +' ... \n'
	
	header_ecomm = ['utm_campaign','source','clicks','donations','completion_rate','amount','pp_clicks','pp_donations','pp_completion','pp_completion_pct_diff_from_avg', \
	'cc_clicks','cc_donations','cc_completion','cc_completion_pct_diff_from_avg','cc_amt','pp_amt', 'max_cc_amt','max_pp_amt', 'max_amt']

	header_logs = ['campaign','banner','landing_page','impressions','views','donations','amount','click_rate','don_per_imp','amt_per_imp','don_per_view','amt_per_view']
	
end_time = ''	


test_reporting.build_html_table_from_list(db, cur, header_ecomm, './sql/', './html/', query_name_ecomm, start_time, end_time)
test_reporting.build_html_table_from_list(db, cur, header_logs, './sql/', './html/', query_name_logs, start_time, end_time)

cur.close()
db.close()
