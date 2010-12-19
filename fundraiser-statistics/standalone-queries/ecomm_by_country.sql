
use faulkner;

set @s = '20101129000000';
set @e = '20101201000000';

drop table if exists query_bin_ecomm_by_country;

create table query_bin_ecomm_by_country as 

select 

hr,
civicrm.civicrm_country.name as name,
civicrm.civicrm_country.iso_code as iso_code,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,	
-- count(*) as total_clicks,
sum(not isnull(ecomm.contribution_id)) as donations,
sum(converted_amount) AS amount,

sum(if(right(utm_source,2)='cc' and ecomm.contribution_id,1,0)) as cc_donations,
sum(if(right(utm_source,2)='cc' and ecomm.contribution_id,converted_amount,0)) as cc_amt,

sum(if(right(utm_source,2)='pp' and ecomm.contribution_id,1,0)) as pp_donations,
sum(if(right(utm_source,2)='pp' and ecomm.contribution_id,converted_amount,0)) as pp_amt


from 
(
select 
DATE_FORMAT(ts,'%Y-%m-%d') as hr,
contribution_tracking.contribution_id,
utm_source, 
converted_amount, 
contact_id

from drupal.contribution_tracking left join civicrm.public_reporting on contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id
where ts >= @s and ts < @e 
-- and (SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) like '%2010_JA1_Banner3_Control_US%') ) as ecomm
and (utm_campaign = 'ControlBanner') ) as ecomm

join civicrm.civicrm_contact on ecomm.contact_id = civicrm.civicrm_contact.id
join civicrm.civicrm_address on civicrm.civicrm_contact.id = civicrm.civicrm_address.contact_id
join civicrm.civicrm_country on civicrm.civicrm_address.country_id = civicrm.civicrm_country.id


group by 1,2, 3,4;

