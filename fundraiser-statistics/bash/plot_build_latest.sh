#!/bin/bash

cd /home/rfaulk/fundraiser-statistics/fundraiser-scripts

# get date from command line args
campaign=$1
start_time=$2

python run_plots_campaign.py $campaign $start_time

cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_LP_metrics_don_per_view_latest.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_don_per_imp_latest.png /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/report_banner_metrics_click_rate_latest.png /srv/org.wikimedia.fundraising/stats/

echo "" > async_plotter.sh