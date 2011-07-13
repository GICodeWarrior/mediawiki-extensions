CREATE TABLE halfak.huggle_revert_20110115
SELECT r.rev_id
FROM revision r
INNER JOIN halfak.revert_20110115 rvt
	ON r.rev_id = rvt.revision_id
WHERE r.rev_comment LIKE "%([[WP:HG]])%";
