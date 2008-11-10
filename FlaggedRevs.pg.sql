-- (c) Aaron Schulz, 2007
-- See FlaggedRevs.sql for details

BEGIN;

CREATE TABLE flaggedpages (
  fp_page_id        INTEGER NOT NULL DEFAULT 0,
  fp_reviewed       INTEGER NOT NULL DEFAULT 0,
  fp_pending_since  TIMESTAMPTZ NULL,
  fp_stable         INTEGER NOT NULL DEFAULT 0,
  fp_quality        INTEGER NULL default NULL,
  PRIMARY KEY (fp_page_id)
);
CREATE INDEX fp_reviewed_page ON flaggedpages (fp_reviewed,fp_page_id);
CREATE INDEX fp_quality_page ON flaggedpages (fp_quality,fp_page_id);
CREATE INDEX fp_pending_since ON flaggedpages (fp_pending_since);

CREATE TABLE flaggedrevs (
  fr_page_id       INTEGER    NOT NULL DEFAULT 0,
  fr_rev_id        INTEGER    NOT NULL DEFAULT 0,
  fr_user          INTEGER    NULL REFERENCES mwuser(user_id) ON DELETE SET NULL,
  fr_timestamp     TIMESTAMPTZ,
  fr_comment       TEXT        NOT NULL DEFAULT '',
  fr_quality       INTEGER    NOT NULL DEFAULT 0,
  fr_tags          TEXT        NOT NULL DEFAULT '',
  fr_text          TEXT        NOT NULL DEFAULT '',
  fr_flags         TEXT        NOT NULL,
  fr_img_name      TEXT        NULL DEFAULT NULL,
  fr_img_timestamp TIMESTAMPTZ NULL DEFAULT NULL,
  fr_img_sha1      TEXT        NULL DEFAULT NULL,
  PRIMARY KEY (fr_page_id,fr_rev_id)
);
CREATE INDEX page_qal_rev ON flaggedrevs (fr_page_id,fr_quality,fr_rev_id);
CREATE INDEX fr_img_sha1 ON flaggedrevs (fr_img_sha1);

CREATE TABLE flaggedpage_config (
  fpc_page_id   INTEGER     NOT NULL PRIMARY KEY DEFAULT 0,
  fpc_select    INTEGER     NOT NULL DEFAULT 0,
  fpc_override  INTEGER     NOT NULL,
  fpc_expiry    TIMESTAMPTZ  NULL
);
CREATE INDEX fpc_expiry ON flaggedpage_config (fpc_expiry);

CREATE TABLE flaggedtemplates (
  ft_rev_id      INTEGER  NOT NULL DEFAULT 0 ,
  ft_namespace   SMALLINT NOT NULL DEFAULT 0,
  ft_title       TEXT      NOT NULL DEFAULT '',
  ft_tmp_rev_id  INTEGER  NOT NULL DEFAULT 0,
  PRIMARY KEY (ft_rev_id,ft_namespace,ft_title)
);

CREATE TABLE flaggedimages (
  fi_rev_id         INTEGER    NOT NULL DEFAULT 0,
  fi_name           TEXT        NOT NULL DEFAULT '',
  -- MW timestamp
  fi_img_timestamp  TIMESTAMPTZ NOT NULL,
  fi_img_sha1       CHAR(64)   NOT NULL DEFAULT '',
  PRIMARY KEY (fi_rev_id,fi_name)
);

CREATE TABLE flaggedrevs_tracking (
  ftr_from       INTEGER   NOT NULL DEFAULT 0,
  ftr_namespace  SMALLINT  NOT NULL DEFAULT 0,
  ftr_title      TEXT       NOT NULL DEFAULT '',
  PRIMARY KEY (ftr_from,ftr_namespace,ftr_title)
);
CREATE INDEX namespace_title_from ON flaggedrevs_tracking (ftr_namespace,ftr_title,ftr_from);

CREATE TABLE flaggedrevs_promote (
  frp_user_id INTEGER NOT NULL PRIMARY KEY default 0,
  frp_user_params TEXT NOT NULL default ''
);

CREATE TABLE reader_feedback (
  rfb_rev_id   INTEGER   NOT NULL DEFAULT 0,
  rfb_user     INTEGER   NULL REFERENCES mwuser(user_id) ON DELETE SET NULL,
  rfb_ip       TEXT       NOT NULL DEFAULT '',
  PRIMARY KEY (rfb_rev_id,rfb_user,rfb_ip)
);

CREATE TABLE reader_feedback_history (
  rfh_page_id  INTEGER   NOT NULL DEFAULT 0,
  rfh_tag      TEXT       NOT NULL DEFAULT '',
  rfh_total    INTEGER   NOT NULL DEFAULT 0,
  rfh_count    INTEGER   NOT NULL DEFAULT 0,
  -- MW date of the day this average corresponds to
  rfh_date     TEXT       NOT NULL DEFAULT '',
  PRIMARY KEY (rfh_page_id,rfh_tag,rfh_date)
);

CREATE TABLE reader_feedback_pages (
  rfp_page_id  INTEGER     NOT NULL DEFAULT 0,
  rfp_tag      TEXT         NOT NULL DEFAULT '',
  rfp_ave_val  REAL         NOT NULL DEFAULT 0,
  rfp_count    INTEGER     NOT NULL DEFAULT 0,
  rfp_touched  TIMESTAMPTZ  NULL,
  PRIMARY KEY (rfp_page_id,rfp_tag)
);
CREATE INDEX rfp_tag_val_page ON reader_feedback_pages (rfp_tag,rfp_ave_val,rfp_page_id);

COMMIT;
