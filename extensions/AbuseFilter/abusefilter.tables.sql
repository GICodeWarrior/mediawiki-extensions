-- SQL tables for AbuseFilter extension

CREATE TABLE /*$wgDBprefix*/abuse_filter (
	af_id BIGINT unsigned NOT NULL AUTO_INCREMENT,
	af_pattern BLOB NOT NULL,
	af_user BIGINT unsigned NOT NULL,
	af_user_text varchar(255) binary NOT NULL,
	af_timestamp binary(14) NOT NULL,
	af_enabled tinyint(1) not null default 1,
	af_comments BLOB,
	af_public_comments TINYBLOB,
	af_hidden tinyint(1) not null default 0,
	af_hit_count bigint not null default 0,
	
	PRIMARY KEY (af_id),
	KEY (af_user)
) /*$wgDBTableOptions*/;

CREATE TABLE /*$wgDBprefix*/abuse_filter_action (
	afa_filter BIGINT unsigned NOT NULL,
	afa_consequence varchar(255) NOT NULL,
	afa_parameters TINYBLOB NOT NULL,
	
	PRIMARY KEY (afa_filter,afa_consequence),
	KEY (afa_consequence)
) /*$wgDBTableOptions*/;

CREATE TABLE /*$wgDBprefix*/abuse_filter_log (
	afl_id BIGINT unsigned NOT NULL AUTO_INCREMENT,
	afl_filter BIGINT unsigned NOT NULL,
	afl_user BIGINT unsigned NOT NULL,
	afl_user_text varchar(255) binary NOT NULL,
	afl_ip varchar(255) not null,
	afl_action varbinary(255) not null,
	afl_actions varbinary(255) not null,
	afl_var_dump BLOB NOT NULL,
	afl_timestamp binary(14) NOT NULL,
	afl_namespace tinyint NOT NULL,
	afl_title varchar(255) binary NOT NULL,
	
	PRIMARY KEY (afl_id),
	KEY (afl_filter),
	KEY (afl_user),
	KEY (afl_timestamp),
	KEY (afl_namespace, afl_title),
	KEY (afl_ip)
) /*$wgDBTableOptions*/;