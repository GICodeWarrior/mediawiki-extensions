-- Update to allow for any number of languages per notice.

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cn_notice_languages (
	`nl_id` int unsigned NOT NULL PRIMARY KEY auto_increment,
	`nl_notice_id` int unsigned NOT NULL,
	`nl_language` varchar(32) NOT NULL
) /*$wgDBTableOptions*/;
CREATE UNIQUE INDEX /*i*/nl_notice_id_language ON /*$wgDBprefix*/cn_notice_languages (nl_notice_id, nl_language);
