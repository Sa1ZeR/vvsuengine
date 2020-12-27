<?php

define('VVSU_ROOT', dirname(__FILE__).'/');
define('VVSU_MODE_PATH', VVSU_ROOT.'modules/');
define('VVSU_BLOCK_PATH', VVSU_ROOT.'blocks/');
define('VVSU_CORE_PATH', VVSU_ROOT.'core/');
define('VVSU_STYLE_PATH', VVSU_ROOT.'style/');

require_once (VVSU_CORE_PATH."core.class.php");

$core = new core();
