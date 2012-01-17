CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_senate (
  `cls_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `cls_bioguideid` varchar(32) NOT NULL,
  `cls_gender` varchar(1) NOT NULL,
  `cls_name` varchar(255) NOT NULL,
  `cls_title` varchar(8) NOT NULL,
  `cls_state` varchar(2) NOT NULL,
  `cls_phone` varchar(32) NOT NULL,
  `cls_fax` varchar(32) NOT NULL,
  `cls_contactform` varchar(255) NOT NULL,
  `cls_twitter` varchar(64) DEFAULT NULL
) /*$wgDBTableOptions*/;
CREATE INDEX /*i*/cls_state ON /*$wgDBprefix*/cl_senate (cls_state);

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_house (
  `clh_id` int(10) unsigned NOT NULL PRIMARY KEY,
  `clh_bioguideid` varchar(32) NOT NULL,
  `clh_gender` varchar(1) NOT NULL,
  `clh_name` varchar(255) NOT NULL,
  `clh_title` varchar(8) NOT NULL,
  `clh_state` varchar(2) NOT NULL,
  `clh_district` varchar(32) NOT NULL,
  `clh_phone` varchar(32) NOT NULL,
  `clh_fax` varchar(32) NOT NULL,
  `clh_contactform` varchar(255) NOT NULL,
  `clh_twitter` varchar(64) DEFAULT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip3 (
  `clz3_zip` int(3) unsigned NOT NULL PRIMARY KEY,
  `clz3_state` varchar(2) DEFAULT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip5 (
  `clz5_id` int(10) unsigned NOT NULL PRIMARY KEY auto_increment,
  `clz5_zip` int(5) unsigned NOT NULL,
  `clz5_rep_id` int(10) unsigned DEFAULT NULL
) /*$wgDBTableOptions*/;
CREATE INDEX /*i*/clz5_zip ON /*$wgDBprefix*/cl_zip5 (clz5_zip);

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip9 (
  `clz9_zip` int(9) unsigned NOT NULL PRIMARY KEY,
  `clz9_rep_id` int(10) unsigned DEFAULT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip91 (
  `clz91_zip` int(6) unsigned NOT NULL PRIMARY KEY,
  `clz91_rep_id` int(10) unsigned DEFAULT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip92 (
  `clz92_zip` int(7) unsigned NOT NULL PRIMARY KEY,
  `clz92_rep_id` int(10) unsigned DEFAULT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/cl_zip93 (
  `clz93_zip` int(8) unsigned NOT NULL PRIMARY KEY,
  `clz93_rep_id` int(10) unsigned DEFAULT NULL
) /*$wgDBTableOptions*/;
