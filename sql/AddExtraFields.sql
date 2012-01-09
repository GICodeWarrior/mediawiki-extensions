-- SQL for the Education Program extension.
-- Adds additional fields.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

ALTER TABLE /*_*/ep_orgs ADD COLUMN org_courses SMALLINT unsigned NOT NULL;
ALTER TABLE /*_*/ep_orgs ADD COLUMN org_mentors SMALLINT unsigned NOT NULL;
ALTER TABLE /*_*/ep_orgs ADD COLUMN org_terms SMALLIN1T unsigned NOT NULL;
ALTER TABLE /*_*/ep_orgs ADD COLUMN org_students INT unsigned NOT NULL;

CREATE INDEX /*i*/ep_org_courses ON /*_*/ep_orgs (org_courses);
CREATE INDEX /*i*/ep_org_mentors ON /*_*/ep_orgs (org_mentors);
CREATE INDEX /*i*/ep_org_terms ON /*_*/ep_orgs (org_terms);
CREATE INDEX /*i*/ep_org_students ON /*_*/ep_orgs (org_students);

ALTER TABLE /*_*/ep_courses ADD COLUMN course_lang VARCHAR(10) NOT NULL;
ALTER TABLE /*_*/ep_courses ADD COLUMN course_students SMALLINT unsigned NOT NULL;

CREATE INDEX /*i*/ep_course_lang ON /*_*/ep_courses (course_lang);
CREATE INDEX /*i*/ep_course_students ON /*_*/ep_courses (course_students);

ALTER TABLE /*_*/ep_students ADD COLUMN student_first_enroll varbinary(14) NOT NULL;
ALTER TABLE /*_*/ep_students ADD COLUMN student_last_active varbinary(14) NOT NULL;
ALTER TABLE /*_*/ep_students ADD COLUMN student_active_enroll TINYINT unsigned NOT NULL;

CREATE INDEX /*i*/ep_students_first_enroll ON /*_*/ep_students (student_first_enroll);
CREATE INDEX /*i*/ep_students_last_active ON /*_*/ep_students (student_last_active);
CREATE INDEX /*i*/ep_students_active_enroll ON /*_*/ep_students (student_active_enroll);