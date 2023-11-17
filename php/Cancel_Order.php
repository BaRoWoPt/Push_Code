<?php

require '../database/connect.php';

if (isset($_GET['Order'])) {
     $id = $_GET['Order'];

     $sql = "update `customersorders` set `status` = 'Đã huỷ đơn' where `OrderId` = $id";
     $result = mysqli_query($conn, $sql);
     if ($result) {
          header('location:Concert_B.php');
     } else {
          die(mysqli_error($conn));
     }
}
