<?php

declare(strict_types=1);

function checkIfLoggedIn()
{
    if (isset($_SESSION["userId"])) {
        $userId = $_SESSION["userId"];
        $userName = htmlspecialchars($_SESSION["userUsername"]);
        echo ("<br>");
        echo ('<h2 class="form-success">Welcome ' . $userName . '</h2>');
    } else {
        header("Location: login.php");
        die();
    }
}


function loadAllServicesAvailable(){
    if (isset($_SESSION['allServices'])) {
        $services = $_SESSION['allServices'];       

        echo ('<label for="service">Current available Services:</label>');
        echo ('<br>');
        echo '
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Service Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        ';

        foreach ($services as $service) {
        $convertedPrice = number_format((float)$service['servicePrice'], 2, '.', '');

            echo '<tr >
            <th scope="row">'.$service['serviceName'].'</th>
            <td>'.$service['serviceDescription'].'</td>
            <td>'.$service['serviceCategory'].'</td>
            <td>'.$convertedPrice. ' ' . $service['serviceCurrency'].'</td>
            <td> <button id="'.$service['serviceId'].'" class="btn btn-primary shop-item-button" type="button" onClick="addToCart(this.id)">ADD TO CART</button> </td>
            </tr>';
        }
        echo "</tbody></table>";
        
    }
}

function loadAllPurchasesByLoggedUser(){
    if (isset($_SESSION['userPurchaseHistory']) && isset($_SESSION['allServices'])) {     
        $userPurchaseHistory = $_SESSION['userPurchaseHistory'];
        $services = $_SESSION['allServices']; 

        echo ('<label for="service">Purchase History:</label>');
        echo ('<br>');
        echo '
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Service Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Purchase Date</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        ';

        foreach ($userPurchaseHistory as $purchase){
            foreach ($services as $service) {
                if ($purchase['serviceId'] == $service['serviceId']){
                    $convertedPrice = number_format((float)$purchase['price'], 2, '.', '');
                    echo '<tr >
                    <th scope="row">'.$service['serviceName'].'</th>
                    <td>'.$convertedPrice.' ' . $purchase['currency']. '</td>
                    <td>'.$purchase['quantity'].'</td>
                    <td>'.$purchase['date_created'].'</td>
                    </tr>';
                }
            }
        }

        echo "</tbody></table>";
        
    }
}

function toJson($result){
    // covert array keys to variables with the extract function
    extract($result);
    
    // create a key value pair
    $data = array(
      'id' => $id, // extract function created the $id variable
      'firstName' => $firstName, // extract function created the $firstName variable
      'lastName' => $lastName, // extract function created the $lastName variable
      'phone' => $phone, // extract function created the $phone variable
      'email' => $email, // extract function created the $email variable
    );
  
    // convert the data array to json
    return json_encode($data);
}

