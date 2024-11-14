<?php

    declare(strict_types=1);

    function checkIfLoggedInSignupPage()
    {
        if (isset($_SESSION["userId"])) {
            header("Location: login.php");
        } 
    
    }

    function checkSignupErrors(){
        if (isset($_SESSION["signupErrors"])){
            $errors = $_SESSION["signupErrors"];

            echo("<br>");
            foreach ($errors as $error) {
                echo('<h4 class="form-error">'. $error ."</h4>");
            }

            unset($_SESSION["signupErrors"]);
        }
        else if(isset($_GET["signup"]) && ($_GET["signup"] === "success")){
            echo("<br>");
            echo('<h4 class="form-success">Sign up is Successful!</h4>');
        }
    }