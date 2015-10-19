<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Linkdirectory',
	'Link Directory'
);

// Flexform for Link Directory
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['linkdirectory_linkdirectory'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'linkdirectory_linkdirectory',
	'FILE:EXT:link_directory/Configuration/FlexForm/linkdirectory.xml'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Link Directory');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_linkdirectory_domain_model_link');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'tx_linkdirectory_domain_model_link'
);
