<?php

function ___onmeesage($message, $profile) {
	$skip = true;
	if (is_dir(CACHE_PATH . "/profiles"))
		if (!file_exists(CACHE_PATH . "/profiles/{$profile['id']}.jsonf")) {
			$profile['root'] = 0;
			$profile['money'] = 1000;
			$jprofile = json_encode($profile);
			file_put_contents(CACHE_PATH . "/profiles/{$profile['id']}.jsonf", $jprofile);
			printm(sprintf(getConfig(true)['messages']['newuser'], $profile['first_name']));
		}
	
	if (getConfig(true)['settings']['maxm'] < strlen($message['body']) && getConfig(true)['settings']['maxm'] != 0) $skip = false;
	if (is_file(CACHE_PATH . '/profiles/banned/' . $profile['id'] . '.jsonf')) $skip = false;
	
	return $skip; // skip message for processing
}

?>