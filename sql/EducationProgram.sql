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
  course_name                VARCHAR(255)        NOT NULL, -- Name of the course
  course_description         TEXT                NOT NULL -- Description of the course
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_course_org_id ON /*_*/ep_courses (course_org_id);
CREATE UNIQUE INDEX /*i*/ep_course_name ON /*_*/ep_courses (course_name);

-- Terms. These are "instances" of a course in a certain period.
CREATE TABLE IF NOT EXISTS /*_*/ep_terms (
  term_id                    INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  term_course_id             INT unsigned        NOT NULL, -- Foreign key on ep_courses.course_id
  term_org_id                INT unsigned        NOT NULL, -- Foreign key on ep_orgs.org_id. Helper field, not strictly needed.
  term_year                  SMALLINT unsigned   NOT NULL, -- Yeah in which the term takes place
  term_start                 varbinary(14)       NOT NULL, -- Start time of the term
  term_end                   varbinary(14)       NOT NULL, -- End time of the term
  term_description           TEXT                NOT NULL, -- Description of the term
  term_token                 VARCHAR(255)        NOT NULL -- Token needed to enroll
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_term_year ON /*_*/ep_terms (term_year);
CREATE INDEX /*i*/ep_term_start ON /*_*/ep_terms (term_start);
CREATE INDEX /*i*/ep_term_end ON /*_*/ep_terms (term_end);

-- Students. In essence this is an extension to the user table.
CREATE TABLE IF NOT EXISTS /*_*/ep_students (
  student_id                 INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  student_user_id            INT unsigned        NOT NULL -- Foreign key on user.user_id
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_students_user_id ON /*_*/ep_students (student_user_id);

-- Mentors. In essence this is an extension to the user table.
CREATE TABLE IF NOT EXISTS /*_*/ep_mentors (
  mentor_id                  INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  mentor_user_id             INT unsigned        NOT NULL -- Foreign key on user.user_id
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_mentors_user_id ON /*_*/ep_mentors (mentor_user_id);

-- Links a term with all it's students.
CREATE TABLE IF NOT EXISTS /*_*/ep_students_per_term (
  spt_student_id             INT unsigned        NOT NULL, -- Foreign key on ep_students.student_id
  spt_term_id                INT unsigned        NOT NULL -- Foreign key on ep_terms.term_id
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_students_per_term ON /*_*/ep_students_per_term (spt_student_id, spt_term_id);

-- Links an org with all it's mentors.
CREATE TABLE IF NOT EXISTS /*_*/ep_mentors_per_org (
  mpo_mentor_id              INT unsigned        NOT NULL, -- Foreign key on ep_mentors.mentor_id
  mpo_org_id                 INT unsigned        NOT NULL -- Foreign key on ep_orgs.org_id
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_mentors_per_org ON /*_*/ep_mentors_per_org (mpo_mentor_id, mpo_org_id);

-- Revision table, holding blobs of various types of objects, such as orgs or students.
-- This is somewhat based on the (core) revision table and is meant to serve
-- as a prototype for a more general system to store this kind of data in a versioned fashion.  
CREATE TABLE IF NOT EXISTS /*_*/ep_revisions (
  rev_id                     INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  rev_type                   varbinary(32)       NOT NULL,
  rev_comment                TINYBLOB            NOT NULL,
  rev_user_id                INT unsigned        NOT NULL default 0,
  rev_user_text              varbinary(255)      NOT NULL,
  rev_time                   varbinary(14)       NOT NULL,
  rev_minor_edit             TINYINT unsigned    NOT NULL default 0,
  rev_deleted                TINYINT unsigned    NOT NULL default 0,
  rev_data                   BLOB                NOT NULL
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_revision_type ON /*_*/ep_revisions (rev_type);
CREATE INDEX /*i*/ep_revision_user_id ON /*_*/ep_revisions (rev_user_id);
CREATE INDEX /*i*/ep_revision_user_text ON /*_*/ep_revisions (rev_user_text);
CREATE INDEX /*i*/ep_revision_time ON /*_*/ep_revisions (rev_time);
CREATE INDEX /*i*/ep_revision_minor_edit ON /*_*/ep_revisions (rev_minor_edit);
CREATE INDEX /*i*/ep_revision_deleted ON /*_*/ep_revisions (rev_deleted);

-- TODO: figure out how to best do logging.
-- Can the core stuff be used in a sane way for this?