
use drupal;


set @s = '20101216155500';
set @e = '20101216195500';
-- set @campaign = '20101216JA028';


select 
-- DATE_FORMAT(ts,'%H') as hr,
-- SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
lang,

-- utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
sum(not isnull(contribution_tracking.contribution_id))   /  count(*) as donate_click,
sum(converted_amount)  /  sum(not isnull(contribution_tracking.contribution_id)) as amount_donate

from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)

where ts >=  @s and ts < @e 
-- and utm_campaign REGEXP @campaign 
group by 1,2 order by 1,2,3 desc;