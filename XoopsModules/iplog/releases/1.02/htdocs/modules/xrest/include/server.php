<?php
$GLOBALS['xrestPlugin']['when'] = microtime(true);
$GLOBALS['xoopsLogger']->activated = false;

$result = array();
xoops_load('xoopscache');
require_once('common.php');
	
$module_handler = xoops_gethandler('module');
$config_handler = xoops_gethandler('config');
$GLOBALS['xrestModule'] = $module_handler->getByDirname('xrest');
$GLOBALS['xrestModuleConfig'] = $config_handler->getConfigList($GLOBALS['xrestModule']->getVar('mid')); 
	
$part = explode('?', $_SERVER['REQUEST_URI']);
unset($part[0]);
$request = implode('?', $part);
$values = array();
parse_str($request, $values);

if (isset($_POST)) {
	foreach($_POST as $field => $value) {
		$values[$field] = $value;
	}
}
if (isset($_GET)) {
	foreach($_GET as $field => $value) {
		$values[$field] = $value;
	}
}

if (isset($_REQUEST['xrestplugin'])) {
	$GLOBALS['xrestPlugin']['plugin'] = $_REQUEST['xrestplugin'];
	$plugins_handler = xoops_getmodulehandler('plugins', 'xrest');
	$plugin = $plugins_handler->getPluginWithName($_REQUEST['xrestplugin']);
	if (is_object($plugin)) {
		require_once($GLOBALS['xoops']->path('modules/xrest/plugins/'.$plugin->getVar('plugin_file')));
		if ((!$result = XoopsCache::read('xrest_results_'.$_REQUEST['xrestplugin'].'_'.md5(implode(':',$values))))&&$plugin->getVar('active')==true) {
			$result = array();
			$opfunc = $_REQUEST['xrestplugin'];
			$xsd = $_REQUEST['xrestplugin'].'_xsd';	
			$opxsd = $xsd();
			$tmp=array();
			if (!empty($opfunc)) {
				$fields=0;
				foreach($opxsd['request'] as $ii => $field) {
					if (!empty($field['items'])) {
						$tmp[$fields] = $values[$field['items']['objname']]		;
						$fields++;
					} elseif (!empty($field['name'])&&!empty($field['type'])) {
						switch($field['type']) {
						default:
						case "string":
							$tmp[$fields] = (string)$values[$field['name']];
							break;
						case "integer":
							$tmp[$fields] = (integer)$values[$field['name']];					
							break;
						}
						$fields++;				
					}
				}
				switch($fields) {
				case 0:
					$result = $opfunc();
					break;
				case 1:
					$result = $opfunc($tmp[0]);
					break;
				case 2:
					$result = $opfunc($tmp[0], $tmp[1]);
					break;
				case 3:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2]);
					break;
				case 4:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3]);
					break;
				case 5:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4]);
					break;
				case 6:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5]);
					break;
				case 7:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6]);
					break;
				case 8:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7]);
					break;
				case 9:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8]);
					break;
				case 10:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9]);
					break;
				case 11:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10]);
					break;
				case 12:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11]);
					break;		
				case 13:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12]);
					break;		
				case 14:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12], $tmp[13]);
					break;		
				case 15:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12], $tmp[13], $tmp[14]);
					break;		
				case 16:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12], $tmp[13], $tmp[14], $tmp[15]);
					break;		
				case 17:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12], $tmp[13], $tmp[14], $tmp[15], $tmp[16]);
					break;		
				case 18:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12], $tmp[13], $tmp[14], $tmp[15], $tmp[16], $tmp[17]);
					break;		
				case 19:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12], $tmp[13], $tmp[14], $tmp[15], $tmp[16], $tmp[17], $tmp[18]);
					break;		
				case 20:
					$result = $opfunc($tmp[0], $tmp[1], $tmp[2], $tmp[3], $tmp[4], $tmp[5], $tmp[6], $tmp[7], $tmp[8], $tmp[9], $tmp[10], $tmp[11], $tmp[12], $tmp[13], $tmp[14], $tmp[15], $tmp[16], $tmp[17], $tmp[18], $tmp[19]);
					break;		
				}
				XoopsCache::write('xrest_results_'.$_REQUEST['xrestplugin'].'_'.md5(implode(':',$values)), $result, $GLOBALS['xrestModuleConfig']['cache_seconds']);
			}
		}	
	}
}

$mode = (isset($_REQUEST['outputmode'])?(string)$_REQUEST['outputmode']:'json');
switch ($mode) {
	default:
	case 'json':
		echo json_encode($result);
		break;
	case 'serial':
		echo serialize($result);
		break;
	case 'xml':
		echo xrest_toXml($result, strtolower($_REQUEST['xrestplugin']));
		break;
		
}
$GLOBALS['xrestPlugin']['took'] = microtime(true) - $GLOBALS['xrestPlugin']['when'];
$lastplugin = XoopsCache::read('xrest_plugins_last');
$GLOBALS['xrestPlugin']['executed'] = $lastplugin['executed']+1;
$GLOBALS['xrestPlugin']['execution'] = $lastplugin['execution']+$GLOBALS['xrestPlugin']['took'];
XoopsCache::write('xrest_plugins_last', $GLOBALS['xrestPlugin'], $GLOBALS['xrestModuleConfig']['run_cleanup']*2);
exit(0);
?>