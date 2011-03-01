#!/bin/bash

cd /home/rfaulk/fundraiser-statistics/fundraiser-scripts

python mine_contacts.py a
python mine_contacts.py c

cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/html/report_ecomm_by_amount.html /srv/org.wikimedia.fundraising/stats/
cp /home/rfaulk/fundraiser-statistics/fundraiser-scripts/html/report_ecomm_by_contact.html /srv/org.wikimedia.fundraising/stats/

