SELECT 
	u.user_id,
	u.user_name,
	um.first_edit,
	u.user_editcount as editcount
FROM user u
INNER JOIN halfak.user_meta um USING (user_id)
WHERE u.user_editcount >= %()s

	

SELECT 
	r.rev_id,
	r.rev_timestamp,
	rvtd.revision_id IS NOT NULL AS is_reverted,
	rvtd.is_vandalism IS NOT NULL AND rvtd.is_vandalism = TRUE AS is_vandalism,
	False AS deleted
FROM revision r
LEFT JOIN halfak.reverted_20110115 rvtd
	ON r.rev_id = rvtd.revision_id
WHERE rev_user = 40
ORDER BY r.rev_timestamp ASC
LIMIT 10;

SELECT
	ar_rev_id    AS rev_id,
	ar_timestamp AS rev_timestamp,
	NULL         AS is_reverted,
	NULL         AS is_vandalism,
	True         AS deleted
FROM archive
WHERE ar_user = 4
ORDER BY ar_timestamp ASC
LIMIT 10;

SELECT 
	r.rev_id,
	r.timestamp,
	rvtd.revision_id IS NOT NULL,
	rvtd.is_vandalism IS NOT NULL AND rvtd.is_vandalism = TRUE
FROM revision r
LEFT JOIN halfak.reverted_20110115 rvtd
	ON r.rev_id = rvtd.revision_id
WHERE r.rev_user = 2345678
ORDER BY r.rev_id DESC
LIMIT 10000;



----Just testsing here--------------------------
use enwiki;
create table zexley.quarterly_cumulative_counts_from_revision
select r.rev_user,
        sum(if(datediff(r.rev_timestamp,m.first_edit)<92,1,0)) as 1q,
        sum(if(datediff(r.rev_timestamp,m.first_edit)<183,1,0)) as 2q,
sum(if(datediff(r.rev_timestamp,m.first_edit)<274,1,0)) as 3q,
sum(if(datediff(r.rev_timestamp,m.first_edit)<366,1,0)) as 4q
from revision r
inner join halfak.user_meta m on r.rev_user=m.user_id
group by r.rev_user;

SELECT
	u.user_id,
	sum(r.rev_timestamp BETWEEN u.first_edit AND DATE_ADD(u.first_edit, INTERVAL .25 YEAR)) as 1q,
	sum(r.rev_timestamp BETWEEN DATE_ADD(u.first_edit, INTERVAL .25 YEAR)) AND DATE_ADD(u.first_edit, INTERVAL .5 YEAR)) as 2q,
	sum(r.rev_timestamp BETWEEN DATE_ADD(u.first_edit, INTERVAL .5 YEAR)) AND DATE_ADD(u.first_edit, INTERVAL .75 YEAR)) as 3q,
	sum(r.rev_timestamp > DATE_ADD(u.first_edit, INTERVAL .75 YEAR)) as 4q,
FROM halfak.user_meta u
INNER JOIN revision r
	ON u.user_id = r.rev_user AND
	r.rev_timestamp BETWEEN u.first_edit AND DATE_ADD(u.first_edit, INTERVAL 1 YEAR)
	
GROUP BY u.user_id;

SELECT
	u.user_id,
	sum(r.rev_timestamp BETWEEN u.first_edit AND DATE_ADD(u.first_edit, INTERVAL .25 YEAR)) as 1q,
	sum(r.rev_timestamp BETWEEN DATE_ADD(u.first_edit, INTERVAL .25 YEAR) AND DATE_ADD(u.first_edit, INTERVAL .5 YEAR)) as 2q,
	sum(r.rev_timestamp BETWEEN DATE_ADD(u.first_edit, INTERVAL .5 YEAR) AND DATE_ADD(u.first_edit, INTERVAL .75 YEAR)) as 3q,
	sum(r.rev_timestamp > DATE_ADD(u.first_edit, INTERVAL .75 YEAR)) as 4q
FROM halfak.user_meta u
INNER JOIN revision r
	ON u.user_id = r.rev_user AND
	r.rev_timestamp BETWEEN u.first_edit AND DATE_ADD(u.first_edit, INTERVAL 1 YEAR)
GROUP BY u.user_id;
-----------------------------------------

