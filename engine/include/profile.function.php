<?php

function getProfile($user_id) {
	return json_decode(file_get_contents(CACHE_PATH . "/profiles/{$user_id}.jsonf"), 1);
}

function setProfile($user_id, $object, $value) {
	$profile = getProfile($user_id);
	$profile[$object] = $value;
	file_put_contents(CACHE_PATH . "/profiles/{$user_id}.jsonf", $profile);
	return CACHE_PATH . "/profiles/{$user_id}.jsonf";
}

?>