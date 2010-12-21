

SELECT
DATE_FORMAT(ts,'%sY-%sm-%sd%s') as h,
count(*) as clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) as total_amt,
sum(if(utm_campaign NOT REGEXP 'EM' and utm_campaign NOT REGEXP 'RE',converted_amount ,0)) as banner_amt,
sum(if(utm_source REGEXP '_US' and utm_campaign NOT REGEXP 'EM' and utm_campaign NOT REGEXP 'RE',converted_amount,0)) as US_amt,
sum(if(utm_source REGEXP '_EN' and utm_campaign NOT REGEXP 'EM' and utm_campaign NOT REGEXP 'RE',converted_amount,0)) as EN_amt,
sum(if(utm_campaign NOT REGEXP'_EN' and utm_source NOT REGEXP '_US' and utm_campaign NOT REGEXP'EM' and utm_campaign NOT REGEXP 'RE',converted_amount,0)) as OT_amt,
sum(if(utm_campaign REGEXP 'EM' or  utm_campaign REGEXP 'RE' , converted_amount ,0)) as email_amt,
sum(if(utm_source REGEXP '.rpp'  ,1 ,0))*0.5*8*10 as recurring_guess,

sum(not isnull(contribution_tracking.contribution_id)) /count(*) as completion_rate,
-- sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0)) as pp_over_cc_dons,
sum(if(right(utm_source,2)='pp',1,0)) as pp_clicks,
sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0))  as pp_donations,
sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='pp',1,0)) as pp_completion,
sum(if(right(utm_source,2)='pp',converted_amount,0)) as pp_amt,
max(if(right(utm_source,2)='pp',converted_amount,0)) as max_pp_amt,
sum(if(right(utm_source,2)='cc',1,0)) as cc_clicks,
sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0)) as cc_donations,
sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0))/sum(if(right(utm_source,2)='cc',1,0)) as cc_completion,
sum(if(right(utm_source,2)='cc',converted_amount,0)) as cc_amt,
max(if(right(utm_source,2)='cc',converted_amount,0)) as max_cc_amt,
avg(converted_amount) as average,
max(converted_amount) as max_amount


from (drupal.contribution_tracking left join civicrm.public_reporting on (drupal.contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id))
WHERE   ts >= '%s' and ts < '%s'
GROUP BY 1
order by 1