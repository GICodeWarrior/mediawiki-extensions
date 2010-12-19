
-- This test metric query pulls data for impressions, landing pages, and donations
-- rates for impressions are scaled relative to the impressions seen by a given landing page	

-- column names
--
--
--utm_campaign	
-- Banner (from utm_source)	
-- Landing Page	
-- Banner Views	
-- Landing Page Views	
-- Donate button clicks	(Number of donations)	
-- Total amount	
-- Landing Page Views / Banner Views (% - banner click rate)	
-- Amounts / Impression ($)	
-- Donations / Impression (% - banner donation rate)	
-- Donations / Donate button clicks (%) 	
-- Donate button clicks / Landing (%)	
-- Total amount / Landing page views ($)	
-- Amount / Donation ($)
--
--
--
--


use faulkner;


set @s = '20101216165500';
set @e = '20101216194000';
set @campaign = '20101216JA028';


drop table if exists query_bin_imp_ecomm;

create table query_bin_imp_ecomm as 
select

ecomm.banner, 
ecomm.utm_campaign,
impressions,
views,
total_clicks as clicks,
donations as donations,
amount as amount,
views / impressions as click_rate,
donations / total_clicks as conversion_rate,
round(donations / impressions ,6) as don_per_imp
amount/ impressions as amnt_per_imp

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
where on_minute >=  @s and on_minute < @e 
group by 1) as imp_i

join

(select 
utm_source, 
count(*) as views
from landing_page
where request_time >=  @s and request_time < @e 
and (utm_campaign REGEXP @campaign or utm_campaign = @ctrl)
group by 1) as lp_i

on imp_i.utm_source =  lp_i.utm_source
) as imp

join


(select 
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  @s and ts < @e 
and (utm_campaign REGEXP @campaign or utm_campaign = @ctrl)
group by 1,2) as ecomm

on ecomm.banner = imp.utm_source 

group by 1,2 order by 9 desc;





