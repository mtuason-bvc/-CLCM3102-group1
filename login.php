<?php
require_once 'includes/php/config_session.inc.php';
require_once 'includes/php/login_view.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="./css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" href="./images/image.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <!-- <script src="./js/main.js"></script> -->


</head>

<body>

    <header class="header">
        <a href="index.html" class="logo"><img src="./images/logo_cloudtech.png" alt=""></a>
        <div class="fas fa-bars"></div>
        <nav class="navbar">
            <ul>
                <li><a href="index.html#home">home</a></li>
                <li><a href="index.html#about">about</a></li>
                <li><a href="index.html#service">services</a></li>
                <li><a href="index.html#portfolio">portfolio</a></li>
                <li><a href="index.html#team">team</a></li>
                <li><a href="careers.html">inquiry</a></li>
                <li><a href="index.html#contact">contact</a></li>
                <li><a href="index.html#faq">FAQ</a></li>
                <li><a href="login.php">login</a></li>
            </ul>
        </nav>
    </header>
    <section class="vh-100 gradient-custom">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-md-4 mt-md-3 pb-3">
                                <?php
                                    if (isset($_SESSION["userId"])) {
                                        $userId = $_SESSION["userId"];
                                        $userName = $_SESSION["userUsername"];
                                        echo ("<br>");
                                        echo ('<h4 class="form-success">Current logged in user: ' . $userName . '</h4>');
                                        echo ("<br>"); 
                                ?>
                                <form action="includes/php/logout.inc.php" method="post">
                                    <button class="btn btn-lg px-5" type="submit">Logout</button>
                                </form>
                                <h4><a href="dashboard.php">Go to dashboard</a></h4>
                                <?php
                                    } else { 
                                ?>
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-4">Please enter your login and password</p>

                                    <form action="includes/php/login.inc.php" method="post">
                                        <div class="form-group mb-4">
                                            <input type="text" id="typeUsernameX" name="typeUsernameX" class="form-control custom-input"
                                                placeholder="Username" />
                                        </div>

                                        <div class="form-group mb-4">
                                            <input type="password" id="typePasswordX" name="typePasswordX" class="form-control custom-input"
                                                placeholder="Password" />
                                        </div>

                                        <!-- <p class="small mb-4"><a class="text-white-50" href="#!">Forgot password?</a></p> -->

                                        <button class="btn btn-lg px-5" type="submit">Login</button>
                                    </form>

                            </div>
                            <div>
                                <p class="mb-0">Don't have an account? <a href="signup.php"
                                        class="text-white-50 fw-bold">Sign Up</a></p>

                            <?php
                                }
                            ?>
                            <?php
                            checkLoginErrors();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>