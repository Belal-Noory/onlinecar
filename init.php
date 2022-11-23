<?php
require('app/Helpers/config.php');
spl_autoload_register("autoLoad");
// Auto Load all important libraries
function autoLoad($class)
{
    if (file_exists(APPROOT . "/Helpers/" . $class . ".php")) {
        require(APPROOT . "/Helpers/" . $class . ".php");
    } else if (file_exists(APPROOT . "/Models/" . $class . ".php")) {
        require(APPROOT . "/Models/" . $class . ".php");
    } else if (file_exists(APPROOT . "/Controllers/" . $class . ".php")) {
        require(APPROOT . "/Controllers/" . $class . ".php");
    }
}

$server = helper::is_localhost();
if ($server == "local") {
    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'car');
} else {

    define('DB_HOST', 'localhost');
    define('DB_USER', 'u645214731_tweV4');
    define('DB_PASS', 't7wwIpQ?');
    define('DB_NAME', 'u645214731_pKSzv');
}
