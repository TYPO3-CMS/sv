<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2004 Kasper Skaarhoj (kasper@typo3.com)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Service base class for 'User authentication'.
 *
 * @author	Ren� Fritz <r.fritz@colorcube.de>
 */

require_once(PATH_t3lib.'class.t3lib_svbase.php');

class tx_sv_authbase extends t3lib_svbase 	{

	var $pObj; 						// Parent object
	
	var $mode;						// Subtype of the service which is used to call the service.
	
	var $login=array();				// Submitted login form data 
	var $info=array();				// Various data
	
	var $db_user=array();			// User db table definition
	var $db_groups=array();			// Usergroups db table definition
	
	var $writeAttemptLog = 0;		// If the writelog() functions is called if a login-attempt has be tried without success

	/**
	 * init service
	 *
	 * @param	string 		Subtype of the service which is used to call the service.
	 * @param	array 		Submitted login form data 
	 * @param	array 		Information array. Holds submitted form data etc.
	 * @param	object 		Parent object
	 * @return	void
	 */
	function initAuth($mode, $loginData, $info, &$pObj)	{

		$this->pObj = &$pObj;
		
		$this->mode = $mode;
		$this->login = $loginData;
		$this->info = $info;

		$this->db_user = $this->getServiceOption('db_user', $info['db_user'], FALSE);
		$this->db_groups = $this->getServiceOption('db_groups', $info['db_groups'], FALSE);
		
		$this->writeAttemptLog = $this->pObj->writeAttemptLog;	
		$this->writeDevLog	 = $this->pObj->writeDevLog;	
	}

	/**
	 * Writes to log database table in pObj
	 *
	 * @param	integer		$type: denotes which module that has submitted the entry. This is the current list:  1=tce_db; 2=tce_file; 3=system (eg. sys_history save); 4=modules; 254=Personal settings changed; 255=login / out action: 1=login, 2=logout, 3=failed login (+ errorcode 3), 4=failure_warning_email sent
	 * @param	integer		$action: denotes which specific operation that wrote the entry (eg. 'delete', 'upload', 'update' and so on...). Specific for each $type. Also used to trigger update of the interface. (see the log-module for the meaning of each number !!)
	 * @param	integer		$error: flag. 0 = message, 1 = error (user problem), 2 = System Error (which should not happen), 3 = security notice (admin)
	 * @param	integer		$details_nr: The message number. Specific for each $type and $action. in the future this will make it possible to translate errormessages to other languages
	 * @param	string		$details: Default text that follows the message
	 * @param	array		$data: Data that follows the log. Might be used to carry special information. If an array the first 5 entries (0-4) will be sprintf'ed the details-text...
	 * @param	string		$tablename: Special field used by tce_main.php. These ($tablename, $recuid, $recpid) holds the reference to the record which the log-entry is about. (Was used in attic status.php to update the interface.)
	 * @param	integer		$recuid: Special field used by tce_main.php. These ($tablename, $recuid, $recpid) holds the reference to the record which the log-entry is about. (Was used in attic status.php to update the interface.)
	 * @param	integer		$recpid: Special field used by tce_main.php. These ($tablename, $recuid, $recpid) holds the reference to the record which the log-entry is about. (Was used in attic status.php to update the interface.)
	 * @return	void
	 * @see t3lib_userauthgroup::writelog()
	 */
	function writelog($type,$action,$error,$details_nr,$details,$data,$tablename='',$recuid='',$recpid='')	{
		if($this->pObj->writeAttemptLog) {
			$this->pObj->writelog($type,$action,$error,$details_nr,$details,$data,$tablename,$recuid,$recpid);
		}
	}
	
}


?>