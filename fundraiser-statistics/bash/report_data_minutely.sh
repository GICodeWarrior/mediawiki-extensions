#!/bin/bash

cd /home/rfaulk/fundraiser-scripts

python run_tracking_report.py 5

cp /home/rfaulk/fundraiser-scripts/html/report_contribution_tracking.html /srv/org.wikimedia.fundraising/stats/

python run_test_reporting_hourly.py 10

cp /home/rfaulk/fundraiser-scripts/html/report_campaign_logs_by_hr.html /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-scripts/html/report_campaign_ecomm_by_hr.html /srv/org.wikimedia.fundraising/stats/
