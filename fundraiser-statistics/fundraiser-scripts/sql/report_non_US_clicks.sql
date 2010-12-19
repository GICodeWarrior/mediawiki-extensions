
select
imp.fundraiser_day,
imp.impressions,
lp.landing_page,
lp.views,
lp.views / imp.impressions * 100 as click_rate

from
(select
DATE_FORMAT(on_minute,'%sY-%sm-%sd') as fundraiser_day,
sum(counts) as impressions
from impression
where on_minute >= '%s' and country != 'US'
group by 1) as imp
,
(select
DATE_FORMAT(request_time,'%sY-%sm-%sd') as fundraiser_day,
landing_page,
count(*) as views
from landing_page
where request_time >= '%s' and country != 'US'
group by 1,2) as lp

where lp.fundraiser_day = imp.fundraiser_day and lp.views > 100