CREATE TABLE /*$wgDBprefix*/globalimagelinks (
	-- Interwiki prefix
	gil_wiki varchar(32) not null,
	-- page_id on the local wiki
	gil_page int unsigned not null,
	-- Namespace, since the foreign namespaces may not match the local ones
	gil_page_namespace varchar(255) not null,
	-- Page title
	gil_page_title varchar(255) not null,
	-- Image name
	gil_to varchar(255) not null,
	-- Exists locally
	gil_is_local tinyint(1) not null,
	
	PRIMARY KEY (gil_wiki, gil_page),
	-- On gil_is_local change
	INDEX (gil_wiki, gil_to),
	-- On the special page itself
	INDEX (gil_to, gil_is_local)
) /*$wgDBTableOptions*/;