
"""

run_confidence_plot.py

wikimediafoundation.org
Ryan Faulkner
December 22nd, 2010


Shell to generate errorbar plots for confidence analysis.


"""

import sys
import fundraiser_reporting as fr


# process sys args
try:
	type = sys.argv[1]
	cmpgn1 = sys.argv[2]
	cmpgn2 = sys.argv[3]
	item_1 = sys.argv[4]
	item_2 = sys.argv[5]
	start_time = sys.argv[6]
	end_time = sys.argv[7]
	metric = sys.argv[8]
	
except IndexError:
	sys.exit('Invalid command args.\n')
	
r = fr.ConfidenceReporting(type, cmpgn1, cmpgn2, item_1, item_2, start_time , end_time, metric)

r.run()