<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["typeUsernameX"];
    $password = $_POST["typePasswordX"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //ERROR handling
        $errors = [];

        if (isInputEmpty($username, $password)){
            $errors["inputEmpty"] = "Fill in all entries please.";
        }

        require_once 'config_session.inc.php';
        if ($errors){
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../login.php");
            die();
        }
        else{
            loginUser($pdo, $username, $password);
            header("Location: ../../login.php?signup=success");
            $pdo = null;
            $stmt = null;
            die();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else{
    header("Location: ../../login.php");
    die();
}