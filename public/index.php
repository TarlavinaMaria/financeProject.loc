<?php


require_once(dirname(__DIR__) . "/config/config.php");


require_once CORE . "/functions.php";

require_once(CORE . "/classes/DB.php");

$db_config = require_once(CONFIG . "/db.php");


$db = DB::getInstance()->getConnection($db_config);

require_once(CORE . "/router.php");


?>