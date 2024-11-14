<?php
    
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        session_start();
        session_unset();
        session_destroy();   
        header("Location: ../../login.php?logout=success");
        die();
    }
    else{
        //check if the user is logged in first if not then push them back to the login screen
        header("Location: ../../login.php");
        die();
    }