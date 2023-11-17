<?php
session_start();
require '../database/connect.php';

if (isset($_POST['btn-submit'])) {
    $_SESSION['fullname'] = $_POST['fullname'];
    $_SESSION['thongtin'] = $_POST['thongtin'];
    $_SESSION['gmail'] = $_POST['gmail'];
    $_SESSION['buy_ticket'] = $_POST['buy_ticket'];
}
if (isset($_SESSION['fullname']) || isset($_SESSION['thongtin']) || isset($_SESSION['gmail']) || isset($_SESSION['buy_ticket'])) {
    $fullname =  $_SESSION['fullname'];
    $phone = $_SESSION['thongtin'];
    $email = $_SESSION['gmail'];
    $tickets = $_SESSION['buy_ticket'];

    $total = $tickets * 1000000;
    $money = number_format($total, 0, ',', '.') . ' VNĐ';
    $date = date("d/m/Y", strtotime('+3 days'));
} else {
    $fullname =  "";
    $phone = "";
    $email = "";
    $tickets = 0;

    $total = $tickets * 1000000;
    $money = number_format($total, 0, ',', '.') . ' VNĐ';
    $date = date("d/m/Y", strtotime('+3 days'));
}


//$sql = "insert into `customersorders`(`fullname`, `telephone`, `email`, `ticket`) VALUES ('$fullname','$phone','$email','$tickets')";

//$conn->query($sql);

//tạm tắt tính năng gửi mail
// mail($email, $subject, $body, $header);


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon.svg" type="image/x-icon">
    <link rel="icon" href="../img/icon.svg">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../css/PurchaseConfirm.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Xác nhận đặt vé</title>
</head>

<body>
    <div class="header">
        <a href="./Concert_B.php" class="icon">
            <img class="icon_page" src="../img/logo_page.png" alt="">
        </a>
        <div class="menu-items">
            <a href="./Concert_B.php" class="items">
                <span id="item">Trang Chủ</span>
            </a>
            <a href="Layout_concert.php" class="items">
                <span id="item">Sự Kiện</span>
            </a>
            <a href="About_us.php" class="items">
                <span id="item">Về Chúng Tôi </span>
            </a>
            <a href="Search_ticket.php" class="items ">
                <span id="item">Kiểm tra vé </span>
            </a>
        </div>
        <div class="icon_left">
            <a style="color: #ffffff;" href="Search_ticket.php"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a id="icon_chart" class="fa-solid fa-bag-shopping" style="color: #ffffff;"></a>
            <a id="icon_open_sidebar" class=" icon_open_sidebar fa-solid fa-bars "></a>
        </div>
        <div class="sidebar">
            <i id="icon_close_sidebar" class="icon_close_sidebar fa-solid fa-xmark"></i>
            <main class="sidebar_items">
                <ul class="option">
                    <li class="option"><a href="Concert_B.php">Trang Chủ</a></li>
                    <li class="option"><a href="Layout_concert.php">Sự Kiện</a></li>
                    <li class="option"><a href="About_us.php">Về Chúng Tôi</a></li>
                    <li class="option"><a href="PurchaseConfirm.php">Giỏ Hàng</a></li>
                    <li class="option"><a href="Login_admin.php">Quản lí</a></li>
                </ul>
            </main>
            <footer class="sidebar_footer">
                <footer class="sb_ft_sp">
                    <img class="icon_footer" src="../img/logo_concert.png" alt="">
                    <ul class="footer_nav">
                        <li class="footer_link"><a href="https://www.facebook.com/profile.php?id=100022231063225" class="navfooter">Contact</a></li>
                        <li class="footer_link"><a href="https://www.facebook.com/duyle215" class="navfooter">Facebook</a>
                        </li>
                        <li class="footer_link"><a href="https://www.instagram.com/oaboad_29/" class="navfooter">Instagram</a></li>
                    </ul>
                </footer>
            </footer>
        </div>
        <div id="navsidebar" class="navsidebar">
            <i id="icon_close_navbar" class="icon_close_sidebar fa-solid fa-xmark"></i>
            <div class="nav_type">
                <h2 class="shopping_bag">Giỏ Hàng Của Bạn</h2>
            </div>
            <footer class="footer_nav">
                <button onclick="window.location.href='PurchaseConfirm.php'" class="check_nav">
                    Check
                </button>
            </footer>
        </div>
    </div>
    <div class="main-container">
        <h1>Xác nhận đặt vé sự kiện thành công</h1>
        <p style="padding-top: 20px; padding-bottom: 10px;">Cảm ơn đã đặt vé sự kiện. Vui lòng kiểm tra Email và làm
            theo Hướng dẫn thanh toán, thông tin đơn hàng của bạn!</p>

        <form id="form_4" id="finalconfirm" method="POST">
            <table id="cart-table">
                <thread>
                    <tr style="background-color: grey;">
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Số lượng vé</th>
                        <th>Thành tiền</th>
                    </tr>
                </thread>
                <tbody id="cart-body">
                    <tr>
                        <td>
                            <input id="fullname" type="text" class="item_form" name="finalfullname" value="<?php echo $fullname; ?>" />
                            <span class="form_message error"></span>
                        </td>
                        <td>
                            <input id="thongtin" type="text" class="item_form" name="finalthongtin" value="<?php echo $phone; ?>" />
                            <span class="form_message error"></span>
                        </td>
                        <td>
                            <input id="gmail" type="text" class="item_form" name="finalgmail" value="<?php echo $email; ?>" />
                            <span class="form_message error"></span>
                        </td>
                        <td>
                            <input id="buy_ticket" type="number" max="100" min="0" step="1" class="item_form" name="finalbuy_ticket" value="<?php echo $tickets; ?>" />
                            <span class="form_message error"></span>
                        </td>
                        <td>
                            <?php echo $money; ?>
                        </td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <td style="background-color: grey;" colspan="5"></td>

                    </tr>
                </tfoot>
            </table>
            <div class="btn">
                <input id="done" type="submit" class="purchase" id="purchase" name="btn-buy" value="Thanh toán" />
                <div id="error-container" class="error-container">
                    <span id="error-message" class="error-message"></span>
                </div>
                <input type="submit" class="home" id="home" name="btn-home" value="Về trang chủ" />
            </div>
        </form>

        <?php
        if (!(isset($_SESSION['fullname']) || isset($_SESSION['thongtin']) || isset($_SESSION['gmail']) || isset($_SESSION['buy_ticket']))) {
            echo "<script>disable()</script>";
        }

        if (isset($_POST['btn-buy'])) {

            $final_fullname = $_POST['finalfullname'];
            $final_telephone = $_POST['finalthongtin'];
            $final_email = $_POST['finalgmail'];
            $final_ticket = $_POST['finalbuy_ticket'];

            $sql = "insert into `customersorders`(`fullname`, `telephone`, `email`, `ticket`) VALUES ('$final_fullname','$final_telephone','$final_email','$final_ticket')";
            $conn->query($sql);
            $conn->close();
            unset($_SESSION['fullname']);
            unset($_SESSION['thongtin']);
            unset($_SESSION['gmail']);
            unset($_SESSION['buy_ticket']);
            echo '<script>document.getElementById("purchase").setAttribute("hidden", "hidden");</script>';
        ?>
            <div style="padding-top: 10px;">
                <p>Đặt vé thành công! Vui lòng kiểm tra email!</p>
                <br>
                <p>Nếu bạn muốn cập nhật đơn hàng hoặc muốn xem chi tiết đơn hàng, vui lòng nhấn vào
                    <a href="./Search_ticket.php" class="search-link">Đây!</a> và điền thông tin vé. Chúng tôi sẽ hỗ trợ
                    bạn!
                </p>
            </div>
        <?php }
        if (isset($_POST['btn-home'])) {
            echo "<script>window.location.href = 'Concert_B.php';</script>";
        }
        ?>


    </div>
    <div class="footer">
        <div class="footer-container">
            <div class="company_name">
                <a class="company-logo" href="./Concert_B.php">
                    <img id="logo" src="../img/logo_page.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <script>
        //Output 
        validator({
            form: '#form_4',
            errorSelector: '.form_message',
            rules: [
                validator.isRequired('#fullname'),
                validator.isNumberPhone('#thongtin'),
                validator.isEmail('#gmail'),
                validator.isBuyTicket('#buy_ticket'),
            ],
            onSubmit: function(data) {
                console.log(data)
            }
        });
    </script>

    <script src="../js/layout_concert.js"></script>
    <script src="../js/Event_shop.js"></script>
    <script>
        document.getElementById("done").addEventListener("click", function(event) {
            var name = document.getElementById("fullname").value.trim();
            var phone = document.getElementById("thongtin").value.trim();
            var gmail = document.getElementById("gmail").value.trim();
            var ticketQuantity = document.getElementById("buy_ticket").value.trim();
            var errorContainer = document.getElementById("error-container");
            var errorMessage = document.getElementById("error-message");

            if (name === "" || phone === "" || gmail === "" || ticketQuantity === "") {
                event.preventDefault(); // Prevent the default form submission
                errorMessage.innerHTML = "Vui lòng nhập đủ thông tin.";
                errorContainer.style.display = "block"; // Show the error container
            } else {
                errorMessage.innerHTML = ""; // Clear the error message if all fields are filled
                errorContainer.style.display = "none"; // Hide the error container

                // Check if there are still error messages displayed
                var errorMessages = document.querySelectorAll(".form_message.error");
                var hasErrors = Array.from(errorMessages).some(function(element) {
                    return element.innerHTML.trim() !== "";
                });

                // If no errors are found, allow the form submission
                if (!hasErrors) {
                    document.getElementById("done").removeEventListener("click", this);
                    document.getElementById("done").click();
                } else {
                    // Otherwise, prevent the form submission
                    event.preventDefault();
                }
            }
        });
    </script>

</body>

</html>