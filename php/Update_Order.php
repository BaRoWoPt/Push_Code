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

if (isset($_POST['btn-form-update'])) {
    $fullname = $_POST['fullname'];
    $telephone = $_POST['thongtin'];
    $email = $_POST['gmail'];
    $ticket = $_POST['ticket'];
    $sql = "update `customersorders` set 
                    `fullname` = '$fullname', `telephone` = '$telephone',
                    `email` = '$email', `ticket` = '$ticket'
                    where `OrderID` = '$orderID'";

    $result = $conn->query($sql);
    if ($result) {
        header('location:Concert_B.php');
    } else {
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
    <title>Cập Nhật Đơn Vé</title>
    <link rel="stylesheet" href="../css/Update_Order.css">

    <style>
    #error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
    </style>
</head>

<body>

    <form id="form_3" method="POST" onsubmit="return validateForm()">
        <h2 class="head-update">CẬP NHẬT ĐƠN VÉ</h2>
        <div class="info">
            <label for="fullname">Họ và tên:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $oldName ?>">
            <span class="form_message error"></span>

        </div>
        <div class="info">
            <label for="thongtin">Điện thoại:</label>
            <input type="text" id="thongtin" name="thongtin" value="<?php echo $oldPhone ?>">
            <span class="form_message error"></span>

        </div>
        <div class="info">
            <label for="gmail">Email:</label>
            <input type="text" id="gmail" name="gmail" value="<?php echo $oldMail ?>">
            <span class="form_message error"></span>

        </div>
        <div class="info">
            <label for="ticket">Số lượng vé:</label>
            <input type="text" id="ticket" name="ticket" value="<?php echo $oldTicket ?>">
            <span class="form_message error"></span>

        </div>

        <input id="btn-update" type="submit" value="Cập nhật" name="btn-form-update">
        <span id="error-message"></span>
    </form>
    <script src="../js/form_test.js "></script>
    <script>
    //Output 
    validator({
        form: '#form_3',
        errorSelector: '.form_message',
        rules: [
            validator.isRequired('#fullname'),
            validator.isNumberPhone('#thongtin'),
            validator.isEmail('#gmail'),
            validator.isBuyTicket('#ticket'),
        ],
        onSubmit: function(data) {
            console.log(data)
        }
    });
    </script>
    <script>
    function validateForm() {
        var fullname = document.getElementById('fullname').value;
        var thongtin = document.getElementById('thongtin').value;
        var gmail = document.getElementById('gmail').value;
        var ticket = document.getElementById('ticket').value;
        var errorMessage = document.getElementById('error-message');

        errorMessage.innerHTML = ""; // Đặt lại thông báo trước mỗi lần kiểm tra

        if (fullname === "" || thongtin === "" || gmail === "" || ticket === "") {
            errorMessage.innerHTML = "Vui lòng nhập đầy đủ thông tin!";
            return false; // Ngăn chặn việc submit nếu có lỗi
        }

        // Các kiểm tra khác nếu cần

        return true; // Cho phép submit nếu không có lỗi
    }
    </script>

</body>

</html>