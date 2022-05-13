<?php
session_start();
include "../../admin/config/connect.php";

$login = $_SESSION['login'];
$getID = "SELECT * FROM user WHERE email= '$login'";
$result = mysqli_query($conn, $getID);
$user_id = mysqli_fetch_array($result);
$user_cmt_id = $user_id['user_id'];
$sql = 'SELECT * FROM order_laund WHERE user_id=' . $user_cmt_id;
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../../user/css/style.css" />

</head>

<body>
    <div class="container-fluid mb-5 mt-3">
        <div class="row ">
            <div class="col-lg-3">

                <button class="btn btn-primary"><a href="../../user/index.php" class="return-homepage"><i class="fa-solid fa-arrow-left 2x"></i> Quay lại trang
                        chủ</a> </button>
            </div>
            <div class="col-lg-3"></div>
            <a href="../order/orderHistory.php" class="col-lg-6">Xem lịch sử đặt lịch giặt</a>

        </div>

    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã Order</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Giờ đặt</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Trạng thái</th>

                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) {
                    if ($row['order_stt'] == 0 || $row['order_stt'] == 1) {
                        if ($row['order_stt'] == 0) {
                            $booking = '<button  class="btn btn-primary"><a href="./controllOrder.php?this_id=' . $row['order_id'] . '"class="booking-btn">Xác nhận</a></button>' .
                                '<button  class="btn btn-danger"><a href="./cancelBooking.php?this_id=' . $row['order_id'] . '+' . $row['laund_id'] . '">Hủy</a></button>';
                        } else if ($row['order_stt'] == 1) {
                            $booking = '<button class="btn btn-secondary" disabled>Đã xác nhận</button>';
                        }
                        echo '<tr>' .
                            '<td>' . $row['order_id'] . '</td>' .
                            '<td>' . $row['total_price'] . '</td>' .
                            '<td>' . $row['order_time'] . '</td>' .
                            '<td> ' . $row['order_date'] . '</td>' .
                            '<td> ' . $booking . '</td>' .
                            '</tr>';
                    }
                } ?>


            </tbody>
        </table>

    </div>
</body>

</html>