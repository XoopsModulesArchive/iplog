<?php

function checkphpbans_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "ipdata", "type" => "array");
	$xsd['request'][$i++] = array("name" => "start", "type" => "integer");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "success", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "octeta", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "octetb", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "octetc", "type" => "integer");
	
	return $xsd;
}

function checkphpbans_wsdl(){

}

function checkphpbans_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>