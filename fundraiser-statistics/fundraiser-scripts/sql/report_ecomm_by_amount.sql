

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
DATE_FORMAT(receive_date, '%sY-%sm-%sd %sH') as stamp,
civicrm.civicrm_contribution.id,
converted_amount, 
civicrm.public_reporting.contact_id

from civicrm.civicrm_contribution left join civicrm.public_reporting on civicrm.civicrm_contribution.id = civicrm.public_reporting.contribution_id
where receive_date > '%s' and receive_date <= '%s'
) as ecomm

join civicrm.civicrm_contact on ecomm.contact_id = civicrm.civicrm_contact.id
join civicrm.civicrm_address on civicrm.civicrm_contact.id = civicrm.civicrm_address.contact_id
join civicrm.civicrm_country on civicrm.civicrm_address.country_id = civicrm.civicrm_country.id

where ecomm.converted_amount >= 100 
group by 1;

