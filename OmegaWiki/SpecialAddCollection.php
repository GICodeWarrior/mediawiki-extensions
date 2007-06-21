<?php
	if (!defined('MEDIAWIKI')) die();

	require_once("WikiDataAPI.php"); // for bootstrapCollection
	
	$wgAvailableRights[] = 'addcollection';
	$wgGroupPermissions['bureaucrat']['addcollection'] = true;

	$wgExtensionFunctions[] = 'wfSpecialAddCollection';

	function wfSpecialAddCollection() {
		class SpecialAddCollection extends SpecialPage {
			function SpecialAddCollection() {
				SpecialPage::SpecialPage('AddCollection');
			}

			function execute($par) {
				global $wgOut, $wgUser, $wgRequest;

				$wgOut->setPageTitle('Add Collection');

				if (!$wgUser->isAllowed('addcollection')) {
					$wgOut->addHTML('You do not have permission to add a collection.');
					return false;
				}

				$dbr = &wfGetDB(DB_MASTER);

				if ($wgRequest->getText('collection')) {
					require_once('WikiDataAPI.php');
					require_once('Transaction.php');

					$dc = $wgRequest->getText('Dataset');
					$collectionName = $wgRequest->getText('collection');
					startNewTransaction($wgUser->getID(), wfGetIP(), 'Add collection ' . $collectionName);
					bootstrapCollection($collectionName,$wgRequest->getText('language'),$wgRequest->getText('type'), $dc);
					$wgOut->addHTML('<strong>Collection ' . $collectionName . ' added.</strong><br />');	
				}
				$datasets=wdGetDatasets();
				$datasetarray['']=wfMsg('ow_none_selected');
				foreach($datasets as $datasetid=>$dataset) {
					$datasetarray[$datasetid]=$dataset->fetchName();
				}

				$wgOut->addHTML(getOptionPanel(
					array(
						'Collection name' => getTextBox('collection'),
						'Language of name' => getSuggest('language','language'),
						'Collection type' => getSelect('type',array('' => 'None','RELT' => 'RELT','LEVL' => 'LEVL','CLAS' => 'CLAS', 'MAPP' => 'MAPP')),
						'Dataset' => getSelect('Dataset',$datasetarray)
					),
					'',array('create' => 'Create')
				));
			}
		}

		SpecialPage::addPage(new SpecialAddCollection);
	}
?>
