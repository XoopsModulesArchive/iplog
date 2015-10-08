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
 * This File:	modinfo.php
 * Description:	Module Global Language Defines & constants
 * Date:		28/07/2015 5:45PM AEST
 * License:		GNU3
 * 
 */

define("_MI_IPLOG_NAME","User IP Logger");
define("_MI_IPLOG_DESC","Module for logging user IP Addresses");

//Admin links
define("_MI_IPLOG_INDEX","Index");
define("_MI_IPLOG_LOG","IP Logs");
define("_MI_IPLOG_GRAPHS","Graphs");
define('_MI_IPLOG_DASHBOARD','Dashboard');
define('_MI_IPLOG_ABOUT','About Module');

//Preferences
define('_MI_IPLOG_LOGDROPS','Log Deletes Itself After');
define('_MI_IPLOG_LOGDROPS_DESC','This is how long the log stays on your site for after a record reaches this age it is deleted!');
define('_MI_IPLOG_LOGDROPS_24HOURS','24 Hours');
define('_MI_IPLOG_LOGDROPS_1WEEK','1 Week');
define('_MI_IPLOG_LOGDROPS_FORTNIGHT','A Fortnight');
define('_MI_IPLOG_LOGDROPS_1MONTH','1 Month');
define('_MI_IPLOG_LOGDROPS_2MONTHS','2 Months');
define('_MI_IPLOG_LOGDROPS_3MONTHS','3 Months');
define('_MI_IPLOG_LOGDROPS_4MONTHS','4 Months');
define('_MI_IPLOG_LOGDROPS_5MONTHS','5 Months');
define('_MI_IPLOG_LOGDROPS_6MONTHS','6 Months');
define('_MI_IPLOG_LOGDROPS_12MONTHS','1 Year');
define('_MI_IPLOG_LOGDROPS_24MONTHS','2 Years');
define('_MI_IPLOG_LOGDROPS_36MONTHS','3 Years');

define('_MI_IPLOG_IPDB_APIKEY','IPDB API Key');
define('_MI_IPLOG_IPDB_APIKEY_DESC','Register at <a href="http://ipinfodb.com/register.php">IPDB Registration</a> to recieve an API Key');
define('_MI_IPLOG_USER_AGENT','cURL User-agent');
define('_MI_IPLOG_USER_AGENT_DESC','This is the useragent used when cURL is instanciated');
define('_MI_IPLOG_CURL_CONNECTION_TIMEOUT','cURL DNS Connection Timeout');
define('_MI_IPLOG_CURL_CONNECTION_TIMEOUT_DESC','This is the number of seconds a DNS has to respond with cURL');
define('_MI_IPLOG_CURL_TIMEOUT','cURL Communication Timeout');
define('_MI_IPLOG_CURL_TIMEOUT_DESC','This is the number of seconds a server has to respond before cURL timesout');
define('_MI_IPLOG_CURL_SSL_VERIFY_PEER','cURL Validates SSL Certificates');
define('_MI_IPLOG_CURL_SSL_VERIFY_PEER_DESC','When this is enabled you must have a valid SSL Certificate when connecting with cURL to https://');
define('_MI_IPLOG_CURL_VERBOSE','cURL is Verbose');
define('_MI_IPLOG_CURL_VERBOSE_DESC','This is the option you can turn on to make cURL behave verbosely!');

// Version 1.02
define("_MI_IPLOG_GUEST","Guest");
define('_MI_IPLOG_ANONYMOUS','Allow Anonymous User to be Logged!');
define('_MI_IPLOG_ANONYMOUS_DESC','Enabling this will mean that users that are not logged in are also logged!');
define('_MI_IPLOG_IPV4','IPv4');
define('_MI_IPLOG_IPV6','IPv6');

?>

