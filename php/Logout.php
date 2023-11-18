<?php
session_start();

unset($_SESSION['adminname']);
echo "<script>window.location.href = 'Login_admin.php';</script>";
?>