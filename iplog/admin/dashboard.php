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
 * This File:	dashboard.php
 * Description:	User admin dashboard for Admin Control Panel
 * Date:		28/07/2015 5:45PM AEST
 * License:		GNU3
 * 
 */

	include ('header.php');
	xoops_loadLanguage('admin', 'profile');
	
	xoops_cp_header();		

	$indexAdmin = new ModuleAdmin();
	$log_handler = xoops_getmodulehandler('log', 'iplog');

 	$indexAdmin = new ModuleAdmin();	
 	if (count($log_handler->getNumberByCountry())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_COUNTS_BY_COUNTRY);
	    foreach ($log_handler->getNumberByCountry() as $id => $value)
		    $indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_COUNTS_BY_COUNTRY, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getNumberByRegion())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_COUNTS_BY_REGION);
	    foreach ($log_handler->getNumberByRegion() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_COUNTS_BY_REGION, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getNumberByContinent())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_COUNTS_BY_CONTINENT);
	    foreach ($log_handler->getNumberByContinent() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_COUNTS_BY_CONTINENT, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getTotalSecondsByCountry())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_SUM_BY_COUNTRY);
	    foreach ($log_handler->getTotalSecondsByCountry() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_SUM_BY_COUNTRY, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getTotalSecondsByRegion())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_SUM_BY_REGION);
	    foreach ($log_handler->getTotalSecondsByRegion() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_SUM_BY_REGION, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getTotalSecondsByContinent())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_SUM_BY_CONTINENT);
	    foreach ($log_handler->getTotalSecondsByContinent() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_SUM_BY_CONTINENT, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getAdverageSecondsByCountry())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_AVG_BY_COUNTRY);
	    foreach ($log_handler->getAdverageSecondsByCountry() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_AVG_BY_COUNTRY, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
 	}
    if (count($log_handler->getAdverageSecondsByRegion())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_AVG_BY_REGION);
	    foreach ($log_handler->getAdverageSecondsByRegion() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_AVG_BY_REGION, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
	}
    if (count($log_handler->getAdverageSecondsByContinent())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_AVG_BY_CONTINENT);
	    foreach ($log_handler->getAdverageSecondsByContinent() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_AVG_BY_CONTINENT, "<label>".($value['node']=='-'?_AM_IPLOG_UNKNOWN:$value['node']).": %s</label>", $value['total'], 'Green');
    }
    
    echo $indexAdmin->renderIndex();
	include(dirname(__FILE__).'/footer.php');	

?>