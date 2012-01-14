-- SQL for the Education Program extension.
-- Adds additional fields.
-- Licence: GNU GPL v3+
-- Author: Jeroen De Dauw < jeroendedauw@gmail.com >

ALTER TABLE /*_*/ep_terms ADD COLUMN term_students SMALLINT unsigned NOT NULL default 0;

CREATE INDEX /*i*/ep_term_students ON /*_*/ep_terms (term_students);