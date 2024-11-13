<?php
    
    declare(strict_types=1);
    
    function checkLoginErrors(){
        if (isset($_SESSION["loginErrors"])){
            $errors = $_SESSION["loginErrors"];

            echo("<br>");
            foreach ($errors as $error) {
                echo('<h4 class="form-error">'. $error ."</h4>");
            }

            unset($_SESSION["loginErrors"]);
        }
        else if(isset($_GET["login"]) && ($_GET["login"] === "success")){
            echo("<br>");
            echo('<h4 class="form-success">Login is Successful!</h4>');
        }
    }