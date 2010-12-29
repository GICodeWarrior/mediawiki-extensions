select 
DATE_FORMAT(request_time, '%sY-%sm-%sd %sH') as stamp,
count(*) as visits
from landing_page 
where request_time >= '%s' and request_time <  '%s' 
group by 1;