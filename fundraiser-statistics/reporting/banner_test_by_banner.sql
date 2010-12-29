
select

if(imp.dt_hr < 10, concat(imp.dt_hr, ' 0', imp.dt_min), concat(imp.dt_hr, ' ', imp.dt_min)) as day_hr,
ecomm.banner,
impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
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
imp_i.dt_hr,
imp_i.dt_min,
imp_i.utm_source,
imp_i.impressions as impressions,
lp_i.views as views
from
(select 
DATE_FORMAT(on_minute,'%sY-%sm-%sd %sH') as dt_hr,
FLOOR(MINUTE(on_minute) / %s) * %s as dt_min,
utm_source, 
sum(counts) as impressions
from impression 
where on_minute >=  '%s' and on_minute < '%s'
and utm_source = '%s'
group by 1,2,3) as imp_i

join

(select 
DATE_FORMAT(request_time,'%sY-%sm-%sd %sH') as dt_hr,
FLOOR(MINUTE(request_time) / %s) * %s as dt_min,
utm_source,
count(*) as views
from landing_page
where request_time >=  '%s' and request_time < '%s'
and (utm_campaign REGEXP '%s')
and (utm_source REGEXP '%s')
group by 1,2,3) as lp_i

on imp_i.utm_source =  lp_i.utm_source  and imp_i.dt_hr = lp_i.dt_hr and imp_i.dt_min = lp_i.dt_min
) as imp

join

(select 
DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as dt_hr,
FLOOR(MINUTE(ts) / %s) * %s as dt_min,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
sum(if(converted_amount > 50, 50, converted_amount)) as amount50
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s' 
and (utm_campaign REGEXP '%s')
and (SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) REGEXP '%s')
group by 1,2,3) as ecomm

on ecomm.banner = imp.utm_source and imp.dt_hr = ecomm.dt_hr and imp.dt_min = ecomm.dt_min

where impressions > 50000

group by 1,2 ;
