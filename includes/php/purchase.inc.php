<?php

    $rawData = file_get_contents("php://input");

    // Decode the JSON data into a PHP array
    $data = json_decode($rawData, true);

    if ($data) {
        $userId = htmlspecialchars($data['userId']);
        $cartContent = $data['cartContent'];
        $cartData = json_decode($cartContent, true);
        
        echo "userId: $userId\n";

        foreach ($cartData as $item) {
            
            $serviceId = htmlspecialchars($item['serviceId']);
            $quantity = htmlspecialchars($item['quantity']);
            $price = htmlspecialchars($item['servicePrice']);
    
            // Example: output the values (for debugging)
            echo "serviceId:  $serviceId, quantity: $quantity, price: $price. \n";
        }
        
        // Send a response back to JavaScript
        echo json_encode(["status" => "success"]);
    } else {
        // Handle JSON decoding errors
        echo json_encode(["status" => "error", "message" => "Invalid JSON"]);
    }

// else{

//     if (isset($_SESSION["userId"])) {
//         header("Location: ../../dashboard.php");
//     } else {
//         header("Location: ../../login.php");
//         die();
//     }


// }