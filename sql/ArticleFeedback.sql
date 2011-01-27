-- Store mapping of i18n key of "rating" to an ID
CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/article_feedback_ratings (
  -- Rating Id
  aar_id int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  -- Text (i18n key) for rating description
  aar_rating varbinary(255) NOT NULL
) /*$wgDBTableOptions*/;

-- Default article feedback ratings for the pilot
INSERT INTO /*$wgDBprefix*/article_feedback_ratings (aar_rating) VALUES
('articlefeedback-rating-trustworthy'), ('articlefeedback-rating-objective'),
('articlefeedback-rating-complete'), ('articlefeedback-rating-wellwritten');

-- Store article feedbacks (user rating per revision)
CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/article_feedback (
  -- Foreign key to page.page_id
  aa_page_id integer unsigned NOT NULL,
  -- User Id (0 if anon)
  aa_user_id integer NOT NULL,
  -- Username or IP address
  aa_user_text varbinary(255) NOT NULL,
  -- Unique token for anonymous users (to facilitate ratings from multiple users on the same IP)
  aa_user_anon_token varbinary(32) NOT NULL DEFAULT '',
  -- Foreign key to revision.rev_id
  aa_revision integer unsigned NOT NULL,
  -- MW Timestamp
  aa_timestamp binary(14) NOT NULL DEFAULT '',
  -- Foreign key to article_feedback_ratings.aar_rating
  aa_rating_id int unsigned NOT NULL,
  -- Value of the rating (0 is "unrated", else 1-5)
  aa_rating_value int unsigned NOT NULL,
  -- Which rating widget the user was given. Default of 0 is the "old" design
  aa_design_bucket int unsigned NOT NULL DEFAULT 0,
  -- 1 vote per user per revision
  PRIMARY KEY (aa_revision, aa_user_text, aa_rating_id, aa_user_anon_token)
) /*$wgDBTableOptions*/;
CREATE INDEX /*i*/aa_user_page_revision ON /*_*/article_feedback (aa_user_id, aa_page_id, aa_revision);

-- Aggregate rating table for a page
CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/article_feedback_pages (
  -- Foreign key to page.page_id
  aap_page_id integer unsigned NOT NULL,
  -- Foreign key to article_feedback_ratings.aar_rating
  aap_rating_id integer unsigned NOT NULL,
  -- Sum (total) of all the ratings for this article revision
  aap_total integer unsigned NOT NULL,
  -- Number of ratings
  aap_count integer unsigned NOT NULL,
  -- One rating row per page
  PRIMARY KEY (aap_page_id, aap_rating_id)
) /*$wgDBTableOptions*/;