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
 * Download:	http://code.google.com/p/chronolabs
 * This File:	menu.php
 * Description:	User admin menu defines for menu variables
 * Date:		28/07/2015 5:45PM AEST
 * License:		GNU3
 * 
 */
$module_handler = xoops_gethandler('module');
$GLOBALS['iplogModule'] = $module_handler->getByDirname('iplog');
$adminmenu = array();
if (is_object($GLOBALS['iplogModule'])) {	
	$adminmenu[0]['title'] = _MI_IPLOG_DASHBOARD;
	$adminmenu[0]['icon'] = '../../'.$GLOBALS['iplogModule']->getInfo('system_icons32').'/home.png';
	$adminmenu[0]['image'] = '../../'.$GLOBALS['iplogModule']->getInfo('system_icons32').'/home.png';
	$adminmenu[0]['link'] = "admin/dashboard.php";
	$adminmenu[1]['title'] = _MI_IPLOG_LOG;
	$adminmenu[1]['icon'] = '../../'.$GLOBALS['iplogModule']->getInfo('icons32').'/iplog.log.png';
	$adminmenu[1]['image'] = '../../'.$GLOBALS['iplogModule']->getInfo('icons32').'/iplog.log.png';
	$adminmenu[1]['link'] = "admin/log.php";
	$adminmenu[2]['title'] = _MI_IPLOG_ABOUT;
	$adminmenu[2]['icon'] = '../../'.$GLOBALS['iplogModule']->getInfo('system_icons32').'/about.png';
	$adminmenu[2]['image'] = '../../'.$GLOBALS['iplogModule']->getInfo('system_icons32').'/about.png';
	$adminmenu[2]['link'] = "admin/about.php";
}
?>