-- MySQL version of the database schema for the Reviews extension.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

-- Reviews
CREATE TABLE IF NOT EXISTS /*_*/reviews (
  review_id                    INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  review_page_id               INT unsigned        NOT NULL, -- Foreign key on page.page_id
  review_user_id               INT unsigned        NOT NULL, -- Foreign key on user.user_id
  review_title                 VARCHAR(255)        NOT NULL, -- Review title
  review_text                  TEXT                NOT NULL, -- Review text
  review_post_time             varbinary(14)       NOT NULL, -- Time when the review was posted
  review_edit_time             varbinary(14)       NOT NULL, -- Time when the review was editted
  review_state                 TINYINT unsigned    NOT NULL, -- State (new, flagged, reviewed)
  review_rating                TINYINT unsigned    NOT NULL -- Main rating
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/review_page_user ON /*_*/reviews (review_page_id, review_user_id);
CREATE INDEX /*i*/review_time ON /*_*/reviews (review_time);
CREATE INDEX /*i*/review_state ON /*_*/reviews (review_state);
CREATE INDEX /*i*/review_rating ON /*_*/reviews (review_rating);

-- Category specific review ratings
CREATE TABLE IF NOT EXISTS /*_*/review_ratings (
  rating_id                    INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  rating_review_id             INT unsigned        NOT NULL,
  rating_type                  TINYINT unsigned    NOT NULL
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/rrating_review_type ON /*_*/review_ratings (rating_review_id, rating_type);
