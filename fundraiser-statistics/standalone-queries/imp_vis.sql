

set @campaign = '20101222JA052';
set @s = '20101222225500';
set @e = '20101222235500';
-- set @ctrl1 = 'ControlBanner';

-- set @cntry = 'NL';


-- drop table if exists query_bin_imp_vis;

-- create table query_bin_imp_vis as 

select
imp.utm_source,
-- lp.landing_page,
-- imp.hr as hr,
impressions as impressions,
views as views,
views / impressions  as rate

from

(select 
-- DATE_FORMAT(on_minute,'%Y-%m-%d %H') as hr,
utm_source, 
sum(counts) as impressions
from impression
where on_minute >=  @s and on_minute < @e -- and utm_source in (@ctrl1, @ctrl2)
-- and utm_campaign = @campaign 
-- and country = @cntry
and (utm_source = '20101222_JA028A_US' or utm_source = '20101222_JA028C_US')
group by 1) as imp

join

(select 
-- DATE_FORMAT(request_time,'%Y-%m-%d %H') as hr,
utm_source, 
-- landing_page,
count(*) as views
from landing_page
where request_time >=  @s and request_time < @e 
-- and utm_campaign =  @campaign
and (utm_source = '20101222_JA028A_US' or utm_source = '20101222_JA028C_US')
group by 1) as lp

on lp.utm_source = imp.utm_source -- and imp.hr = lp.hr

group by 1 order by 1;







