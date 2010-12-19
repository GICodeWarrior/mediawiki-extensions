

"""

test_reporting.py

wikimediafoundation.org
Ryan Faulkner
November 23rd, 2010


Executes queries over eccomerce, impression, and landing page data

"""



import sys
import MySQLdb
import HTML
import miner_help as mh

import query_store as qs


def build_html_table_from_list(db, cur, header, sql_path, html_path, query_type, start_time, end_time):

	query_obj = qs.query_store()
	
	# Populate the campaigns table
	s1 = 'drop table if exists campaigns;'
	s2 = 'create table campaigns as (select utm_campaign from drupal.contribution_tracking where ts > \'%s\' group by utm_campaign having count(*) > 100);' % (start_time)
	cur.execute(s1)
	cur.execute(s2)
	
	table_data = []
	sql_stmnt = mh.read_sql(sql_path + query_type + '.sql');
	
	# open the html file for writing
	f = open(html_path + query_type + '.html', 'w')
	
	format_start_time = start_time[0:4] + '-' + start_time[4:6] + '-' + start_time[6:8]  + '-' + start_time[8:10] + 'HRs'   
	
	# Formats the statement according to query type
	select_stmnt = query_obj.format_query(query_type, sql_stmnt, [start_time])
	
	# html formatting
	if query_type == 'report_campaign_ecomm':
		f.write('<br>Donation data since ' + format_start_time + ' ... <br><br>')
		select_stmnt = query_obj.format_query(query_type, sql_stmnt, [start_time])
		
	elif query_type == 'report_campaign_logs':
		f.write('<br>Impression and landing page data since ' + format_start_time+ ' ... <br><br>')
		select_stmnt = query_obj.format_query(query_type, sql_stmnt, [start_time])
	
	elif query_type == 'report_campaign_ecomm_by_hr':
		f.write('<br>Donation data by hour since ' + format_start_time + ' ... <br><br>')
		select_stmnt = query_obj.format_query(query_type, sql_stmnt, [start_time])
	
	elif query_type == 'report_campaign_logs_by_hr':
		f.write('<br>Impression and landing page by hour since ' + format_start_time + ' ... <br><br>')
		select_stmnt = query_obj.format_query(query_type, sql_stmnt, [start_time])
	
	else:
		select_stmnt = query_obj.format_query(query_type, sql_stmnt, [start_time])
		
	try:
		err_msg = select_stmnt
		cur.execute(select_stmnt)
		
		results = cur.fetchall()
		
		for row in results:
			cpRow = listify(row)
			# t.rows.append(row)
			table_data.append(cpRow)
			
	except:
		db.rollback()
		sys.exit("Database Interface Exception:\n" + err_msg)
	
	
	t = HTML.table(table_data, header_row=header)
	htmlcode = str(t)
	
	f.write(htmlcode)
	f.close()
	
	return htmlcode

# workaround for issue with tuple objects in HTML.py 
# MySQLdb returns unfamiliar tuple elements from its fetchall method
# this is probably a version problem since the issue popped up in 2.5 but not 2.6
def listify(row):
	l = []
	for i in row:
		l.append(i)
	return l

