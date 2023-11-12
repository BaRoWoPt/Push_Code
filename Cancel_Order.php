<?php

require 'database/connect.php';

if(isset($_GET['Order'])){
     $id = $_GET['Order'];

     $sql="delete from `customersorders` where `OrderId` = $id";
     $result = mysqli_query($conn,$sql);
     if($result){
          header('location:Concert_B.php');
     }
     else {
          die(mysqli_error($conn));
     }
}
?>