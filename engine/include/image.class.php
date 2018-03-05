<?php

class Image {
	
	public static function getUploadURL() {
		$json = call_method('photos.getMessagesUploadServer', array('image' => 'jpeg'));
		return $json['response']['upload_url'];
	}
	
	public static function uploadFile($filename) {
		$ch = curl_init(Image::getUploadURL());
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array("file1" => new CURLFile($filename)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$r = json_decode(curl_exec($ch), true);
		curl_close($ch);
		$json = call_method('photos.saveMessagesPhoto', ['photo' => $r['photo'], 'server' => $r['server'], 'hash' => $r['hash']]);
		$save = "photo{$json['response'][0]['owner_id']}_{$json['response'][0]['id']}";
	
		return $save;
	}
	
}

?>