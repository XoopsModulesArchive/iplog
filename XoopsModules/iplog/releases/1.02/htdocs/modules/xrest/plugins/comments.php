<?php
function comments_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "itemid", "type" => "integer");
	$xsd['request'][$i++] = array("name" => "module", "type" => "string");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "comments", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "made", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "data", "type" => "array");
	
	return $xsd;
}

function comments_wsdl(){

}

function comments_wsdl_service(){

}
require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>