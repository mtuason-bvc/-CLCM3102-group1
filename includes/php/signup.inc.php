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

        if (isEmailInvalid($email)){

        }
        if (isInputEmpty($username, $email, $password, $passwordAgain)){

        }
        if (isUserAlreadyTaken($pdo, $username)){

        }
        //https://youtu.be/Ojk70Ag8Ofs?si=TNvAJ-RFp3afX9FH&t=2731

    } catch (PDOException $e) {
        //throw $th;
    }
}
else{
    header("Location: ../../signup.html");
    die();
}