<?php
function ban_diff_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "count", "type" => "integer");
	
	return $xsd;
}

function ban_diff_wsdl(){

}

function ban_diff_wsdl_service(){

}
require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>