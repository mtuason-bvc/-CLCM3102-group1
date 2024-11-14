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
        
        $result = getUser($pdo, $username);

        echo ("<br><p>Result from pdo is typeof: ".gettype($result)."</p>");
        echo ("<br><p>Content of Results: ".$result."</p>");
        $isUserValid = true;
        if (isUsernameWrong($result)){
            $errors["incorrectLogin"] = "Incorrect username/password.";
            $isUserValid = false;
        }

        if ($isUserValid && isPasswordWrong($password, $result['pwd'])){
            $errors["incorrectLogin"] = "Incorrect username/password.";
        }
        

        require_once 'config_session.inc.php';
        if ($errors){
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../login.php");
            die();
        }
        
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result['id'];
        session_id($sessionId);
        $_SESSION["userId"] = $result['id'];
        $_SESSION["userUsername"] = htmlspecialchars($result['username']);
        $_SESSION["last_Regeneration"] = time();
        header("Location: ../../dashboard.php?login=success");
        $pdo = null;
        $stmt = null;
        die();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else{
    header("Location: ../../login.php");
    die();
}