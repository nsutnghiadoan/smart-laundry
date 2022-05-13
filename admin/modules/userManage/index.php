<?php
include "../../config/connect.php";
include "../variables/variables.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>

<body>
    <div class="container-fluid btn-success">
        <div class="row">
            <div class="col-lg-3">
                <h1>Administration</h1>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-3">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"' data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $email; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="../../../modules/account/editAccount.php">Tài khoản</a></li>

                    <li><a class="dropdown-item" href="../logout/logout.php">Đăng xuất</a></li>

                </ul>
               
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 mb-3">
        <div class="row">
        <div class="col-lg-3">
            <?php include "../../modules/leftSideBar/index.php" ?>
        </div>
        <div class="col-lg-9">
            <div class="row">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã User</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
             
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5"><h5 class="mt-3 text-center">Khách hàng</h5></td>
                </tr>
                <?php
                $queryUser = "SELECT * FROM user";
                $resultqueryUser = mysqli_query($conn, $queryUser);
                while ($listUser = mysqli_fetch_array($resultqueryUser)) {
                    if ($listUser['user_level'] == 2) {

                        echo '<tr>' .
                            '<td>' . $listUser['user_id'] . '</td>' .
                            '<td>' . $listUser['full_name'] . '</td>' .
                            '<td>' . $listUser['email'] . '</td>' .
                            '<td> Khách hàng </td>';
                    }
                } ?>
                <tr>
                    <td colspan="5"><h5 class="mt-3 text-center">Quản trị viên</h5></td>
                </tr>
                <?php
                $queryUser = "SELECT * FROM user";
                $resultqueryUser = mysqli_query($conn, $queryUser);
                while ($listUser = mysqli_fetch_array($resultqueryUser)) {
                    if ($listUser['user_level'] == 1) {

                        echo '<tr>' .
                            '<td>' . $listUser['user_id'] . '</td>' .
                            '<td>' . $listUser['full_name'] . '</td>' .
                            '<td>' . $listUser['email'] . '</td>' .
                            '<td> Quản trị viên </td>';
                    }
                }
                ?>
                <tr>
                    <td colspan="5"><h5 class="mt-3 text-center">Yêu cầu đổi mật khẩu</h5></td>
                </tr>
                <?php
                $queryUser = "SELECT * FROM user";
                $resultqueryUser = mysqli_query($conn, $queryUser);
                while ($listUser = mysqli_fetch_array($resultqueryUser)) {
                    $link = '../userManage/confirmPass.php?this_id=' . $listUser['user_id'];
                    if ($listUser['user_level'] == 10) {

                        echo '<tr>' .
                            '<td>' . $listUser['user_id'] . '</td>' .
                            '<td>' . $listUser['full_name'] . '</td>' .
                            '<td>' . $listUser['email'] . '</td>' .
                            '<td> Quản trị viên | <a href="' . $link . '">Xác nhận</a> </td>';
                    }
                }
                ?>
                 
            </tbody>
        </table>
            </div>
        </div>
    </div>
</body>

</html>