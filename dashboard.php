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
            loadServicesDropdownMenu();
        ?>
    </form>
    <!-- <form action="includes/php/transaction.inc.php" method="post">
    <div class="form-group mb-4">
            <label name="typeUsernameX" id="typeUsernameX" class="form-control custom-input"
                placeholder="Username" />
        </div>
        <div class="form-group mb-4">
            <input type="text" name="typeUsernameX" id="typeUsernameX" class="form-control custom-input"
                placeholder="Username" />
        </div>
        <div class="form-group mb-4">
            <input type="email" name="typeEmailX" id="typeEmailX" class="form-control custom-input"
                placeholder="Email" />
        </div>

        <div class="form-group mb-4">
            <input type="password" name="typePasswordX" id="typePasswordX" class="form-control custom-input"
                placeholder="Password" />
        </div>
        <div class="form-group mb-4">
            <input type="password" name="typePasswordAgainX" id="typePasswordAgainX" class="form-control custom-input"
                placeholder="Password Again" />
        </div>
        <button class="btn btn-lg px-5" type="submit">submit</button>
    </form> -->

</body>

</html>