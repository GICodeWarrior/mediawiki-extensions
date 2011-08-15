CREATE TABLE halfak.user_first_msg (
	user_id       INT UNSIGNED,
	user_name     VARBINARY(255),
	msg_timestamp DATETIME
);
CREATE UNIQUE INDEX user_name ON halfak.user_first_msg (user_name);


SELECT 
	user_name, 
	user_id, 
	is_anon, 
	user_registration, 
	sender_user, 
	sender_user_text, 
	msg_timestamp, 
	bot, 
	self, 
	tool, 
	warning, 
	edit_count, 
	ban_date, 
	edits_after_msg+deleted_edits_after_msg AS edits_after,
	edits_before_msg+deleted_edits_before_msg AS edits_before
FROM 


CREATE TABLE halfak.user_activity_first_msg
SELECT
uf.user_id,
uf.user_name,
rlc.namespace,


SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NOT NULL
)                                                        AS reverting_edits_before,
SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NOT NULL AND 
	rvtd.revision_id IS NOT NULL
)                                                        AS reverted_reverting_edits_before,


SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change > 0
)                                                        AS add_edits_before,
SUM(IF(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change > 0, 
	len_change, 0
))                                                       AS len_added_before,
SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change > 0
)                                                        AS reverted_add_edits_before,
SUM(IF(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change > 0, 
	len_change, 0
))                                                       AS reverted_len_added_before,


SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change < 0
)                                                        AS remove_edits_before,
SUM(IF(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change < 0, 
	len_change, 0
))                                                       AS len_removed_before,
SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change < 0
)                                                        AS reverted_remove_edits_before,
SUM(IF(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change < 0, 
	len_change, 0
))                                                       AS reverted_len_remove_before,


SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change = 0
)                                                        AS noop_edits_before,
SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change = 0
)                                                        AS reverted_noop_edits_before,




SUM(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NOT NULL
)                                                        AS reverting_edits_after,
SUM(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NOT NULL AND 
	rvtd.revision_id IS NOT NULL
)                                                        AS reverted_reverting_edits_after,


SUM(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change > 0
)                                                        AS add_edits_after,
SUM(IF(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change > 0, 
	len_change, 0
))                                                       AS len_added_after,
SUM(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change > 0
)                                                        AS reverted_add_edits_after,
SUM(IF(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change > 0, 
	len_change, 0
))                                                       AS reverted_len_added_after,


SUM(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change < 0
)                                                        AS remove_edits_after,
SUM(IF(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change < 0, 
	len_change, 0
))                                                       AS len_removed_after,
SUM(
	rlc.rev_timestamp < uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change < 0
)                                                        AS reverted_remove_edits_after,
SUM(IF(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change < 0, 
	len_change, 0
))                                                       AS reverted_len_remove_after,


SUM(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	len_change = 0
)                                                        AS noop_edits_after,
SUM(
	rlc.rev_timestamp > uf.msg_timestamp AND 
	rvt.revision_id IS NULL AND 
	rvtd.revision_id IS NOT NULL AND 
	len_change = 0
)                                                        AS reverted_noop_edits_after

FROM halfak.user_first_msg uf
INNER JOIN halfak.rev_len_changed_namespace rlc
	ON uf.user_name = rlc.user_text
LEFT JOIN halfak.revert_20110115 rvt
	ON rvt.revision_id = rlc.rev_id
LEFT JOIN halfak.reverted_20110115 rvtd
	ON rvtd.revision_id = rlc.rev_id
GROUP BY uf.user_name, rlc.namespace;

