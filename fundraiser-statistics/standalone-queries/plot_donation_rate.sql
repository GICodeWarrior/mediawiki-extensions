
use faulkner;


set @ctrl = 'ControlBanner';
set @s = '20101207060000';
set @e = '20101209060000';
-- set @campaign = '%EA%';
set @campaign = 'EA|SA';
set @intrvl = 2;

drop table if exists plot_bin_donation_rate;

create table plot_bin_donation_rate as 
select

if(imp.dt_hr < 10, concat(imp.dt_day, ' 0', imp.dt_hr), concat(imp.dt_day, ' ', imp.dt_hr)) as day_hr,
concat(lp.utm_source, ' - ', lp.landing_page) as id,

impressions as total_impressions,
floor(impressions * views / views_banner) as impressions,
views as views,
total_clicks as clicks,
donations,
amount,
-- views_banner /  impressions  as click_rate,
donations / views  as conversion_rate,
round(donations / floor(impressions * views / views_banner),6) as donation_rate

from

(select 
imp_i.dt_day,
imp_i.dt_hr,
imp_i.utm_source,
imp_i.impressions as impressions,
lp_i.views as views_banner
from
(select 
DATE_FORMAT(on_minute,'%Y-%m-%d') as dt_day,
FLOOR(HOUR(on_minute) / @intrvl) * @intrvl  as dt_hr,
utm_source, 
sum(counts) as impressions
from impression 
where on_minute >=  @s and on_minute < @e 
group by 1,2,3 having sum(counts) > 50000) as imp_i

join

(select 
DATE_FORMAT(request_time,'%Y-%m-%d') as dt_day,
FLOOR(HOUR(request_time) / @intrvl) * @intrvl  as dt_hr,
utm_source, 
count(*) as views
from landing_page
where request_time >=  @s and request_time < @e 
-- and (utm_campaign like @campaign or utm_campaign = @ctrl)
and (utm_campaign regexp @campaign or utm_campaign = @ctrl)
group by 1,2,3) as lp_i

on imp_i.utm_source =  lp_i.utm_source and imp_i.dt_hr =  lp_i.dt_hr and imp_i.dt_day =  lp_i.dt_day
) as imp

join

(select 
DATE_FORMAT(request_time,'%Y-%m-%d') as dt_day,
FLOOR(HOUR(request_time) / @intrvl) * @intrvl  as dt_hr,
utm_source, 
landing_page,
count(*) as views

from landing_page

where request_time >=  @s and request_time < @e 
-- and (utm_campaign like @campaign or utm_campaign = @ctrl)
and (utm_campaign regexp @campaign or utm_campaign = @ctrl)
group by 1,2,3,4) as lp

on lp.utm_source = imp.utm_source and lp.dt_hr = imp.dt_hr and lp.dt_day = imp.dt_day

left join

(select 
DATE_FORMAT(ts,'%Y-%m-%d') as dt_day,
FLOOR(HOUR(ts) / @intrvl) * @intrvl  as dt_hr,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  @s and ts < @e 
-- and (utm_campaign like @campaign or utm_campaign = @ctrl)
and (utm_campaign regexp @campaign or utm_campaign = @ctrl)
and (converted_amount < 250 or isnull(converted_amount))
group by 1,2,3,4) as ecomm

on (ecomm.banner = lp.utm_source and ecomm.dt_hr = lp.dt_hr and ecomm.dt_day = lp.dt_day
and if(ecomm.landing_page like 'WMFJAcontrol%','WMFJAcontrol', ecomm.landing_page) = lp.landing_page ) -- or if(lp.landing_page = 'index.php', 'WMFJA1',lp.landing_page) = ecomm.landing_page)

where  floor(impressions * views / views_banner)  > 20000 

group by 1,2 order by 1,2 desc;




