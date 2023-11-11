<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "push_codedb";

$conn = new mysqli($host,$username,$password,$dbname);

if($conn->connect_error){
     die("Kết nối đến database thất bại". $conn->connect_error);
}
//echo "Kết nối thành công";
?>