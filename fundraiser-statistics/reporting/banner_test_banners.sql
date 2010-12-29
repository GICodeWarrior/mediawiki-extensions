
select

ecomm.banner,
ecomm.utm_campaign,
impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
amount50 as amount50,
views / impressions  as click_rate,
donations / total_clicks as conversion_rate,
round(donations / impressions,6) as don_per_imp,
amount / impressions as amt_per_imp,
amount50 / impressions as amt50_per_imp,
donations / views as don_per_view,
amount / views as amt_per_view,
amount50 / views as amt50_per_view

from

(select 
imp_i.utm_source,
imp_i.impressions as impressions,
lp_i.views as views
from
(select 
utm_source, 
sum(counts) as impressions
from impression 
where on_minute >=  '%s' and on_minute < '%s'
group by 1) as imp_i

join

(select 
utm_source,
count(*) as views
from landing_page
where request_time >=  '%s' and request_time < '%s'
and (utm_campaign REGEXP '%s')
group by 1) as lp_i

on imp_i.utm_source =  lp_i.utm_source 
) as imp

join

(select 
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
sum(if(converted_amount > 50, 50, converted_amount)) as amount50
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s' 
and (utm_campaign REGEXP '%s')
group by 1,2) as ecomm

on ecomm.banner = imp.utm_source 

where impressions > 10000

group by 1,2 order by 10 desc;
