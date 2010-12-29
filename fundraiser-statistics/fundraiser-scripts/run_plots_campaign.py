
"""

run_plots_campaign.py

wikimediafoundation.org
Ryan Faulkner
December 28th, 2010


Pulls data from storage3.faulkner and generates plots for campaigns.


"""

import sys
import fundraiser_reporting as fa


# cmd args -- Get the utm_campaign


try:
	campaign = sys.argv[1]
	start_time = sys.argv[2]
except IndexError:
	sys.exit('Invalid command args.\n')

blpr = fa.BannerLPReporting(campaign, start_time)

# Run the banner/lp plots
blpr.run('LP-TEST', 'don_per_view')
blpr.run('BAN-TEST', 'don_per_imp')
blpr.run('BAN-TEST', 'click_rate')

