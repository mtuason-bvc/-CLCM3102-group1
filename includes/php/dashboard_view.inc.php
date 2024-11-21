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