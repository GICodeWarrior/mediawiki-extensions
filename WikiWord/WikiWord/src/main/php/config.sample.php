<?php

#$wwAPI = "http://wikiword.wikimedia.de/api.php";
$wwAPI = false;
$wwAllowTranslate = false;
$wwImageSearch = null; //NOTE: trinary: true forces image searche, false disables it. null makes it optional.

$wwDBServer = "localhost";
$wwDBUser = "wikiword";
$wwDBPassword = "xxxxxxxxxx";
$wwDBDatabase = "wikiword";

$wwLanguages = array("en" => "Englisch", "de" => "German", "fr" => "French");
$wwTablePrefix = "full";
$wwThesaurusDataset = "thesaurus";

#error_reporting(E_ALL);

$wwMaxPreviewImages = 8;
$wwMaxGalleryImages = 200;
$wwThumbSize = 120;
$wwThumbnailURL = "http://toolserver.org/tsthumb/tsthumb?f={name}&domain=commons.wikimedia.org&w={width}&h={height}";
$wwImagePageURL = "http://commons.wikimedia.org/wiki/File:{name}";

#$wwFakeCommonsConcepts = false;
#$wwFakeCommonsPlural = false;
$wwCommonsTablePrefix = "commonswiki_p.";

$wwWikiInfoTable = "toolserver.wiki";
$wwWikiDbName = "{lang}wiki_p";
$wwWikiServerName = "sql-s{num}";

$wwCommonsServerName = null;

$wwTagsTable = null;
$wwFrequentImageThreshold = 10;

$wwTagScores = array(
  'Category:Featured_pictures_on_Wikimedia_Commons' => 3, 
  'Category:Featured_pictures_on_Wikipedia,_German' => 3,

  'Template:Former_featured_picture' => 2.8,

  'Template:Media_of_the_day' => 2.5,
  'Template:Picture_of_the_day' => 2.5,

  'Category:Quality_images' => 2.0,

  'Category:Valued_image' => 1.4,
  'Category:Former_valued_images' => 1.3,
  'Category:Images_used_in_valued_image_sets' => 1.2,

  'assessment:Media_of_the_day' => 2.5,
  'assessment:Picture_of_the_day' => 2.5,
  'assessment:Quality_image' => 2.0,
  'assessment:Featured_picture' => 3.0,
);