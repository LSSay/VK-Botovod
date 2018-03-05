<?php

global $_included, $_functions, $msgf;

$_included = array();

$__path = INCLUDE_PATH;

foreach (glob("{$__path}/*.php") as $_file) include_once($_file);

$__funcs = FUNC_PATH;
foreach (glob("{$__funcs}/*.php") as $_file) {
	include($_file);
}

?>