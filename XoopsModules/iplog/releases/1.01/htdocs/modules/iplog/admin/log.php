<?php
// $Id: category.php 5204 2010-09-06 20:10:52Z mageg $
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
include 'header.php';
xoops_cp_header();
$indexAdmin = new ModuleAdmin();

echo $indexAdmin->addNavigation('log.php');	

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'log';
$fct = isset($_REQUEST['fct']) ? $_REQUEST['fct'] : 'list';

switch($op) {
case "log":	
	switch ($fct)
	{
		default:
		case "list":				
			
			include_once $GLOBALS['xoops']->path( "/class/pagenav.php" );
			
			$log_handler =& xoops_getmodulehandler('log', 'iplog');

			$criteria = new Criteria(1,1);
			$ttl = $log_handler->getCount($criteria);
			$sort = !empty($_REQUEST['sort'])?''.$_REQUEST['sort'].'':'start';
			
			$pagenav = new XoopsPageNav($ttl, $limit, $start, 'start', 'limit='.$limit.'&sort='.$sort.'&order='.$order.'&op='.$op.'&fct='.$fct.'&filter='.$filter.'&fct='.$fct.'&filter='.$filter);
			$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
	
			foreach ($log_handler->getFields() as $id => $key) {
				$GLOBALS['xoopsTpl']->assign(strtolower(str_replace('-','_',$key).'_th'), '<a href="'.$_SERVER['PHP_SELF'].'?start='.$start.'&limit='.$limit.'&sort='.str_replace('_','-',$key).'&order='.((str_replace('_','-',$key)==$sort)?($order=='DESC'?'ASC':'DESC'):$order).'&op='.$op.'&filter='.$filter.'">'.(defined('_AM_IPLOG_TH_'.strtoupper(str_replace('-','_',$key)))?constant('_AM_IPLOG_TH_'.strtoupper(str_replace('-','_',$key))):'_AM_IPLOG_TH_'.strtoupper(str_replace('-','_',$key))).'</a>');
			}
			
			$GLOBALS['xoopsTpl']->assign('limit', $limit);
			$GLOBALS['xoopsTpl']->assign('start', $start);
			$GLOBALS['xoopsTpl']->assign('order', $order);
			$GLOBALS['xoopsTpl']->assign('sort', $sort);
			$GLOBALS['xoopsTpl']->assign('filter', $filter);
			$GLOBALS['xoopsTpl']->assign('xoConfig', $GLOBALS['xoopsModuleConfig']);
								
			$criteria->setStart($start);
			$criteria->setLimit($limit);
			$criteria->setSort('`'.$sort.'`');
			$criteria->setOrder($order);
				
			$logs = $log_handler->getObjects($criteria, true);
			foreach($logs as $cid => $log) {
				if (!is_object($log))
					$log_handler->delete($cid);
				else
					$GLOBALS['xoopsTpl']->append('log', $log->toArray());
			}
			$GLOBALS['xoopsTpl']->assign('php_self', $_SERVER['PHP_SELF']);
			$GLOBALS['xoopsTpl']->display('db:iplog_log_list.html');
			break;		
			
			
		case "delete":	
						
			$log_handler =& xoops_getmodulehandler('log', 'iplog');
			
			if (isset($_POST['id'])&&$id!=0) {
				$log = $log_handler->get($id);
				if (!$log_handler->delete($log)) {
					redirect_header('index.php?op='.$op.'&fct=list&limit='.$limit.'&start='.$start.'&order='.$order.'&sort='.$sort.'&filter='.$filter, 10, _AM_MSG_LOG_FAILEDTODELETE);
					exit(0);
				} else {
					redirect_header('index.php?op='.$op.'&fct=list&limit='.$limit.'&start='.$start.'&order='.$order.'&sort='.$sort.'&filter='.$filter, 10, _AM_MSG_LOG_DELETED);
					exit(0);
				}
			} else {
				$log = $log_handler->get($id);
				xoops_confirm(array('id'=>$id, 'op'=>$_REQUEST['op'], 'fct'=>$_REQUEST['fct'], 'limit'=>$_REQUEST['limit'], 'start'=>$_REQUEST['start'], 'order'=>$_REQUEST['order'], 'sort'=>$_REQUEST['sort'], 'filter'=>$_REQUEST['filter']), 'index.php', sprintf(_AM_MSG_LOG_DELETE, $log->getVar('name')));
			}
			break;
	}
	break;
}

include(dirname(__FILE__).'/footer.php');
?>