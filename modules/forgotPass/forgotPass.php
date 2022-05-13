<?php
include "../../admin/config/connect.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $full_name = $_POST['fullname'];
    $level = $_POST['level'];
    if ($email != '' || $full_name != '' || $level != '') {
        $sql1 = "SELECT * FROM user WHERE (email = '$email' AND full_name='$full_name' AND user_level='$level')";
        $result = mysqli_query($conn, $sql1);

        while ($row = mysqli_fetch_array($result)) {
            if ($row['user_id'] != '') {
                $sql2 = "UPDATE user SET user_level = 10 WHERE user_id=" . $row['user_id'];
                mysqli_query($conn, $sql2);
                echo " Đã gửi yêu cầu đổi mật khẩu";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../../js/bootstrap/jquery-3.3.1.js"></script>
    <title>Quên mật khẩu</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5">Quên mật khẩu</h2>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form method="post">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nhập email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Nhập email của bạn">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="fullname" class="form-control"
                                placeholder="Nhập họ và tên của bạn">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control" id="level">
                                <option value="1">Admin</option>
                                <option value="2">User</option>

                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4" id="button_forgotPass" name="button_forgotPass">
                        Xác nhận</button>
                </form>
            </div>
            <div class="col-3"></div>

        </div>
    </div>
    <script type="text/javascript">
    $('#button_forgotPass').on('click', function(e) {
            const email = $('#email').val();
            const fullname = $('#fullname').val();
            const level = $('#level').find(":selected").text() == 'User' ? 2 : 1;
            if (email == '' || fullname == '' || level == '') {
                alert('Vui lòng điền đầy đủ thông tin!')
            }
        }


    );
    </script>
</body>

</html>