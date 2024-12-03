<?php

declare(strict_types=1);

function checkIfLoggedIn()
{
    if (isset($_SESSION["userId"])) {
        $userId = $_SESSION["userId"];
        $userName = htmlspecialchars($_SESSION["userUsername"]);
        echo ("<br>");
        echo ('<h4 class="form-success">Welcome ' . $userName . '</h4>');
    } else {
        header("Location: login.php");
        die();
    }
}


function loadServicesDropdownMenu()
{
    if (isset($_SESSION['allServices'])) {
        $services = $_SESSION['allServices'];
        echo ('<form action="includes/php/transaction.inc.php" method="post">');
        echo ('<select id="service" name="service">');
        foreach ($services as $service) {
            echo (' <option value="' . $service['serviceName'] . '">' . $service['serviceName'] . '</option>');
        }
        echo ('</select>');
        echo ('<button class="btn btn-lg px-5" type="submit">submit</button>');

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

            echo '<tr>
            <th scope="row">'.$service['serviceName'].'</th>
            <td>'.$service['serviceDescription'].'</td>
            <td>'.$service['serviceCategory'].'</td>
            <td>'.$convertedPrice. ' ' . $service['serviceCurrency'].'</td>
            <td> <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button> </td>
            </tr>';
        }
        echo "</tbody></table>";
        
    }
}