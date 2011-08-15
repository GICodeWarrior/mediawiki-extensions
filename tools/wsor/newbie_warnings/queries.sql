SELECT reciever.user_id, reciever.user_name
FROM revision r
INNER JOIN page p
	ON r.rev_page = p.page_id
	AND p.page_namespace = 3
	AND r.rev_user = 14934614
INNER JOIN user reciever
	ON reciever.user_name = REPLACE(p.page_title, "_", " ")
INNER JOIN user_newtalk nt
	ON reciever.user_id = nt.user_id
GROUP BY reciever.user_id, reciever.user_name

SELECT reciever.user_id, reciever.user_name, count(*)
FROM revision r
INNER JOIN 
	ON r.rev_page = p.page_id
	AND p.page_namespace = 3
	AND r.rev_user = 6396742
INNER JOIN user reciever
	ON reciever.user_name = REPLACE(p.page_title, "_", " ")
INNER JOIN user_newtalk nt
	ON reciever.user_id = nt.user_id
WHERE 
GROUP BY reciever.user_id, reciever.user_name;


StuGeiger: 14934614
EpochFail: 6396742


SELECT rc_timestamp FROM recentchanges ORDER BY rc_timestamp DESC LIMIT 1

SELECT  
	reciever.user_id, 
	reciever.user_name, 
	count(*) AS messages_waiting
FROM (	
SELECT DISTINCT p.page_title
FROM revision r
INNER JOIN page p
	ON r.rev_page = p.page_id
WHERE r.rev_user = 14934614
AND p.page_namespace = 3
) AS tp
INNER JOIN user reciever
	ON reciever.user_name = REPLACE(tp.page_title, "_", " ")
INNER JOIN user_newtalk nt
	ON reciever.user_id = nt.user_id
GROUP BY reciever.user_id, reciever.user_name;

SELECT  
	reciever.user_id,
	reciever.user_name,
	count(*) AS messages_waiting
FROM (	
SELECT DISTINCT p.page_title
FROM revision r
INNER JOIN page p
	ON r.rev_page = p.page_id
WHERE r.rev_user = 6396742
AND p.page_namespace = 3
) AS tp
INNER JOIN user reciever
	ON reciever.user_name = REPLACE(tp.page_title, "_", " ")
INNER JOIN user_newtalk nt
	ON reciever.user_id = nt.user_id
GROUP BY reciever.user_id, reciever.user_name;

SELECT  
	NULL AS user_id,
	tp.page_title AS user_name,
	count(*) AS messages_waiting
FROM (	
SELECT DISTINCT p.page_title
FROM revision r
INNER JOIN page p
	ON r.rev_page = p.page_id
WHERE r.rev_user = 6396742
AND p.page_namespace = 3
) AS tp
INNER JOIN user_newtalk nt
	ON tp.page_title = nt.user_ip
GROUP BY tp.page_title;


SELECT rc_timestamp AS time 
FROM recentchanges 
ORDER BY rc_timestamp DESC 
LIMIT 1



SELECT  
	reciever.user_id, 
	reciever.user_name, 
	count(*) AS messages_waiting
FROM (	
SELECT DISTINCT p.page_title
FROM revision r
INNER JOIN halfak.huggler_sample h
	ON r.rev_user = h.user_id
	AND h.user_name NOT IN ("Tide rolls", "Falcon8765")
INNER JOIN page p
	ON r.rev_page = p.page_id
AND p.page_namespace = 3
AND r.rev_timestamp >= "20110705230000"
) AS tp
INNER JOIN user reciever
	ON reciever.user_name = REPLACE(tp.page_title, "_", " ")
INNER JOIN user_newtalk nt
	ON reciever.user_id = nt.user_id
GROUP BY reciever.user_id, reciever.user_name
UNION
SELECT  
	NULL AS user_id,
	tp.page_title AS user_name,
	count(*) AS messages_waiting
FROM (	
SELECT DISTINCT p.page_title
FROM revision r
INNER JOIN halfak.huggler_sample h
	ON r.rev_user = h.user_id
	AND h.user_name NOT IN ("Tide rolls", "Falcon8765")
INNER JOIN page p
	ON r.rev_page = p.page_id
WHERE p.page_namespace = 3
AND r.rev_timestamp >= "20110705230000"
) AS tp
INNER JOIN user_newtalk nt
	ON tp.page_title = nt.user_ip
GROUP BY tp.page_title;


SELECT DISTINCT p.page_title AS title
FROM revision r
INNER JOIN halfak.listed_huggler h
	ON r.rev_user = h.user_id
INNER JOIN page p
	ON r.rev_page = p.page_id
WHERE p.page_namespace = 3
AND r.rev_timestamp >= "20110719000000"
AND r.rev_comment LIKE "%[[WP:HG%";


SELECT DISTINCT p.page_title AS title
FROM revision r
INNER JOIN page p
	ON r.rev_page = p.page_id
WHERE p.page_namespace = 3
AND r.rev_timestamp >= "20110719014743"
AND r.rev_comment LIKE "%DERPDERPDERP42%";



SELECT 
	nt.user_id,
	IFNULL(u.user_name, nt.user_ip) AS user_name,
	count(*)
FROM user_newtalk nt
LEFT JOIN user u
	ON u.user_id = nt.user_id
WHERE u.user_name IN ("EpochFail")
OR nt.user_ip IN ("EpochFail")
GROUP BY nt.user_id, nt.user_ip, u.user_name;


SELECT 
	u.user_id,
	u.user_name,
	count(*) as messages
FROM user_newtalk nt
LEFT JOIN user u
	ON u.user_id = nt.user_id
WHERE u.user_name IN ("EpochFail")
GROUP BY u.user_id, u.user_name
UNION
SELECT 
	nt.user_ip as user_name,
	NULL as user_id,
	count(*) as messages
FROM user_newtalk nt
WHERE nt.user_ip IN ("EpochFail")
GROUP BY nt.user_ip, NULL;


SELECT 
	p.page_id as user_talk_id, 
	p.page_title as user_talk_page,
	REPLACTE(p.page_title, "_", " ") as user_name,
	tl.tl_title as template
FROM enwiki.templatelinks tl
INNER JOIN enwiki.page p 
	ON page_id = tl_from 
WHERE tl_title IN ('Z49','Z50','Z51','Z52','Z53','Z54','Z55','Z56') 
AND tl_namespace = 10 
AND page_namespace = 3



SELECT 
	rc_id        AS id,
	rc_timestamp AS timestamp,
	rc_user      AS user_id,
	rc_user_text AS user_name,
	rc_comment   AS comment
FROM recentchanges r
WHERE rc_namespace = 3
AND rc_new IN (0, 1)
AND rc_timestamp >= "20110725000000"
AND rc_comment LIKE "Message re.%[[WP:HG%";

SELECT r.*
FROM revision r
INNER JOIN page p ON r.rev_id = p.page_id
WHERE p.page_namespace = 3
AND rev_timestamp >= "20110725000000"
AND rev_comment LIKE "Message re.%[[WP:HG%";

--Load in hugglings to halfak.huggling
CREATE INDEX recipient_name ON halfak.huggling (recipient_name);

DROP TABLE halfak.registered_recipient;
CREATE TABLE halfak.registered_recipient
SELECT h.recipient_name, u.user_id, u.user_name, u.user_registration
FROM halfak.huggling h
INNER JOIN recentchanges rc
	ON rc_ip = h.recipient_name
INNER JOIN user u
	ON rc_user_text = u.user_name
WHERE u.user_registration > h.rev_timestamp
GROUP BY u.user_id;
CREATE INDEX user_name ON halfak.registered_recipient (user_name);

CREATE TABLE halfak.huggle_posting_action (
	action     ENUM("received", "read"),
	user_id    INT UNSIGNED,
	user_text  VARBINARY(255),
	timestamp  VARBINARY(14)
);
CREATE INDEX action_user_text_timestamp ON halfak.huggle_posting_action (action, user_text, timestamp);

DROP TABLE halfak.huggle_posting;
CREATE TABLE halfak.huggle_posting (
	user_id         INT UNSIGNED,
	user_text       VARBINARY(255),
	time_posted     VARBINARY(14),
	time_consumed   VARBINARY(14)
);
INSERT INTO halfak.huggle_posting
SELECT
	posted.user_id,
	posted.user_text,
	posted.timestamp,
	MIN(consumed.timestamp)
FROM halfak.huggle_posting_action posted
LEFT JOIN halfak.huggle_posting_action consumed
	ON posted.user_text = consumed.user_text
	AND posted.timestamp <= consumed.timestamp
	AND consumed.action = "read"
WHERE posted.action = "received"
GROUP BY posted.user_id, posted.user_text, posted.timestamp;
CREATE INDEX user_text ON halfak.huggle_posting (user_text);


SELECT * FROM halfak.huggling LIMIT 2;
SELECT * FROM halfak.registered_recipient LIMIT 2;
SELECT * FROM halfak.huggle_posting LIMIT 2;


DROP TABLE halfak.huggling_agg;
CREATE TABLE halfak.huggling_agg
SELECT 
	rev_id, 
	rev_timestamp, 
	huggler_id, 
	huggler_name, 
	h.recipient_name, 
	personal, 
	teaching, 
	image,
	rr.user_id as registered_id,
	rr.user_name as registered_name,
	rr.user_registration as registered_time,
	IF(MIN(hp.time_posted) IS NULL, rev_timestamp, MIN(hp.time_consumed)) as message_consumed
FROM halfak.huggling h
LEFT JOIN halfak.registered_recipient rr
	ON h.recipient_name = rr.recipient_name
LEFT JOIN halfak.huggle_posting hp
	ON h.recipient_name = hp.user_text
	AND (
	hp.time_posted >= rev_timestamp OR
	hp.time_consumed IS NULL
	)
GROUP BY rev_id;
DELETE FROM halfak.huggling_agg
WHERE message_consumed = "20110801155539"
OR rev_timestamp BETWEEN "20110731212430" AND "20110801155539";
DELETE FROM halfak.huggling_agg
WHERE recipient_name = "recipient";


SELECT 
	rev_id, 
	rev_timestamp, 
	huggler_name, 
	recipient_name, 
	personal, 
	teaching, 
	image, 
	registered_name, 
	sum(revisions) AS revisions 
FROM 
(
	SELECT ha.*, count(*) as revisions FROM halfak.huggling_agg ha
	INNER JOIN revision r
		ON r.rev_user_text = ha.recipient_name
		AND r.rev_timestamp > ha.message_consumed
	INNER JOIN page p
		ON r.rev_page = p.page_id
	WHERE p.page_namespace = 0
	GROUP BY ha.rev_id;
	UNION
	SELECT ha.*, count(*) as revisions  FROM halfak.huggling_agg ha
	INNER JOIN revision r
		ON r.rev_user = ha.registered_id
		AND r.rev_timestamp > ha.message_consumed
	INNER JOIN page p
		ON r.rev_page = p.page_id
	WHERE p.page_namespace = 0
	GROUP BY ha.rev_id
) AS Foo
GROUP BY rev_id;

SELECT ha.personal, ha.teaching, ha.image, count(*) as hugglings FROM halfak.huggling_agg ha
GROUP BY ha.personal, ha.teaching, ha.image;

