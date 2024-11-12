<?php

    declare(strict_types=1);
    

    function checkSignupErrors(){
        if (isset($_SESSION["signupErrors"])){
            $errors = $_SESSION["signupErrors"];

            echo("<br>");
            foreach ($errors as $error) {
                echo("<p>". $error ."</p>");
            }

            unset($_SESSION["signupErrors"]);
        }
        else if(isset($_GET["signup"]) && ($_GET["signup"] === "success")){
            echo("<br>");
            echo("<p>Login is Successful!</p>");
        }
    }