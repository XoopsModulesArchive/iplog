<?php
/*
 * Logs Guest and users IP Addresses for a period of time and provides
* basic statistic of them in XOOPS Copyright (C) 2012 Simon Roberts
* Contact: wishcraft - simon@chronolabs.com
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
* See /docs/license.pdf for full license.
*
* Shouts:- 	Mamba (www.xoops.org), flipse (www.nlxoops.nl)
* 				Many thanks for your additional work with version 1.01
*
* Version:		1.01 Final
* Published:	Chronolabs
* Download:		http://code.google.com/p/chronolabs
* This File:	logger.php
* Description:	Preload for Logging IP Addresses of Clients of Site
* Date:			28/07/2015 5:45PM AEST
* License:		GNU3
*
*/
defined('XOOPS_ROOT_PATH') or die('Restricted access');

include_once (dirname(dirname(__FILE__)).'/include/functions.php');

class IplogLoggerPreload extends XoopsPreloadItem
{
	function eventCoreIncludeCommonEnd($args)
    {
    	$module_handler = xoops_gethandler('module');
    	$config_handler = xoops_gethandler('config');
    	$GLOBALS['iplogModule'] = $module_handler->getByDirname('iplog');
    	$GLOBALS['iplogModuleConfig'] = $config_handler->getConfigList($GLOBALS['iplogModule']->getVar('mid'));
    	 
    	if (is_object($GLOBALS['xoopsUser'])||$GLOBALS['iplogModuleConfig']['anonymous']==true) {
			$log_handler = xoops_getmodulehandler('log', 'iplog');
			$log_handler->writeLog(iplog_getIPData(false));
    	}
    }
}
?>