
select

lp.hr as hr,
lp.landing_page,
null as total_impressions,
null as impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
null as click_rate,
donations / total_clicks as conversion_rate,
null as don_per_imp,
null as amt_per_imp,
donations / views as don_per_view,
amount / views as amt_per_view,
amount / donations  as amt_per_donation,
'%s %s %s %s %s %s %s %s %s %s %s %s' as effluent

from

(select 
DATE_FORMAT(request_time,'%sY-%sm-%sd %sH') as hr,
landing_page,
count(*) as views

from landing_page

where request_time >=  '%s' and request_time < '%s'
and utm_campaign REGEXP 'JA'
group by 1,2) as lp

join

(select 
DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as hr,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s'
and utm_campaign REGEXP 'JA'
group by 1,2) as ecomm

on ecomm.landing_page  = lp.landing_page and ecomm.hr = lp.hr

group by 1,2,3,4
having views > 1000
order by 1 desc;





