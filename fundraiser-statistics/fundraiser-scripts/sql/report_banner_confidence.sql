


select

lp.utm_source,
impressions as total_impressions,
impressions as impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
views / impressions as click_rate,
donations / total_clicks as completion_rate,
round(donations / impressions, 6) as don_per_imp,
amount / impressions as amt_per_imp,
donations / views as don_per_view,
amount / views as amt_per_view,
amount / donations  as amt_per_donation

from

(select 
utm_source, 
sum(counts) as impressions
from impression 
where on_minute >= '%s' and on_minute < '%s' 
and utm_source REGEXP '%s'
group by 1) as imp

join

(select 
utm_source, 
count(*) as views
from landing_page
where request_time >= '%s' and request_time < '%s'
and utm_campaign REGEXP '%s'
group by 1) as lp

on imp.utm_source =  lp.utm_source


join

(select 
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >= '%s' and ts < '%s'
and utm_campaign REGEXP '%s'
and utm_source REGEXP '%s'
group by 1) as ecomm

on ecomm.banner = lp.utm_source 

group by 1
having impressions > 100000 and donations > 10;
