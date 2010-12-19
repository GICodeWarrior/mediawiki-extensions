
use faulkner;

set @s = '20091225000000';
set @e = '20100116000000';

select 
DATE_FORMAT(ts,'%d') as hr,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,

from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)

where ts >=  @s and ts < @e 
group by 1;