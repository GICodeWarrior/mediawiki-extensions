-- user ranking by contribution per namespace per year for main, talk,
-- wikipedia, wikipedia talk

select namespace, year, user_id, sum(edits) as total_contributions 
from halfak.giovanni 
where namespace in (0,1,4,5) and user_id > 0
group by user_id, namespace, year 
-- having total_contributions >= 1000
order by namespace, year, total_contributions;
