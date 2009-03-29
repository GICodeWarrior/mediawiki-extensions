<?php

/*
 * Created on Mar 28, 2009
 *
 * AbuseFilter extension
 *
 * Copyright (C) 2008 Alex Z. mrzmanwiki AT gmail DOT com
 * Based mostly on code by Bryan Tong Minh and Roan Kattouw
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Query module to list abuse log entries.
 *
 * @ingroup API
 * @ingroup Extensions
 */
class ApiQueryAbuseLog extends ApiQueryBase {

	public function __construct($query, $moduleName) {
		parent :: __construct($query, $moduleName, 'afl');
	}

	public function execute() {
		global $wgUser;
		if(!$wgUser->isAllowed('abusefilter-log'))
			$this->dieUsage('You don\'t have permission to view the abuse log', 'permissiondenied');
			
		$params = $this->extractRequestParams();

		$prop = array_flip($params['prop']);
		$fld_ids = isset($prop['ids']);
		$fld_filter = isset($prop['filter']);
		$fld_user = isset($prop['user']);
		$fld_title = isset($prop['title']);
		$fld_action = isset($prop['action']);
		$fld_details = isset($prop['details']);
		if($fld_details && !$wgUser->isAllowed('abusefilter-log-detail'))
			$this->dieUsage('You don\'t have permission to view detailed abuse log entries', 'permissiondenied');
		$fld_result = isset($prop['result']);
		$fld_timestamp = isset($prop['timestamp']);

		$result = $this->getResult();
		$data = array();

		$this->addTables('abuse_filter_log');
		if($fld_filter) {
			$this->addTables('abuse_filter');
			$this->addFields('af_public_comments');
			$this->addJoinConds(array('abuse_filter' => 
				array('JOIN', 'afl_filter=af_id'))
			);
		}
		$this->addFieldsIf(array('afl_id', 'afl_filter'), $fld_ids);
		$this->addFieldsIf('afl_user_text', $fld_user);
		$this->addFieldsIf(array('afl_namespace', 'afl_title'), $fld_title);
		$this->addFieldsIf('afl_action', $fld_action);
		$this->addFieldsIf('afl_var_dump', $fld_details);
		$this->addFieldsIf('afl_actions', $fld_result);
		$this->addFields('afl_timestamp');

		$this->addOption('LIMIT', $params['limit'] + 1);
		
		$this->addWhereRange('afl_timestamp', $params['dir'], $params['start'], $params['end']);
		
		$this->addWhereIf( array('afl_user_text' => $params['user']), isset($params['user']));
		$this->addWhereIf( array('afl_filter' => $params['filter']), isset($params['filter']));
		
		$title = $params['title'];
		if (!is_null($title)) {
			$titleObj = Title :: newFromText($title);
			if (is_null($titleObj))
				$this->dieUsage("Bad title value '$title'", 'param_title');
			$this->addWhereFld('afl_namespace', $titleObj->getNamespace());
			$this->addWhereFld('afl_title', $titleObj->getDBkey());
		}		
		$res = $this->select(__METHOD__);

		$count = 0;
		while($row = $res->fetchObject())
		{
			if(++$count > $params['limit'])
			{
				// We've had enough
				$this->setContinueEnumParameter('start', wfTimestamp(TS_ISO_8601, $row->afl_timestamp));
				break;
			}
			$entry = array();
			if($fld_ids) {
				$entry['id'] = $row->afl_id;
				$entry['filter_id'] = $row->afl_filter;
			}
			if($fld_filter)
				$entry['filter'] = $row->af_public_comments;
			if($fld_user)
				$entry['user'] = $row->afl_user_text;
			if($fld_title) {
				$title = Title::makeTitle($row->afl_namespace, $row->afl_title);
				ApiQueryBase::addTitleInfo($entry, $title);
			}
			if($fld_action)
				$entry['action'] = $row->afl_action;
			if($fld_result)
				$entry['result'] = $row->afl_actions;
			if($fld_timestamp)
				$entry['timestamp'] = wfTimestamp(TS_ISO_8601, $row->afl_timestamp);
			if($fld_details) {
				$vars = AbuseFilter::loadVarDump($row->afl_var_dump);
				if ($vars instanceof AbuseFilterVariableHolder) {
					$entry['details'] = $vars->exportAllVars();
				} else {
					$entry['details'] = array_change_key_case($vars, CASE_LOWER);
				}
			}
			if ($entry)
				$data[] = $entry;
		}
		$result->setIndexedTagName($data, 'item');
		$result->addValue('query', $this->getModuleName(), $data);
	}

	public function getAllowedParams() {
		return array (
			'start' => array(
				ApiBase :: PARAM_TYPE => 'timestamp'
			),
			'end' => array(
				ApiBase :: PARAM_TYPE => 'timestamp',
			),
			'dir' => array(
				ApiBase :: PARAM_TYPE => array(
					'newer',
					'older'
				),
				ApiBase :: PARAM_DFLT => 'older'
			),
			'user' => null,
			'title' => null,
			'filter' => null,
			'limit' => array(
				ApiBase :: PARAM_DFLT => 10,
				ApiBase :: PARAM_TYPE => 'limit',
				ApiBase :: PARAM_MIN => 1,
				ApiBase :: PARAM_MAX => ApiBase :: LIMIT_BIG1,
				ApiBase :: PARAM_MAX2 => ApiBase :: LIMIT_BIG2
			),
			'prop' => array(
				ApiBase :: PARAM_DFLT => 'ids|user|title|action|result|timestamp',
				ApiBase :: PARAM_TYPE => array(
						'ids',
						'filter',
						'user',
						'title',
						'action',
						'details',
						'result',
						'timestamp',
					),
				ApiBase :: PARAM_ISMULTI => true
			)
		);
	}	
	
	public function getParamDescription() {
		return array (
			'start' => 'The timestamp to start enumerating from',
			'end' => 'The timestamp to stop enumerating at',
			'dir' => 'The direction in which to enumerate',
			'title' => 'Show only entries occurring on a given page.',
			'user' => 'Show only entries done by a given user or IP address.',
			'filter' => 'Show only entries that were caught by a given filter ID', 
			'limit' => 'The maximum amount of entries to list',
			'prop' => 'Which properties to get',
		);
	}

	public function getDescription() {
		return 'Show events that were caught by one of the abuse filters.';
	}

	protected function getExamples() {
		return array('api.php?action=query&list=abuselog',
			'api.php?action=query&list=abuselog&afltitle=API'
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
