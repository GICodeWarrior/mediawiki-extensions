
select

imp.hr as hr,
ecomm.utm_campaign as campaign,
imp.utm_source as banner,
ecomm.landing_page as landing_page,

sum(impressions) as impressions,
sum(views) as views,

sum(donations) as donations,
sum(amount) as amount,
sum(views) / sum(impressions) as click_rate,

round(sum(donations) / sum(impressions),6) as don_per_imp,
sum(amount) / sum(impressions) as amt_per_imp,

sum(donations) / sum(views)  as don_per_view,
sum(amount) / sum(views) as amt_per_view

from

(select 
DATE_FORMAT(on_minute,'%sY-%sm-%sd %sH') as hr,
utm_source, 
sum(counts) as impressions
from impression
where on_minute >= '%s' 
group by 1,2) as imp

join

(select 
DATE_FORMAT(request_time,'%sY-%sm-%sd %sH') as hr,
utm_source, 
landing_page,
landing_page.utm_campaign,
count(*) as views

from landing_page, faulkner.campaigns

where request_time >= '%s'
and landing_page.utm_campaign = faulkner.campaigns.utm_campaign
group by 1,2,3,4) as lp

on  lp.utm_source = imp.utm_source and imp.hr = lp.hr

join

(select 
DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as hr,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
contribution_tracking.utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount

from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id),  
faulkner.campaigns

where ts >= '%s'
and contribution_tracking.utm_campaign = faulkner.campaigns.utm_campaign
group by 1,2,3,4) as ecomm

on ecomm.banner = lp.utm_source and ecomm.utm_campaign = lp.utm_campaign and  if(ecomm.landing_page like 'WMFJAcontrol%s','WMFJAcontrol', ecomm.landing_page) = lp.landing_page 
and donations > 10

group by 1,2,3,4 order by 1,2
