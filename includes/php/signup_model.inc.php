<?php

    declare(strict_types=1);
   


    function getUsername(object $pdo, string $username){
        $query = "SELECT username FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getEmail(object $pdo, string $email){
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function setUser(object $pdo, string $username, string $email, string $password){
        $query = "INSERT users (username, email, pwd) VALUES (:username, :email, :password);";
        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPwd);
        $stmt->execute();

    }