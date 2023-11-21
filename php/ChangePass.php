<?php 
     require '../database/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <form method="post">
          <label for="currpass">Mật khẩu Hiện tại</label>
          <input type="password" name="currpass"/>
          <label for="newpass">Mật khẩu Mới</label>
          <input type="password" name="newpass"/>
          <label for="re-newpass">Nhập lại Mật khẩu Mới</label>
          <input type="password" name="re-newpass"/>
          <input type="submit" name="update" value="Cập nhật"/>
     </form>
     <?php 
          if (isset($_POST['update'])){
               $currpass = $_POST['currpass'];
               $newpass = $_POST['newpass'];
               $re_newpass = $_POST['re-newpass'];
               $adminID = $_GET['adminID'];

               $sql = "select * from `admin_accounts` where adminID = '$adminID'";
               $result = $conn->query($sql);
               $account = $result->fetch_assoc();
               $checkPass = $account['password']; //md5

               if (md5($currpass) === $checkPass){
                    if ($currpass !== $newpass && $newpass === $re_newpass) {
                         $sql = "UPDATE `admin_accounts` SET `password` = md5('$newpass') WHERE `adminID` = '$adminID'";
                         $conn->query($sql);
                         echo "<script>alert('Cập nhật mật khẩu thành công!')</script>";
                         echo "<script>window.location.href = 'Login_admin.php';</script>";
                    }
                    if($currpass === $newpass) {
                         echo "<script>alert('Mật khẩu mới không được giống mật khẩu cũ!')</script>";                    
                    }
                    if($newpass !== $re_newpass) {
                    echo "<script>alert('Nhập lại mật khẩu mới không chính xác!')</script>";
                    }
               } else {
                    echo "<script>alert('Mật khẩu hiện tại không chính xác!')</script>";
               }
          }
     ?>

</body>
</html>