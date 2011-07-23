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


