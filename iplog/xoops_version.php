<?php
/**
 * Extended User Profile
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         profile
 * @since           2.3.0
 * @author          Jan Pedersen
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: xoops_version.php 4361 2010-02-09 23:36:33Z trabis $
 */

/**
 * This is a temporary solution for merging XOOPS 2.0 and 2.2 series
 * A thorough solution will be available in XOOPS 3.0
 *
 */
error_reporting(E_ALL);
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
$modversion['icons16'] = 'Frameworks/moduleclasses/icons/16';
$modversion['icons32'] = 'Frameworks/moduleclasses/icons/32';

$modversion['release_info'] = "Stable 2012/07/27";
$modversion['release_file'] = XOOPS_URL."/modules/profile/docs/changelog.txt";
$modversion['release_date'] = "2012/07/27";

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