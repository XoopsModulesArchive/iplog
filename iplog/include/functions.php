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
* This File:	function.php
* Description:	General functions for IP Log Module
* Date:			28/07/2015 5:45PM AEST
* License:		GNU3
*
*/	
	function iplog_get_curl($url) {
		$ch 		= curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER,	 	$header);
		curl_setopt($ch, CURLOPT_USERAGENT,		 	$GLOBALS['iplogModuleConfig']['user_agent']);
		curl_setopt($ch, CURLOPT_URL, 			 	$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 	true);
		curl_setopt($ch, CURLOPT_HEADER, 		 	false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 	$GLOBALS['iplogModuleConfig']['curl_ssl_verify']);
		curl_setopt($ch, CURLOPT_VERBOSE, 			$GLOBALS['iplogModuleConfig']['curl_verbose']);
		curl_setopt($ch, CURLOPT_TIMEOUT, 		 	$GLOBALS['iplogModuleConfig']['curl_timeout']);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 	$GLOBALS['iplogModuleConfig']['curl_connection_timeout']);
		$txt = curl_exec($ch);
		if ($txt === false) {
			$error = curl_error($ch);
			curl_close($ch);
			trigger_error('CURL error: ' . $error);
		} 
		curl_close($ch);
		return $txt;
	}
	
	function iplog_getIP() {
	    $ip = $_SERVER['REMOTE_ADDR'];
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    return $ip;
	}

	if (!function_exists("iplog_getIPData")) {
		function iplog_getIPData($ip=false){
			
			$module_handler = xoops_gethandler('module');
			$config_handler = xoops_gethandler('config');
			$GLOBALS['iplogModule'] = $module_handler->getByDirname('iplog');
			$GLOBALS['iplogModuleConfig'] = $config_handler->getConfigList($GLOBALS['iplogModule']->getVar('mid'));
				
			$ret = array();
			if (is_object($GLOBALS['xoopsUser'])) {
				$ret['uid'] = $GLOBALS['xoopsUser']->getVar('uid');
				$ret['uname'] = $GLOBALS['xoopsUser']->getVar('uname');
			} else {
				$ret['uid'] = 0;
				$ret['uname'] = (isset($_REQUEST['uname'])?$_REQUEST['uname']:'');
			}
			$ret['agent'] = $_SERVER['HTTP_USER_AGENT'];
			if (!$ip) {
				if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])||isset($_SERVER["HTTP_CLIENT_IP"])){
					$ip = (string)iplog_getIP();
					$ret['proxied'] = true;
					$proxy_ip = $_SERVER["REMOTE_ADDR"];
					$ret['network-addy'] = @gethostbyaddr($ip);
					$ret['long'] = @ip2long($ip);
					$ret['ip'] = $ip;
					$ret['proxy-ip'] = $proxy_ip;
					$ret['proxy-network-addy'] = @gethostbyaddr($proxy_ip);
				}else{
					$ret['proxied'] = false;
					$ip = (string)iplog_getIP();
					$ret['network-addy'] = @gethostbyaddr($ip);
					$ret['long'] = @ip2long($ip);
					$ret['ip'] = $ip;				}
			} else {
				$ret['proxied'] = false;
				$ret['network-addy'] = @gethostbyaddr($ip);
				$ret['long'] = @ip2long($ip);
				$ret['ip'] = $ip;
			}
			$ret['made'] = time();
			return $ret;
		}
	}
	
	if (!function_exists("is_ipv6")) {
		function is_ipv6($ip = "")
		{
			if ($ip == "")
				return false;
				
			if (substr_count($ip,":") > 0){
				return true;
			} else {
				return false;
			}
		}
	}
	if (!function_exists("iplog_object2array")) {
		function iplog_object2array($objects) {
			$ret = array();
			foreach((array)$objects as $key => $value) {
				if (is_object($value)) {
					$ret[$key] = iplog_object2array($value);
				} elseif (is_array($value)) {
					$ret[$key] = iplog_object2array($value);
				} else {
					$ret[$key] = $value;
				}
			}
			return $ret;
		}
	}

?>