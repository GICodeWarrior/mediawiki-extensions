
select 
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
sum(if(converted_amount > 100, 100, converted_amount)) AS modified_amount, -- truncates donations over 100 
max(converted_amount) AS max_amt,
sum(if(right(utm_source,2)='cc',1,0))  as cc_clicks,
sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0)) as cc_don,
sum(if(right(utm_source,2)='pp',1,0))  as pp_clicks,
sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0)) as pp_don


from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s' 
and (utm_campaign REGEXP '%s')
group by 1,2




