<?php

ini_set('sesssion.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();


if (!isset($_SESSION["last_Regeneration"])) {
    regeneratSessionId();
} else {
    $interval = 60 * 30;
    if ((time() - $_SESSION["last_Regeneration"]) > $interval) {
        regeneratSessionId();
    }
}

function regeneratSessionId()
{
    session_regenerate_id();
    $_SESSION["last_Regeneration"] = time();
}
