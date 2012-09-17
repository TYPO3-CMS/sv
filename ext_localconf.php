<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
// Register base authentication service
\TYPO3\CMS\Core\Extension\ExtensionManager::addService($_EXTKEY, 'auth', 'TYPO3\\CMS\\Sv\\AuthenticationService', array(
	'title' => 'User authentication',
	'description' => 'Authentication with username/password.',
	'subtype' => 'getUserBE,authUserBE,getUserFE,authUserFE,getGroupsFE,processLoginDataBE,processLoginDataFE',
	'available' => TRUE,
	'priority' => 50,
	'quality' => 50,
	'os' => '',
	'exec' => '',
	'classFile' => \TYPO3\CMS\Core\Extension\ExtensionManager::extPath($_EXTKEY) . 'class.tx_sv_auth.php',
	'className' => 'TYPO3\\CMS\\Sv\\AuthenticationService'
));
// Add hooks to the backend login form
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['loginFormHook'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/class.tx_sv_loginformhook.php:TYPO3\\CMS\\Sv\\LoginFormHook->getLoginFormTag';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['loginScriptHook'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/class.tx_sv_loginformhook.php:TYPO3\\CMS\\Sv\\LoginFormHook->getLoginScripts';
?>