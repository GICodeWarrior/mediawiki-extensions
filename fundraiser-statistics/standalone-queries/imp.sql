

set @s = '20101201013000';
set @e = '20101202013000';
set @ctrl1 = 'ControlBanner';


drop table if exists query_bin_imp;

create table query_bin_imp as 

select 
-- DATE_FORMAT(on_minute,'%Y-%m-%d %H') as hr,
utm_source, 
sum(counts) as impressions
from impression
where on_minute >=  @s and on_minute < @e
group by 1 order by 1;





