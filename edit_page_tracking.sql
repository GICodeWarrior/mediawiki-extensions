-- Tables for EditPageTracking extension

CREATE TABLE /*_*/edit_page_tracking (
	ept_user bigint unsigned not null primary key,
	ept_timestamp varbinary(14) not null,
	ept_namespace int not null,
	ept_title varbinary(255) not null
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/user_timestamp ON /*_*/edit_page_tracking (ept_user, ept_timestamp);
