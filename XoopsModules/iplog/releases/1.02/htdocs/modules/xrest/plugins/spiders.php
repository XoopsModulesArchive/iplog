<?php
function spiders_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "records", "type" => "integer");
	$xsd['request'][$i++] = array("name" => "start", "type" => "integer");

	$i=0;
	$xsd['response'][$i++] = array("name" => "spiders", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "made", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "data", "type" => "array");
	return $xsd;
}

function spiders_wsdl(){

}

function spiders_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>