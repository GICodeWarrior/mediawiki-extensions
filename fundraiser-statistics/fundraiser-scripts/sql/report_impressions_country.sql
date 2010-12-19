select * from
(select
DATE_FORMAT(on_minute,'%sY-%sm-%sd') as day,
country,
sum(counts) as impressions
from impression
where on_minute >= '%s'
group by 1,2) as imp
where impressions > 1000000