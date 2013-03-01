<?php

function checksfsbans_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "ipdata", "type" => "array");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "success", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "username", "type" => "array");
	$xsd['response'][$i++] = array("name" => "email", "type" => "array");
	$xsd['response'][$i++] = array("name" => "ip", "type" => "array");
	
	return $xsd;
}

function checksfsbans_wsdl(){

}

function checksfsbans_wsdl_service(){

}
require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>