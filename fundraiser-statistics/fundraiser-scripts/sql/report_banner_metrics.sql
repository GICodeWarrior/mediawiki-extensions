

select

imp.hr as hr,
lp.utm_source,
impressions as total_impressions,
impressions as impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
views / impressions as click_rate,
donations / total_clicks as conversion_rate,
round(donations / impressions, 6) as don_per_imp,
amount / impressions as amt_per_imp,
donations / views as don_per_view,
amount / views as amt_per_view,
amount / donations  as amt_per_donation,
'%s %s %s %s %s %s' as effluent

from

(select 
DATE_FORMAT(on_minute,'%sY-%sm-%sd %sH') as hr,
utm_source, 
sum(counts) as impressions
from impression 
where on_minute >=  '%s' and on_minute < '%s' 
group by 1,2) as imp

join

(select 
DATE_FORMAT(request_time,'%sY-%sm-%sd %sH') as hr,
utm_source, 
count(*) as views
from landing_page
where request_time >=  '%s' and request_time < '%s'
and utm_campaign REGEXP 'JA'
group by 1,2) as lp

on imp.utm_source =  lp.utm_source and imp.hr =  lp.hr


join

(select 
DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as hr,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
-- SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
-- utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s'
and utm_campaign REGEXP 'JA'
group by 1,2) as ecomm

on ecomm.banner = lp.utm_source and ecomm.hr = lp.hr

group by 1,2,3,4
having impressions > 100000
order by 1 desc;
