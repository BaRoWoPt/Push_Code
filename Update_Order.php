<?php
     require 'database/connect.php';

     $orderID = $_GET['Order'];
     $sql = "select * from `customersorders` where `OrderID` = $orderID";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
     $oldName = $row['fullname'];
     $oldPhone = $row['telephone'];
     $oldMail = $row['email'];
     $oldTicket = $row['ticket'];

     if (isset($_POST['btn-form-update'])){
          $fullname = $_POST['fullname'];
          $telephone = $_POST['thongtin'];
          $email = $_POST['gmail'];
          $ticket = $_POST['ticket'];
          $sql = "update `customersorders` set 
                    `fullname` = '$fullname', `telephone` = '$telephone',
                    `email` = '$email', `ticket` = '$ticket'
                    where `OrderID` = '$orderID'";

          $result = $conn->query($sql);
          if($result){
               header('location:Concert_B.php');
          }
          else {
               die(mysqli_error($conn));
          }
     }
     $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cập nhật Đơn vé</title>
</head>
<body>
     <form method="POST">
          <h2>CẬP NHẬT ĐƠN VÉ</h2>
               <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $oldName ?>">
               </div>
               <div class="form-group">
                    <label for="thongtin">Điện thoại:</label>
                    <input type="text" id="thongtin" name="thongtin" value="<?php echo $oldPhone ?>">
               </div>
               <div class="form-group">
                    <label for="gmail">Email:</label>
                    <input type="text" id="gmail" name="gmail" value="<?php echo $oldMail ?>">
               </div>
               <div class="form-group">
                    <label for="ticket">Số lượng vé:</label>
                    <input type="text" id="ticket" name="ticket" value="<?php echo $oldTicket ?>">
               </div>

          <input type="submit" value="Cập nhật" name="btn-form-update" onclick="UpdateNotif()">
     </form>
     
<script>
     function UpdateNotif(){
          alert("Thông tin của bạn đã được cập nhật!");
     }
</script>
</body>
</html>