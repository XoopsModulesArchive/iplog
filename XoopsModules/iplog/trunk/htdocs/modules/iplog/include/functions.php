<?php
	
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