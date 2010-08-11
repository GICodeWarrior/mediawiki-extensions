-- Update to allow for any number of languages per notice.

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cn_notice_languages (
  `id` int unsigned NOT NULL auto_increment PRIMARY KEY,
  `not_id` int unsigned NOT NULL,
  `not_language` varchar(32) NOT NULL
) /*$wgDBTableOptions*/;
CREATE INDEX /*i*/cn_not_id_not_language ON /*$wgDBprefix*/cn_notice_languages (not_id, not_language);