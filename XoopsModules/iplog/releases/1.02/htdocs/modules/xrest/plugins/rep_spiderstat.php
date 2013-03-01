<?php
function rep_spiderstat_xsd(){
	$xsd = array();
	$i=0;
	$xsd['request'][$i++] = array("name" => "username", "type" => "string");
	$xsd['request'][$i++] = array("name" => "password", "type" => "string");
	$xsd['request'][$i++] = array("name" => "statistic", "type" => "array");
	
	$i=0;
	$xsd['response'][$i++] = array("name" => "ban_made", "type" => "integer");
	$xsd['response'][$i++] = array("name" => "made", "type" => "integer");
	return $xsd;
}

function rep_spiderstat_wsdl(){

}

function rep_spiderstat_wsdl_service(){

}

require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
?>