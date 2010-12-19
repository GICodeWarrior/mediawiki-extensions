

set @campaign = '20101125JA007';
set @s = '20101201013000';
set @e = '20101202013000';
set @ctrl1 = 'ControlBanner';

-- set @cntry = 'NL';


drop table if exists query_bin_imp_vis;

create table query_bin_imp_vis as 

select
imp.utm_source,
lp.landing_page,
-- imp.hr as hr,
sum(impressions) as impressions,
sum(views) as views,
sum(views) / sum(impressions)  as rate

from

(select 
DATE_FORMAT(on_minute,'%Y-%m-%d %H') as hr,
utm_source, 
sum(counts) as impressions
from impression
where on_minute >=  @s and on_minute < @e -- and utm_source in (@ctrl1, @ctrl2)
and utm_campaign = @campaign or utm_campaign = @ctrl
and country = @cntry
group by 2) as imp

join

(select 
DATE_FORMAT(request_time,'%Y-%m-%d %H') as hr,
utm_source, 
landing_page,
count(*) as views
from landing_page
where request_time >=  @s and request_time < @e 
and utm_campaign =  @campaign
-- and landing_page in (@lp1)
and utm_campaign = @campaign or utm_campaign = @ctrl
-- and page_url like concat('%country_code=', @cntry, '%')
group by 2,3) as lp

on lp.utm_source = imp.utm_source -- and imp.hr = lp.hr

group by 1,2 order by 1;





