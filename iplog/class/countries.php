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
 * This File:	countries.php
 * Description:	Countries Handler and Object Class for Module
 * Date:		28/07/2015 5:45PM AEST
 * License:		GNU3
 * 
 */

defined('XOOPS_ROOT_PATH') or die("XOOPS root path not defined");

/**
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */
class IplogCountries extends XoopsObject
{
    function __construct()
    {
        $this->initVar('country_id', XOBJ_DTYPE_INT, null, true);
        $this->initVar('code', XOBJ_DTYPE_TXTBOX);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('dialcode', XOBJ_DTYPE_TXTBOX);
        $this->initVar('tldexists', XOBJ_DTYPE_TXTBOX);
        $this->initVar('tld', XOBJ_DTYPE_TXTBOX);
        $this->initVar('startgmt', XOBJ_DTYPE_DECIMAL);
        $this->initVar('endgmt', XOBJ_DTYPE_DECIMAL);
        $this->initVar('region', XOBJ_DTYPE_ENUM, false, false, false, false, array('Antarctica','Australasia','Caribbean','Central Africa','Central America','Central Asia','Eastern Africa','Eastern Asia','Eastern Europe','Middle East','North America','Northern Africa','Northern Asia','Northern Europe','South America','Southeastern Asia','Southeastern Europe','Southern Africa','Southern Asia','Southern Europe','Southwestern Asia','United States','Western Africa','Western Europe','Other'));
        $this->initVar('continent', XOBJ_DTYPE_ENUM, false, false, false, false, array('Africa','Asia','Europe','North America','South America','Oceania','Other'));
        $this->initVar('daylightsaving', XOBJ_DTYPE_ENUM, false, false, false, false, array('Yes','No'));
        $this->initVar('start_dls_day', XOBJ_DTYPE_ENUM, false, false, false, false, array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'));
        $this->initVar('start_dls_week', XOBJ_DTYPE_ENUM, false, false, false, false, array('1st','2nd','3rd','4th'));
        $this->initVar('start_dls_month', XOBJ_DTYPE_ENUM, false, false, false, false, array('January','Febuary','March','April','May','June','July','August','September','October','November','December'));
        $this->initVar('start_dls_dayno', XOBJ_DTYPE_INT);
        $this->initVar('start_dls_mode', XOBJ_DTYPE_ENUM, false, false, false, false, array('day','dayno'));
        $this->initVar('end_dls_day', XOBJ_DTYPE_ENUM, false, false, false, false, array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'));
        $this->initVar('end_dls_week', XOBJ_DTYPE_ENUM, false, false, false, false, array('1st','2nd','3rd','4th'));
        $this->initVar('end_dls_month', XOBJ_DTYPE_ENUM, false, false, false, false, array('January','Febuary','March','April','May','June','July','August','September','October','November','December'));
        $this->initVar('end_dls_dayno', XOBJ_DTYPE_INT);
        $this->initVar('end_dls_mode', XOBJ_DTYPE_ENUM, false, false, false, false, array('day','dayno'));
        
        $this->initVar('cat_weight', XOBJ_DTYPE_INT);
    }

}

/**
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */
class IplogCountriesHandler extends XoopsPersistableObjectHandler
{
    function IplogCountriesHandler(&$db)
    {
        $this->__construct($db);
    }

    function __construct(&$db)
    {
        parent::__construct($db, "iplog_countries", "IplogCountries", "country_id", 'name');
    }
    
    function getIDByCode($code, $as_id = true) {
    	if ($this->getCount(new Criteria('code', strtoupper($code)))) {
    		$objs = $this->getObjects(new Criteria('code', strtoupper($code)), false);
    		if (is_object($objs[0])) {
    			if ($as_id==true)
    				return $objs[0]->getVar('country_id');
    			else 
    				return $objs[0];
    		}
    	}
    	return false;
    }
}
?>