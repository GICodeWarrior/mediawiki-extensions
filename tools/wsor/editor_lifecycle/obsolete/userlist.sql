-- user ID, user name, timestamp of first edit and edit count of all registered
-- users that are not flagged bots. N.B. there might still be unflagged bots.

-- Copyright (C) 2011 GIOVANNI LUCA CIAMPAGLIA, GCIAMPAGLIA@WIKIMEDIA.ORG
-- This program is free software; you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation; either version 2 of the License, or
-- (at your option) any later version.
-- 
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
-- GNU General Public License for more details.
-- 
-- You should have received a copy of the GNU General Public License along
-- with this program; if not, write to the Free Software Foundation, Inc.,
-- 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
-- http://www.gnu.org/copyleft/gpl.html

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
