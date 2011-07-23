
CREATE TABLE halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20010000000000" AND "20019999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20020000000000" AND "20029999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20030000000000" AND "20039999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20040000000000" AND "20049999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20050000000000" AND "20059999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20060000000000" AND "20069999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20070000000000" AND "20079999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20080000000000" AND "20089999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20090000000000" AND "20099999999999"
ORDER BY RAND()
LIMIT 10000;

INSERT INTO halfak.user_session_sample
SELECT 
	user_id,
	YEAR(first_edit) AS year, 
	MONTH(first_edit) >= 7 AS semester
FROM halfak.user_meta_20110715
WHERE first_edit BETWEEN "20100000000000" AND "20109999999999"
ORDER BY RAND()
LIMIT 10000;



USE enwiki;
CREATE TABLE zexley.user_meta_firsts
SELECT 
	user_id, 
	first_edit, 
	last_edit, 
	sum(rev_timestamp BETWEEN u.first_edit AND DATE_ADD(u.first_edit, INTERVAL .25 YEAR)) as 1q,
	sum(rev_timestamp BETWEEN DATE_ADD(u.first_edit, INTERVAL .25 YEAR) AND DATE_ADD(u.first_edit, INTERVAL .5 YEAR)) as 2q,
	sum(rev_timestamp BETWEEN DATE_ADD(u.first_edit, INTERVAL .5 YEAR) AND DATE_ADD(u.first_edit, INTERVAL .75 YEAR)) as 3q,
	sum(rev_timestamp > DATE_ADD(u.first_edit, INTERVAL .75 YEAR)) as 4q
FROM (
SELECT
	u.user_id    AS user_id,
	u.first_edit AS first_edit,
	u.last_edit  AS last_edit,
	r.rev_timestamp
FROM halfak.user_meta_20110715 u
LEFT JOIN revision r
	ON u.user_id = r.rev_user AND
	r.rev_timestamp BETWEEN u.first_edit AND DATE_ADD(u.first_edit, INTERVAL 1 YEAR)
UNION
SELECT
	u.user_id      AS user_id,
	u.first_edit   AS first_edit,
	u.last_edit    AS last_edit,
	ar_timestamp   AS rev_timestamp
FROM halfak.user_meta_20110715 u
LEFT JOIN archive a
	ON u.user_id = ar_user AND
	ar_timestamp BETWEEN u.first_edit AND DATE_ADD(u.first_edit, INTERVAL 1 YEAR)
) AS r
GROUP BY user_id


CREATE TABLE halfak.rev_len_changed
SELECT 
	r.rev_id,
	r.rev_timestamp,
	YEAR(r.rev_timestamp)                AS rev_year,
	MONTH(r.rev_timestamp)               AS rev_month,
	r.rev_len,
	r.rev_user                           AS user_id,
	r.rev_user_text                      AS user_text,
	`change`                             AS len_change
	p.page_id                            AS page_id,
	p.page_namespace                     AS namespace
FROM revision r
INNER JOIN user u
	ON r.rev_user = u.user_id
INNER JOIN halfak.user_meta_20110715 um
	ON um.user_id = r.rev_user
INNER JOIN halfak.rev_len_change rlc
	ON r.rev_id = rlc.rev_id
INNER JOIN page p
	ON p.page_id = r.rev_page;
	
ALTER TABLE halfak.rev_len_changed
ADD COLUMN rev_year INT UNSIGNED
AFTER rev_timestamp;

ALTER TABLE halfak.rev_len_changed
ADD COLUMN rev_month INT UNSIGNED
AFTER rev_timestamp;

UPDATE halfak.rev_len_changed
SET 
	rev_year  = YEAR(rev_timestamp),
	rev_month = MONTH(rev_timestamp);


CREATE UNIQUE INDEX rev_idx ON halfak.rev_len_changed_final (rev_id);
CREATE INDEX user_year_month_namespace ON halfak.rev_len_changed_final (user_id, rev_year, rev_month, namespace);
	




SELECT 
	user_id,
	rev_year,
	rev_month,
	namespace,
	first_edit,
	COUNT(*)                                as edits,
	SUM(IF(len_change > 0,len_change,0))    as len_added,
	SUM(IF(len_change < 0,len_change*-1,0)) as len_removed
FROM halfak.rev_len_changed
GROUP BY 
	user_id,
	rev_year,
	rev_month,
	namespace,
	first_edit
WHERE user_id = 2356767;
