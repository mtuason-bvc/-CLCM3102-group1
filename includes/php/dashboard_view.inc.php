<?php

declare(strict_types=1);

function checkIfLoggedIn()
{
    if (isset($_SESSION["userId"])) {
        $userId = $_SESSION["userId"];
        $userName = htmlspecialchars($_SESSION["userUsername"]);
        echo ("<br>");
        echo ('<h4 class="form-success">Welcome ' . $userName . '</h4>');
    } 
    else {
        header("Location: login.php");
        die();
    }

}
