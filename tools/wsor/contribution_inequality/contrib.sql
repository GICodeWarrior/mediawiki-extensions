-- user ranking by contribution per namespace per year for main, talk,
-- wikipedia, wikipedia talk

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

select namespace, year, user_id, sum(edits) as total_contributions 
from halfak.giovanni 
where namespace in (0,1,2,3,4,5) and user_id > 0
group by user_id, namespace, year 
-- having total_contributions >= 1000
order by namespace, year, total_contributions;
