
use faulkner;

set @ctrl = 'ControlBanner';
set @s = '20101201013000';
set @e = '20101202013000';
set @campaign = '20101125JA007';

drop table if exists query_bin_vis;

create table query_bin_vis as 

select * from
(select 
-- DATE_FORMAT(request_time,'%H') as hr,
utm_source, 
landing_page,
utm_campaign,
count(*) as views

from landing_page

where request_time >=  @s and request_time < @e 
and (utm_campaign = @campaign or utm_campaign like @ctrl)
group by 2,3,4) as lp

where views > 10;



