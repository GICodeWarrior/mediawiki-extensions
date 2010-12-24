

set @s = '20101206000000';
set @e = '20101219000000';
-- set @ctrl1 = 'ControlBanner';


drop table if exists query_bin_imp;

create table query_bin_imp as 

select 
DATE_FORMAT(on_minute,'%Y-%m-%d') as ts_day,
utm_source, 
sum(counts) as impressions
from impression
where on_minute >=  @s and on_minute < @e 
and (utm_source = '2010_JA1_Banner3_NL' or utm_source = '2010_JA1_Banner3')
and country = 'NL'
group by 1,2 order by 1;





