<?php
function unbanned_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "unbanned", "type" => "array");
	$xsd['request'][$i++] = array("name" => "comments", "type" => "array");

	$i=0;
	$xsd['response'][$i++] = array("name" => "unbanned", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "errors", "type" => "array");
	$xsd['response'][$i++] = array("name" => "made", "type" => "integer");
	return $xsd;
	
}

function unbanned_wsdl(){

}

function unbanned_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));

?>