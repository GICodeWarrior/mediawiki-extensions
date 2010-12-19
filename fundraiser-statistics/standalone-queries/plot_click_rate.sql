

use faulkner;

set @s = '20101207060000';
set @e = '20101209060000';
-- set @campaign = '%EA%';
set @campaign = 'EA|SA';
set @intrvl = 2;


drop table if exists plot_bin_click_rate;

create table plot_bin_click_rate as 

select
if(imp.dt_hr < 10, concat(imp.dt_day, ' 0', imp.dt_hr), concat(imp.dt_day, ' ', imp.dt_hr)) as day_hr,
imp.utm_source as id,
sum(impressions) as impressions,
sum(views) as views,
sum(views) / sum(impressions)  as rate

from

(select
DATE_FORMAT(on_minute,'%Y-%m-%d') as dt_day,
FLOOR(HOUR(on_minute) / @intrvl) * @intrvl  as dt_hr,
utm_source,
sum(counts) as impressions
from impression
where on_minute >=  @s and on_minute < @e 
group by 1,2,3
having sum(counts) > 50000) as imp

,
(select
DATE_FORMAT(request_time,'%Y-%m-%d') as dt_day,
FLOOR(HOUR(request_time) /@intrvl) * @intrvl  as dt_hr,
utm_source,
count(*) as views
from landing_page
where request_time >=  @s and request_time < @e 
-- and (utm_campaign like @campaign or utm_campaign = @ctrl)
and (utm_campaign regexp @campaign or utm_campaign = @ctrl)
group by 1,2,3) as lp

where lp.utm_source = imp.utm_source and imp.dt_hr = lp.dt_hr and imp.dt_day = lp.dt_day

group by 1,2 order by 1,2 desc