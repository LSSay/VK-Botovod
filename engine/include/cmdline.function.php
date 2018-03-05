<?php

function getline(string $message) {
	$prim = explode(" ", $message);
	unset($prim[0]);
	return implode(" ", $prim);
}

?>