ALTER TABLE /*_*/article_feedback_pages
	ADD aap_revision integer unsigned NOT NULL,
	DROP PRIMARY KEY,
	ADD PRIMARY KEY (aap_page_id, aap_rating_id, aap_revision);