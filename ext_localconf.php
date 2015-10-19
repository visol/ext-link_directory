<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Visol.' . $_EXTKEY,
	'Linkdirectory',
	array(
		'Link' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Link' => '',
		
	)
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['tx_linkdirectory'] = 'Visol\\LinkDirectory\\Hook\\DataHandler';

