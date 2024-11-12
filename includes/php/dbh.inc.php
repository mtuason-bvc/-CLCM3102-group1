<?php

$host = 'localhost';
$dbname = 'cloudtech';
$dbusername = 'root';
$dbpasword = 'root';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpasword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Connection to database failed: " .$e->getMessage());
}