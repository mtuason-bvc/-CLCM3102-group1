<?php

    declare(strict_types=1);
    
function isInputEmpty(string $username,string $email,string $password,string $passwordAgain){
    if (empty($username) || empty($email) || empty($password)|| empty($passwordAgain)){
        return true;
    }
    else{
        return false;
    }
}


function isEmailInvalid(string $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function isPasswordNotSame(string $password,string $passwordAgain){
    if (!(strcmp($password, $passwordAgain) === 0)){
        return true;
    }
    else{
        return false;
    }
}

function isUserAlreadyTaken(object $pdo, string $username){
    if (getUsername($pdo, $username)){
        return true;
    }
    else{
        return false;
    }
}
