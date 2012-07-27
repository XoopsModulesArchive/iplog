<?php
// $Id: modinfo.php 2980 2009-03-15 22:27:16Z beckmi $
// _LANGCODE: en
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

define("_MI_IPLOG_NAME", "User IP Logger");
define("_MI_IPLOG_DESC", "Module for logging user IP Addresses");

//Admin links
define("_MI_IPLOG_INDEX", "Index");
define("_MI_IPLOG_LOG", "IP Logs");
define("_MI_IPLOG_GRAPHS", "Graphs");
define('_MI_IPLOG_DASHBOARD', 'Dashboard');
define('_MI_IPLOG_ABOUT', 'About Module');

//Preferences
define('_MI_IPLOG_LOGDROPS', 'Log Deletes Itself After');
define('_MI_IPLOG_LOGDROPS_DESC', 'This is how long the log stays on your site for after a record reaches this age it is deleted!');
define('_MI_IPLOG_LOGDROPS_24HOURS', '24 Hours');
define('_MI_IPLOG_LOGDROPS_1WEEK', '1 Week');
define('_MI_IPLOG_LOGDROPS_FORTNIGHT', 'A Fortnight');
define('_MI_IPLOG_LOGDROPS_1MONTH', '1 Month');
define('_MI_IPLOG_LOGDROPS_2MONTHS', '2 Months');
define('_MI_IPLOG_LOGDROPS_3MONTHS', '3 Months');
define('_MI_IPLOG_LOGDROPS_4MONTHS', '4 Months');
define('_MI_IPLOG_LOGDROPS_5MONTHS', '5 Months');
define('_MI_IPLOG_LOGDROPS_6MONTHS', '6 Months');
define('_MI_IPLOG_LOGDROPS_12MONTHS', '1 Year');
define('_MI_IPLOG_LOGDROPS_24MONTHS', '2 Years');
define('_MI_IPLOG_LOGDROPS_36MONTHS', '3 Years');

define('_MI_IPLOG_IPDB_APIKEY', 'IPDB API Key');
define('_MI_IPLOG_IPDB_APIKEY_DESC', 'Register at <a href="http://ipinfodb.com/register.php">IPDB Registration</a> to recieve an API Key');
define('_MI_IPLOG_USER_AGENT', 'cURL User-agent');
define('_MI_IPLOG_USER_AGENT_DESC', 'This is the useragent used when cURL is instanciated');
define('_MI_IPLOG_CURL_CONNECTION_TIMEOUT', 'cURL DNS Connection Timeout');
define('_MI_IPLOG_CURL_CONNECTION_TIMEOUT_DESC', 'This is the number of seconds a DNS has to respond with cURL');
define('_MI_IPLOG_CURL_TIMEOUT', 'cURL Communication Timeout');
define('_MI_IPLOG_CURL_TIMEOUT_DESC', 'This is the number of seconds a server has to respond before cURL timesout');
define('_MI_IPLOG_CURL_SSL_VERIFY_PEER', 'cURL Validates SSL Certificates');
define('_MI_IPLOG_CURL_SSL_VERIFY_PEER_DESC', 'When this is enabled you must have a valid SSL Certificate when connecting with cURL to https://');
define('_MI_IPLOG_CURL_VERBOSE', 'cURL is Verbose');
define('_MI_IPLOG_CURL_VERBOSE_DESC', 'This is the option you can turn on to make cURL behave verbosely!');

// Version 1.02
define("_MI_IPLOG_GUEST", "Guest");
define('_MI_IPLOG_ANONYMOUS', 'Allow Anonymous User to be Logged!');
define('_MI_IPLOG_ANONYMOUS_DESC', 'Enabling this will mean that users that are not logged in are also logged!');
define('_MI_IPLOG_IPV4', 'IPv4');
define('_MI_IPLOG_IPV6', 'IPv6');

?>

