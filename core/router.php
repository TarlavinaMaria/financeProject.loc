<?php
require_once(CONFIG . "/routes.php");
// router
$url = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

if (array_key_exists($url, $routes)) {
    if (file_exists(CONTROLLERS . "/$routes[$url]")) {
        require_once CONTROLLERS . "/$routes[$url]";
    } else {
        abort();
    }
} else {
    abort();
}
?>