<?php
function newusers_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "poll", "type" => "string");
	$xsd['request'][$i++] = array("name" => "unames", "type" => "array");
	$xsd['request'][$i++] = array("name" => "token", "type" => "string");
	$xsd['request'][$i++] = array("name" => "agent", "type" => "string");
	$xsd['request'][$i++] = array("name" => "session", "type" => "string");

	return $xsd;
	
}

function newusers_wsdl(){

}

function newusers_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>