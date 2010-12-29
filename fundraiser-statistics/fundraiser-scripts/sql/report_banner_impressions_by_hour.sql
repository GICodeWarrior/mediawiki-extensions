select 
DATE_FORMAT(on_minute, '%sY-%sm-%sd %sH') as stamp,
sum(counts) as visits
from impression 
where on_minute >= '%s' and on_minute <  '%s' 
group by 1;