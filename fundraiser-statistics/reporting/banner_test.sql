

select

lp.utm_campaign, 
lp.utm_source,
lp.landing_page,
impressions as total_impressions,
floor(impressions * views / views_banner) as impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
views / floor(impressions * views / views_banner) as click_rate_lp,
donations / total_clicks as conversion_rate,
round(donations / floor(impressions * views / views_banner) ,6) as don_per_imp,
round(amount / floor(impressions * views / views_banner) ,6) as amt_per_imp,
round(amount50 / floor(impressions * views / views_banner) ,6) as amt50_per_imp,
donations / views as don_per_view,
amount / views as amt_per_view,
amount50 / views as amt50_per_view


from

(select 
imp_i.utm_source,
imp_i.impressions as impressions,
lp_i.views as views_banner
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
and (utm_campaign REGEXP '%s' or utm_campaign = 'ControlBanner')
group by 1) as lp_i

on imp_i.utm_source =  lp_i.utm_source 
) as imp

join

(select 
utm_source, 
landing_page,
utm_campaign,
count(*) as views

from landing_page

where request_time >=  '%s' and request_time < '%s'
and (utm_campaign REGEXP '%s' or utm_campaign =  'ControlBanner')
group by 1,2,3) as lp

on lp.utm_source = imp.utm_source 

left join

(select 
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
sum(if(converted_amount > 50, 50, converted_amount)) as amount50
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s' 
and (utm_campaign REGEXP '%s' or utm_campaign = 'ControlBanner')
group by 1,2,3) as ecomm

on ecomm.banner = lp.utm_source and if(ecomm.landing_page like 'WMFJAcontrol%s','WMFJAcontrol', ecomm.landing_page) = lp.landing_page and ecomm.utm_campaign = lp.utm_campaign

where floor(impressions * views / views_banner) > 50000

group by 1,2,3 order by 12 desc;





