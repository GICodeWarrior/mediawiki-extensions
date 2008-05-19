-- (c) Aaron Schulz, 2007
-- Table structure for table `Flagged Revisions`
-- Replace /*$wgDBprefix*/ with the proper prefix

-- Add page metadata for flaggedrevs
CREATE TABLE /*$wgDBprefix*/flaggedpages (
  -- Foreign key to page.page_id
  fp_page_id integer NOT NULL,
  -- Is the page reviewed up to date?
  fp_reviewed bool NOT NULL default '0',
  -- Foreign key to flaggedrevs.fr_rev_id
  fp_stable integer NULL,
  -- The highest quality of the page's reviewed revisions.
  -- Note that this may not be set to display by default though.
  fp_quality tinyint(1) default NULL,
  
  PRIMARY KEY (fp_page_id),
  INDEX fp_reviewed_page (fp_reviewed,fp_page_id),
  INDEX fp_quality_page (fp_quality,fp_page_id)
) TYPE=InnoDB;

-- This stores all of our rev reviews
CREATE TABLE /*$wgDBprefix*/flaggedrevs (
  -- Foreign key to page.page_id
  fr_page_id integer NOT NULL,
  -- Foreign key to revision.rev_id
  fr_rev_id integer NOT NULL,
  -- Foreign key to user.user_id
  fr_user int(5) NOT NULL,
  fr_timestamp char(14) NOT NULL,
  fr_comment mediumblob NOT NULL default '',
  -- Store the precedence level
  fr_quality tinyint(1) NOT NULL default 0,
  -- Store tag metadata as newline separated, 
  -- colon separated tag:value pairs
  fr_tags mediumblob NOT NULL default '',
  -- Store the text with all transclusions resolved
  -- This will trade space for speed
  fr_text mediumblob NOT NULL default '',
  -- Comma-separated list of flags:
  -- gzip: text is compressed with PHP's gzdeflate() function.
  -- utf8: in UTF-8
  -- external: the fr_text column is a url to an external storage object
  fr_flags tinyblob NOT NULL,
  -- Parameters for revisions of Image pages:
  -- Name of included image (NULL if n/a)
  fr_img_name varchar(255) binary NULL default NULL,
  -- Timestamp of file (when uploaded) (NULL if n/a)
  fr_img_timestamp char(14) NULL default NULL,
  -- Statistically unique SHA-1 key (NULL if n/a)
  fr_img_sha1 varbinary(32) NULL default NULL,
  
  PRIMARY KEY (fr_page_id,fr_rev_id),
  INDEX fr_img_sha1 (fr_img_sha1),
  INDEX page_qal_rev (fr_page_id,fr_quality,fr_rev_id)
) TYPE=InnoDB;

-- This stores settings on how to select the default revision
CREATE TABLE /*$wgDBprefix*/flaggedpage_config (
  fpc_page_id integer NOT NULL,
  -- Integers to represent what to show by default:
  -- 0: quality -> stable -> current
  -- 1: latest reviewed
  fpc_select integer NOT NULL,
  -- Override the page?
  fpc_override bool NOT NULL,
  -- Field for time-limited settings
  fpc_expiry varbinary(14) NOT NULL default 'infinity',
  
  PRIMARY KEY (fpc_page_id),
  INDEX (fpc_expiry)
) TYPE=InnoDB;

-- This stores all of our transclusion revision pointers
CREATE TABLE /*$wgDBprefix*/flaggedtemplates (
  ft_rev_id integer NOT NULL,
  -- Namespace and title of included page
  ft_namespace int NOT NULL default '0',
  ft_title varchar(255) binary NOT NULL default '',
  -- Revisions ID used when reviewed
  ft_tmp_rev_id integer NULL,
  
  PRIMARY KEY (ft_rev_id,ft_namespace,ft_title)
) TYPE=InnoDB;

-- This stores all of our image revision pointers
CREATE TABLE /*$wgDBprefix*/flaggedimages (
  fi_rev_id integer NOT NULL,
  -- Name of included image
  fi_name varchar(255) binary NOT NULL default '',
  -- Timestamp of image used when reviewed
  fi_img_timestamp char(14) NOT NULL default '',
  -- Statistically unique SHA-1 key
  fi_img_sha1 varbinary(32) NOT NULL default '',
  
  PRIMARY KEY (fi_rev_id,fi_name)
) TYPE=InnoDB;

-- This stores user demotions and stats
CREATE TABLE /*$wgDBprefix*/flaggedrevs_promote (
  -- Foreign key to user.user_id
  frp_user_id integer NOT NULL,
  frp_user_params mediumblob NOT NULL default '',
  
  PRIMARY KEY (frp_user_id)
) TYPE=InnoDB;
