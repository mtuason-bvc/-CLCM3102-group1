<?php
require_once 'includes/php/config_session.inc.php';
require_once 'includes/php/dashboard_view.inc.php';

checkIfLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloudtech - Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="includes/js/shoppingcart.js" ></script>
    <link rel="icon" href="./images/image.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>
    <form action="includes/php/logout.inc.php" method="post">
        <button class="btn btn-lg px-5" type="submit">Logout</button>
    </form>

    
    <form>
        <?php
            require_once 'includes/php/dashboard.inc.php';
            loadAllServicesAvailable();
            // loadServicesDropdownMenu();
            $_SESSION['allServices'] = null;

        ?>
    </form>
    <section class="container content-section">
            <h2 class="section-header">CART</h2>

            <table class="table table-hover">
                <thead>
                <tr>
                <th scope="col">Service Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th></th>
                </tr>
                </thead>

                <tr class="cart-row">
                    <th class="cart-item" scope="row">Linux Galore</th>
                    <td class="cart-price">28.00 CAD</td>
                    <td class="cart-qty">
                        <input class="cart-quantity-input" type="number" value="2">
                    </td>
                    <td class="cart-remove">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </td>
                </tr>
                <tr class="cart-row">
                    <th class="cart-item" scope="row">Ubuntu micro server</th>
                    <td class="cart-price">12.00 CAD</td>
                    <td class="cart-qty">
                        <input class="cart-quantity-input" type="number" value="3">
                    </td>
                    <td class="cart-remove">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </td>
                </tr>
            </table>

            <!-- <div class="cart-items">
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <span class="cart-item-title">T-Shirt</span>
                    </div>
                    <span class="cart-price cart-column">$19.99</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" value="1">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </div>
                </div>
                <div class="cart-row">
                    <div class="cart-item cart-column">
                         <span class="cart-item-title">Album 3</span>
                    </div>
                    <span class="cart-price cart-column">$9.99</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" value="2">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </div>
                </div>
            </div> -->
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$39.97</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
        </section>

</body>

</html>