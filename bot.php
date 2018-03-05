<?php

define('ENGINE_PATH', 'engine');
define('INCLUDE_PATH', 'engine/include');
define('CACHE_PATH', 'engine/cache');
define('FUNC_PATH', 'engine/function');
define('CONFIG_PATH', 'engine/config.xml');

include INCLUDE_PATH . '/loadall.auto.php';

$bot = new Bot();
$bot->start();

?>