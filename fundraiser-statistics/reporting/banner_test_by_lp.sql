
select

if(lp.dt_hr < 10, concat(lp.dt_hr, ' 0', lp.dt_min), concat(lp.dt_hr, ' ', lp.dt_min)) as day_hr,
ecomm.landing_page,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
amount50 as amount50,
donations / total_clicks as conversion_rate,
donations / views as don_per_view,
amount / views as amt_per_view,
amount50 / views as amt50_per_view


from

(select 
DATE_FORMAT(request_time,'%sY-%sm-%sd %sH') as dt_hr,
FLOOR(MINUTE(request_time) / %s) * %s as dt_min,
landing_page,
count(*) as views
from landing_page
where request_time >=  '%s' and request_time < '%s'
and (utm_campaign REGEXP '%s')
and (landing_page REGEXP '%s')
group by 1,2,3) as lp

join

(select 
DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as dt_hr,
FLOOR(MINUTE(ts) / %s) * %s as dt_min,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
sum(if(converted_amount > 50, 50, converted_amount)) as amount50
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s' 
and (utm_campaign REGEXP '%s')
and (SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) REGEXP '%s')
group by 1,2,3) as ecomm

on ecomm.landing_page = lp.landing_page and lp.dt_hr = ecomm.dt_hr and lp.dt_min = ecomm.dt_min

where views > 100 and donations > 20

group by 1,2 ;
