SELECT 
	r.rev_id,
	r.timestamp,
	rvtd.revision_id IS NOT NULL,
	rvtd.is_vandalism IS NOT NULL AND rvtd.is_vandalism = TRUE
FROM revision r
LEFT JOIN halfak.reverted_20110115 rvtd
	ON r.rev_id = rvtd.revision_id
WHERE rev_user = 2345678
ORDER BY r.rev_id ASC
LIMIT 10000;

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


