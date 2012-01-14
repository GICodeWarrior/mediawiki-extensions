-- SQL for the Education Program extension.
-- Adds additional fields.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

ALTER TABLE /*_*/ep_courses ADD COLUMN course_instructors BLOB NOT NULL;

ALTER TABLE /*_*/ep_terms ADD COLUMN term_online_ambs BLOB NOT NULL;
ALTER TABLE /*_*/ep_terms ADD COLUMN term_campus_ambs BLOB NOT NULL;
