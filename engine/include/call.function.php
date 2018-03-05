<?php

function call_method(string $method, array $params) {
	$params['access_token'] = getConfig(true)['bot']['token'];
	$params['v'] = getConfig(true)['bot']['apiv'];
	$apivk = "https://api.vk.com/method/{$method}";
	$ch = @curl_init($apivk);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
	$json = json_decode(curl_exec($ch), 1);
	curl_close($ch);
	
	if (!empty($json) && array_key_exists('error', $json) ) {
		throw new Exception("Error {$json["error"]["error_code"]}, method {$method}");
	}
	
	return $json;
}

?>