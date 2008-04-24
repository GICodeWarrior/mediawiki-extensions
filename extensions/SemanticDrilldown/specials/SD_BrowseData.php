<?php
/**
 * Displays an interface to let the user drill down through all data on
 * the wiki, using categories and custom-defined filters that have
 * previously been created.
 *
 * @author Yaron Koren
 */

if (!defined('MEDIAWIKI')) die();

global $IP;
require_once( "$IP/includes/SpecialPage.php" );

SpecialPage::addPage( new SpecialPage('BrowseData','',true,'doSpecialBrowseData',false) );

class BrowseDataPage extends QueryPage {
	var $category = "";
	var $subcategory = "";
	var $next_level_subcategories = array();
	var $all_subcategories = array();
	var $applied_filters = array();
	var $remaining_filters = array();
	var $browse_data_title;
	var $show_single_cat = false;

	/**
	 * Initialize the variables of this page
	 */
	function BrowseDataPage($category, $subcategory, $applied_filters, $remaining_filters) {
		$this->category = $category;
		$this->subcategory = $subcategory;
		$this->applied_filters = $applied_filters;
		$this->remaining_filters = $remaining_filters;
		$this->browse_data_title = Title::newFromText('BrowseData', NS_SPECIAL);

		$dbr = wfGetDB( DB_SLAVE );
		$categorylinks = $dbr->tableName( 'categorylinks' );
		$page = $dbr->tableName( 'page' );
		$cat_ns = NS_CATEGORY;
		if ($this->subcategory)
			$actual_cat = str_replace(' ', '_', $this->subcategory);
		else
			$actual_cat = str_replace(' ', '_', $this->category);
		// get the two arrays for subcategories - one for only the
		// immediate subcategories, for display, and the other for
		// all subcategories, sub-subcategories, etc., for querying
		$this->next_level_subcategories = sdfGetCategoryChildren($actual_cat, true, 1);
		$this->all_subcategories = sdfGetCategoryChildren($actual_cat, true, 10);
	}

	function makeBrowseURL($category, $applied_filters = array(), $subcategory = null) {
		$url = $this->browse_data_title->getFullURL() . '/' . $category;
		if ($this->show_single_cat) {
			$url .= (strpos($url, '?')) ? '&' : '?';
			$url .= "_single";
		}
		if ($subcategory) {
			$url .= (strpos($url, '?')) ? '&' : '?';
			$url .= "_subcat=" . $subcategory;
		}
		foreach ($applied_filters as $i => $af) {
			if (count($af->values) == 0) {
				// do nothing
			} elseif (count($af->values) == 1) {
				$url .= (strpos($url, '?')) ? '&' : '?';
				$url .= urlencode(str_replace(' ', '_', $af->filter->name)) . "=" . urlencode(str_replace(' ', '_', $af->values[0]->text));
			} else {
				usort($af->values, array("SDFilterValue", "compare"));
				foreach ($af->values as $j => $fv) {
					$url .= (strpos($url, '?')) ? '&' : '?';
					$url .= urlencode(str_replace(' ', '_', $af->filter->name)) . "[$j]=" . urlencode(str_replace(' ', '_', $fv->text));
				}
			}
		}
		return $url;
	}

	/**
	 * Creates a temporary database table of values that match the current
	 * set of filters selected by the user - used for displaying
	 * all remaining filters
	 */
	function createTempTable($category, $subcategory, $subcategories, $applied_filters) {
		$dbr = wfGetDB( DB_SLAVE );
		$page = $dbr->tableName( 'page' );
		$smw_relations = $dbr->tableName( 'smw_relations' );
		$smw_attributes = $dbr->tableName( 'smw_attributes' );
		$categorylinks = $dbr->tableName( 'categorylinks' );
		$sql = "CREATE TEMPORARY TABLE semantic_drilldown_values
			AS SELECT p.page_id ";
		$sql .= $this->getSQLFromClause($category, $subcategory, $subcategories, $applied_filters);
		$dbr->query($sql);
		// create an index to speed up subsequent queries
		// (does this help?)
		$sql2 = "CREATE INDEX page_id_index ON semantic_drilldown_values (page_id)";
		$dbr->query($sql2);
	}

	/**
	 * Creates a SQL statement, lacking only the initial "SELECT"
	 * clause, to get all the pages that match all the previously-
	 * selected filters, plus the one new filter (with value) that
	 * was passed in to this function.
	 */
	function getSQLFromClauseForField($new_filter) {
		$sql = "FROM semantic_drilldown_values sdv
			JOIN semantic_drilldown_filter_values sdfv
			ON sdv.page_id = sdfv.subject_id
			WHERE ";
		$sql .= $new_filter->checkSQL("sdfv.value");
		return $sql;
	}

	/**
	 * Very similar to getSQLFromClauseForField(), except that instead
	 * of a new filter passed in, it's a subcategory, plus all that
	 * subcategory's child subcategories, to ensure completeness.
	 */
	function getSQLFromClauseForCategory($subcategory, $child_subcategories) {
		$dbr = wfGetDB( DB_SLAVE );
		$categorylinks = $dbr->tableName( 'categorylinks' );
		$subcategory = str_replace("'", "\'", $subcategory);
		$sql = "FROM semantic_drilldown_values sdv
			JOIN $categorylinks c
			ON sdv.page_id = c.cl_from
			WHERE (c.cl_to = '$subcategory' ";
		foreach ($child_subcategories as $i => $subcat) {
			$sql .= "OR c.cl_to = '$subcat' ";
		}
		$sql .= ") ";
		return $sql;
	}

	/**
	 * Returns everything from the FROM clause onward for a SQL statement
	 * to get all pages that match a certain set of criteria for
	 * category, subcategory and filters
	 */
	function getSQLFromClause($category, $subcategory, $subcategories, $applied_filters) {
		$dbr = wfGetDB( DB_SLAVE );
		$page = $dbr->tableName( 'page' );
		$smw_relations = $dbr->tableName( 'smw_relations' );
		$smw_attributes = $dbr->tableName( 'smw_attributes' );
		$categorylinks = $dbr->tableName( 'categorylinks' );

		$sql = "FROM $page p
			JOIN $categorylinks c
			ON p.page_id = c.cl_from ";
		$cat_ns = NS_CATEGORY;
		$sql .= "AND p.page_namespace != $cat_ns ";
		foreach ($applied_filters as $i => $af) {
			// if any of these filter's values are 'none',
			// include another table to get this information
			$includes_none = false;
			foreach ($af->values as $fv) {
				if ($af->values[0]->text == '_none' || $af->values[0]->text == ' none') {
					$includes_none = true;
					break;
				}
			}
			if ($includes_none) {
				if ($af->filter->is_relation) {
					$property_table_name = $smw_relations;
					$property_table_nickname = "nr$i";
					$property_field = 'relation_title';
					$value_field = 'object_title';
				} else {
					$property_table_name = $smw_attributes;
					$property_table_nickname = "na$i";
					$property_field = 'attribute_title';
					$value_field = 'value_xsd';
				}
				$property_value = str_replace(' ', '_', $af->filter->property);
				$property_value = str_replace("'", "\'", $property_value);
				$sql .= "LEFT OUTER JOIN
			(SELECT subject_id, $value_field
			FROM $property_table_name
			WHERE $property_field = '$property_value') $property_table_nickname
			ON p.page_id = $property_table_nickname.subject_id ";
			}
		}
		foreach ($applied_filters as $i => $af) {
			if ($af->filter->is_relation) {
				$sql .= "JOIN $smw_relations r$i
	ON p.page_id = r$i.subject_id ";
			} else {
				$sql .= "JOIN $smw_attributes a$i
	ON p.page_id = a$i.subject_id ";
			}
		}
		if ($subcategory)
			$actual_cat = str_replace(' ', '_', $subcategory);
		else
			$actual_cat = str_replace(' ', '_', $category);
		$actual_cat = str_replace("'", "\'", $actual_cat);
		$sql .= "WHERE (c.cl_to = '$actual_cat' ";
		foreach ($subcategories as $i => $subcat) {
			$sql .= "OR c.cl_to = '{$subcat}' ";
		}
		$sql .= ") ";
		foreach ($applied_filters as $i => $af) {
			if ($af->filter->is_relation) {
				$property_field = "r$i.relation_title";
				$value_field = "r$i.object_title";
			} else {
				$property_field = "a$i.attribute_title";
				$value_field = "a$i.value_xsd";
			}
			$property_value = str_replace(' ', '_', $af->filter->property);
			$sql .= "AND $property_field = '$property_value' AND ";
			$sql .= $af->checkSQL($value_field);
		}
		return $sql;
	}

	/**
	 * Gets the number of pages matching both the currently-selected
	 * set of filters and either a new subcategory or a new filter.
	 */
	function getNumResults($subcategory, $subcategories, $new_filter = null) {
		$dbr = wfGetDB( DB_SLAVE );
		$sql = "SELECT COUNT(*) ";
		if ($new_filter)
			$sql .= $this->getSQLFromClauseForField($new_filter);
		else
			$sql .= $this->getSQLFromClauseForCategory($subcategory, $subcategories);
		$res = $dbr->query($sql);
		$row = $dbr->fetchRow($res);
		$dbr->freeResult($res);
		return $row[0];
	}

	/**
	 * Gets an array of the possible time period values (e.g., years,
	 * years and months) for a given date filter, and, for each one,
	 * the number of pages that match that time period.
	 */
	function getTimePeriodValues($date_filter) {
		$possible_dates = array();
		$property_value = str_replace(' ', '_', $date_filter->property);
		$dbr = wfGetDB( DB_SLAVE );
		$smw_attributes = $dbr->tableName( 'smw_attributes' );
		if ($date_filter->time_period == wfMsg('sd_filter_month')) {
			$fields = "YEAR(value_xsd), MONTH(value_xsd)";
		} else {
			$fields = "YEAR(value_xsd)";
		}
		$sql = "SELECT $fields, count(*)
			FROM semantic_drilldown_values sdv 
			JOIN $smw_attributes a
			ON sdv.page_id = a.subject_id
			WHERE a.attribute_title = '$property_value'
			GROUP BY $fields
			ORDER BY $fields";
		$res = $dbr->query($sql);
		while ($row = $dbr->fetchRow($res)) {
			if ($date_filter->time_period == wfMsg('sd_filter_month')) {
				global $sdgMonthValues;
				$date_string = sdfMonthToString($row[1]) . " " . $row[0];
				$possible_dates[$date_string] = $row[2];
			} else {
				$date_string = $row[0];
				$possible_dates[$date_string] = $row[1];
			}
		}
		$dbr->freeResult($res);
		return $possible_dates;
	}

	/**
	 * Gets an array of all values that the property belonging to the
	 * passed-in filter has, and, for each one, the number of pages
	 * that match that value.
	 */
	function getAllValues($filter) {
		$possible_values = array();
		$property_value = str_replace(' ', '_', $filter->property);
		$dbr = wfGetDB( DB_SLAVE );
		if ($filter->is_relation) {
			$property_table_name = $dbr->tableName('smw_relations');
			$property_table_nickname = "r";
			$property_field = 'relation_title';
			$value_field = 'object_title';
		} else {
			$property_table_name = $dbr->tableName('smw_attributes');
			$property_table_nickname = "a";
			$property_field = 'attribute_title';
			$value_field = 'value_xsd';
		}
		$sql = "SELECT $value_field, count(*)
			FROM semantic_drilldown_values sdv 
			JOIN $property_table_name $property_table_nickname
			ON sdv.page_id = $property_table_nickname.subject_id
			WHERE $property_table_nickname.$property_field = '$property_value'
			AND $value_field != ''
			GROUP BY $value_field
			ORDER BY $value_field";
		$res = $dbr->query($sql);
		while ($row = $dbr->fetchRow($res)) {
			$value_string = str_replace('_', ' ', $row[0]);
			$possible_values[$value_string] = $row[1];
		}
		$dbr->freeResult($res);
		return $possible_values;
	}


	/**
	 * Gets an array of all values that the property belonging to the
	 * passed-in filter has, for pages in the current category.
	 */
	function getAllOrValues($applied_filter) {
		$possible_values = array();
		$property_value = str_replace(' ', '_', $applied_filter->filter->property);
		$dbr = wfGetDB( DB_SLAVE );
		if ($applied_filter->filter->is_relation) {
			$property_table_name = $dbr->tableName('smw_relations');
			$property_table_nickname = "r";
			$property_field = 'relation_title';
			$value_field = 'object_title';
		} else {
			$property_table_name = $dbr->tableName('smw_attributes');
			$property_table_nickname = "a";
			$property_field = 'attribute_title';
			$value_field = 'value_xsd';
		}
                if ($applied_filter->is_numeric) {
                        if ($applied_filter->lower_limit && $applied_filter->upper_limit)
                                $sql .= "($value_field >= {$applied_filter->lower_limit} AND $value_field <= {$applied_filter->upper_limit}) ";
                        elseif ($applied_filter->lower_limit)
                                $sql .= "$value_field > {$applied_filter->lower_limit} ";
                        elseif ($applied_filter->upper_limit)
                                $sql .= "$value_field < {$applied_filter->upper_limit} ";
                } elseif ($applied_filter->filter->time_period != NULL) {
			if ($applied_filter->filter->time_period == wfMsg('sd_filter_month')) {
				$value_field = "YEAR(value_xsd), MONTH(value_xsd)";
			} else {
				$value_field = "YEAR(value_xsd)";
			}
		}
		$sql = "SELECT $value_field
			FROM $property_table_name $property_table_nickname
			JOIN categorylinks c
			ON $property_table_nickname.subject_id = c.cl_from
			WHERE $property_table_nickname.$property_field = '$property_value'
			AND c.cl_to = '{$this->category}'
			GROUP BY $value_field
			ORDER BY $value_field";
		$res = $dbr->query($sql);
		while ($row = $dbr->fetchRow($res)) {
			if ($applied_filter->filter->time_period == wfMsg('sd_filter_month'))
				$value_string = sdfMonthToString($row[1]) . " " . $row[0];
			else
				// why is trim() necessary here???
				$value_string = str_replace('_', ' ', trim($row[0]));
			$possible_values[] = $value_string;
		}
		$dbr->freeResult($res);
		return $possible_values;
	}

	function getName() {
		return "BrowseData";
	}

	function isExpensive() { return false; }

	function isSyndicated() { return false; }

	function printCategoriesList($categories) {
		$choose_category_text = wfMsg('sd_browsedata_choosecategory');
		$text =<<<END

<div class="drilldown_categories_wrapper">
	<div class="drilldown_categories">
		<div class="drilldown_categories_header">$choose_category_text:</div>

END;
		foreach ($categories as $i => $category) {
			$category_children = sdfGetCategoryChildren($category, false, 5);
			$category_str = $category . " (" . count($category_children) . ")";
			if (str_replace('_', ' ', $this->category) == $category) {
				$text .= "		<div class=\"drilldown_category selected_category\">";
				$text .= $category_str;
			} else {
				$text .= "		<div class=\"drilldown_category\">";
				$category_url = $this->makeBrowseURL($category);
				$text .= '<a href="' . $category_url . '" title="Choose category">' . $category_str . '</a>';
			}
			$text .= "</div>\n";
		}
		$text .=<<<END
	</div>
</div>

END;
		return $text;
	}

	/**
	 * Print the line showing 'OR' values for a filter that already has
	 * at least one value set
	 */
	function printAppliedFilterLine($af) {
		global $sdgScriptPath;

		$results_line = "";
		$labels_for_filter = sdfGetValuesForProperty($af->filter->name, SD_NS_FILTER, SD_SP_HAS_LABEL, false, NS_MAIN);
		if (count($labels_for_filter) > 0) {
			$filter_label = $labels_for_filter[0];
		} else {
			$filter_label = str_replace('_', ' ', $af->filter->name);
		}
		foreach ($this->applied_filters as $af2) {
			if ($af->filter->name == $af2->filter->name)
				$current_filter_values = $af2->values;
		}
		if ($af->filter->allowed_values != null)
			$or_values = $af->filter->allowed_values;
		else
			$or_values = $this->getAllOrValues($af);
		// add 'Other' and 'None', regardless of whether either has
		// any results - add 'Other' only if it's not a date field
		if ($af->filter->time_period == null)
			$or_values[] = '_other';
		$or_values[] = '_none';
		foreach ($or_values as $i => $value) {
			if ($i > 0) { $results_line .= " &middot; "; }
			$value = str_replace('_', ' ', $value);
			// if it's boolean, display something nicer than "0" or "1"
			if ($af->filter->is_boolean) {
				$filter_text = sdfBooleanToString($value);
			} elseif ($value == ' other') {
				$filter_text = wfMsg('sd_browsedata_other');
			} elseif ($value == ' none') {
				$filter_text = wfMsg('sd_browsedata_none');
			} else {
				$filter_text = $value;
			}
			$applied_filters = $this->applied_filters;
			foreach ($applied_filters as $af2) {
				if ($af->filter->name == $af2->filter->name) {
					$or_fv = SDFilterValue::create($value, $af->filter->time_period);
					$af2->values = array_merge($current_filter_values, array($or_fv));
				}
			}
			// show the list of OR values, only linking
			// the ones that haven't been used yet
			$found_match = false;
			foreach ($current_filter_values as $fv) {
				if ($value == $fv->text) {
					$found_match = true;
					break;
				}
			}
			if ($found_match) {
				$results_line .= "\n		$filter_text";
			} else {
				$filter_url = $this->makeBrowseURL($this->category, $applied_filters, $this->subcategory);
				$results_line .= "\n		" . '<a href="' . $filter_url . '" title="' . wfMsg('sd_browsedata_filterbyvalue') . '">' . $filter_text . '</a>';
			}
			foreach ($applied_filters as $af2) {
				if ($af->filter->name == $af2->filter->name) {
					$af2->values = $current_filter_values;
				}
			}
		}
		$add_another_str = wfMsg('sd_browsedata_addanothervalue');
		$results_div_id = strtolower(str_replace(' ', '_', $filter_label)) . "_values";
		$text =<<<END
	<div class="drilldown_filter_label">
		<a onclick="toggleDiv('$results_div_id', this)" style="cursor: default;"><img src="$sdgScriptPath/skins/right-arrow.png"></a>
		$filter_label: <span class="drilldown_filter_notes">($add_another_str)</span>
	</div>
	<div class="drilldown_filter_values" id="$results_div_id" style="display: none;">$results_line
	</div>

END;
		return $text;
	}

	/**
	 * Print the line showing 'AND' values for a filter that has not
	 * been applied to the drilldown
	 */
	function printUnappliedFilterLine($f, $cur_url) {
		global $sdgScriptPath;
		global $sdgFiltersSmallestFontSize, $sdgFiltersLargestFontSize;

		$results_line = "";
		$f->createTempTable();
		$found_results_for_filter = false;
		if (count($f->allowed_values) == 0) {
			if ($f->time_period != NULL) {
				$filter_values = $this->getTimePeriodValues($f);
			} else {
				$filter_values = $this->getAllValues($f);
			}
			if (count($filter_values) > 0)
				$found_results_for_filter = true;
		} else {
			$filter_values = array();
			foreach ($f->allowed_values as $value) {
				$new_filter = SDAppliedFilter::create($f, $value);
				$num_results = $this->getNumResults($this->subcategory, $this->all_subcategories, $new_filter);
				if ($num_results > 0) {
					$filter_values[$value] = $num_results;
				}
			}
		}
		// now get values for 'Other' and 'None', as well
		// - don't show 'Other' if filter values were
		// obtained dynamically
		if (count($f->allowed_values) > 0) {
			$other_filter = SDAppliedFilter::create($f, ' other');
			$num_results = $this->getNumResults($this->subcategory, $this->all_subcategories, $other_filter);
			if ($num_results > 0) {
				$filter_values['_other'] = $num_results;
			}
		}
		// show 'None' only if any other results have been found
		if (count($f->allowed_values) > 0) {
			$none_filter = SDAppliedFilter::create($f, ' none');
			$num_results = $this->getNumResults($this->subcategory, $this->all_subcategories, $none_filter);
			if ($num_results > 0) {
				$filter_values['_none'] = $num_results;
			}
		}
		// set font-size values for filter "tag cloud", if the
		// appropriate global variables are set
		if (isset($sdgFiltersSmallestFontSize) && isset($sdgFiltersLargestFontSize)) {
			$lowest_num_results = min($filter_values);
			$highest_num_results = max($filter_values);
			$num_results_midpoint = ($lowest_num_results + $highest_num_results) / 2;
			$font_size_midpoint = ($sdgFiltersSmallestFontSize + $sdgFiltersLargestFontSize) / 2;
			$num_results_per_font_pixel = ($highest_num_results + 1 - $lowest_num_results) / ($sdgFiltersLargestFontSize + 1 - $sdgFiltersSmallestFontSize);
		}
		// now print the values
		$num_printed_values = 0;
		foreach ($filter_values as $value_str => $num_results) {
			if ($num_printed_values++ > 0) { $results_line .= " &middot; "; }
			// if it's boolean, display something nicer than "0" or "1"
			if ($f->is_boolean) {
				$filter_text = sdfBooleanToString($value_str);
			} elseif ($value_str == '_other') {
				$filter_text = wfMsg('sd_browsedata_other');
			} elseif ($value_str == '_none') {
				$filter_text = wfMsg('sd_browsedata_none');
			} else {
				$filter_text = str_replace('_', ' ', $value_str);
			}
			$filter_text .= " ($num_results)";
			$filter_url = $cur_url . urlencode(str_replace(' ', '_', $f->name)) . '=' . urlencode(str_replace(' ', '_', $value_str));
			if (isset($sdgFiltersSmallestFontSize) && isset($sdgFiltersLargestFontSize)) {
				$font_size = round($font_size_midpoint + (($num_results - $num_results_midpoint) / $num_results_per_font_pixel));
				$results_line .= "\n		" . '<a href="' . $filter_url . '" title="' . wfMsg('sd_browsedata_filterbyvalue') . '" style="font-size: ' . $font_size . 'px">' . $filter_text . '</a>';
			} else {
				$results_line .= "\n		" . '<a href="' . $filter_url . '" title="' . wfMsg('sd_browsedata_filterbyvalue') . '">' . $filter_text . '</a>';
			}
		}
		$text = "";
		if ($results_line != "") {
			$labels_for_filter = sdfGetValuesForProperty($f->name, SD_NS_FILTER, SD_SP_HAS_LABEL, false, NS_MAIN);
			if (count($labels_for_filter) > 0) {
				$filter_label = $labels_for_filter[0];
			} else {
				$filter_label = str_replace('_', ' ', $f->name);
			}
			$results_div_id = strtolower(str_replace(' ', '_', $filter_label)) . "_values";
			$text .=<<<END
	<div class="drilldown_filter_label"><a onclick="toggleDiv('$results_div_id', this)" style="cursor: default;"><img src="$sdgScriptPath/skins/down-arrow.png"></a>
	$filter_label:
	</div>
	<div class="drilldown_filter_values" id="$results_div_id">$results_line
	</div>

END;
		}
		$f->dropTempTable();
		return $text;
	}

	function getPageHeader() {
		global $wgUser, $wgRequest;
		global $sdgContLang, $sdgScriptPath;

		$skin = $wgUser->getSkin();
		$browse_data_title = Title::newFromText('BrowseData', NS_SPECIAL);
		$categories = sdfGetTopLevelCategories();
		// if there are no categories, escape quickly
		if (count($categories) == 0) {
			return "";
		}
		$sd_props = $sdgContLang->getSpecialPropertiesArray();
		$subcategory_text = wfMsg('sd_browsedata_subcategory');

		$header = "";
		$this->show_single_cat = $wgRequest->getCheck('_single');
		if (! $this->show_single_cat) {
			$header .= $this->printCategoriesList($categories);
		}
		$header .= '<div class="drilldown_header">' . "\n";
		if (count ($this->applied_filters) > 0 || $this->subcategory) {
			$category_url = $this->makeBrowseURL($this->category);
			$header .= '	<a href="' . $category_url . '" title="' . wfMsg('sd_browsedata_resetfilters') . '">' . str_replace('_', ' ', $this->category) . '</a>';
		} else
			$header .= str_replace('_', ' ', $this->category);
		if ($this->subcategory) {
			$header .= " > ";
			$header .= "\n	$subcategory_text: ";
			$subcat_string .= str_replace('_', ' ', $this->subcategory);
			$remove_filter_url = $this->makeBrowseURL($this->category, $this->applied_filters);
			$header .= '<span class="drilldown_header_value">' . $subcat_string . '</span> <a href="' . $remove_filter_url . '" title="' . wfMsg('sd_browsedata_removesubcategoryfilter') . '" class="remove"></a>';
		}
		foreach ($this->applied_filters as $i => $af) {
			$header .= (! $this->subcategory && $i == 0) ? " > " : "\n	<span class=\"drilldown_header_value\">&</span> ";
			$labels_for_filter = sdfGetValuesForProperty($af->filter->name, SD_NS_FILTER, SD_SP_HAS_LABEL, false, NS_MAIN);
			if (count($labels_for_filter) > 0) {
				$filter_label = $labels_for_filter[0];
			} else {
				$filter_label = str_replace('_', ' ', $af->filter->name);
			}
			// add an "x" to remove this filter, if it has more
			// than one value
			if (count($this->applied_filters[$i]->values) > 1) {
				$temp_filters_array = $this->applied_filters;
				array_splice($temp_filters_array, $i, 1);
				$remove_filter_url = $this->makeBrowseURL($this->category, $temp_filters_array, $this->subcategory);
				array_splice($temp_filters_array, $i, 0, $filter_value_str);
				$header .= $filter_label . ' <a href="' . $remove_filter_url . '" title="' . wfMsg('sd_browsedata_removefilter') . "\" class=\"remove\"></a> : ";
			} else {
				$header .= "$filter_label: ";
			}
			foreach ($af->values as $j => $fv) {
				if ($j > 0) {$header .= ' <span class="drilldown_or">' . wfMsg('sd_browsedata_or') . '</span> ';}
				if ($af->filter->is_boolean)
					$filter_value = sdfBooleanToString($fv->text);
				elseif ($fv->text == ' other')
					$filter_value_str = wfMsg('sd_browsedata_other');
				elseif ($fv->text == ' none')
					$filter_value_str = wfMsg('sd_browsedata_none');
				else
					$filter_value_str = $fv->text;
				$temp_filters_array = $this->applied_filters;
				$removed_values = array_splice($temp_filters_array[$i]->values, $j, 1);
				$remove_filter_url = $this->makeBrowseURL($this->category, $temp_filters_array, $this->subcategory);
				array_splice($temp_filters_array[$i]->values, $j, 0, $removed_values);
				$header .= "\n	" . '<span class="drilldown_header_value">' . $filter_value_str . '</span> <a href="' . $remove_filter_url . '" title="' . wfMsg('sd_browsedata_removefilter') . '" class="remove"></a>';
			}
		}
		$header .= "\n</div>\n";
		// display the list of subcategories on one line, and below
		// it every filter, each on its own line; each line will
		// contain the possible values, and, in parentheses, the
		// number of pages that match that value
		$header .= "<div class=\"drilldown_filters\">\n";
		$cur_url = $this->makeBrowseURL($this->category, $this->applied_filters, $this->subcategory);
		$cur_url .= (strpos($cur_url, '?')) ? '&' : '?';
		$this->createTempTable($this->category, $this->subcategory, $this->all_subcategories, $this->applied_filters);
		$num_printed_values = 0;
		if (count($this->next_level_subcategories) > 0) {
			$results_line = "";
			foreach ($this->next_level_subcategories as $i => $subcat) {
				$further_subcats = sdfGetCategoryChildren($subcat, true, 10);
				$num_results = $this->getNumResults($subcat, $further_subcats);
				if ($num_results > 0) {
					if ($num_printed_values++ > 0) { $results_line .= " &middot; "; }
					$filter_text = str_replace('_', ' ', $subcat) . " ($num_results)";
					$filter_url = $cur_url . '_subcat=' . urlencode($subcat);
					$results_line .= "\n		" . '<a href="' . $filter_url . '" title="' . wfMsg('sd_browsedata_filterbysubcategory') . '">' . $filter_text . '</a>';
				}
			}
			if ($results_line != "") {
				$header .= "<p><strong>$subcategory_text:</strong> $results_line</p>\n";
			}
		}
		$filters = sdfLoadFiltersForCategory($this->category);
		foreach ($filters as $f) {
			foreach ($this->applied_filters as $af) {
				if ($af->filter->name == $f->name)
					$header .= $this->printAppliedFilterLine($af);
			}
			foreach ($this->remaining_filters as $rf) {
				if ($rf->name == $f->name)
					$header .= $this->printUnappliedFilterLine($rf, $cur_url);
			}
		}
		$header .= "</div>\n";
		$header .= "<div class=\"drilldown_results\">\n";
		return $header;
	}

	function getPageFooter() {
	}

	/*
	 * Used to set URL for additional pages of results
	 */
	function linkParameters() {
		$params = array();
		if ($this->show_single_cat)
			$params['_single'] = NULL;
		$params['_cat'] = $this->category;
		if ($this->subcategory)
			$params['_subcat'] = $this->subcategory;
		foreach ($this->applied_filters as $i => $af) {
			if (count($af->values) == 1) {
				$key_string = str_replace(' ', '_', $af->filter->name);
				$value_string = str_replace(' ', '_', $af->values[0]->text);
				$params[$key_string] = $value_string;
			} else {
				// HACK - QueryPage's pagination-URL code,
				// which uses wfArrayToCGI(), doesn't support
				// two-dimensional arrays, which is what we
				// need - instead, add the brackets directly
				// to the key string
				foreach ($af->values as $i => $value) {
					$key_string = str_replace(' ', '_', $af->filter->name . "[$i]");
					$value_string = str_replace(' ', '_', $value->text);
					$params[$key_string] = $value_string;
				}
			}
		}
		return $params;
	}

	function getSQL() {
		// QueryPage uses the value from this SQL in an ORDER clause,
		// so return page_title as title.
		$sql = "SELECT DISTINCT p.page_title AS title,
			p.page_title AS value,
			p.page_namespace AS namespace ";
		$sql .= $this->getSQLFromClause($this->category, $this->subcategory, $this->all_subcategories, $this->applied_filters);
		return $sql;
	}

	function sortDescending() {
		return false;
	}

	function formatResult($skin, $result) {
		$title = Title::makeTitle( $result->namespace, $result->value );
		return $skin->makeLinkObj( $title, $title->getText() );
	}

	/**
	 * Format and output report results using the given information plus
	 * OutputPage
	 *
	 * @param OutputPage $out OutputPage to print to
	 * @param Skin $skin User skin to use
	 * @param Database $dbr Database (read) connection to use
	 * @param int $res Result pointer
	 * @param int $num Number of available result rows
	 * @param int $offset Paging offset
	 */
	protected function outputResults( $out, $skin, $dbr, $res, $num, $offset ) {
		global $wgContLang, $sdgNumResultsColumns;
	
		if( $num > 0 ) {
			$html = array();
			if( !$this->listoutput )
				$html[] = $this->openList( $offset );
			
			$prev_first_char = "";
			// default to 3 columns, like with categories
			if ($sdgNumResultsColumns == null)
				$sdgNumResultsColumns = 3;
			$rows_per_column = ceil($num / $sdgNumResultsColumns);
			// column width is a percentage
			$column_width = floor(100 / $sdgNumResultsColumns);
			// code borrowed heavily from QueryPage.php
			for ($i = 0; $i < $num && $row = $dbr->fetchObject( $res ); $i++) {
				$line = $this->formatResult( $skin, $row );
				if ($line) {
					$cur_first_char = $row->value{0};
					if ($i % $rows_per_column == 0) {
						$html[] = "<div style=\"float: left; width: $column_width%;\">\n";
						if ($cur_first_char == $prev_first_char)
							$html[] = "<h3>$cur_first_char " . wfMsg('listingcontinuesabbrev') . "</h3>\n<ul>\n";
					}
					// if we're at a new first letter, end
					// the last list and start a new one
					if ($cur_first_char != $prev_first_char) {
						if ($i % $rows_per_column > 0)
							$html[] = "</ul>\n";
						$html[] = "<h3>$cur_first_char</h3>\n<ul>\n";
					}
					$prev_first_char = $cur_first_char;
					$html[] = "	<li>$line</li>\n";
				}
				// end list if we're at the end of the column
				// or the page
				if (($i + 1) % $rows_per_column == 0 || ($i + 1) == $num)
					$html[] = "</ul>\n</div>\n";
			}
			
			# Flush the final result
			if( $this->tryLastResult() ) {
				$row = null;
				$line = $this->formatResult( $skin, $row );
				if( $line ) {
					$html[] = "<li>$line</li>\n";
				}
			}
			$html[] = "</div>\n";
			
			if( !$this->listoutput )
				$html[] = $this->closeList();
			
			$html = $this->listoutput
				? $wgContLang->listToText( $html )
				: implode( '', $html );
			
			$out->addHtml( $html );
		}
	}

	function openList( $offset ) {
	}

	function closeList() {
		return "\n<br style=\"clear: both\" />\n";
	}
}

function doSpecialBrowseData($query = '') {
	global $wgRequest, $wgOut, $sdgScriptPath, $sdgContLang, $sdgNumResultsPerPage;
	$sd_props = $sdgContLang->getSpecialPropertiesArray();

	$mainCssUrl = $sdgScriptPath . '/skins/SD_main.css';
	$wgOut->addLink( array(
		'rel' => 'stylesheet',
		'type' => 'text/css',
		'media' => "screen, projection",
		'href' => $mainCssUrl
	));
	$javascript_text =<<<END
function toggleDiv(element_id, label_element) {
	element = document.getElementById(element_id);
	if (element.style.display == "none") {
		element.style.display = "block";
		label_element.innerHTML = "<img src=\"$sdgScriptPath/skins/down-arrow.png\">";
	} else {
		element.style.display = "none";
		label_element.innerHTML = "<img src=\"$sdgScriptPath/skins/right-arrow.png\">";
	}
}
END;
	$wgOut->addScript('             <script type="text/javascript">' . "\n" . $javascript_text . '</script>' . "\n");

	// set default
	if ($sdgNumResultsPerPage == null)
		$sdgNumResultsPerPage = 250;
	list( $limit, $offset ) = wfCheckLimits($sdgNumResultsPerPage, 'sdlimit');
	$filters = array();

	// get information on current category, subcategory and filters that
	// have already been applied from the query string
	$category = str_replace('_', ' ', $wgRequest->getVal('_cat'));
        // if query string did not contain this variables, try the URL
        if (! $category) {
                $queryparts = explode('/', $query, 1);
                $category = isset($queryparts[0]) ? $queryparts[0] : '';
        }
	if (! $category) {
		$category_title = wfMsg('browsedata');
	} else {
		$titles_for_category = sdfGetValuesForProperty($category, NS_CATEGORY, SD_SP_HAS_DRILLDOWN_TITLE, false, NS_MAIN);
		if (count($titles_for_category) > 0) {
			$category_title = str_replace('_', ' ', $titles_for_category[0]);
		} else {
			$category_title = wfMsg('browsedata') . ": " . $category;
		}
	}
	// if no category was specified, go with the first
	// category on the site, alphabetically
	if (! $category) {
		$categories = sdfGetTopLevelCategories();
		if (count($categories) > 0) {
			$category = $categories[0];
		}
	}

	$wgOut->setPageTitle($category_title);
	$subcategory = $wgRequest->getVal('_subcat');

	$filters = sdfLoadFiltersForCategory($category);

	$filters_used = array();
	foreach ($filters as $i => $filter)
		$filter_used[] = false;
	$applied_filters = array();
	$remaining_filters = array();
	foreach ($filters as $i => $filter) {
		if ($vals_array = $wgRequest->getArray(str_replace(' ', '_', $filter->name))) {
			foreach ($vals_array as $j => $val) {
				$vals_array[$j] = str_replace('_', ' ', $val);
			}
			$applied_filters[] = SDAppliedFilter::create($filter, $vals_array);
			$filter_used[$i] = true;
		}
	}
	// add every unused filter to the $remaining_filters array, unless
	// it requires some other filter that hasn't been applied
	foreach ($filters as $i => $filter) {
		$required_filters = sdfGetValuesForProperty($filter->name, SD_NS_FILTER, SD_SP_REQUIRES_FILTER, true, SD_NS_FILTER);
		$matched_all_required_filters = true;
		foreach ($required_filters as $required_filter) {
			$found_match = false;
			foreach ($applied_filters as $af) {
				if ($af->filter->name == $required_filter) {
					$found_match = true;
				}
			}
			if (! $found_match) {
				$matched_all_required_filters = false;
				continue;
			}
		}
		if ($matched_all_required_filters) {
			if (! $filter_used[$i])
				$remaining_filters[] = $filter;
		}
	}

	$rep = new BrowseDataPage($category, $subcategory, $applied_filters, $remaining_filters);
	return $rep->doQuery( $offset, $limit );
}
