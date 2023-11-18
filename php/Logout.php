<?php
session_start();

unset($_SESSION['fullname']);
echo "<script>window.location.href = 'Admin.php';</script>"
?>