

select 

ecomm.stamp as stamp,
civicrm.civicrm_contact.first_name as first_name,
civicrm.civicrm_contact.last_name as last_name,
civicrm.civicrm_country.name as name,
civicrm.civicrm_country.iso_code as iso_code,
converted_amount as amount


from 
(
select 
DATE_FORMAT(ts, '%sY-%sm-%sd %sH') as stamp,
contribution_tracking.contribution_id,
converted_amount, 
contact_id

from drupal.contribution_tracking left join civicrm.public_reporting on contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id
) as ecomm

join civicrm.civicrm_contact on ecomm.contact_id = civicrm.civicrm_contact.id
join civicrm.civicrm_address on civicrm.civicrm_contact.id = civicrm.civicrm_address.contact_id
join civicrm.civicrm_country on civicrm.civicrm_address.country_id = civicrm.civicrm_country.id

%s group by 1;

