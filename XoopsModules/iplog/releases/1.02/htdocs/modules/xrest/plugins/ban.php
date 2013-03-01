<?php
function ban_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "bans", "type" => "array");
	$xsd['request'][$i++] = array("name" => "comments", "type" => "array");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "bans", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "errors", "type" => "array");
	$xsd['response'][$i++] = array("name" => "made", "type" => "integer");
	
	return $xsd;
}

function ban_wsdl(){

}

function ban_wsdl_service(){

}
require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));

?>