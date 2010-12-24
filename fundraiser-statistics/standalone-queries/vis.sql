
use faulkner;

-- set @ctrl = 'ControlBanner';
set @s = '20101206000000';
set @e = '20101219000000';
-- set @campaign = '20101125JA007';

drop table if exists query_bin_vis;

create table query_bin_vis as 

select * from
(select 
DATE_FORMAT(request_time,'%Y-%m-%d') as ts_day,
utm_source, 
landing_page,
-- utm_campaign,
count(*) as views

from landing_page

where request_time >=  @s and request_time < @e 
and (utm_source = '2010_JA1_Banner3_NL' or utm_source = '2010_JA1_Banner3')
and (page_url REGEXP 'WMFJA1' and (page_url REGEXP '/NL' or page_url REGEXP 'country_code=NL'))
-- and (utm_campaign = @campaign or utm_campaign like @ctrl)
group by 1,2,3) as lp;

-- where views > 10;



