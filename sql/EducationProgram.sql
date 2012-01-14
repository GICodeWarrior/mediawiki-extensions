-- MySQL version of the database schema for the Education Program extension.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

-- Organizations, ie universities
CREATE TABLE IF NOT EXISTS /*_*/ep_orgs (
  org_id                     INT unsigned        NOT NULL auto_increment PRIMARY KEY,

  org_name                   VARCHAR(255)        NOT NULL, -- Name of the organization
  org_city                   VARCHAR(255)        NOT NULL, -- Name of the city where the org is located
  org_country                VARCHAR(255)        NOT NULL, -- Name of the country where the org is located

  org_active                 TINYINT unsigned    NOT NULL, -- If the org has any active terms
  org_courses                SMALLINT unsigned   NOT NULL, -- Amount of courses
  org_terms                  SMALLINT unsigned   NOT NULL, -- Amount of terms
  org_mentors                SMALLINT unsigned   NOT NULL, -- Amount of mentors
  org_students               INT unsigned        NOT NULL -- Amount of students
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_org_name ON /*_*/ep_orgs (org_name);
CREATE INDEX /*i*/ep_org_terms ON /*_*/ep_orgs (org_terms);
CREATE INDEX /*i*/ep_org_courses ON /*_*/ep_orgs (org_courses);
CREATE INDEX /*i*/ep_org_mentors ON /*_*/ep_orgs (org_mentors);
CREATE INDEX /*i*/ep_org_students ON /*_*/ep_orgs (org_students);
CREATE INDEX /*i*/ep_org_active ON /*_*/ep_orgs (org_active);

-- Courses. These describe a specific course, time-independent.
CREATE TABLE IF NOT EXISTS /*_*/ep_courses (
  course_id                  INT unsigned        NOT NULL auto_increment PRIMARY KEY,

  course_org_id              INT unsigned        NOT NULL, -- Foreign key on ep_orgs.org_id
  course_name                VARCHAR(255)        NOT NULL, -- Name of the course
  course_description         TEXT                NOT NULL, -- Description of the course
  course_lang                VARCHAR(10)         NOT NULL, -- Language (code)
  course_instructors         BLOB                NOT NULL, -- List of associated instructors

  course_active              TINYINT unsigned    NOT NULL, -- If the course has any active terms
  course_students            SMALLINT unsigned   NOT NULL -- Amount of students
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_course_org_id ON /*_*/ep_courses (course_org_id);
CREATE UNIQUE INDEX /*i*/ep_course_name ON /*_*/ep_courses (course_name);
CREATE INDEX /*i*/ep_course_lang ON /*_*/ep_courses (course_lang);
CREATE INDEX /*i*/ep_course_students ON /*_*/ep_courses (course_students);
CREATE INDEX /*i*/ep_course_active ON /*_*/ep_courses (course_active);

-- Terms. These are "instances" of a course in a certain period.
CREATE TABLE IF NOT EXISTS /*_*/ep_terms (
  term_id                    INT unsigned        NOT NULL auto_increment PRIMARY KEY,

  term_course_id             INT unsigned        NOT NULL, -- Foreign key on ep_courses.course_id
  term_org_id                INT unsigned        NOT NULL, -- Foreign key on ep_orgs.org_id. Helper field, not strictly needed.
  term_year                  SMALLINT unsigned   NOT NULL, -- Yeah in which the term takes place
  term_start                 varbinary(14)       NOT NULL, -- Start time of the term
  term_end                   varbinary(14)       NOT NULL, -- End time of the term
  term_description           TEXT                NOT NULL, -- Description of the term
  term_online_ambs           BLOB                NOT NULL, -- List of associated online abmassadors
  term_campus_ambs           BLOB                NOT NULL, -- List of associated campus abmassadors
  term_token                 VARCHAR(255)        NOT NULL -- Token needed to enroll
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_term_year ON /*_*/ep_terms (term_year);
CREATE INDEX /*i*/ep_term_start ON /*_*/ep_terms (term_start);
CREATE INDEX /*i*/ep_term_end ON /*_*/ep_terms (term_end);
CREATE UNIQUE INDEX /*i*/ep_trem_period ON /*_*/ep_terms (term_org_id, term_start, term_start);

-- Students. In essence this is an extension to the user table.
CREATE TABLE IF NOT EXISTS /*_*/ep_students (
  student_id                 INT unsigned        NOT NULL auto_increment PRIMARY KEY,

  student_user_id            INT unsigned        NOT NULL, -- Foreign key on user.user_id
  student_first_enroll       varbinary(14)       NOT NULL, -- Time of first enrollment

  student_last_active        varbinary(14)       NOT NULL, -- Time of last activity
  student_active_enroll      TINYINT unsigned    NOT NULL -- If the student is enrolled in any active terms
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ep_students_user_id ON /*_*/ep_students (student_user_id);
CREATE INDEX /*i*/ep_students_first_enroll ON /*_*/ep_students (student_first_enroll);
CREATE INDEX /*i*/ep_students_last_active ON /*_*/ep_students (student_last_active);
CREATE INDEX /*i*/ep_students_active_enroll ON /*_*/ep_students (student_active_enroll);

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
