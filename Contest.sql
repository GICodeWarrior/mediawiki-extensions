-- MySQL version of the database schema for the Contest extension.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

-- Contests
CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/contests (
  contest_id                   SMALLINT unsigned   NOT NULL auto_increment PRIMARY KEY,
  contest_name                 VARCHAR(255)        NOT NULL, -- String indentifier for the Contest
  contest_enabled              TINYINT             NOT NULL default '0', -- If the survey can be taken by users
) /*$wgDBTableOptions*/;

-- Contestants
CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/contest_contestants (
  contestant_id                INT(10) unsigned    NOT NULL auto_increment PRIMARY KEY,
  contestant_contest_id        SMALLINT unsigned   NOT NULL,
  contestant_user_id           INT(10) unsigned    NOT NULL,
  
  contestant_full_name         VARCHAR(255)        NOT NULL,
  contestant_user_name         VARCHAR(255)        NOT NULL,
  contestant_email             TINYBLOB            NOT NULL,
  
  contestant_country           VARCHAR(255)        NOT NULL,
  contestant_submission        INT(10) unsigned    NOT NULL, -- TODO
) /*$wgDBTableOptions*/;

-- Judge votes
CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/contest_votes (
  vote_id                      INT(10) unsigned    NOT NULL auto_increment PRIMARY KEY,
  vote_contest_id              SMALLINT unsigned   NOT NULL,
  vote_contestant_id           INT(10) unsigned    NOT NULL,
  vote_user_id                 INT(10) unsigned    NOT NULL,
) /*$wgDBTableOptions*/;