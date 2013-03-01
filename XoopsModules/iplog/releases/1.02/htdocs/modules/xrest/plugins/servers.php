<?php
function servers_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "server", "type" => "array");
	$xsd['request'][$i++] = array("name" => "poll", "type" => "string");
	$xsd['request'][$i++] = array("name" => "token", "type" => "string");
	$xsd['request'][$i++] = array("name" => "agent", "type" => "string");
	$xsd['request'][$i++] = array("name" => "session", "type" => "string");	
	$i=0;
	$xsd['response'][$i++] = array("name" => "ERRNUM", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "RESULT", "type" => "array");
	return $xsd;	
}

function servers_wsdl(){

}

function servers_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>