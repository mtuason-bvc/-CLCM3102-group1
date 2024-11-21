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

    //     <select id="cars" name="cars">
    //     <option value="volvo">Volvo</option>
    //     <option value="saab">Saab</option>
    //     <option value="fiat">Fiat</option>
    //     <option value="audi">Audi</option>
    //   </select>

    if (isset($_SESSION['allServices'])) {
        $services = $_SESSION['allServices'];
        echo ('<label for="service">Choose a Service to avail:</label>');
        echo ('<br>');
        // $_SESSION['allServices'] = null;
        
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Name</th><th>Description</th><th>Category</th><th>Price</th></tr>";

        foreach ($services as $service) {
            echo '<tr>';
            echo "<td style='width: 150px; border: 1px solid black;' >".$service['serviceName'].'</td>';
            echo "<td style='width: 150px; border: 1px solid black;' >".$service['serviceDescription'].'</td>';
            echo "<td style='width: 150px; border: 1px solid black;' >".$service['serviceCategory'].'</td>';
            echo "<td style='width: 150px; border: 1px solid black;' >".$service['servicePrice'] . ' ' . $service['serviceCurrency'].'</td>';
            echo '</tr>';
        }
        echo "</table>";

        echo ('<select id="service" name="service">');
        foreach ($services as $service) {
            echo (' <option value="' . $service['serviceName'] . '">' . $service['serviceName'] . '</option>');
        }
        echo ('</select>');
    }
}

function populateServiceDetails($serviceName){
    if (isset($_SESSION['allServices'])) {
        $services = $_SESSION['allServices'];
       
        // $_SESSION['allServices'] = null;
        
        foreach ($services as $service) {
            if ($serviceName == $service['serviceName']){

            }
        }
        
    }
}