
select * from
(SELECT

DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as hr,
contribution_tracking.utm_campaign,
substring_index(drupal.contribution_tracking.utm_source, '.', 2)  as source,
count(*) as clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(not isnull(contribution_tracking.contribution_id)) /count(*) as completion_rate,
sum(converted_amount) AS amount,
sum(if(right(utm_source,2)='pp',1,0)) as pp_clicks,
sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0))  as pp_donations,
sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='pp',1,0)) as pp_completion,

((sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='pp',1,0))) - 0.697065059)
/ (sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='pp',1,0))) as pp_completion_pct_diff_from_avg,


sum(if(right(utm_source,2)='cc',1,0)) as cc_clicks,
sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0)) as cc_donations,
sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='cc',1,0)) as cc_completion,

((sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='cc',1,0))) - 0.458803776)
/ (sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='cc',1,0))) as cc_completion_pct_diff_from_avg,


sum(if(right(utm_source,2)='cc',converted_amount,0)) as cc_amt,
sum(if(right(utm_source,2)='pp',converted_amount,0)) as pp_amt,
max(if(right(utm_source,2)='cc',converted_amount,0)) as max_cc_amt,
max(if(right(utm_source,2)='pp',converted_amount,0)) as max_pp_amt,
max(converted_amount) as max_amount


from (drupal.contribution_tracking left join civicrm.public_reporting on (drupal.contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)),
faulkner.campaigns

where  ts >= '%s'
and contribution_tracking.utm_campaign = faulkner.campaigns.utm_campaign

GROUP BY 1,2,3
order by 1,2,3,5 DESC) as temp
where donations > 10