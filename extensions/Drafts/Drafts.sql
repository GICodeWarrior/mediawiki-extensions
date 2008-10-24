create table /*$wgDBPrefix*/drafts (
    draft_id INTEGER AUTO_INCREMENT,
    draft_token INTEGER,
    draft_user INTEGER,
    draft_namespace INTEGER,
    draft_title VARBINARY(255),
    draft_section INTEGER,
    draft_starttime BINARY(14),
    draft_edittime BINARY(14),
    draft_savetime BINARY(14),
    draft_scrolltop INTEGER,
    draft_text BLOB,
    draft_summary TINYBLOB,
    draft_minoredit BOOL,
    PRIMARY KEY draft_id (draft_id),
    INDEX draft_user_savetime (
        draft_user,
        draft_savetime
    ),
    INDEX draft_user_namespace_title_savetime (
        draft_user,
        draft_namespace,
        draft_title,
        draft_savetime
    ),
    INDEX draft_savetime (draft_savetime)
) /*$wgDBTableOptions*/;
