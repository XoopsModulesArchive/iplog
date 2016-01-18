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
 * This File:	xoops_version.php		
 * Description:	IP Log module definition file
 * Date:		28/07/2015 5:45PM AEST
 * License:		GNU3
 * 
 */

error_reporting(0);
$modversion = array();
$modversion['name'] = _MI_IPLOG_NAME;
$modversion['version'] = 1.01;
$modversion['description'] = _MI_IPLOG_DESC;
$modversion['author'] = "Wishcraft";
$modversion['credits'] = "wishcraft";
$modversion['license'] = "GPL see XOOPS LICENSE";
$modversion['image'] = "images/logo.png";
$modversion['dirname'] = "iplog";
$modversion['website'] = "www.xoops.org";

$modversion['dirmoduleadmin'] = 'Frameworks/moduleclasses';
$modversion['system_icons16'] = 'Frameworks/moduleclasses/icons/16';
$modversion['system_icons32'] = 'Frameworks/moduleclasses/icons/32';
$modversion['icons16'] = 'modules/'.$modversion['dirname'].'/images/icons/16';
$modversion['icons32'] = 'modules/'.$modversion['dirname'].'/images/icons/32';

$modversion['release_info'] = "Stable 2012/07/28";
$modversion['release_file'] = XOOPS_URL."/modules/profile/docs/changelog.txt";
$modversion['release_date'] = "2012/07/28";

$modversion['author_realname'] = "Simon Antony Roberts";
$modversion['author_website_url'] = "http://www.chronolabs.com.au";
$modversion['author_website_name'] = "Chronolabs Australia";
$modversion['author_email'] = "simon@chronolabs.com.au";
$modversion['demo_site_url'] = "http://xoops.demo.si-m-on.com";
$modversion['demo_site_name'] = "Chronolabs Demo Site";
$modversion['support_site_url'] = "http://code.google.com/p/chronolabs/";
$modversion['support_site_name'] = "Chronolabs @ Google Code";
$modversion['submit_bug'] = "http://code.google.com/p/chronolabs/issues/";
$modversion['submit_feature'] = "http://code.google.com/p/chronolabs/issues/";
$modversion['usenet_group'] = "sci.chronolabs";
$modversion['maillist_announcements'] = "";
$modversion['maillist_bugs'] = "";
$modversion['maillist_features'] = "";


// Admin things
$modversion['hasAdmin'] = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex'] = "admin/dashboard.php";
$modversion['adminmenu'] = "admin/menu.php";

// Scripts to run upon installation or update
//$modversion['onInstall'] = "include/install.php";
//$modversion['onUpdate'] = "include/update.php";

// Menu
$modversion['hasMain'] = 0;

// Mysql file
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Tables created by sql file (without prefix!)
$modversion['tables'][1] = "iplog_log";
$modversion['tables'][2] = "iplog_countries";


// Comments
$modversion['hasComments'] = false;
$modversion['comments']['itemName'] = 'uid';
$modversion['comments']['pageName'] = 'userinfo.php';

//Blocks
$i=0;

// Config items
$i=0;

$i++;
$modversion['config'][$i]['name'] = 'anonymous';
$modversion['config'][$i]['title'] = '_MI_IPLOG_ANONYMOUS';
$modversion['config'][$i]['description'] = '_MI_IPLOG_ANONYMOUS_DESC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = false;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'logdrops';
$modversion['config'][$i]['title'] = '_MI_IPLOG_LOGDROPS';
$modversion['config'][$i]['description'] = '_MI_IPLOG_LOGDROPS_DESC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = (60*60*24*7*4*2);
$modversion['config'][$i]['options'] = array(_MI_IPLOG_LOGDROPS_24HOURS => (60*60*24), _MI_IPLOG_LOGDROPS_1WEEK => (60*60*24*7), _MI_IPLOG_LOGDROPS_FORTNIGHT => (60*60*24*7*2),
		_MI_IPLOG_LOGDROPS_1MONTH => (60*60*24*7*4*1), _MI_IPLOG_LOGDROPS_2MONTHS => (60*60*24*7*4*2), _MI_IPLOG_LOGDROPS_3MONTHS => (60*60*24*7*4*3),
		_MI_IPLOG_LOGDROPS_4MONTHS => (60*60*24*7*4*4), _MI_IPLOG_LOGDROPS_5MONTHS => (60*60*24*7*4*5), _MI_IPLOG_LOGDROPS_6MONTHS => (60*60*24*7*4*6),
		_MI_IPLOG_LOGDROPS_12MONTHS => (60*60*24*7*4*12), _MI_IPLOG_LOGDROPS_24MONTHS => (60*60*24*7*4*24));
	
$i++;
$modversion['config'][$i]['name'] = 'ipinfodb_key';
$modversion['config'][$i]['title'] = '_MI_IPLOG_IPDB_APIKEY';
$modversion['config'][$i]['description'] = '_MI_IPLOG_IPDB_APIKEY_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'user_agent';
$modversion['config'][$i]['title'] = "_MI_IPLOG_USER_AGENT";
$modversion['config'][$i]['description'] = "_MI_IPLOG_USER_AGENT_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'Mozilla/5.0 ('.XOOPS_VERSION.'; cURL; PHP '.PHP_VERSION.') IPlog/'.$modversion['version'];

$i++;
$modversion['config'][$i]['name'] = 'curl_connection_timeout';
$modversion['config'][$i]['title'] = "_MI_IPLOG_CURL_CONNECTION_TIMEOUT";
$modversion['config'][$i]['description'] = "_MI_IPLOG_CURL_CONNECTION_TIMEOUT_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 30;

$i++;
$modversion['config'][$i]['name'] = 'curl_timeout';
$modversion['config'][$i]['title'] = "_MI_IPLOG_CURL_TIMEOUT";
$modversion['config'][$i]['description'] = "_MI_IPLOG_CURL_TIMEOUT_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 30;

$i++;
$modversion['config'][$i]['name'] = 'curl_ssl_verify';
$modversion['config'][$i]['title'] = "_MI_IPLOG_CURL_SSL_VERIFY_PEER";
$modversion['config'][$i]['description'] = "_MI_IPLOG_CURL_SSL_VERIFY_PEER_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = false;

$i++;
$modversion['config'][$i]['name'] = 'curl_verbose';
$modversion['config'][$i]['title'] = "_MI_IPLOG_CURL_VERBOSE";
$modversion['config'][$i]['description'] = "_MI_IPLOG_CURL_VERBOSE_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = false;

// Templates
$i = 0;

$i++;
$modversion['templates'][$i]['file'] = 'iplog_log_list.html';
$modversion['templates'][$i]['description'] = '';


?>