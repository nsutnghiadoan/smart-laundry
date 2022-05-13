<?php

session_start();
// if(isset($_SESSION['login'])){
//     echo "xin chao" . $_SESSION['login'];
// }else{
//     echo "xin chao";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <div id="header_user">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    include_once('../modules/header/header.php');
                    // include_once('./about.php');
                    // include_once('../modules/account/editAccount.php');


                    ?>

                </div>
            </div>
        </div>
        <div id="content_user">
            <div class="container">
                <div class="row">
                    <?php
                    include_once('../modules/booking/booking.php');
                    // include_once('../modules/booking/booking.php');

                    ?>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php

                    include_once('../modules/slide/silde.php');
                    // include_once ('../index.php');
                    ?>
                </div>
                <a href="../modules/logout/logout.php">logout</a>
            </div>
        </div>
    </div>
</body>

</html>