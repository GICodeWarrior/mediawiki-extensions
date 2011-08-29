CREATE TABLE halfak.user_cohort
SELECT
	user_id,
	user_name,
	MIN(first_edit)         AS first_edit,
	YEAR(MIN(first_edit))   AS first_edit_year,
	MONTH(MIN(first_edit))  AS first_edit_month,
	MAX(first_edit)         AS last_edit
FROM
(
SELECT
	user_id,
	user_name,
	MIN(rev_timestamp)         AS first_edit,
	YEAR(MIN(rev_timestamp))   AS first_edit_year,
	MONTH(MIN(rev_timestamp))  AS first_edit_month,
	MAX(rev_timestamp)         AS last_edit
FROM revision r
INNER JOIN user u
	ON u.user_id = r.rev_user
GROUP BY user_id
UNION
SELECT
	user_id,
	user_name,
	MIN(ar_timestamp)         AS first_edit,
	YEAR(MIN(ar_timestamp))   AS first_edit_year,
	MONTH(MIN(ar_timestamp))  AS first_edit_month,
	MAX(ar_timestamp)         AS last_edit
FROM archive a
INNER JOIN user u
	ON u.user_id = a.ar_user
GROUP BY user_id
) AS whocares_doesntmatter
GROUP BY user_id, user_name
	
	


CREATE TABLE halfak.rev_len_changed (
	rev_id          INT UNSIGNED,
	rev_timestamp   VARBINARY(14),
	rev_year        INT UNSIGNED,
	rev_month       INT UNSIGNED,
	rev_len         INT UNSIGNED,
	user_id         INT UNSIGNED,
	user_text       VARBINARY(255),
	page_id         INT UNSIGNED,
	namespace       INT,
	parent_id       INT UNSIGNED,
	len_change      INT
);
--mysqlimport --local -h db42 halfak rev_len_changed_namespace
CREATE TABLE halfak.rev_len_changed
SELECT
	c.rev_id,
	c.rev_timestamp,
	YEAR(c.rev_timestamp)             AS rev_year,
	MONTH(c.rev_timestamp)            AS rev_month,
	DAY(c.rev_timestamp)              AS rev_day,
	c.rev_len,
	c.rev_user                        AS user_id,
	c.rev_user_text                   AS user_text,
	c.rev_page                        AS page_id,
	cp.page_namespace                 AS namespace,
	c.rev_parent_id                   AS parent_id,
	c.rev_len - IFNULL(p.rev_len, 0)  AS len_change
FROM revision c
LEFT JOIN revision p
	ON c.rev_parent_id = p.rev_id
INNER JOIN page cp
	ON c.rev_page = cp.page_id;
CREATE UNIQUE INDEX rev_idx ON halfak.rev_len_changed_namespace_day (rev_id);
CREATE INDEX rev_user_namespace_year_month_day ON halfak.rev_len_changed_namespace_day (user_id, namespace, rev_year, rev_month, rev_day);


--update
SELECT
	c.rev_id,
	c.rev_timestamp,
	YEAR(c.rev_timestamp)             AS rev_year,
	MONTH(c.rev_timestamp)            AS rev_month,
	DAY(c.rev_timestamp)              AS rev_day,
	c.rev_len,
	c.rev_user                        AS user_id,
	c.rev_user_text                   AS user_text,
	c.rev_page                        AS page_id,
	cp.page_namespace                 AS namespace,
	c.rev_parent_id                   AS parent_id,
	c.rev_len - IFNULL(p.rev_len, 0)  AS len_change
FROM revision c
LEFT JOIN revision p
	ON c.rev_parent_id = p.rev_id
INNER JOIN page cp
	ON c.rev_page = cp.page_id
WHERE c.rev_id > (SELECT MAX(rev_id) FROM halfak.rev_len_changed);

SELECT
	user_id,
	u.first_edit,
	YEAR(u.first_edit) AS first_edit_year,
	MONTH(u.first_edit) AS first_edit_month,
	rev_year,
	rev_month,
	namespace
FROM halfak.rev_len_changed_namespace
INNER JOIN halfak.user_meta_20110715 u USING(user_id)
WHERE rev_year > 2001
AND rev_month > 2002
AND namespace > 3
AND user_id > 38427984
ORDER BY
	user_id,
	rev_year,
	rev_month,
	namespace;

CREATE TABLE halfak.fabian
SELECT
	rlc.user_id,
	rlc.namespace,
	rlc.rev_year,
	rlc.rev_month,
	rlc.rev_day,
	uc.first_edit,
	uc.first_edit_year,
	uc.first_edit_month,
	SUM(rvt.revision_id IS NOT NULL)                                   AS reverting_edits,
	SUM(rvt.revision_id IS NULL AND len_change = 0)                    AS noop_edits,
	SUM(rvt.revision_id IS NULL AND len_change > 0)                    AS add_edits,
	SUM(rvt.revision_id IS NULL AND len_change < 0)                    AS remove_edits,
	SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) AS len_added,
	SUM(IF(rvt.revision_id IS NULL AND len_change < 0, len_change, 0)) AS len_removed
FROM halfak.rev_len_changed_namespace rlc
INNER JOIN halfak.user_cohort uc USING(user_id)
LEFT JOIN halfak.revert_20110115 rvt ON rev_id = revision_id
WHERE rev_timestamp <= "20110115000000"
GROUP BY
	rlc.user_id,
	rlc.namespace,
	rlc.rev_year,
	rlc.rev_month,
	rlc.rev_day;

CREATE TABLE halfak.user_year_month_namespace (
	user_id           INT UNSIGNED,
	rev_year          INT(4),
	rev_month         INT(2),
	namespace         INT,
	first_edit        VARBINARY(14),
	first_edit_year   INT(4),
	first_edit_month  INT(2),
	reverting_edits   INT UNSIGNED,
	noop_edits        INT UNSIGNED,
	add_edits         INT UNSIGNED,
	remove_edits      INT UNSIGNED,
	len_added         INT UNSIGNED,
	len_removed       INT
);


SELECT
	rlc.user_id,
	rlc.user_text,
	uc.first_edit,
	uc.first_edit_year,
	uc.first_edit_month,
	SUM(rvt.revision_id IS NOT NULL)                                   AS reverting_edits,
	SUM(rvt.revision_id IS NULL AND len_change = 0)                    AS noop_edits,
	SUM(rvt.revision_id IS NULL AND len_change > 0)                    AS add_edits,
	SUM(rvt.revision_id IS NULL AND len_change < 0)                    AS remove_edits,
	SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) AS len_added,
	SUM(IF(rvt.revision_id IS NULL AND len_change < 0, len_change, 0)) AS len_removed
FROM halfak.rev_len_changed_namespace rlc
INNER JOIN halfak.user_cohort uc ON
	uc.user_id = rlc.user_id AND
	uc.first_edit_year = 2007
LEFT JOIN halfak.revert_20110115 rvt ON rev_id = revision_id
LEFT JOIN halfak.bot_20110711 b ON b.user_id = rlc.user_id
WHERE rev_year = 2010 
AND rev_month = 12
AND namespace IN (4, 5)
AND b.user_id IS NULL
GROUP BY
	rlc.user_id
ORDER BY SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) DESC
LIMIT 50;

SELECT 
	first_edit_year,
	SUM(rvt.revision_id IS NOT NULL)                                   AS reverting_edits,
	SUM(rvt.revision_id IS NULL AND len_change = 0)                    AS noop_edits,
	SUM(rvt.revision_id IS NULL AND len_change > 0)                    AS add_edits,
	SUM(rvt.revision_id IS NULL AND len_change < 0)                    AS remove_edits,
	SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) AS len_added,
	SUM(IF(rvt.revision_id IS NULL AND len_change < 0, len_change, 0)) AS len_removed
FROM halfak.rev_len_changed_namespace rlc
INNER JOIN halfak.user_cohort uc ON
	uc.user_id = rlc.user_id
LEFT JOIN halfak.revert_20110115 rvt ON rev_id = revision_id
LEFT JOIN halfak.bot_20110711 b ON b.user_id = rlc.user_id
WHERE rev_year = 2010 
AND rev_month = 12
AND namespace IN (4, 5)
AND b.user_id IS NULL
GROUP BY first_edit_year
ORDER BY SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) DESC
LIMIT 50;


SELECT
	rlc.rev_id,
	rlc.user_id,
	rlc.user_text,
	len_change
FROM halfak.rev_len_changed_namespace rlc
LEFT JOIN halfak.revert_20110115 rvt ON rev_id = revision_id
WHERE rev_year = 2010 
AND rev_month = 12
AND namespace IN (4, 5)
AND rlc.user_id = 4799859
AND rvt.revision_id IS NULL
ORDER BY len_change DESC
LIMIT 50;


SELECT 
	first_edit_year,
	p.page_id,
	p.page_title,
	namespace,
	SUM(rvt.revision_id IS NOT NULL)                                   AS reverting_edits,
	SUM(rvt.revision_id IS NULL AND len_change = 0)                    AS noop_edits,
	SUM(rvt.revision_id IS NULL AND len_change > 0)                    AS add_edits,
	SUM(rvt.revision_id IS NULL AND len_change < 0)                    AS remove_edits,
	SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) AS len_added,
	SUM(IF(rvt.revision_id IS NULL AND len_change < 0, len_change, 0)) AS len_removed
FROM halfak.rev_len_changed_namespace rlc
INNER JOIN halfak.user_cohort uc ON
	uc.user_id = rlc.user_id
INNER JOIN page p ON p.page_id = rlc.page_id
LEFT JOIN halfak.revert_20110115 rvt ON rev_id = revision_id
LEFT JOIN halfak.bot_20110711 b ON b.user_id = rlc.user_id
WHERE rev_year = 2010 
AND rev_month = 12
AND namespace = 5
AND b.user_id IS NULL
AND p.page_title LIKE "Article_titles"
GROUP BY 
	first_edit_year,
	page_id,
	page_title,
	namespace;


SELECT
	rlc.user_id,
	first_edit_year,
	"Article_titles%",
	SUM(rvt.revision_id IS NOT NULL)                                   AS reverting_edits,
	SUM(rvt.revision_id IS NULL AND len_change = 0)                    AS noop_edits,
	SUM(rvt.revision_id IS NULL AND len_change > 0)                    AS add_edits,
	SUM(rvt.revision_id IS NULL AND len_change < 0)                    AS remove_edits,
	SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) AS len_added,
	SUM(IF(rvt.revision_id IS NULL AND len_change < 0, len_change, 0)) AS len_removed
FROM halfak.rev_len_changed_namespace rlc
INNER JOIN halfak.user_cohort uc USING (user_id)
INNER JOIN page p USING (page_id)
LEFT JOIN halfak.revert_20110115 rvt ON rlc.rev_id = rvt.revision_id
LEFT JOIN halfak.bot_20110711 b USING (user_id)
WHERE b.user_id IS NULL
AND p.page_namespace IN (4,5)
AND p.page_title LIKE "Article_titles%"
GROUP BY user_id
ORDER BY SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) DESC
LIMIT 10;


CREATE TABLE halfak.rev_len_changed(
	rev_id          INT UNSIGNED,
	rev_timestamp   VARBINARY(14),
	rev_year        INT UNSIGNED,
	rev_month       INT UNSIGNED,
	rev_day         INT UNSIGNED,
	rev_len         INT UNSIGNED,
	user_id         INT UNSIGNED,
	user_text       VARBINARY(255),
	page_id         INT UNSIGNED,
	namespace       INT UNSIGNED,
	parent_id       INT UNSIGNED,
	len_change      INT
);
--mysqlimport --local -h db1047 halfak ~/data/rev_len_changed.tsv



CREATE TABLE halfak.user_namespace_day(
	user_id          INT UNSIGNED,
	namespace        INT UNSIGNED,
	rev_year         INT UNSIGNED,
	rev_month        INT UNSIGNED,
	rev_day          INT UNSIGNED,
	first_edit       VARBINARY(14),
	first_edit_year  INT UNSIGNED,
	first_edit_month INT UNSIGNED,
	reverting_edits  INT UNSIGNED,
	noop_edits       INT UNSIGNED,
	add_edits        INT UNSIGNED,
	remove_edits     INT UNSIGNED,
	len_added        INT UNSIGNED,
	len_removed      INT UNSIGNED
);
CREATE TABLE halfak.user_namespace_day
SELECT
	rlc.user_id,
	rlc.namespace,
	rlc.rev_year,
	rlc.rev_month,
	rlc.rev_day,
	uc.first_edit,
	uc.first_edit_year,
	uc.first_edit_month,
	SUM(rvt.revision_id IS NOT NULL)                                   AS reverting_edits,
	SUM(rvt.revision_id IS NULL AND len_change = 0)                    AS noop_edits,
	SUM(rvt.revision_id IS NULL AND len_change > 0)                    AS add_edits,
	SUM(rvt.revision_id IS NULL AND len_change < 0)                    AS remove_edits,
	SUM(IF(rvt.revision_id IS NULL AND len_change > 0, len_change, 0)) AS len_added,
	SUM(IF(rvt.revision_id IS NULL AND len_change < 0, len_change, 0)) AS len_removed
FROM halfak.rev_len_changed rlc
INNER JOIN halfak.user_cohort uc USING(user_id)
LEFT JOIN halfak.revert_20110115 rvt ON rev_id = revision_id
WHERE rev_timestamp <= "20110115000000"
GROUP BY
	rlc.user_id,
	rlc.namespace,
	rlc.rev_year,
	rlc.rev_month,
	rlc.rev_day;
