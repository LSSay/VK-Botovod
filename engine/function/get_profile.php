<?php

global $msgf;

$name = "/profile";
$msgf[$name]['root'] = 3;
$msgf[$name]['func'] = function ($message, $profile, $line) use($msgf) {
	printm( print_r($profile, true) );
};

?>