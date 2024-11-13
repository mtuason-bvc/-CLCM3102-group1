<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $username = $_POST["typeUsernameX"];
    $password = $_POST["typePasswordX"];
    echo("<br>");
    echo("<p> ". $username . " ".  $password . " </p>");
    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        
        //ERROR handling
        $errors = [];
        if (isInputEmpty($username, $password)){
            $errors["inputEmpty"] = "Fill in all entries please.";
        }
        
        $result = getUsername($pdo, $username);
        
        echo("<br>");
        echo("<p>". print_r($result) . "</p>");
        
        if (isUserNotRegistered($result)){
            $errors["incorrectLogin"] = "Incorrect username and/or password";
        }

        if (isPasswordIncorrect($password, $result['pwd']) && !isUserNotRegistered($result)){
            $errors["incorrectLogin"] = "Incorrect username and/or password";
        }



        
        echo("<br>");
        echo("<p>". print_r($errors) . "</p>");
        require_once 'config_session.inc.php';
        if ($errors){
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../login.php");
            die();
        }
        else{
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result['id'];
            sessionId($sessionId);
            $_SESSION["last_Regeneration"] = time();
            $_SESSION["userId"] = $result['id'];
            $_SESSION["userUsername"] = htmlspecialchars($result['username']);
            header("Location: ../../login.php?login=success");
            $pdo = null;
            $stmt = null;
            
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else{
    header("Location: ../../login.php");
    die();
}