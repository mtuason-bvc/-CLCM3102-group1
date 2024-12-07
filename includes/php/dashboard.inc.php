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
        if ($errors){
            $_SESSION["dashboardErrors"] = $errors;
            
        }
        else {
            $_SESSION['allServices'] = $result;
            $userPurchaseHistory = getPayment ($pdo, $userId);
            // print_r($userPurchaseHistory);
             if(!isPurchaseHistoryEmpty($userPurchaseHistory)){
                $_SESSION["userPurchaseHistory"] = $userPurchaseHistory;
                // print_r($_SESSION["userPurchaseHistory"]);
            }
            else{
                $_SESSION["userPurchaseHistory"] = null;
            }
        }

    } catch (Exception $e){
        die ("Exception encountered: " . $e->getMessage());
    }
}
else{
    die();
}
