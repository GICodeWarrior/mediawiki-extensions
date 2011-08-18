-- user ranking by contribution per namespace per year for main, talk,
-- wikipedia, wikipedia talk
describe
select namespace, year, user_id, sum(edits) as total_contributions 
from halfak.giovanni 
where namespace in (0,1,4,5)
group by user_id, namespace, year 
-- having total_contributions > 10
order by namespace asc, year asc, total_contributions desc;
