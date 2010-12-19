use faulkner;

set @s = '20101217120000';
set @e = '20101218000000';


select 
DATE_FORMAT(on_minute, '%Y-%m-%d %H') as stamp,
sum(counts) as visits
from impression 
where on_minute >= @s and on_minute <  @e 
group by 1;

