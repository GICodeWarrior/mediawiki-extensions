-- Add page metadata for flaggedrevs
CREATE TABLE /*$wgDBprefix*/flaggedpages (
  -- Foreign key to page.page_id
  fp_page_id integer NOT NULL,
  -- Is the page reviewed up to date?
  fp_reviewed bool NULL,
  -- Foreign key to flaggedrevs.fr_rev_id
  fp_stable integer NULL,
  -- The highest quality of the page's reviewed revisions.
  -- Note that this may not be set to display by default though.
  fp_quality tinyint(1) default NULL,
  
  PRIMARY KEY (fp_page_id),
  INDEX fp_reviewed_page (fp_reviewed,fp_page_id),
  INDEX fp_quality_page (fp_quality,fp_page_id)
) TYPE=InnoDB;

-- Migrate old page_ext hacks over
INSERT INTO /*$wgDBprefix*/flaggedpages (fp_page_id,fp_reviewed,fp_stable,fp_quality)
SELECT page_id,page_ext_reviewed,page_ext_stable,page_ext_quality FROM /*$wgDBprefix*/page;

-- Leave the old fields and indexes for now
