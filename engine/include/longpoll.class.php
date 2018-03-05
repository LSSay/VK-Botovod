<?php

class LongPoll {
	
	public $pts = 0;
	public $ts = 0;
	
	public function getServer($need_pts) {
		$json = call_method('messages.getLongPollServer', ['need_pts' => (int)$need_pts]);
		$this->pts = $json['response']['pts'];
		$this->ts = $json['response']['ts'];
	}
	
	public function getHistory() {
		$json = call_method('messages.getLongPollHistory', ['ts' => $this->ts, 'pts' => $this->pts]);
		return $json;
	}
	
	public function updatePTS($pts) {
		$this->pts = $pts;
	}
	
	public function searchProfile($profiles, $user_id) {
		foreach ($profiles as $n => $profile) {
			if ($profile['id'] == $user_id)
				return $profiles[$n];
		}
	}
	
}

?>