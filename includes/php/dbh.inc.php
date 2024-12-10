<?php
//oldvalue
// $dsn = "mysql:host=localhost;dbname=cloudtech";
// $dbusername = "root";
// $dbpassword = "root";

//newValue
$dsn = "mysql:host=3.226.165.0;dbname=cloudtech";
$dbusername = "admin";
$dbpassword = "SuperTopSecretMySQLdb.2024";

try {
    //We use PDO as it is more secure and not prone to sql injection
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection to database failed: " .$e->getMessage());    
}