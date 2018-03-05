<?php

function addban($user_id) {
	if (!file_exists(CACHE_PATH . '/banned/' . $user_id . '.jsonf')) {
		file_put_contents(CACHE_PATH . '/banned/' . $user_id . '.jsonf', 'unknown');
		return true;
	}	
}

?>