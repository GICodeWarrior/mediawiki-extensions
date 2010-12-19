
SELECT
DATE_FORMAT(ts,'%sY-%sm-%sd %sH:%si'),
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',1) as banner,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landingpage,
utm_campaign,
converted_amount,
SUBSTRING_index(utm_source,'.',-1) as suffix
 
FROM drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (drupal.contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)

WHERE ts >= '%s' and not isnull(converted_amount)

order by 1