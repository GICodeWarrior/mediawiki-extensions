
use faulkner;

set @ctrl = 'ControlBannerDead';
set @s = '20101215140000';
set @e = '20101215180000';
set @campaign = 'EM';


drop table if exists query_bin_vis_ecomm;

create table query_bin_vis_ecomm as 
select

lp.utm_campaign, 
lp.utm_source,
ecomm.landing_page,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
donations / total_clicks as conversion_rate,
donations / views as don_per_view
-- amount / views as amt_per_view,
-- amount / donations  as amt_per_donation

from


(select 
utm_source, 
landing_page,
utm_campaign,
count(*) as views

from landing_page

where request_time >=  @s and request_time < @e 
and (utm_campaign REGEXP @campaign or utm_campaign = @ctrl)
group by 1,2,3) as lp

left join

(select 
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  @s and ts < @e 
and (utm_campaign REGEXP @campaign or utm_campaign = @ctrl)
group by 1,2,3) as ecomm

on (ecomm.banner = lp.utm_source and if(ecomm.landing_page like 'WMFJAcontrol%','WMFJAcontrol', ecomm.landing_page) = lp.landing_page )

group by 1,2,3 order by 4;





