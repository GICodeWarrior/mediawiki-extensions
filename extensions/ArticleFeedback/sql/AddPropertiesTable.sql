CREATE TABLE /*_*/article_feedback_properties (
  -- Keys to the primary key fields in article_feedback, except aa_rating_id
  -- article_feedback doesn't have a nice PK, blegh
  afp_revision integer unsigned NOT NULL,
  afp_user_text varbinary(255) NOT NULL,
  afp_user_anon_token binary(32) DEFAULT '',

  -- Key/value pairs
  afp_key varbinary(255) NOT NULL,
  afp_value integer signed NOT NULL
) /*$wgDBTableOptions*/;
CREATE UNIQUE INDEX /*i*/afp_rating_key ON /*_*/article_feedback_properties (afp_revision, afp_user_text, afp_user_anon_token, afp_key);
