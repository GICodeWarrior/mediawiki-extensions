#!/bin/bash

cd /home/rfaulk/fundraiser-scripts

python run_test_reporting_daily.py

cp /home/rfaulk/fundraiser-scripts/html/report_impressions_country.html /srv/org.wikimedia.fundraising/stats/
