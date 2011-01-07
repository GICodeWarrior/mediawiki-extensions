

-- create tables in FAULKNER for recording test metric

use faulkner;

drop table if exists impression;
drop table if exists landing_page;
drop table if exists ip_country;

-- drop table if exists treatment;


create table impression (
	-- id int(10) unsigned NOT NULL auto_increment,
	run_id int(10) unsigned default NULL,
	utm_source varchar(128) default NULL,
	referrer varchar(128) default NULL,
	country varchar(128) default NULL,
	counts int(10) unsigned default NULL,
	on_minute timestamp,
	-- primary key (id),
	constraint imp_run_fk foreign key (run_id) references log_run (id) on delete cascade
);

create table landing_page (
	id int(10) unsigned NOT NULL auto_increment,
	-- run_id int(10) unsigned default NULL,
	utm_source varchar(128) default NULL,
	utm_campaign varchar(128) default NULL,
	utm_medium varchar(128) default NULL,
	landing_page varchar(128) default NULL,
	page_url varchar(1000) default NULL,
	referrer_url varchar(1000) default NULL,
	browser varchar(50) default NULL,
	lang varchar(20) default NULL, -- CHARACTER(2) NULL,
	country varchar(20) default NULL, -- CHARACTER(2) NULL,
	project varchar(128) default NULL,
	ip varchar(20) default NULL,
	request_time timestamp,
	primary key (id)
	-- constraint lp_tr_fk foreign key (test_run_id) references test_run (id) on delete cascade
);


create table ip_country (

	ip_from varchar(50) default NULL,
	ip_to varchar(50) default NULL,
	registry varchar(50) default NULL,
	assigned varchar(50) default NULL,
	country_ISO_1 varchar(50) default NULL,
	country_ISO_2 varchar(50) default NULL,
	country_name varchar(50) default NULL,
	primary key (ip_from)
);

