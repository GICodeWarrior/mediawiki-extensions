
"""

run.py_plots

wikimediafoundation.org
Ryan Faulkner
December 16th, 2010


Pulls data from storage3.faulkner and generates plots.


"""

import fundraiser_reporting as fa

tar = fa.TotalAmountsReporting()
blpr = fa.BannerLPReporting()
mr = fa.MinerReporting()


# Run the total amount plots
tar.run_hr('BAN_EM')
tar.run_hr('CC_PP_completion')
tar.run_hr('CC_PP_amount')
tar.run_hr('AMT_VS_AMT50')
tar.run_day('BAN_EM')
tar.run_day('AMT_VS_AMT50')

# Run the banner/lp plots
blpr.run('LP', 'don_per_view')
blpr.run('BAN', 'don_per_imp')
blpr.run('BAN', 'click_rate')
blpr.run('LP', 'completion_rate')

# Run the banner/lp plots
blpr.run('LP-TEST', 'don_per_view')
blpr.run('BAN-TEST', 'don_per_imp')
blpr.run('BAN-TEST', 'click_rate')

# Run the impression / view counts
mr.run('report_banner_impressions_by_hour')
mr.run('report_lp_views_by_hour')