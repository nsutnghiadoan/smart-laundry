<?php
include "/xampp/htdocs/smartLaundry/admin/config/connect.php";
include "../admin/modules/variables/variables.php";

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Trạng thái Order', 'Số lượng'],
            ['Chưa xác nhận order', <?php echo $orderNotConfirm; ?>],
            ['Đã xác nhận order', <?php echo $orderConfirm; ?>],
            ['Đã giặt thành công', <?php echo $orderPay; ?>],

        ]);

        var options = {
            title: 'Thống kê lịch giặt'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['', 'Người'],
            ["Người quản trị", <?php echo $quanUser; ?>],
            ["Khách hàng", <?php echo $quanNotAdmin; ?>],

        ]);

        var options = {
            width: 300,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Thống kê người dùng',
            },

        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {

        var data = google.visualization.arrayToDataTable([
            ['Trạng thái Máy', 'Số lượng'],
            ['Đang giặt', <?php echo $quanLaunding; ?>],
            ['Đang trống', <?php echo $notLauding; ?>],

        ]);

        var options = {
            title: 'Thống kê máy giặt'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
    }
    </script>
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
                    <li><a class="dropdown-item" href="../modules/account/editAccount.php">Tài khoản</a></li>
                    <li><a class="dropdown-item" href="../modules/logout/logout.php">Đăng xuất</a></li>
                </ul>
               
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 mb-3">
        <div class="row">
        <div class="col-lg-3">
            <?php include "modules/leftSideBar/index.php" ?>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-3">
                    <h4>Tổng số người dùng : <?php echo $quanUserAndAdmin; ?></h4>
                </div>
                <div class="col-3">
                <h4>Tổng số lịch giặt : <?php echo $quanOrder; ?></h4>

                </div>
                <div class="col-3">
                <h4>Tổng số máy giặt : <?php echo $quanLaund; ?></h4>

                </div>

            </div>
            <div class="row mt-5">
            <div id="top_x_div" style="width: 400px; height: 600px;"></div>
            <div id="piechart" style="width: 750px; height: 600px;"></div>

            </div>
            <div class="row">
            <div id="piechart2" style="width: 750px; height: 600px;"></div>

            </div>
            </div>
        </div>
    </div>
</body>

</html>