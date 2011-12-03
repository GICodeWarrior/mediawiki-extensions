-- MySQL version of the database schema for the Education Program extension.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

-- Organizations, ie universities
CREATE TABLE IF NOT EXISTS /*_*/ep_orgs (
  org_id                     INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  org_name                   VARCHAR(255)        NOT NULL,
  org_city                   VARCHAR(255)        NOT NULL,
  org_country                VARCHAR(255)        NOT NULL,
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/wep_org_name ON /*_*/wep_orgs (org_name);

-- Courses (still need to figure if these are term instances or not)
CREATE TABLE IF NOT EXISTS /*_*/ep_courses (
  course_id                  INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  course_org_id              INT unsigned        NOT NULL,
  course_name                VARCHAR(255)        NOT NULL,
  course_year                SMALLINT unsigned   NOT NULL,
  course_start               varbinary(14)       NOT NULL,
  course_end                 varbinary(14)       NOT NULL,
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_course_org_id ON /*_*/ep_courses (course_org_id);
CREATE INDEX /*i*/ep_course_name ON /*_*/ep_courses (course_name);
CREATE INDEX /*i*/ep_course_year ON /*_*/ep_courses (course_year);

-- Students
CREATE TABLE IF NOT EXISTS /*_*/ep_students (
  student_id                 INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  student_user_id            INT unsigned        NOT NULL,
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_students_user_id ON /*_*/ep_students (student_user_id);

-- Students
CREATE TABLE IF NOT EXISTS /*_*/wep_mentors (
  mentor_id                  INT unsigned        NOT NULL auto_increment PRIMARY KEY,
  mentor_user_id             INT unsigned        NOT NULL,
) /*$wgDBTableOptions*/;

CREATE INDEX /*i*/ep_mentors_user_id ON /*_*/ep_students (mentor_user_id);