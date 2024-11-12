<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["typeUsernameX"];
    $email = $_POST["typeEmailX"];
    $password = $_POST["typePasswordX"];
    $passwordAgain = $_POST["typePasswordAgainX"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR handling
        $errors = [];
        if (isEmailInvalid($email)){
            $errors["invalidEmail"] = "Email entered is invalid.";
        }
        if (isInputEmpty($username, $email, $password, $passwordAgain)){
            $errors["inputEmpty"] = "Fill in all entries please.";
        }
        if (isUserAlreadyTaken($pdo, $username)){
            $errors["userTaken"] = "That username is already taken.";
        }
        if (isEmailAlreadyRegistered($pdo, $email)){
            $errors["emailRegistered"] = "That email is already registered.";
        }        
        if (isPasswordNotSame($password, $passwordAgain)){
            $errors["passwordNotSame"] = "Passwords are not the same.";
        }
        
        require_once 'config_session.inc.php';
        if ($errors){
            $_SESSION["signupErrors"] = $errors;
            header("Location: ../../signup.php");
            die();
        }
        else{
            insertUser($pdo, $username, $email, $password);
            header("Location: ../../signup.php?signup=success");
            $pdo = null;
            $stmt = null;
            die();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../../signup.php");
    die();
}