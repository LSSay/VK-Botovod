<?php

function printm(string $msg, array $attachments = array()) {
	global $message;
	if (array_key_exists('chat_id', $message))
		$args = ['message' => $msg, 'chat_id' => $message['chat_id']];
	else
		$args = ['message' => $msg, 'user_id' => $message['user_id']];
	if (count($attachments) > 0) $args['attachment'] = implode(',', $attachments);
	return call_method("messages.send", $args);
}

?>