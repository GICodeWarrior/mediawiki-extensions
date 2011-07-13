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





