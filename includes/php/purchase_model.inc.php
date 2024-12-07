<?php

    declare(strict_types=1);

    function setPayment(object $pdo, string $serviceId, string $userId, string $price, string $quantity){
        $query = "INSERT payment (serviceId, userId, price, quantity, currency) VALUES (:serviceId, :userId, :price, :quantity, 'CAD');";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":serviceId", $serviceId);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":quantity", $quantity);
        // $stmt->bindParam(":currency", "CAD");
        $stmt->execute();

    }

