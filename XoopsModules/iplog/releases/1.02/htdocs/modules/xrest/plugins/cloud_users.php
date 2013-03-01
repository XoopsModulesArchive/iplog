<?php
function cloud_users_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "var", "type" => "array");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "count", "type" => "integer");
	return $xsd;
}

function cloud_users_wsdl(){

}

function cloud_users_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>