-- MySQL version of the database schema for the Education Program extension.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

-- Organizations, ie universities
CREATE TABLE IF NOT EXISTS /*_*/ep_orgs (
  org_id                     INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  org_name                   VARCHAR(255)        NOT NULL, -- Name of the organization
  org_city                   VARCHAR(255)        NOT NULL, -- Name of the city where the org is located
  org_country                VARCHAR(255)        NOT NULL -- Name of the country where the org is located
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_org_name ON /*_*/ep_orgs (org_name);

-- Courses. These describe a specific course, time-independent.
CREATE TABLE IF NOT EXISTS /*_*/ep_courses (
  course_id                  INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  course_org_id              INT unsigned        NOT NULL, -- Foreign key on ep_orgs.org_id
  course_name                VARCHAR(255)        NOT NULL -- Name of the course
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_course_org_id ON /*_*/ep_courses (course_org_id);
CREATE UNIQUE INDEX /*i*/ep_course_name ON /*_*/ep_courses (course_name);

-- Terms. These are "instances" of a course in a certain period.
CREATE TABLE IF NOT EXISTS /*_*/ep_terms (
  term_id                    INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  term_course_id             INT unsigned        NOT NULL, -- Foreign key on ep_courses.course_id
  term_year                  SMALLINT unsigned   NOT NULL, -- Yeah in which the term takes place
  term_start                 varbinary(14)       NOT NULL, -- Start time of the term
  term_end                   varbinary(14)       NOT NULL -- End time of the term
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_term_year ON /*_*/ep_terms (term_year);
CREATE INDEX /*i*/ep_term_start ON /*_*/ep_terms (term_start);
CREATE INDEX /*i*/ep_term_end ON /*_*/ep_terms (term_end);

---- Students. In essence this is an extension to the user table.
--CREATE TABLE IF NOT EXISTS /*_*/ep_students (
--  student_id                 INT unsigned        NOT NULL auto_increment PRIMARY KEY,
--  student_user_id            INT unsigned        NOT NULL -- Foreign key on user.user_id
--) /*$wgDBTableOptions*/;
--
--CREATE UNIQUE INDEX /*i*/ep_students_user_id ON /*_*/ep_students (student_user_id);
--
---- Mentors. In essence this is an extension to the user table.
--CREATE TABLE IF NOT EXISTS /*_*/ep_mentors (
--  mentor_id                  INT unsigned        NOT NULL auto_increment PRIMARY KEY,
--  mentor_user_id             INT unsigned        NOT NULL -- Foreign key on user.user_id
--) /*$wgDBTableOptions*/;
--
--CREATE UNIQUE INDEX /*i*/ep_mentors_user_id ON /*_*/ep_mentors (mentor_user_id);

CREATE TABLE IF NOT EXISTS /*_*/ep_students_per_term (
  student_user_id            INT unsigned        NOT NULL, -- Foreign key on user.user_id
  student_term_id            INT unsigned        NOT NULL -- Foreign key on ep_terms.term_id
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_students_per_term ON /*_*/ep_students_per_term (student_user_id, student_term_id);

CREATE TABLE IF NOT EXISTS /*_*/ep_mentors_per_org (
  mentor_user_id             INT unsigned        NOT NULL, -- Foreign key on user.user_id
  mentor_org_id              INT unsigned        NOT NULL -- Foreign key on ep_orgs.org_id
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_mentors_per_org ON /*_*/ep_mentors_per_org (mentor_user_id, mentor_org_id);