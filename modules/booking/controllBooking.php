<?php
session_start();
include "../../admin/config/connect.php";
if (isset($_GET['this_id'])) {
    $this_id = $_GET['this_id'];
    $sql = 'SELECT * FROM laund WHERE laund_id=' . $this_id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $login = $_SESSION['login'];
    $getID = "SELECT * FROM user WHERE email= '$login'";
    $result = mysqli_query($conn, $getID);
    $user_id = mysqli_fetch_array($result);
    $user_cmt_id = $user_id['user_id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../user/css/style.css" />
    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $('#timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '8:00',
                maxTime: '22:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
</head>

<body>
    <div id="wrapper">
        <div class="container-fluid mb-5 mt-3">
            <div class="row ">
                <div class="col-lg-3">

                    <button class="btn btn-primary"><a href="../../user/index.php" class="return-homepage"><i class="fa-solid fa-arrow-left 2x"></i> Quay lại trang
                            chủ</a> </button>
                </div>
                <!-- <?php include_once "./modules/header/header.php"; ?> -->

            </div>

        </div>
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 ">
                    <img src="<?php echo $row['laund_img']; ?>" alt="<?php echo $row['laund_name']; ?>" class="laund-detail_img" />
                </div>
                <div class="col-lg-6 laund-detail">

                    <h2 class="laund-detail-name"><?php echo $row['laund_name']; ?></h2>
                    <h3 class="laund-detail-price">Giá : <?php echo $row['laund_price']; ?>VND /1 wash</h3>
                    <h3 class="laund-detail-mass">Khối lượng : <?php echo $row['laund_mass']; ?>kg</h3>
                    <label>Mã máy: </label><input type="text" disabled value="<?php echo $this_id; ?>" id="laund_id">
                    <h4>Mô tả</h4>
                    <p class="laund-detail-desc"><?php echo $row['laund_desc']; ?></p>
                    <h4>Chọn thời gian đặt</h4>
                    <form action="" method="post">
                        <p>Date: <input type="text" id="datepicker" name="dateInput" /></p>
                        <p>Giờ: <input type="text" id="timepicker" name="timeInput" /></p>
                        <button name="booking" id="booking_this" class="btn btn-success">Book this machine</button>
                    </form>
                </div>

            </div>
            <?php
            if (isset($_POST['booking'])) {
                $IDMachine = $row['laund_id'];
                $priceMachine = $row['laund_price'];
                $dateInput = $_POST['dateInput'];
                $timeInput = $_POST['timeInput'];
                $bookingRequest = '';
                if ($dateInput == '' || $timeInput == '' || $timeInput == '00:00' || $dateInput == '0000-00-00') {
                    echo '';
                } else {

                    $bookingRequest = "INSERT INTO order_laund (order_id,user_id,total_price, order_time,laund_id,order_stt,order_date	)
                    VALUES ( '', '$user_cmt_id', '$priceMachine', '$timeInput', '$IDMachine' , '0', '$dateInput');";
                    $updateStatusMachine = "UPDATE laund SET laund_stt = 0 WHERE laund_id = " . $this_id;
                    mysqli_query($conn, $bookingRequest);
                    mysqli_query($conn, $updateStatusMachine);
                }
            }
            ?>
            <div class="container">
                <h3>Bình luận</h3>
                <form method=" POST" action="./comment.php">
                    <input type="text" name="comment-input" />
                    <input type="text" value="<?php echo $user_cmt_id; ?>" name="user-id" style="display: none;">
                    <input type="text" value="<?php echo $this_id; ?>" name="laund-id" style="display: none;">
                    <button type="submit">Bình luận</button>

                </form>
            </div>
            <?php

            $cmt = 'SELECT * FROM comment WHERE laund_id=' . $this_id . ' GROUP BY cmt_date';
            $cmtResult = mysqli_query($conn, $cmt);
            while ($comment = mysqli_fetch_array($cmtResult)) {
                $getNameUser = 'SELECT * FROM user WHERE user_id=' . $comment['user_id'];
                $resultUserName = mysqli_query($conn, $getNameUser);
                $userNameCmt = mysqli_fetch_array($resultUserName);
            ?>
                <div class="container">
                    <div class="fullname-cmt col-3 dt">
                        <h6><?php echo $userNameCmt['full_name']; ?> </h6>
                    </div>
                    <div class="date-cmt col-3 dt">
                        <p><?php echo $comment['cmt_date']; ?> </p>
                    </div>
                    <div class="row mb-4">
                        <div class="cmt-detail"><?php echo $comment['cmt_detail']; ?> </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
    <script type="text/javascript">
        $('#booking_this').on('click', function() {
            const date_booking = $('#datepicker').val();
            const time_booking = $('#timepicker').val();
            if (date_booking == '' || time_booking == '') {
                alert('Bạn chưa chọn đủ thông tin !!! ');
            } else {
                alert('Đặt hàng thành công');
            }
        })
        // $('#comment-btn').on('click', function(e) {
        //     e.preventDefault()
        // })
    </script>
</body>

</html>