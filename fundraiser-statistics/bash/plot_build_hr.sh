#!/bin/bash

cd /home/rfaulk/fundraiser-statistics/fundraiser-scripts

python run_plots.py

# total amounts
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_day_BAN_EM.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_hr_BAN_EM.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_hr_CC_PP_amount.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_hr_CC_PP_completion.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_day_AMT_VS_AMT50.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_hr_AMT_VS_AMT50.png /srv/org.wikimedia.fundraising/stats/

# Banner / LP
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_LP_metrics_don_per_view.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_don_per_imp.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_click_rate.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_LP_metrics_completion_rate.png /srv/org.wikimedia.fundraising/stats/

# latest plots
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_LP_metrics_don_per_view_latest.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_don_per_imp_latest.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_click_rate_latest.png /srv/org.wikimedia.fundraising/stats/

# mining counts
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_impressions_by_hour.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_lp_views_by_hour.png /srv/org.wikimedia.fundraising/stats/