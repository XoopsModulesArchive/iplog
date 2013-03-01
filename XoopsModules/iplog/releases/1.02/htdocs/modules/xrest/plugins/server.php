<?php
function server_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "server", "type" => "array");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "ERRNUM", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "RESULT", "type" => "array");
	return $xsd;

}

function server_wsdl(){

}

function server_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>