<nav class="navbar">
    <a href="#" class="navbar_logo"> Smart Laundry <i class="fa fa-brands fa-accusoft 2x"></i></a>

    <div class="navbar_menu">
        <a href="http://localhost/smartLaundry/user/index.php" class="navbar_menu-links">Home</a>
        <a href="./about.php" class="navbar_menu-links">About us</a>
        <a href="../modules/order/order.php" class="navbar_menu-links">Washing Schedule</a>
        <?php
        $haveUser = '<div class="dropdown">' .
            '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"' .
            'data-bs-toggle="dropdown" aria-expanded="false">' .
            $_SESSION['login'] .
            '</button>' .
            '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">' .
            '<li><a class="dropdown-item" href="../modules/account/editAccount.php">Tài khoản</a></li>' .
            '<li><a class="dropdown-item" href="../modules/logout/logout.php">Đăng xuất</a></li>' .
            '</ul>' .
            '</div>';
        if (isset($_SESSION['login'])) {

            echo $haveUser;
        } else {
            header('Location: ../index.php');
        }
        ?>

    </div>
</nav>