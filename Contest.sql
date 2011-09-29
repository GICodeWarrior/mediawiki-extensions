-- MySQL version of the database schema for the Contest extension.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

-- Contests
CREATE TABLE IF NOT EXISTS /*_*/contests (
  contest_id                   SMALLINT unsigned   NOT NULL auto_increment PRIMARY KEY,
  contest_name                 VARCHAR(255)        NOT NULL, -- String indentifier for the contest
  contest_status               TINYINT unsigned    NOT NULL default '0', -- Status of the contest
  contest_submission_count     SMALLINT unsigned   NOT NULL, -- 
  contest_rules_page           VARCHAR(255)        NOT NULL
) /*$wgDBTableOptions*/;

-- Contestants
CREATE TABLE IF NOT EXISTS /*_*/contest_contestants (
  contestant_id                INT unsigned        NOT NULL auto_increment PRIMARY KEY, -- Contestant id (unique id per user per contest)
  contestant_contest_id        SMALLINT unsigned   NOT NULL, -- Foreign key on contests.contest_id
  contestant_challange_id      INT unsigned        NOT NULL, -- Foreign key on contest_challanges.challange_id
  contestant_user_id           INT(10) unsigned    NOT NULL, -- Foreign key on user.user_id
  
  -- These fields will be copied from the user table on contest lock
  contestant_full_name         VARCHAR(255)        NOT NULL, -- Full name of the contestant
  contestant_user_name         VARCHAR(255)        NOT NULL, -- User name of the contestant
  contestant_email             TINYBLOB            NOT NULL, -- Email of the contestant
  
  -- Extra contestant info
  contestant_country           VARCHAR(255)        NOT NULL, -- Country of the contestant
  contestant_volunteer         TINYINT unsigned    NOT NULL, -- If the user is interested in voluneer oportunities
  contestant_wmf               TINYINT unsigned    NOT NULL, -- If the user is interested in a WMF job
  
  contestant_submission        INT(10) unsigned    NOT NULL -- TODO: file shizzle
) /*$wgDBTableOptions*/;

-- Challanges
CREATE TABLE IF NOT EXISTS /*_*/contest_challanges (
  challange_id                INT unsigned        NOT NULL auto_increment PRIMARY KEY, -- Challange id
  challange_contest_id        INT unsigned        NOT NULL,
  challange_text              TEXT                NOT NULL,
  challange_title             VARCHAR(255)        NOT NULL
) /*$wgDBTableOptions*/;

-- Judge votes
CREATE TABLE IF NOT EXISTS /*_*/contest_votes (
  vote_id                      INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  vote_contestant_id           INT unsigned        NOT NULL, -- Foreign key on contest_contestants.contestant_id
  vote_user_id                 INT(10) unsigned    NOT NULL, -- Judge user id
  vote_value                   SMALLINT            NOT NULL -- The value of the vote
) /*$wgDBTableOptions*/;

-- Judge comments
CREATE TABLE IF NOT EXISTS /*_*/contest_comments (
  comment_id                   INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  comment_contestant_id        INT unsigned        NOT NULL, -- Foreign key on contest_contestants.contestant_id
  comment_user_id              INT(10) unsigned    NOT NULL, -- Judge user id
  comment_text                 TEXT                NOT NULL, -- The comment text
  comment_time                 varbinary(14)       NOT NULL default '' -- The time at which the comment was made
) /*$wgDBTableOptions*/;