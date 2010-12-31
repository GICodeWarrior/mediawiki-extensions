
select

if(lp.dt_hr < 10, concat(lp.dt_hr, ' 0', lp.dt_min), concat(lp.dt_hr, ' ', lp.dt_min)) as day_hr,
lp.utm_campaign, 
lp.landing_page,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
donations / total_clicks as completion_rate,
donations / views as don_per_view,
amount / views as amt_per_view,
amount50 / views as amt50_per_view,
max_amt,
pp_don,
cc_don,
pp_don / pp_clicks  as paypal_click_thru,
cc_don / cc_clicks as credit_card_click_thru


from

(select 
DATE_FORMAT(request_time,'%sY-%sm-%sd %sH') as dt_hr,
FLOOR(MINUTE(request_time) / %s) * %s as dt_min,
landing_page,
utm_campaign,
count(*) as views

from landing_page

where request_time >=  '%s' and request_time < '%s'
and (utm_campaign REGEXP '%s')
group by 1,2,3) as lp

left join

(select 
DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as dt_hr,
FLOOR(MINUTE(ts) / %s) * %s as dt_min,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
utm_campaign,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
sum(if(converted_amount > 50, 50, converted_amount)) as amount50,
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
group by 1,2,3) as ecomm

on ecomm.landing_page = lp.landing_page and ecomm.utm_campaign = lp.utm_campaign and lp.dt_hr = ecomm.dt_hr and lp.dt_min = ecomm.dt_min

-- where views > 100

group by 1,2,3 order by 1,8 desc;






