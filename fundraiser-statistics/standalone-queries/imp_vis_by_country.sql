
use faulkner;

set @s = '20101206000000';
set @e = '20101213000000';
set @cntry = 'IL';


drop table if exists query_bin;

create table query_bin as 

select
imp.ts_ymd as ts_ymd,
-- imp.country,
landing_page,
impressions as total_impressions,
floor(impressions * views / views_banner) as impressions,
views,
views / floor(impressions * views / views_banner) as rate

from

(select 
imp_i.ts_ymd,
imp_i.utm_source,
imp_i.impressions as impressions,
lp_i.views as views_banner

from

(select 
DATE_FORMAT(on_minute,'%Y-%m-%d') as ts_ymd,
utm_source, 
sum(counts) as impressions
from impression 
where on_minute >=  @s and on_minute < @e 
and country =  @cntry
group by 1,2) as imp_i

join

(select 
DATE_FORMAT(request_time,'%Y-%m-%d') as ts_ymd,
utm_source, 
count(*) as views
from landing_page
where request_time >=  @s and request_time < @e 
and country =  @cntry
group by 1,2) as lp_i

on imp_i.utm_source =  lp_i.utm_source and lp_i.ts_ymd = imp_i.ts_ymd
) as imp

join

(select 
DATE_FORMAT(request_time,'%Y-%m-%d') as ts_ymd,
utm_source,
landing_page,
-- country,
count(*) as views
from landing_page
where request_time >=  @s and request_time < @e 
and country =  @cntry
group by 1,2,3) as lp

on lp.ts_ymd = imp.ts_ymd and lp.utm_source = imp.utm_source

order by 1,3;

