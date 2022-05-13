<?php
include_once("../admin/config/connect.php");
$sql = "SELECT * FROM LAUND";
$result = mysqli_query($conn, $sql);

?>
<div class="laund">
    <table class="laund-list table table-success table-striped">
        <tr>
            <th>Laund id</th>
            <th>Laund name</th>
            <th>Laund image</th>
            <th>Status</th>
            <th>Book</th>
        </tr>
        <?php
        $booking = '';
        while ($row = mysqli_fetch_array($result)) {
            if ($row['laund_stt'] == 1) {
                $row['laund_stt'] = 'Empty machine';
                $booking = '<button  class="btn btn-primary"><a href="../modules/booking/controllBooking.php?this_id=' . $row['laund_id'] . '"class="booking-btn">Book</a></button>';
            } else {
                $row['laund_stt'] = 'Being used';
                $booking = '<button class="btn btn-secondary" disabled>Book</button>';
            }
            echo '<tr>' .
                '<td>' . $row['laund_id'] . '</td>' .
                '<td>' . $row['laund_name'] . '</td>' .
                '<td><img src="' . $row['laund_img'] . '" alt="" class="booking-laund"/></td>' .
                '<td> ' . $row['laund_stt'] . '</td>' .
                '<td> ' . $booking . '</td>' .
                '</tr>';
        }
        ?>
    </table>

</div>