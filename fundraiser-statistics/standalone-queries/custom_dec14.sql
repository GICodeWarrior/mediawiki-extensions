

-- Used to retreive donation data on countries for a landing page name format 
use faulkner;

set @s = '20101213180000';
set @e = '20101214180000';


drop table if exists query_bin;

create table query_bin as 
select


SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
civicrm.civicrm_country.iso_code as country,
-- count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from drupal.contribution_tracking left join civicrm.public_reporting on contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id
join civicrm.civicrm_contact on public_reporting.contact_id = civicrm.civicrm_contact.id
join civicrm.civicrm_address on civicrm.civicrm_contact.id = civicrm.civicrm_address.contact_id
join civicrm.civicrm_country on civicrm.civicrm_address.country_id = civicrm.civicrm_country.id

where ts >=  @s and ts < @e 
and SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1)  like '%WMFSG011%' and contribution_tracking.language = 'en'
group by 1,2






