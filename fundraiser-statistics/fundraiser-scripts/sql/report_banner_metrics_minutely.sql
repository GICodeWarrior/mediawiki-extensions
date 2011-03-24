

select

if(imp.dt_min < 10, concat(imp.dt_hr, '0', imp.dt_min,'00'), concat(imp.dt_hr, imp.dt_min,'00')) as day_hr,
lp.utm_source,
impressions,
views,
total_clicks,
donations,
amount,
amount50,
views / impressions as click_rate,
donations / total_clicks as completion_rate,
round(donations / impressions, 6) as don_per_imp,
amount / impressions as amt_per_imp,
amount50 / impressions as amt50_per_imp
	
from

(select 
DATE_FORMAT(on_minute,'%sY%sm%sd%sH') as dt_hr,
FLOOR(MINUTE(on_minute) / %s) * %s as dt_min,
utm_source, 
sum(counts) as impressions
from impression 
where on_minute >=  '%s' and on_minute < '%s' 
group by 1,2,3) as imp

join

(select 
DATE_FORMAT(request_time,'%sY%sm%sd%sH') as dt_hr,
FLOOR(MINUTE(request_time) / %s) * %s as dt_min,
utm_source, 
count(*) as views
from landing_page
where request_time >=  '%s' and request_time < '%s'
and utm_campaign REGEXP '%s'
group by 1,2,3) as lp

on imp.utm_source =  lp.utm_source and imp.dt_hr =  lp.dt_hr and imp.dt_min =  lp.dt_min


join

(select 
DATE_FORMAT(ts,'%sY%sm%sd%sH') as hr,
FLOOR(MINUTE(ts) / %s) * %s as dt_min,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) as amount,
sum(if(converted_amount > 50, 50, converted_amount)) as amount50
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s'
and utm_campaign REGEXP '%s'
group by 1,2,3) as ecomm

on ecomm.banner = lp.utm_source and ecomm.hr = lp.dt_hr and ecomm.dt_min = lp.dt_min

group by 1,2
-- having impressions > 100000 and donations > 10
order by 1 asc;
