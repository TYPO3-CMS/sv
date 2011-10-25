<?php

########################################################################
# Extension Manager/Repository config file for ext "sv".
#
# Auto generated 25-10-2011 13:11
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'TYPO3 System Services',
	'description' => 'The core/default sevices. This includes the default authentication services for now.',
	'category' => 'services',
	'shy' => 1,
	'dependencies' => '',
	'conflicts' => '',
	'priority' => 'top',
	'module' => '',
	'state' => 'stable',
	'internal' => 1,
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => 'S',
	'author' => 'Rene Fritz',
	'author_email' => 'r.fritz@colorcube.de',
	'author_company' => 'Colorcube',
	'version' => '1.2.0',
	'_md5_values_when_last_written' => 'a:11:{s:20:"class.tx_sv_auth.php";s:4:"9cd7";s:24:"class.tx_sv_authbase.php";s:4:"6cf1";s:29:"class.tx_sv_loginformhook.php";s:4:"43cc";s:16:"ext_autoload.php";s:4:"af04";s:12:"ext_icon.gif";s:4:"87d7";s:17:"ext_localconf.php";s:4:"9a4f";s:14:"ext_tables.php";s:4:"8b1c";s:44:"reports/class.tx_sv_reports_serviceslist.php";s:4:"a638";s:21:"reports/locallang.xlf";s:4:"3484";s:24:"reports/tx_sv_report.css";s:4:"4e02";s:24:"reports/tx_sv_report.png";s:4:"a01d";}',
	'constraints' => array(
		'depends' => array(
			'php' => '5.3.0-0.0.0',
			'typo3' => '4.6.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
);

?>