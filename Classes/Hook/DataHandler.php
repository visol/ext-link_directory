<?php
namespace Visol\LinkDirectory\Hook;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/*
	Source: https://stmllr.net/blog/save-and-view-button-for-records-of-typo3-extensions/
*/

class DataHandler {

	public function processDatamap_preProcessFieldArray(&$fieldArray, $table, $uid, &$pObj) {

		if ($table == 'tx_linkdirectory_domain_model_link' && isset($GLOBALS['_POST']['_savedokview_x']) && !$GLOBALS['BE_USER']->workspace) {

			// The GETparam which is used in the single view of the plugin
			//$getParam = 'tx_extExample_pi1[showUid]';

			// get page TSconfig
			$pageTS = \TYPO3\CMS\Backend\Utility\BackendUtility::getPagesTSconfig($GLOBALS['_POST']['popViewId']);

			// get pid of single view
			$previewPid = $pageTS['tx_linkdirectory.']['previewPid'];

			if ($previewPid) {

				// set page id to be shown
				$GLOBALS['_POST']['popViewId'] = $previewPid;

				// don't cache the page
				$GLOBALS['_POST']['popViewId_addParams'] = '&no_cache=1';

				// set language parameter
				if ($fieldArray['sys_language_uid'] > 0) {
					$GLOBALS['_POST']['popViewId_addParams'] .= '&L=' . $fieldArray['sys_language_uid'];
				}

				// set plugin GETparams
				//$GLOBALS['_POST']['popViewId_addParams'] .= '&' . $getParam . '=' . $uid;
			}
		}
	}
}
