<?php

class Bot {
	
	public function start() {
		global $msgf, $message;
		$lp = new LongPoll();
		$lp->getServer(true);
		while(true) {
			$history = $lp->getHistory();
			$messages = $history['response']['messages'];
			$profiles = $history['response']['profiles'];
			if ($messages['count'] > 0)
				foreach ($messages['items'] as $message) {
					$message['delim'] = explode(" ", $message['body']);
					$profile = $lp->searchProfile($profiles, $message['user_id']);
					if (array_key_exists($message['delim'][0], $msgf)) {
						if (___onmeesage($message, $profile))
							if (getProfile($profile['id'])['root'] >= $msgf[$message['delim'][0]]['root'] )
								call_user_func($msgf[$message['delim'][0]]['func'], $message, $profile, getline($message['body']));
							else
								printm(sprintf(getConfig(true)['messages']['noroot'], $profile['first_name']));
					}
				}
			$lp->updatePTS($history['response']['new_pts']);
		}
	}
	
	static function version() {
		return getConfig(true)['bot']['@attributes']['version'];
	}
	
}

?>