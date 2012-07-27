<?php

defined('XOOPS_ROOT_PATH') or die('Restricted access');

include_once (dirname(dirname(__FILE__)).'/include/functions.php');

class IplogLoggerPreload extends XoopsPreloadItem
{
	function eventCoreIncludeCommonEnd($args)
    {
    	$module_handler = xoops_gethandler('module');
    	$config_handler = xoops_gethandler('config');
    	$GLOBALS['iplogModule'] = $module_handler->getByDirname('iplog');
    	$GLOBALS['iplogModuleConfig'] = $config_handler->getConfigList($GLOBALS['iplogModule']->getVar('mid'));
    	 
    	if (is_object($GLOBALS['xoopsUser'])||$GLOBALS['iplogModuleConfig']['anonymous']==true) {
			$log_handler = xoops_getmodulehandler('log', 'iplog');
			$log_handler->writeLog(iplog_getIPData(false));
    	}
    }
}
?>