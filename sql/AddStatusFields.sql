-- SQL for the Education Program extension.
-- Adds additional fields.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

ALTER TABLE /*_*/ep_orgs ADD COLUMN org_active TINYINT unsigned NOT NULL default 1;

CREATE INDEX /*i*/ep_org_active ON /*_*/ep_orgs (org_active);

ALTER TABLE /*_*/ep_courses ADD COLUMN course_active TINYINT unsigned NOT NULL default 1;

CREATE INDEX /*i*/ep_course_active ON /*_*/ep_courses (course_active);