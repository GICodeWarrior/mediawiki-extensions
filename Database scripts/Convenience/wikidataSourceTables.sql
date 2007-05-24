DROP TABLE IF EXISTS /*$wgWDprefix*/alt_meaningtexts;

CREATE TABLE /*$wgWDprefix*/alt_meaningtexts (
  `meaning_mid` int(10) default NULL,
  `meaning_text_tcid` int(10) default NULL,
  `source_id` int(11) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_meaning` (`remove_transaction_id`,`meaning_mid`,`meaning_text_tcid`,`source_id`),
  KEY `versioned_end_text` (`remove_transaction_id`,`meaning_text_tcid`,`meaning_mid`,`source_id`),
  KEY `versioned_end_source` (`remove_transaction_id`,`source_id`,`meaning_mid`,`meaning_text_tcid`),
  KEY `versioned_start_meaning` (`add_transaction_id`,`meaning_mid`,`meaning_text_tcid`,`source_id`),
  KEY `versioned_start_text` (`add_transaction_id`,`meaning_text_tcid`,`meaning_mid`,`source_id`),
  KEY `versioned_start_source` (`add_transaction_id`,`source_id`,`meaning_mid`,`meaning_text_tcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS /*$wgWDprefix*/bootstrapped_defined_meanings;

CREATE TABLE /*$wgWDprefix*/bootstrapped_defined_meanings (
  `name` varchar(255) NOT NULL,
  `defined_meaning_id` int(11) NOT NULL,
  KEY `unversioned_meaning` (`defined_meaning_id`),
  KEY `unversioned_name` (`name`,`defined_meaning_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO /*$wgWDprefix*/bootstrapped_defined_meanings (name,defined_meaning_id) VALUES 
 ('DefinedMeaning',49),
 ('Definition',52),
 ('SynTrans',55),
 ('Relation',58),
 ('Annotation',61);

DROP TABLE IF EXISTS /*$wgWDprefix*/class_attributes;

CREATE TABLE /*$wgWDprefix*/class_attributes (
  `object_id` int(11) NOT NULL,
  `class_mid` int(11) NOT NULL default '0',
  `level_mid` int(11) NOT NULL,
  `attribute_mid` int(11) NOT NULL default '0',
  `attribute_type` char(4) collate utf8_bin NOT NULL default 'TEXT',
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_class` (`remove_transaction_id`,`class_mid`,`attribute_mid`,`object_id`),
  KEY `versioned_end_attribute` (`remove_transaction_id`,`attribute_mid`,`class_mid`,`object_id`),
  KEY `versioned_end_object` (`remove_transaction_id`,`object_id`),
  KEY `versioned_start_class` (`add_transaction_id`,`class_mid`,`attribute_mid`,`object_id`),
  KEY `versioned_start_attribute` (`add_transaction_id`,`attribute_mid`,`class_mid`,`object_id`),
  KEY `versioned_start_object` (`add_transaction_id`,`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS /*$wgWDprefix*/class_membership;

CREATE TABLE /*$wgWDprefix*/class_membership (
  `class_membership_id` int(11) NOT NULL,
  `class_mid` int(11) NOT NULL default '0',
  `class_member_mid` int(11) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_class` (`remove_transaction_id`,`class_mid`,`class_member_mid`),
  KEY `versioned_end_class_member` (`remove_transaction_id`,`class_member_mid`,`class_mid`),
  KEY `versioned_end_class_membership` (`remove_transaction_id`,`class_membership_id`),
  KEY `versioned_start_class` (`add_transaction_id`,`class_mid`,`class_member_mid`),
  KEY `versioned_start_class_member` (`add_transaction_id`,`class_member_mid`,`class_mid`),
  KEY `versioned_start_class_membership` (`add_transaction_id`,`class_membership_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS /*$wgWDprefix*/collection_contents;

CREATE TABLE /*$wgWDprefix*/collection_contents (
  `collection_id` int(10) NOT NULL default '0',
  `member_mid` int(10) NOT NULL default '0',
  `internal_member_id` varchar(255) default NULL,
  `applicable_language_id` int(10) default NULL,
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_collection` (`remove_transaction_id`,`collection_id`,`member_mid`),
  KEY `versioned_end_collection_member` (`remove_transaction_id`,`member_mid`,`collection_id`),
  KEY `versioned_end_internal_id` (`remove_transaction_id`,`internal_member_id`,`collection_id`,`member_mid`),
  KEY `versioned_start_collection` (`add_transaction_id`,`collection_id`,`member_mid`),
  KEY `versioned_start_collection_member` (`add_transaction_id`,`member_mid`,`collection_id`),
  KEY `versioned_start_internal_id` (`add_transaction_id`,`internal_member_id`,`collection_id`,`member_mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/collection_language;

CREATE TABLE /*$wgWDprefix*/collection_language (
  `collection_id` int(10) NOT NULL default '0',
  `language_id` int(10) NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/collection_ns;

CREATE TABLE /*$wgWDprefix*/collection_ns (
  `collection_id` int(10) unsigned NOT NULL,
  `collection_mid` int(10) NOT NULL default '0',
  `collection_type` char(4) default NULL,
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_collection` (`remove_transaction_id`,`collection_id`,`collection_mid`),
  KEY `versioned_end_collection_meaning` (`remove_transaction_id`,`collection_mid`,`collection_id`),
  KEY `versioned_end_collection_type` (`remove_transaction_id`,`collection_type`,`collection_id`,`collection_mid`),
  KEY `versioned_start_collection` (`add_transaction_id`,`collection_id`,`collection_mid`),
  KEY `versioned_start_collection_meaning` (`add_transaction_id`,`collection_mid`,`collection_id`),
  KEY `versioned_start_collection_type` (`add_transaction_id`,`collection_type`,`collection_id`,`collection_mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/defined_meaning;

CREATE TABLE /*$wgWDprefix*/defined_meaning (
  `defined_meaning_id` int(8) unsigned NOT NULL,
  `expression_id` int(10) NOT NULL,
  `meaning_text_tcid` int(10) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_meaning` (`remove_transaction_id`,`defined_meaning_id`,`expression_id`),
  KEY `versioned_end_expression` (`remove_transaction_id`,`expression_id`,`defined_meaning_id`),
  KEY `versioned_end_meaning_text` (`remove_transaction_id`,`meaning_text_tcid`,`defined_meaning_id`),
  KEY `versioned_start_meaning` (`add_transaction_id`,`defined_meaning_id`,`expression_id`),
  KEY `versioned_start_expression` (`add_transaction_id`,`expression_id`,`defined_meaning_id`),
  KEY `versioned_start_meaning_text` (`add_transaction_id`,`meaning_text_tcid`,`defined_meaning_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/expression_ns;

CREATE TABLE /*$wgWDprefix*/expression_ns (
  `expression_id` int(10) unsigned NOT NULL,
  `spelling` varchar(255) NOT NULL default '',
  `hyphenation` varchar(255) NOT NULL default '',
  `language_id` int(10) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_expression` (`remove_transaction_id`,`expression_id`,`language_id`),
  KEY `versioned_end_language` (`remove_transaction_id`,`language_id`,`expression_id`),
  KEY `versioned_end_spelling` (`remove_transaction_id`,`spelling`,`expression_id`,`language_id`),
  KEY `versioned_start_expression` (`add_transaction_id`,`expression_id`,`language_id`),
  KEY `versioned_start_language` (`add_transaction_id`,`language_id`,`expression_id`),
  KEY `versioned_start_spelling` (`add_transaction_id`,`spelling`,`expression_id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/meaning_relations;

CREATE TABLE /*$wgWDprefix*/meaning_relations (
  `relation_id` int(11) NOT NULL,
  `meaning1_mid` int(10) NOT NULL default '0',
  `meaning2_mid` int(10) NOT NULL default '0',
  `relationtype_mid` int(10) default NULL,
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_outgoing` (`remove_transaction_id`,`meaning1_mid`,`relationtype_mid`,`meaning2_mid`),
  KEY `versioned_end_incoming` (`remove_transaction_id`,`meaning2_mid`,`relationtype_mid`,`meaning1_mid`),
  KEY `versioned_end_relation` (`remove_transaction_id`,`relation_id`),
  KEY `versioned_start_outgoing` (`add_transaction_id`,`meaning1_mid`,`relationtype_mid`,`meaning2_mid`),
  KEY `versioned_start_incoming` (`add_transaction_id`,`meaning2_mid`,`relationtype_mid`,`meaning1_mid`),
  KEY `versioned_start_relation` (`add_transaction_id`,`relation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/objects;

CREATE TABLE /*$wgWDprefix*/objects (
  `object_id` int(11) NOT NULL auto_increment,
  `table` varchar(100) collate utf8_bin NOT NULL,
  `original_id` int(11) default NULL,
  `UUID` varchar(36) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`object_id`),
  KEY `table` (`table`),
  KEY `original_id` (`original_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS /*$wgWDprefix*/option_attribute_options;

CREATE TABLE /*$wgWDprefix*/option_attribute_options (
  `option_id` int(11) NOT NULL default '0',
  `attribute_id` int(11) NOT NULL default '0',
  `option_mid` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL default '0',
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_option` (`remove_transaction_id`,`option_mid`,`attribute_id`,`option_id`),
  KEY `versioned_end_attribute` (`remove_transaction_id`,`attribute_id`,`option_id`,`option_mid`),
  KEY `versioned_end_id` (`remove_transaction_id`,`option_id`),
  KEY `versioned_start_option` (`add_transaction_id`,`option_mid`,`attribute_id`,`option_id`),
  KEY `versioned_start_attribute` (`add_transaction_id`,`attribute_id`,`option_id`,`option_mid`),
  KEY `versioned_start_id` (`add_transaction_id`,`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/option_attribute_values;

CREATE TABLE /*$wgWDprefix*/option_attribute_values (
  `value_id` int(11) NOT NULL default '0',
  `object_id` int(11) NOT NULL default '0',
  `option_id` int(11) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL default '0',
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_object` (`remove_transaction_id`,`object_id`,`option_id`,`value_id`),
  KEY `versioned_end_option` (`remove_transaction_id`,`option_id`,`object_id`,`value_id`),
  KEY `versioned_end_value` (`remove_transaction_id`,`value_id`),
  KEY `versioned_start_object` (`add_transaction_id`,`object_id`,`option_id`,`value_id`),
  KEY `versioned_start_option` (`add_transaction_id`,`option_id`,`object_id`,`value_id`),
  KEY `versioned_start_value` (`add_transaction_id`,`value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/script_log;

CREATE TABLE /*$wgWDprefix*/script_log (
  `script_id` int(11) NOT NULL default '0',
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  `script_name` varchar(128) collate utf8_bin NOT NULL default '',
  `comment` varchar(128) collate utf8_bin NOT NULL default ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/syntrans;

CREATE TABLE /*$wgWDprefix*/syntrans (
  `syntrans_sid` int(10) NOT NULL default '0',
  `defined_meaning_id` int(10) NOT NULL default '0',
  `expression_id` int(10) NOT NULL,
  `firstuse` char(14) NOT NULL default '',
  `identical_meaning` tinyint(1) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_syntrans` (`remove_transaction_id`,`syntrans_sid`),
  KEY `versioned_end_expression` (`remove_transaction_id`,`expression_id`,`identical_meaning`,`defined_meaning_id`),
  KEY `versioned_end_defined_meaning` (`remove_transaction_id`,`defined_meaning_id`,`identical_meaning`,`expression_id`),
  KEY `versioned_start_syntrans` (`add_transaction_id`,`syntrans_sid`),
  KEY `versioned_start_expression` (`add_transaction_id`,`expression_id`,`identical_meaning`,`defined_meaning_id`),
  KEY `versioned_start_defined_meaning` (`add_transaction_id`,`defined_meaning_id`,`identical_meaning`,`expression_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/syntrans_relations;

CREATE TABLE /*$wgWDprefix*/syntrans_relations (
  `syntrans1_id` int(10) NOT NULL,
  `syntrans2_id` int(10) NOT NULL,
  `relationtype_mid` int(10) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/text;

CREATE TABLE /*$wgWDprefix*/text (
  `text_id` int(8) unsigned NOT NULL auto_increment,
  `text_text` mediumblob NOT NULL,
  `text_flags` tinyblob,
  PRIMARY KEY  (`text_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/text_attribute_values;

CREATE TABLE /*$wgWDprefix*/text_attribute_values (
  `value_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `attribute_mid` int(11) NOT NULL,
  `text` mediumblob NOT NULL,
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_object` (`remove_transaction_id`,`object_id`,`attribute_mid`,`value_id`),
  KEY `versioned_end_attribute` (`remove_transaction_id`,`attribute_mid`,`object_id`,`value_id`),
  KEY `versioned_end_value` (`remove_transaction_id`,`value_id`),
  KEY `versioned_start_object` (`add_transaction_id`,`object_id`,`attribute_mid`,`value_id`),
  KEY `versioned_start_attribute` (`add_transaction_id`,`attribute_mid`,`object_id`,`value_id`),
  KEY `versioned_start_value` (`add_transaction_id`,`value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS /*$wgWDprefix*/transactions;

CREATE TABLE /*$wgWDprefix*/transactions (
  `transaction_id` int(11) NOT NULL auto_increment,
  `user_id` int(5) NOT NULL,
  `user_ip` varchar(15) collate utf8_bin NOT NULL,
  `timestamp` varchar(14) collate utf8_bin NOT NULL,
  `comment` tinyblob NOT NULL,
  PRIMARY KEY  (`transaction_id`),
  KEY `user` (`user_id`,`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS /*$wgWDprefix*/translated_content;

CREATE TABLE /*$wgWDprefix*/translated_content (
  `translated_content_id` int(11) NOT NULL default '0',
  `language_id` int(10) NOT NULL default '0',
  `shorttext_id` int(10) NOT NULL default '0',
  `text_id` int(10) NOT NULL default '0',
  `original_language_id` int(10) NOT NULL default '0',
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_translated_content` (`remove_transaction_id`,`translated_content_id`,`language_id`,`text_id`),
  KEY `versioned_end_text` (`remove_transaction_id`,`text_id`,`translated_content_id`,`language_id`),
  KEY `versioned_start_translated_content` (`add_transaction_id`,`translated_content_id`,`language_id`,`text_id`),
  KEY `versioned_start_text` (`add_transaction_id`,`text_id`,`translated_content_id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS /*$wgWDprefix*/translated_content_attribute_values;

CREATE TABLE /*$wgWDprefix*/translated_content_attribute_values (
  `value_id` int(11) NOT NULL default '0',
  `object_id` int(11) NOT NULL,
  `attribute_mid` int(11) NOT NULL,
  `value_tcid` int(11) NOT NULL,
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_object` (`remove_transaction_id`,`object_id`,`attribute_mid`,`value_tcid`),
  KEY `versioned_end_attribute` (`remove_transaction_id`,`attribute_mid`,`object_id`,`value_tcid`),
  KEY `versioned_end_translated_content` (`remove_transaction_id`,`value_tcid`,`value_id`),
  KEY `versioned_end_value` (`remove_transaction_id`,`value_id`),
  KEY `versioned_start_object` (`add_transaction_id`,`object_id`,`attribute_mid`,`value_tcid`),
  KEY `versioned_start_attribute` (`add_transaction_id`,`attribute_mid`,`object_id`,`value_tcid`),
  KEY `versioned_start_translated_content` (`add_transaction_id`,`value_tcid`,`value_id`),
  KEY `versioned_start_value` (`add_transaction_id`,`value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS /*$wgWDprefix*/url_attribute_values;

CREATE TABLE /*$wgWDprefix*/url_attribute_values (
  `value_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `attribute_mid` int(11) NOT NULL,
  `url` varchar(255) collate utf8_bin NOT NULL,
  `label` varchar(255) collate utf8_bin NOT NULL,
  `add_transaction_id` int(11) NOT NULL,
  `remove_transaction_id` int(11) default NULL,
  KEY `versioned_end_object` (`remove_transaction_id`,`object_id`,`attribute_mid`,`value_id`),
  KEY `versioned_end_attribute` (`remove_transaction_id`,`attribute_mid`,`object_id`,`value_id`),
  KEY `versioned_end_value` (`remove_transaction_id`,`value_id`),
  KEY `versioned_start_object` (`add_transaction_id`,`object_id`,`attribute_mid`,`value_id`),
  KEY `versioned_start_attribute` (`add_transaction_id`,`attribute_mid`,`object_id`,`value_id`),
  KEY `versioned_start_value` (`add_transaction_id`,`value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
