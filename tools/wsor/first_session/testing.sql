
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


CREATE TABLE halfak.rev_len_changed ENGINE = innodb
SELECT 
	r.rev_id,
	r.rev_timestamp,
	YEAR(r.rev_timestamp)                AS rev_year,
	MONTH(r.rev_timestamp)               AS rev_month,
	r.rev_len,
	r.rev_user                           AS user_id,
	r.rev_user_text                      AS user_text,
	p.page_id                            AS page_id,
	p.page_namespace                     AS namespace,
	`change`                             AS len_change
FROM revision r
INNER JOIN halfak.rev_len_change rlc
	ON r.rev_id = rlc.rev_id
INNER JOIN page p
	ON p.page_id = r.rev_page;



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


CREATE TABLE halfak.user_cohort
SELECT
	u.user_id,
	u.user_name,
	um.first_edit,
	YEAR(um.first_edit) as first_edit_year,
	MONTH(um.first_edit) as first_edit_month,
	um.last_edit
FROM user u
INNER JOIN halfak.user_meta_20110715 um USING (user_id);
CREATE UNIQUE INDEX user_idx ON halfak.user_cohort (user_id);
CREATE INDEX first_edit ON halfak.user_cohort (first_edit);
CREATE INDEX first_edit_year_month ON halfak.user_cohort (first_edit_year, first_edit_month);

CREATE TABLE halfak.rev_len_changed (
	rev_id           INT UNSIGNED,
	rev_timestamp    VARBINARY(14),
	rev_year         INT UNSIGNED,
	rev_month        INT UNSIGNED,
	rev_len          INT UNSIGNED,
	user_id          INT UNSIGNED,
	user_text        VARBINARY(255),
	page_id          INT UNSIGNED,
	parent_id        INT UNSIGNED,
	parent_id_again  INT UNSIGNED,
	len_change       INT
);


CREATE TABLE halfak.user_year_month ENGINE=innodb
SELECT 
	rlc.user_id,
	uc.user_name,
	uc.first_edit_year,
	uc.first_edit_month,
	uc.first_edit, 
	p.page_namespace,
	rlc.rev_year,
	rlc.rev_month,
	count(*) as edits,
	sum(IF(rlc.len_change > 0, rlc.len_change, 0)) as len_added,
	sum(IF(rlc.len_change < 0, rlc.len_change, 0)) as len_removed
FROM halfak.rev_len_changed rlc
INNER JOIN halfak.user_cohort uc USING (user_id)
INNER JOIN page p USING (page_id)
GROUP BY 
	rlc.rev_year,
	rlc.rev_month,
	rlc.user_id,
	p.page_namespace,
	uc.user_name,
	uc.first_edit_year,
	uc.first_edit_month,
	uc.first_edit;



SELECT 
	r.rev_id,
	r.rev_timestamp,
	IFNULL(r.rev_len, 0) AS rev_len,
	rvtd.revision_id IS NOT NULL AS is_reverted,
	rvtd.is_vandalism IS NOT NULL AND rvtd.is_vandalism = TRUE AS is_vandalism,
	False AS deleted
FROM revision r
LEFT JOIN halfak.reverted_20110115 rvtd
	ON r.rev_id = rvtd.revision_id
WHERE rev_user = 3245687
ORDER BY r.rev_timestamp

SELECT 
	r.rev_id,
	r.rev_timestamp,
	IFNULL(r.rev_len, 0) AS rev_len,
	rvtd.revision_id IS NOT NULL AS is_reverted,
	rvtd.is_vandalism IS NOT NULL AND rvtd.is_vandalism = TRUE AS is_vandalism,
	False AS deleted,
	p.page_namespace,
	p.page_title
FROM revision r
LEFT JOIN halfak.reverted_20110115 rvtd
	ON r.rev_id = rvtd.revision_id
INNER JOIN page p
	ON p.page_id = r.rev_page
WHERE rev_user = 3245687
ORDER BY r.rev_timestamp
LIMIT 1000

SELECT 
	r.rev_id,
	r.rev_timestamp,
	IFNULL(r.rev_len, 0) AS rev_len,
	rvtd.revision_id IS NOT NULL AS is_reverted,
	rvtd.is_vandalism IS NOT NULL AND rvtd.is_vandalism = TRUE AS is_vandalism,
	False AS deleted
FROM revision r
LEFT JOIN halfak.reverted_20110115 rvtd
	ON r.rev_id = rvtd.revision_id
WHERE rev_user = 3245687
ORDER BY r.rev_timestamp
LIMIT 1000


SELECT 
	rev_id,
	rev_user,
	rev_user_text,
	rev_comment,
	rev_timestamp
FROM page p
INNER JOIN revision r
	ON r.rev_page = p.page_id
WHERE p.page_title = "Blanemullet67"
AND p.page_namespace = 3
AND r.rev_user_text != "Blanemullet67"
AND (
	r.rev_comment LIKE "%[[WP:HG%" OR
	r.rev_comment RLIKE "(Message re\\. \\[\\[[^]]+\\]\\])|(Level [0-9]+ warning re\\. \\[\\[[^]]+\\]\\])" OR
	r.rev_comment RLIKE "Warning \\[\\[Special:Contributions/[^\|]+|[^\]]+\\]\\] - #[0-9]+"
)
ORDER BY rev_timestamp
LIMIT 1


SELECT 1 
FROM revision
WHERE rev_user = 3225678
AND rev_timestamp BETWEEN 
	DATE_ADD("20110101010101", INTERVAL 60*60*24*30 SECONDS) AND 
	DATE_ADD("20110101010101", INTERVAL 60*60*24*30*6 SECONDS)
LIMIT 1
