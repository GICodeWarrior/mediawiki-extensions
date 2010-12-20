#!/bin/bash

cd /home/rfaulk/fundraiser-statistics/fundraiser-scripts

python run_test_reporting_hourly.py
# python run_test_reporting_hourly.py 24

cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/html/report_campaign_ecomm.html /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/html/report_campaign_logs.html /srv/org.wikimedia.fundraising/stats/
# cp /home/rfaulk/fundraiser-scripts/html/report_campaign_ecomm_by_hr.html /srv/org.wikimedia.fundraising/stats/
# cp /home/rfaulk/fundraiser-scripts/html/report_campaign_logs_by_hr.html /srv/org.wikimedia.fundraising/stats/
