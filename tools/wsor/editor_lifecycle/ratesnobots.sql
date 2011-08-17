select 
    rev_user, 
    min(rev_timestamp), 
    max(rev_timestamp), 
    count(*) 
from revision left join halfak.bot_20110711 
on rev_user = user_id 
where user_id is null and rev_user > 0 
group by rev_user;
