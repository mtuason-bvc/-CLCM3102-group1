<?php

declare(strict_types=1);

function isInputEmpty(string $username,string $password){
    if (empty($username) || empty($password)){
        return true;
    }
    else{
        return false;
    }
}

function isUserNotRegistered(bool|array $result){
    if (!$result){
        return true;
    }
    else{
        return false;
    }
}

function isPasswordIncorrect(string $password, string $hashedPwd){
    if (!password_verify($password, $hashedPwd)){
        return true;
    }
    else{
        return false;
    }
}