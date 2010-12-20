
-- sorts utm_campaigns by most recently added 

select utm_campaign, min(ts) as min_ts, count(*) as hits

from 
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)

where ts > '%s' and utm_campaign REGEXP '[0-9](JA|SA|EA)[0-9]'
group by 1
having hits > 100
order by 2 desc
;