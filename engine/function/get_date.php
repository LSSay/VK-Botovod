<?php

global $msgf;

$name = "/date";
$msgf[$name]['root'] = 3;
$msgf[$name]['func'] = function ($message, $profile, $line) use($msgf) {
	printm("Time is " . date('d/m/y G:i')); // Return message
};

?>