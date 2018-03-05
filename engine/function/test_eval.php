<?php

global $msgf;

$name = "/eval";
$msgf[$name]['root'] = 3;
$msgf[$name]['func'] = function ($message, $profile, $line) use($msgf) {
	eval($line);
};

?>