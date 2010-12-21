-- MySQL version of the database schema for the Live Translate extension.

-- Special translations table
CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/live_translate (
  word_id                 INT(8) unsigned   NOT NULL,
  word_language           VARCHAR(255)      NOT NULL,
  word_translation        VARCHAR(255)      NOT NULL,
  word_primary            INT(1) unsigned   NOT NULL
) /*$wgDBTableOptions*/;

CREATE INDEX word_translation ON /*$wgDBprefix*/live_translate (word_id, word_language);