<?php
// $Id: directory.php 5204 2010-09-06 20:10:52Z mageg $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: XOOPS Foundation                                                  //
// URL: http://www.xoops.org/                                                //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

	include ('header.php');
	xoops_loadLanguage('admin', 'profile');
	
	xoops_cp_header();		

	$indexAdmin = new ModuleAdmin();
	$log_handler = xoops_getmodulehandler('log', 'iplog');

 	$indexAdmin = new ModuleAdmin();	
 	if (count($log_handler->getNumberByCountry())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_COUNTS_BY_COUNTRY);
	    foreach ($log_handler->getNumberByCountry() as $id => $value)
		    $indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_COUNTS_BY_COUNTRY, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getNumberByRegion())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_COUNTS_BY_REGION);
	    foreach ($log_handler->getNumberByRegion() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_COUNTS_BY_REGION, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getNumberByContinent())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_COUNTS_BY_CONTINENT);
	    foreach ($log_handler->getNumberByContinent() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_COUNTS_BY_CONTINENT, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getTotalSecondsByCountry())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_SUM_BY_COUNTRY);
	    foreach ($log_handler->getTotalSecondsByCountry() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_SUM_BY_COUNTRY, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getTotalSecondsByRegion())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_SUM_BY_REGION);
	    foreach ($log_handler->getTotalSecondsByRegion() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_SUM_BY_REGION, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getTotalSecondsByContinent())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_SUM_BY_CONTINENT);
	    foreach ($log_handler->getTotalSecondsByContinent() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_SUM_BY_CONTINENT, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
 	}
 	if (count($log_handler->getAdverageSecondsByCountry())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_AVG_BY_COUNTRY);
	    foreach ($log_handler->getAdverageSecondsByCountry() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_AVG_BY_COUNTRY, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
 	}
    if (count($log_handler->getAdverageSecondsByRegion())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_AVG_BY_REGION);
	    foreach ($log_handler->getAdverageSecondsByRegion() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_AVG_BY_REGION, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
	}
    if (count($log_handler->getAdverageSecondsByContinent())>1) {
	    $indexAdmin->addInfoBox(_AM_IPLOG_ADMIN_AVG_BY_CONTINENT);
	    foreach ($log_handler->getAdverageSecondsByContinent() as $id => $value)
	    	$indexAdmin->addInfoBoxLine(_AM_IPLOG_ADMIN_AVG_BY_CONTINENT, "<label>".$value['node'].": %s</label>", $value['total'], 'Green');
    }
    
    echo $indexAdmin->renderIndex();
	include(dirname(__FILE__).'/footer.php');	

?>