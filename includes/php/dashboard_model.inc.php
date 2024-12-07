<?php

    declare(strict_types=1);
   
    function getAllServices(object $pdo){
        $query = "SELECT * FROM services;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // function setPayment(object $pdo, int $userId, array $service){
    //     $query ="INSERT into payment (serviceId, userId, payment, currency)
    //     VALUES(:serviceId, :userId, :payment, :currency);";

    //     $stmt = $pdo->prepare($query);

    //     $stmt->bindParm(":serviceId", $service['serviceId']);
    //     $stmt->bindParm(":userId", $userId);
    //     $stmt->bindParm(":payment", $service['servicePrice']);
    //     $stmt->bindParm(":currency", $service['serviceCurrency']);
    //     $stmt->execute();
    // }

    function getPayment (object $pdo, string $userId){

        $query = "SELECT * FROM payment WHERE userId = :userId;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }