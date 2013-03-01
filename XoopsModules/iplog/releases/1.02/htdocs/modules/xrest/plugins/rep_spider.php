<?php
error_reporting(E_ALL);
function rep_spider_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "rep_spider", "type" => "array");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "mod_made", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "made", "type" => "integer");
	return $xsd;
}

function rep_spider_wsdl(){

}

function rep_spider_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));

?>