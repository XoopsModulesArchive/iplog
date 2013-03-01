<?php
function sfsban_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "bans", "type" => "array");
	$xsd['request'][$i++] = array("name" => "comments", "type" => "array");
	$xsd['request'][$i++] = array("name" => "token", "type" => "string");
	$xsd['request'][$i++] = array("name" => "agent", "type" => "string");
	$xsd['request'][$i++] = array("name" => "session", "type" => "string");	
	$i=0;
	$xsd['response'][$i++] = array("name" => "bans", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "errors", "type" => "array");
	$xsd['response'][$i++] = array("name" => "made", "type" => "integer");
	return $xsd;
}

function sfsban_wsdl(){

}

function sfsban_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>