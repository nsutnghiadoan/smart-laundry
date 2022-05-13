<?php
session_start();
define('SECURITY', True);
include_once('./admin/config/connect.php');
if (isset($_SESSION['login'])) {
    header('location : ./user/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="./js/bootstrap/jquery-3.3.1.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar">
            <a href="#" class="navbar_logo"> Smart Laundry <i class="fa fa-brands fa-accusoft 2x"></i></a>
            <div class="navbar_bars">
                <i class="fa fa-bars"></i>
            </div>
            <div class="navbar_menu">
                <a href="index.php" class="navbar_menu-links">Home</a>
                <a href="about.php" class="navbar_menu-links">About us</a>
                <a href="modules/register/register.php" class="navbar_menu-links navbar_btn-register" id="button">Sign
                    up</a>
                <a href="modules/login/login.php" class="navbar_menu-links navbar_btn-login" id="button">Sign in</a>
            </div>
        </nav>
        <div class="hero">
            <div class="hero_container">
                <div class="hero_container-left">
                    <h1 class="hero_container-title">Welcome to my app</h1>
                    <h2>Let's smart laundry</h2>
                    <button class="hero_container-btn"><a href="/smartLaundry/modules/register/register.php">Sign up</a></button>
                </div>
                <div class="hero_container-right">
                    <img importance="true" loading="lazy" src="./images/backgroun-homepage.jpg" />
                </div>
            </div>
        </div>

    </div>
</body>

</html>