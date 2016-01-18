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
* This File:	log.php
* Description:	Log Handler and Object Class for Module Instanciation
* Date:			28/07/2015 5:45PM AEST
* License:		GNU3
*
*/
if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

require_once(dirname(dirname(__FILE__)).'/include/ip2locationlite.class.php');
/**
 * Class for Iplog Profiler
 * @author Simon Roberts (simon@chronolabs.org.au)
 * @copyright copyright (c) 2000-2009 XOOPS.org
 * @package kernel
 */
class IplogLog extends XoopsObject
{

    function IplogLog($fid = null)
    {
        $this->initVar('ip_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('uid', XOBJ_DTYPE_INT, null, false);
        $this->initVar('agent', XOBJ_DTYPE_TXTBOX, null, false, 255);
        $this->initVar('uname', XOBJ_DTYPE_TXTBOX, null, false, 32);        
		$this->initVar('ip4', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('ip6', XOBJ_DTYPE_TXTBOX, null, false, 65535);
		$this->initVar('long', XOBJ_DTYPE_TXTBOX, null, false, 120);
		$this->initVar('network-addy', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('country_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('country-code', XOBJ_DTYPE_TXTBOX, null, false, 3);
		$this->initVar('country-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('region-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('city-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('postcode', XOBJ_DTYPE_TXTBOX, null, false, 15);
		$this->initVar('latitude', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('longitude', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('time-zone', XOBJ_DTYPE_TXTBOX, null, false, 6);
		$this->initVar('proxy-ip4', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('proxy-ip6', XOBJ_DTYPE_TXTBOX, null, false, 65535);						
		$this->initVar('proxy-long', XOBJ_DTYPE_TXTBOX, null, false, 65535);
		$this->initVar('proxy-network-addy', XOBJ_DTYPE_TXTBOX, null, false, 65535);
		$this->initVar('proxy-country_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('proxy-country-code', XOBJ_DTYPE_TXTBOX, null, false, 3);
		$this->initVar('proxy-country-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('proxy-region-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('proxy-city-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('proxy-postcode', XOBJ_DTYPE_TXTBOX, null, false, 15);
		$this->initVar('proxy-latitude', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('proxy-longitude', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('proxy-time-zone', XOBJ_DTYPE_TXTBOX, null, false, 6);
		$this->initVar('session_id', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('start', XOBJ_DTYPE_INT, null, false);
		$this->initVar('end', XOBJ_DTYPE_INT, null, false);
		$this->initVar('online', XOBJ_DTYPE_INT, null, false);
    }
	
    function toArray() {
    	$ret = parent::toArray();
    	$ret['made'] = date(_DATESTRING, $this->getVar('made'));
    	if ($this->getVar('country_id')!=0) {
    		$countries_handler = xoops_getmodulehandler('countries', 'iplog');
    		$country = $countries_handler->get($this->getVar('country_id'));
    		if (is_object($country))
    			$ret['country'] = $country->toArray();
    	} else {
    		$ret['country']['code'] = '--';
    		$ret['country']['name'] = '--';
    		$ret['country']['continent'] = '--';
    		$ret['country']['region'] = '--';
    	}
		$comment_handler = xoops_gethandler('comment');
		$module_handler = xoops_gethandler('module');
		$GLOBALS['moduleIplog'] = $module_handler->getByDirname('iplog');
		$criteria = new CriteriaCompo(new Criteria('com_itemid', $this->getVar('member_id')));
		$criteria->add(new Criteria('com_modid', $GLOBALS['moduleIplog']->getVar('mid')));
		$comments = $comment_handler->getObjects($criteria, true);
		if (count($comments)>0) {
			foreach($comments as $com_id => $comment);
				$ret['comments'][$com_id] = $comment->toArray();
		}
		foreach($ret as $key => $value) {
			if (is_array($value)) {
				foreach ($value as $keyb => $valueb) {
					unset($value[$keyb]);
					$value[str_replace('-', '_', $keyb)] = $valueb;
				}
			}
			unset($ret[$key]);
			$ret[str_replace('-', '_', $key)] = $value;
		}
		$ret['ip'] = $this->getIPAddy().' ('.$this->getIPType().')';
		$ret['proxy_ip'] = (strlen($this->getProxyIPAddy())?$this->getProxyIPAddy():'--');
		$ret['start'] = date(_DATESTRING,$ret['start']);
		$ret['end'] = date(_DATESTRING,$ret['end']);
		if ($ret['uid']==0)
			$ret['uname'] = _MI_IPLOG_GUEST;
		else
			$ret['uname'] = '<a href="'.XOOPS_URL.'/userinfo.php?uid='.$ret['uid'].'">'.$ret['uname'].'</a>';
    	return $ret;
    	
    }

    function setIPAddy($ip) {
    	if ($this->validateIPv4($ip))
    		$this->setVar('ip4', $ip);
    	elseif ($this->validateIPv6($ip))
    		$this->setVar('ip6', $ip);
    	elseif (strpos($ip,'.')>0&&count(explode('.', $ip))==4)
    		$this->setVar('ip4', $ip);
    	elseif (strpos($ip,':')>0&&count(explode(':', $ip))>=5)
    		$this->setVar('ip6', $ip);
    }
    
    function setProxyIPAddy($ip) {
    	if ($this->validateIPv4($ip))
    		$this->setVar('proxy-ip4', $ip);
    	elseif ($this->validateIPv6($ip))
    		$this->setVar('proxy-ip6', $ip);
    }
    
	function getIPAddy() {
		if (strlen($this->getVar('ip4'))>0)
			return $this->getVar('ip4');
		elseif (strlen($this->getVar('ip6'))>0)
			return $this->getVar('ip6');
		return false;
	}
	
	function getProxyIPAddy() {
		if (strlen($this->getVar('proxy-ip4'))>0)
			return $this->getVar('proxy-ip4');
		elseif (strlen($this->getVar('proxy-ip6'))>0)
			return $this->getVar('proxy-ip6');
		return false;
	}
	
	function getIPType() {
		if (strlen($this->getVar('ip4'))>0)
			return _MI_IPLOG_IPV4;
		elseif (strlen($this->getVar('ip6'))>0)
			return _MI_IPLOG_IPV6;
	}
	
	private function validateIPv4($ip) {
		if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE) === FALSE) // returns IP is valid
		{
			return false;
		} else {
			return true;
		}
	}	

	private function validateIPv6($ip) {
		if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === FALSE) // returns IP is valid
		{
			return false;
		} else {
			return true;
		}
	}	
		
}


/**
* XOOPS Iplog Profiler handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.org.au>
* @package kernel
*/
class IplogLogHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
        parent::__construct($db, "iplog_log", 'IplogLog', "ip_id", "session_id");
    }
	
    function getFields() {
    	return array('ip_id', 'uname', 'ip', 'country_code', 'name', 'region', 'contient', 'network_addy', 'agent', 'proxy_ip', 'start', 'end', 'online');
    }
    
    function writeLog($data) {
    	$obj = $this->create();
    	$obj->setVars($data);
    	$obj->setIPAddy($data['ip']);
    	if ($data['proxied'])
    		$obj->setProxyIPAddy($data['proxy-ip']);
    	return $this->insert($obj, true);
    }
    
    function insert($obj, $force = true) {
    	xoops_load('xoopscache');
    	$ping = XoopsCache::read('iplog_ip_ping_unixtimes');
    	if (!is_array($ping)==true) {
    		$ping=array($obj->getIPAddy()=>microtime(true));
    		$oldping=microtime(true);
    	} else {
    		if (time()-$ping[$obj->getIPAddy()]>$GLOBALS['xoopsConfig']['session_expire']*60) {
    			$pingnew = true;
    		} else {
    			$pingnew = false;
    		}
    		$oldping=$ping[$obj->getIPAddy()];
    		$ping[$obj->getIPAddy()]=microtime(true);
    	}
    	XoopsCache::write('iplog_ip_ping_unixtimes', $ping, 60*60*24*7*4);
    	
    	if ($this->getCount(new Criteria('session_id', session_id())&&is_object($GLOBALS['xoopsUser']))&&$pingnew!=true) {
    		$criteria = new Criteria('session_id', session_id());
    		$criteria->setSort('`ip_id`');
    		$criteria->setOrder('DESC');
    		$criteria->setLimit(1);
    		$objs = $this->getObjects($criteria, false);
    		if (is_object($objs[0])) {	
    			$obj = $objs[0];
    			$obj->setVar('end', $ping[$obj->getIPAddy()]);
    			$obj->setVar('online', $obj->getVar('end')-$obj->getVar('start'));
    		}
    	} elseif (!is_object($GLOBALS['xoopsUser'])&&$GLOBALS['iplogModuleConfig']['anonymous']&&$pingnew!=true) {
    		if ($obj->getIPType()==_MI_IPLOG_IPV4) {
    			$criteria = new Criteria('ip4', $obj->getIPAddy());
    			$criteria->setSort('`ip_id`');
    			$criteria->setOrder('DESC');
    			$criteria->setLimit(1);
    			$objs = $this->getObjects($criteria, false);
    		} elseif ($obj->getIPType()==_MI_IPLOG_IPV6) {
    			$criteria = new Criteria('ip6', $obj->getIPAddy());
    			$criteria->setSort('`ip_id`');
    			$criteria->setOrder('DESC');
    			$criteria->setLimit(1);
    			$objs = $this->getObjects($criteria, false);
    		}
    		if (is_object($objs[0])) {
    			$obj = $objs[0];
    			$obj->setVar('end', $ping[$obj->getIPAddy()]);
    			$obj->setVar('online', $obj->getVar('end')-$obj->getVar('start'));
    		}
    	}
    	if ($obj->isNew()) {
    		
    		$obj->setVar('session_id', session_id());
    		$obj->setVar('start', $ping[$obj->getIPAddy()]);
    		$obj->setVar('end', $ping[$obj->getIPAddy()]);
    		
    		if (strlen($obj->getVar('ip4'))<>0) {
	    		if (strlen($obj->getVar('ip4'))<7) {
	    			return false;
	    		} elseif (substr($obj->getVar('ip4'), strlen($obj->getVar('ip4'))-1, 1) == '.') {
	    			return false;
	    		} else {
	    			$count = count(explode('.', $obj->getVar('ip4')));
	    			if ($count!=4)
	    				return false;
	    		}
    		} elseif (strlen($obj->getVar('ip6'))<>0) {
    			if (strlen($obj->getVar('ip6'))<15) {
	    			return false;
	    		} elseif (substr($obj->getVar('ip6'), strlen($obj->getVar('ip6'))-1, 1) == ':') {
	    			return false;
	    		} else {
	    			$count = count(explode(':',$obj->getVar('ip6')));
	    			if ($count<5)
	    				return false;
	    		}
    		}

    		if (strlen($obj->getVar('long'))==0)
    			$obj->setVar('long', @ip2long($obj->getIPAddy()));
    		
    		if (strlen($obj->getVar('network-addy'))<strlen(strlen($obj->getIPAddy())))
    			$obj->setVar('network-addy', @gethostbyaddr($obj->getIPAddy()));
    		
    		$ipLite = new ip2location_lite;
			$ipLite->setKey($GLOBALS['iplogModuleConfig']['ipinfodb_key']);
 			//Get errors and locations
			$locations = $ipLite->getCity($obj->getIPAddy());
			$countries_handler = xoops_getmodulehandler('countries', 'iplog');
			$obj->setVar('country_id', $countries_handler->getIDByCode(strtoupper($locations['countryCode'])));
    		$obj->setVar('country-code', strtoupper($locations['countryCode']));
    		$obj->setVar('country-name', ucfirst($locations['countryName']));
    		$obj->setVar('region-name', ucfirst($locations['regionName']));
    		$obj->setVar('city-name', ucfirst($locations['cityName']));
    		$obj->setVar('postcode', $locations['zipCode']);
    		$obj->setVar('latitude', $locations['latitude']);
    		$obj->setVar('longitude', $locations['longitude']);
    		$obj->setVar('time-zone', $locations['timeZone']);

    		if ($obj->getProxyIPAddy()!=false) {
    			if (strlen($obj->getVar('proxy-long'))==0)
    				$obj->setVar('proxy-long', @ip2long($obj->getProxyIPAddy()));
    			
    			if (strlen($obj->getVar('proxy-network-addy'))<strlen(strlen($obj->getProxyIPAddy())))
    				$obj->setVar('proxy-network-addy', @gethostbyaddr($obj->getProxyIPAddy()));
    			 
	    		$locations = $ipLite->getCity($obj->getProxyIPAddy());
	    		$countries_handler = xoops_getmodulehandler('countries', 'iplog');
	    		$obj->setVar('proxy-country_id', $countries_handler->getIDByCode(strtoupper($locations['countryCode'])));
	    		$obj->setVar('proxy-country-code', strtoupper($locations['countryCode']));
	    		$obj->setVar('proxy-country-name', ucfirst($locations['countryName']));
	    		$obj->setVar('proxy-region-name', ucfirst($locations['regionName']));
	    		$obj->setVar('proxy-city-name', ucfirst($locations['cityName']));
	    		$obj->setVar('proxy-postcode', $locations['zipCode']);
	    		$obj->setVar('proxy-latitude', $locations['latitude']);
	    		$obj->setVar('proxy-longitude', $locations['longitude']);
	    		$obj->setVar('proxy-time-zone', $locations['timeZone']);
    		}
    	}
    	
    	$ret = parent::insert($obj, $force);
    	$this->deleteAll(new Criteria('end', time() - $GLOBALS['iplogModuleConfig']['logdrops'], '<='));
    	return $ret;
    	
    }
    
    function getNumberByCountry() {
    	$sql = 'SELECT DISTINCT `country-name` as node, count(*) as total FROM `'.$this->table.'` GROUP BY `country-name`';
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
    
    function getNumberByRegion() {
    	$sql = 'SELECT DISTINCT `b`.`region` as node, count(*) as total FROM `'.$this->table.'` a INNER JOIN `'.$GLOBALS['xoopsDB']->prefix('iplog_countries').'` b ON a.country_id = b.country_id GROUP BY `b`.`region`';
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
    
    function getNumberByContinent() {
    	$sql = 'SELECT DISTINCT `b`.`continent` as node, count(*) as total FROM `'.$this->table.'` a INNER JOIN `'.$GLOBALS['xoopsDB']->prefix('iplog_countries').'` b ON a.country_id = b.country_id GROUP BY `b`.`continent`';
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
    
    function getTotalSecondsByCountry() {
    	$sql = 'SELECT DISTINCT `country-name` as node, sum(`online`)/60 as total FROM `'.$this->table.'` GROUP BY `country-name`';
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
    
    function getTotalSecondsByRegion() {
    	$sql = 'SELECT DISTINCT `b`.`region` as node, sum(`online`)/60 as total FROM `'.$this->table.'` a INNER JOIN `'.$GLOBALS['xoopsDB']->prefix('iplog_countries').'` b ON a.country_id = b.country_id GROUP BY `b`.`region`';;
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
        
    function getTotalSecondsByContinent() {
    	$sql = 'SELECT DISTINCT `b`.`continent` as node, sum(`online`)/60 as total FROM `'.$this->table.'` a INNER JOIN `'.$GLOBALS['xoopsDB']->prefix('iplog_countries').'` b ON a.country_id = b.country_id GROUP BY `b`.`continent`';;
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
    
    function getAdverageSecondsByCountry() {
    	$sql = 'SELECT DISTINCT `country-name` as node, avg(`online`)/60 as total FROM `'.$this->table.'` GROUP BY `country-name`';
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
    
    function getAdverageSecondsByRegion() {
    	$sql = 'SELECT DISTINCT `b`.`region` as node, avg(`online`)/60 as total FROM `'.$this->table.'` a INNER JOIN `'.$GLOBALS['xoopsDB']->prefix('iplog_countries').'` b ON a.country_id = b.country_id GROUP BY `b`.`region`';;
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
    
    function getAdverageSecondsByContinent() {
    	$sql = 'SELECT DISTINCT `b`.`continent` as node, avg(`online`)/60 as total FROM `'.$this->table.'` a INNER JOIN `'.$GLOBALS['xoopsDB']->prefix('iplog_countries').'` b ON a.country_id = b.country_id GROUP BY `b`.`continent`';;
    	$result = $GLOBALS['xoopsDB']->queryF($sql);
    	$ret = array();
    	while ($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
    		$ret[] = $row;
    	}
    	return $ret;
    }
}
?>
