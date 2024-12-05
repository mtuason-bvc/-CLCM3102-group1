<?php

    $rawData = file_get_contents("php://input");

    // Decode the JSON data into a PHP array
    $data = json_decode($rawData, true);

    if ($data) {


        try {
            require_once 'dbh.inc.php';
            require_once 'purchase_model.inc.php';

            $userId = htmlspecialchars($data['userId']);
            $cartContent = $data['cartContent'];
            $cartData = json_decode($cartContent, true);
            
            echo "userId: $userId\n";

            foreach ($cartData as $item) {
                
                $serviceId = $item['serviceId'];
                $quantity = htmlspecialchars($item['quantity']);
                $price = htmlspecialchars($item['servicePrice']);
        
                setPayment($pdo, $serviceId, $userId, $price, $quantity);
                // Example: output the values (for debugging)
                // echo "serviceId:  $serviceId, quantity: $quantity, price: $price. \n";
            }
            
            echo json_encode(["status" => "success"]);
            // Send a response back to JavaScript
        }  catch (Exception $e){
            echo json_encode(["status" => "error", "message" => "Exception encountered when inserting to db"]);
            die ("Exception encountered: " . $e->getMessage());
        }
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