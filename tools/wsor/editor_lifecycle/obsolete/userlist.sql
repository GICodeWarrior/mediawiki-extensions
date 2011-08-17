-- user ID, user name, timestamp of first edit and edit count of all registered
-- users that are not flagged bots. N.B. there might still be unflagged bots.

select 
    rev_user as user_id,
    rev_user_text as user_name,
    min(rev_timestamp) as first_timestamp,
    count(rev_timestamp) as editcount
from 
    revision r use index (usertext_timestamp) left join user_groups g 
on r.rev_user = g.ug_user 
where (ug_group <> 'bot' or g.ug_user is null) and rev_user > 0   
group by rev_user_text
-- limit 100
