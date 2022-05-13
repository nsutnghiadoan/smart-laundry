<?php
include "../../admin/config/connect.php";
include "controlRegister.php";

if (isset($_POST['email'])) {
    header('Location: ./login/login.php');
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
    <title>Đăng ký tài khoản</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5">Đăng ký </h2>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form_register">
                    <form action="controlRegister.php" method="POST">
                        <div class="mb-3 ">
                            <label class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label">Full name</label>
                            <input name="fullname" type="text" class="form-control" id="fullname"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label">User Level</label>
                            <select name="level" class="form-control" id="">
                                <option value="1">Admin</option>
                                <option value="2">User</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="register-btn">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-3"></div>

        </div>
    </div>

</body>

</html>