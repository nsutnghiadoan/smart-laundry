<?php
session_start();
include "../../admin/config/connect.php";
$login = $_SESSION['login'];
$getID = "SELECT * FROM user WHERE email= '$login'";
$result = mysqli_query($conn, $getID);
$row = mysqli_fetch_array($result);
if (isset($_POST['edit_customer_pro'])) {
    $full_name = $_POST['full_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if ($full_name == '' || $password == '' || $email == '') {
        echo 'vui lòng điền đầy đủ thông tin';
    } else {

        $sql = "UPDATE user SET full_name='$full_name' , password='$password' , email = '$email' WHERE email='$login'";
        mysqli_query($conn, $sql);
    }
}
$x = '';
if ($row['user_level'] == 1) {
    $x = 'Quản trị viên';
} else {
    $x = 'Khách hàng';
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="main.js"></script> -->
    <title>PeaShop</title>
</head>

<body>
    <header class="navigation">

    </header>

    <div class="main-wrapper ">

        <div class="title_listcustomer my-4 container">
            <div class="row">
                <h2>Thông tin
                    <?php echo $x . ': ' . $row['full_name']; ?></h2>
            </div>

            <form method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Họ và tên"
                                value="<?php echo $row['full_name'] ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="<?php echo $row['email'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu"
                                value="<?php echo $row['password'] ?>">
                        </div>
                    </div>

                </div>

                <p class=""> Cấp độ : <?php echo $row['user_level'] == 1 ? 'Admin' : 'User' ?></p>
                <button name="edit_customer_pro" class="btn btn-primary" type="submit">Chỉnh sửa</button>
            </form>

        </div>



    </div>


</body>

</html>