<?php
session_start();
require '../database/connect.php';

if (isset($_POST['btn-login'])){
     $adminname = $_POST['adminname'];
     $password = md5($_POST['password']);
     $sql = "select * from `admin_accounts` where `adminID` = '$adminname' and `password` = '$password'";
     $result = $conn->query($sql);
     if ($result->num_rows == 0){
          echo "<script>alert('Đăng nhập thất bại!')</script>";
          echo "<script>window.location.href = 'Login_admin.php';</script>";
     } else {
          $account = $result->fetch_assoc();
          $_SESSION['adminname'] = $account['fullname'];
          //echo $_SESSION['admin'];
          echo "<script>window.location.href = 'Admin.php';</script>";
     }
}

?>