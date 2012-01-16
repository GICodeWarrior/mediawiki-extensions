CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_senate (
  `ss_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `ss_bioguideid` varchar(32) NOT NULL,
  `ss_gender` varchar(1) NOT NULL,
  `ss_name` varchar(255) NOT NULL,
  `ss_title` varchar(8) NOT NULL,
  `ss_state` varchar(2) NOT NULL,
  `ss_phone` varchar(32) NOT NULL,
  `ss_fax` varchar(32) NOT NULL,
  `ss_contactform` varchar(255) NOT NULL
) /*$wgDBTableOptions*/;
CREATE INDEX /*i*/ss_state ON /*$wgDBprefix*/sopa_senate (ss_state);

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_house (
  `sh_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `sh_bioguideid` varchar(32) NOT NULL,
  `sh_gender` varchar(1) NOT NULL,
  `sh_name` varchar(255) NOT NULL,
  `sh_title` varchar(8) NOT NULL,
  `sh_state` varchar(2) NOT NULL,
  `sh_district` varchar(32) NOT NULL,
  `sh_phone` varchar(32) NOT NULL,
  `sh_fax` varchar(32) NOT NULL,
  `sh_contactform` varchar(255) NOT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip3 (
  `sz3_zip` int(3) unsigned DEFAULT NULL PRIMARY KEY,
  `sz3_state` varchar(2) DEFAULT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip5 (
  `sz5_zip` int(5) unsigned NOT NULL PRIMARY KEY,
  `sz5_rep_id` int(10) unsigned DEFAULT NULL
) /*$wgDBTableOptions*/;
