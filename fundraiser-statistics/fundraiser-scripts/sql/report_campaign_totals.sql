


select 

utm_campaign,
sum(not isnull(contribution_tracking.contribution_id)) as donations

from drupal.contribution_tracking left join civicrm.civicrm_contribution ON (drupal.contribution_tracking.contribution_id = civicrm.civicrm_contribution.id)

where receive_date >=  %s and receive_date < %s  

group by 1
order by 2 desc;

