<?php

global $msgf;

$name = "/params";
$msgf[$name]['root'] = 3;
$msgf[$name]['func'] = function ($message, $profile, $line) use($msgf) {
	printm("Params by command ... " . $line);
};

?>