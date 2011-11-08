CREATE TABLE IF NOT EXISTS /*_*/aft_article_feedback (
  -- Row ID (primary key)
  aa_id               integer unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  -- Foreign key to page.page_id
  aa_page_id         integer unsigned NOT NULL,
  -- User Id (0 if anon)
  aa_user_id         integer NOT NULL,
  -- Username or IP address
  aa_user_text       varbinary(255) NOT NULL,
  -- Unique token for anonymous users (to facilitate ratings from multiple users on the same IP)
  aa_user_anon_token varbinary(32) NOT NULL DEFAULT '',
  aa_ip_address      varchar(32),
  -- Foreign key to revision.rev_id
  aa_revision        integer unsigned NOT NULL,
  -- Which rating widget the user was given. Default of 0 is the "old" design
  aa_design_bucket   int unsigned NOT NULL DEFAULT 0,
  aa_is_submitted    boolean DEFAULT FALSE,
  aa_created         timestamp NULL,
  aa_modified        timestamp NULL
) /*$wgDBTableOptions*/;
CREATE INDEX /*i*/aa_page_user_token_id ON /*_*/aft_article_feedback (aa_page_id, aa_user_text, aa_user_anon_token, aa_id);
CREATE INDEX /*i*/aa_revision ON /*_*/aft_article_feedback (aa_revision);
-- Create an index on the article_feedback.aa_timestamp field
CREATE INDEX /*i*/article_feedback_timestamp ON /*_*/aft_article_feedback (aa_created);
CREATE INDEX /*i*/aa_page_id ON /*_*/aft_article_feedback (aa_page_id, aa_created);

CREATE TABLE IF NOT EXISTS /*_*/aft_article_field_group (
    aafg_id   integer unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    aafg_name varchar(255) NOT NULL UNIQUE
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_field (
    aaf_id        integer unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    aaf_name      varchar(255) NOT NULL UNIQUE,
    aaf_data_type ENUM('text', 'boolean', 'rating', 'select'),
    -- FKey to article_field_groups.group_id
    aafg_group_id  integer unsigned NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_field_option (
    aafo_option_id integer unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    aafo_name      varchar(255) NOT NULL
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_answer (
    -- FKEY to article_feedback.aa_id)
    aaaa_feedback_id        integer unsigned NOT NULL,
    -- FKEY to article_fields.article_field_id)
    aaaa_field_id           integer unsigned NOT NULL,
    aaaa_response_rating    integer NULL,
    aaaa_response_text      text NULL,
    aaaa_response_boolean   boolean NULL,
    -- FKey to article_field_options.option_id)
    aaaa_response_option_id integer unsigned NULL,
    PRIMARY KEY (aaaa_feedback_id, aaaa_field_id)
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_feedback_ratings_rollup (
  aap_page_id   integer unsigned NOT NULL,
  aap_rating_id integer unsigned NOT NULL,
  aap_total     integer unsigned NOT NULL,
  aap_count     integer unsigned NOT NULL,
  PRIMARY KEY (aap_page_id, aap_rating_id)
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_revision_feedback_ratings_rollup (
  afr_page_id      integer unsigned NOT NULL,
  afr_revision_id  integer unsigned NOT NULL,
  afr_rating_id    integer unsigned NOT NULL,
  afr_total        integer unsigned NOT NULL,
  afr_count        integer unsigned NOT NULL,
  PRIMARY KEY (afr_page_id, afr_rating_id, afr_revision)
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_feedback_select_rollup (
    aafsr_page_id   integer unsigned NOT NULL,
    aafsr_option_id integer unsigned NOT NULL,
    aafsr_total     integer unsigned NOT NULL,
    aafsr_count     integer unsigned NOT NULL,
    PRIMARY KEY (aafsr_page_id, aafsr_option_id)
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_revision_feedback_select_rollup (
    aarfsr_page_id     integer unsigned NOT NULL,
    aarfsr_revision_id integer unsigned NOT NULL,
    aarfsr_option_id   integer unsigned NOT NULL,
    aarfsr_total       integer unsigned NOT NULL,
    aarfsr_count       integer unsigned NOT NULL,
    PRIMARY KEY (aarfsr_revision_id, aarfsr_option_id)
) /*$wgDBTableOptions*/;

CREATE TABLE IF NOT EXISTS /*_*/aft_article_hits (
    -- FKey to pages
    aah_page_id     integer unsigned NOT NULL,
    -- FKey to revisions
    aah_revision_id integer unsigned NOT NULL,
    aah_bucket_id   integer unsigned NOT NULL,
    aah_hits	    integer unsigned DEFAULT 0,
    PRIMARY KEY (aah_page_id, aah_revision_id)
) /*$wgDBTableOptions*/;


-- TODO: Add indices
