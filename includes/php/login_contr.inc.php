<?php

declare(strict_types=1);

function isInputEmpty(string $username,string $password){
    if (empty($username)  || empty($password)){
        return true;
    }
    else{
        return false;
    }
}

function isUserNotRegistered(object $pdo, string $username){
    if (!getUsername($pdo,  $username)){
        return true;
    }
    else{
        return false;
    }
}

function isPasswordIncorrect(string $password, string $hashedPwd){
    
}