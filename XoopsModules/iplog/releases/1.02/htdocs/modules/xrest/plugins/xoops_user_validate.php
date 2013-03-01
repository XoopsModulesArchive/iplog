<?php


	function xoops_user_validate_xsd(){
	$xsd = array();
		$i=0;
		$xsd['request'][$i++] = array("name" => "username", "type" => "string");
		$xsd['request'][$i++] = array("name" => "password", "type" => "string");
		$xsd['request'][$i++] = array("name" => "validate", "type" => "array");

		$i=0;
		$xsd['response'][$i++] = array("name" => "ERRNUM", "type" => "integer");
		$xsd['response'][$i++] = array("name" => "RESULT", "type" => "array");
		
		return $xsd;
	}
	
	function xoops_user_validate_wsdl(){
	
	}
	
	function xoops_user_validate_wsdl_service(){
	
	}
	
	require_once ($GLOBALS['xoops']->path('/include/cloud/'.basename(__FILE__)));
	
	
?>