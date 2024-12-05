<?php

if (isset($_SESSION["userId"])) {
    $userId = $_SESSION["userId"];
    $userName = $_SESSION["userUsername"];


    try {
        require_once 'dbh.inc.php';
        require_once 'dashboard_model.inc.php';
        require_once 'dashboard_contr.inc.php';

        $result = getAllServices($pdo);
        $errors = [];
        $isError = false;
        //ERROR handling?
        if (isResultEmpty($result)){
            $errors["noServicesError"] = "There are no services in database. Please insert services.";
        }
        if ($isError){
            $_SESSION["dashboardErrors"] = $errors;
        }
        else{
            $_SESSION['allServices'] = $result;

        }

    } catch (Exception $e){
        die ("Exception encountered: " . $e->getMessage());
    }
}
else{
    die();
}
