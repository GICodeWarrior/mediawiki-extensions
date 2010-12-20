#!/bin/bash

cd /home/rfaulk/fundraiser-statistics/fundraiser-scripts

python run_plots.py

cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_LP_metrics_don_per_view.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_day.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_don_per_imp.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_total_amounts_by_hr.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_click_rate.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_LP_metrics_conversion_rate.png /srv/org.wikimedia.fundraising/stats/

cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_LP_metrics_don_per_view_latest.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_don_per_imp_latest.png /srv/org.wikimedia.fundraising/stats/