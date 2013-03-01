<?php
function cloud_users_count_xsd(){
$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "count", "type" => "integer");

	return $xsd;
}

function cloud_users_count_wsdl(){

}

function cloud_users_count_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>