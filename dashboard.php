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
    <script src="includes/js/shoppingcart.js" defer></script>
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
        <?php
            require_once 'includes/php/dashboard.inc.php';
            loadAllServicesAvailable();
            $servicesJSON = json_encode($_SESSION['allServices']);
            $userPurchaseHistory = $_SESSION["userPurchaseHistory"];
            // print_r($userPurchaseHistory);
            // $userPurchaseHistoryJSON = null;
            // if ($userPurchaseHistory != null){
            //     $userPurchaseHistoryJSON = json_encode($_SESSION["userPurchaseHistory"]);
            // }
            // $_SESSION['allServices'] = null;
            // if (isset($_SESSION["userId"])) {
            //     $userId = $_SESSION["userId"];
            // }
        ?>

        <script>
        // Embed JSON as a JavaScript variable
        const phpData = <?php echo $servicesJSON; ?>;
        const currentLoggedUser = '<?php echo $userName; ?>';
        const currentLoggedUserId = '<?php echo $userId; ?>';
        console.log(phpData);
        
        </script>

    <form>   
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
                <tbody class="cart-rows">
                <!-- rendering here -->
                </tbody>
            </table>
            <div class="cart-total">
                <h2>
                <strong class="cart-total-title">Total</strong>
                <span id="cart-total-price">0.00 CAD</span>
                </h2>
            </div>
            <button class="btn btn-primary btn-purchase"  onclick="purchaseCartContents()">PURCHASE</button>
      
        </section>
    </form>
            <?php
                if ($userPurchaseHistory != null){
                    loadAllPurchasesByLoggedUser();
                }
            ?>
  

</body>

</html>