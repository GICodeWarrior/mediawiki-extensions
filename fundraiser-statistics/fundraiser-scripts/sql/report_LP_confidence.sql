


select

lp.utm_source,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
donations / total_clicks as completion_rate,
donations / views as don_per_view,
amount / views as amt_per_view,
amount / donations  as amt_per_donation

from

select 
landing_page, 
count(*) as views
from landing_page
where request_time >= '%s' and request_time < '%s'
and utm_campaign REGEXP '%s'
and landing_page REGEXP '%s'
group by 1) as lp

join

(select 
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >= '%s' and ts < '%s'
and utm_campaign REGEXP '%s'
and SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) REGEXP '%s'
group by 1) as ecomm

on ecomm.landing_page = lp.landing_page and ecomm.utm_campaign = lp.utm_campaign

group by 1;
