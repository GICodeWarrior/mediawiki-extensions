use faulkner;

set @s = '20101220000000';
set @e = '20101220100000';

select 
DATE_FORMAT(request_time, '%Y-%m-%d %H') as stamp,
count(*) as visits
from landing_page 
where request_time >= @s and request_time <  @e 
group by 1;

