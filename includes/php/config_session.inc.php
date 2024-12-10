<?php

ini_set('sesssion.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    // 'domain' => 'localhost',
    'domain' => 'd7dva1a5al2e9.cloudfront.net',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["userId"])){
    if (!isset($_SESSION["last_Regeneration"])) {
        regenerateSessionIdLoggedIn();
    } else {
        $interval = 60 * 30;
        if ((time() - $_SESSION["last_Regeneration"]) > $interval) {
            regenerateSessionIdLoggedIn();
        }
    }
} else{
    if (!isset($_SESSION["last_Regeneration"])) {
        regenerateSessionId();
    } else {
        $interval = 60 * 30;
        if ((time() - $_SESSION["last_Regeneration"]) > $interval) {
            regenerateSessionId();
        }
    }
}


function regenerateSessionId()
{
    session_regenerate_id(true);
    $_SESSION["last_Regeneration"] = time();
}

function regenerateSessionIdLoggedIn()
{
    session_regenerate_id(true);
    $userId = $_SESSION["userId"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["last_Regeneration"] = time();
}
