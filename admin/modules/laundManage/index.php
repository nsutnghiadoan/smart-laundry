<?php
include "../../config/connect.php";
include "../variables/variables.php";
$sql = "SELECT * FROM LAUND";
$result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="../../../user/css/style.css" />

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
            <table class="laund-list table table-success table-striped">
        <tr>
            <th>Laund id</th>
            <th>Laund name</th>
            <th>Laund image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <tr>
             <td colspan="5"><h5 class="mt-3 text-center">Máy đang trống</h5></td>
        </tr>
        <?php
        $booking = '';
        while ($row = mysqli_fetch_array($result)) {
            if ($row['laund_stt'] == 1) {
                $row['laund_stt'] = 'Máy trống';
                $booking = '<button  class="btn btn-primary"><a href="../laundManage/editLaund.php?this_id=' . $row['laund_id'] . '"class="booking-btn">Sửa</a></button>' .
                    '<button  class="btn btn-danger"><a href="../laundManage/deleteLaund.php?this_id=' . $row['laund_id'] . '"class="booking-btn">Xóa</a></button>';
                echo '<tr>' .
                    '<td>' . $row['laund_id'] . '</td>' .
                    '<td>' . $row['laund_name'] . '</td>' .
                    '<td><img src="' . $row['laund_img'] . '" alt="" class="booking-laund"/></td>' .
                    '<td> ' . $row['laund_stt'] . '</td>' .
                    '<td> ' . $booking . '</td>' .
                    '</tr>';
            }
        }
        ?>
        <tr>
             <td colspan="5"><h5 class="mt-3 text-center">Máy đang giặt</h5></td>
        </tr>
        <?php
        $sql = "SELECT * FROM LAUND";
        $result = mysqli_query($conn, $sql);
        $booking = '';
        while ($row = mysqli_fetch_array($result)) {
            if ($row['laund_stt'] == 0) {
                $row['laund_stt'] = 'Máy đang giặt';
                $booking = '<button  class="btn btn-primary"><a href="../laundManage/editLaund.php?this_id=' . $row['laund_id'] . '"class="booking-btn">Sửa</a></button>' .
                    '<button  class="btn btn-danger"><a href="../laundManage/deleteLaund.php?this_id=' . $row['laund_id'] . '"class="booking-btn">Xóa</a></button>';
                echo '<tr>' .
                    '<td>' . $row['laund_id'] . '</td>' .
                    '<td>' . $row['laund_name'] . '</td>' .
                    '<td><img src="' . $row['laund_img'] . '" alt="" class="booking-laund"/></td>' .
                    '<td> ' . $row['laund_stt'] . '</td>' .
                    '<td> ' . $booking . '</td>' .
                    '</tr>';
            }
        }
        ?>
    </table>
            </div>
        </div>
    </div>
</body>

</html>