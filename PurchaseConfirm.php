<?php
    require 'database/connect.php';

    if(isset($_POST['btn-submit'])){
        $fullname = $_POST['fullname'];
        $phone = $_POST['thongtin'];
        $email = $_POST['gmail'];
        $tickets = $_POST['buy_ticket'];
        $total = $tickets * 1000000;
        $money = number_format($total, 0, ',', '.') . ' VNĐ'; 
        $date = date("d/m/Y",strtotime('+3 days'));
        
        $subject = "Chào mừng bạn đến với sự kiện của chúng tôi";
        $body = "Thân chào bạn $fullname,
    Chúng tôi rất vui với sự hiện diện của bạn tại sự kiện, vui lòng thanh toán $money tới:
    Số tài khoản:   XXXX-XXXX-XXXX-XXXX
    Ngân hàng:      YYYYY-bank
    Trước ngày:     $date
    
    Thân ái.
    The Event Shop";
        $header = "From: The.Event.Shop.proj@gmail.com";
        
        $sql = "insert into `customersorders`(`fullname`, `telephone`, `email`, `ticket`) VALUES ('$fullname','$phone','$email','$tickets')";

        $conn->query($sql);

        //tạm tắt tính năng gửi mail
        //mail($email,$subject,$body,$header);
    }
    $conn->close();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/icon.svg" type="image/x-icon">
    <link rel="icon" href="./img/icon.svg">
    <link rel="stylesheet" href="./icon/css/all.min.css">
    <link rel="stylesheet" href="PurchaseConfirm.css">
    
    <title>Xác nhận đặt vé</title>
</head>

<body>
    <div class="header">
        <a href="./Concert_B.php" class="icon">
            <img class="icon_page" src="./img/logo_page.png" alt="">
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
                    <img class="icon_footer" src=".//img/logo_concert.png" alt="">
                    <ul class="footer_nav">
                        <li class="footer_link"><a href="https://www.facebook.com/profile.php?id=100022231063225"
                                class="navfooter">Contact</a></li>
                        <li class="footer_link"><a href="https://www.facebook.com/duyle215"
                                class="navfooter">Facebook</a>
                        </li>
                        <li class="footer_link"><a href="https://www.instagram.com/oaboad_29/"
                                class="navfooter">Instagram</a></li>
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
                <button onclick="window.location.href='../PurchaseConfirm.php'" class="check_nav">
                    Check
                </button>
            </footer>
        </div>
    </div>
    <div class="main-container">
        <h1>Xác nhận đặt vé sự kiện thành công</h1>
        <p style="padding-top: 20px; padding-bottom: 10px;">Cảm ơn đã đặt vé sự kiện. Vui lòng kiểm tra Email và làm theo Hướng dẫn thanh toán, thông tin đơn hàng của bạn!</p>
            
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
                            <?php echo $fullname; ?>
                        </td>
                        <td>
                            <?php echo $phone; ?>
                        </td>
                        <td>
                            <?php echo $email; ?>
                        </td>
                        <td>
                            <?php echo $tickets; ?>
                        </td>
                        <td>
                            <?php echo $money; ?>
                        </td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <td style="background-color: grey;" colspan="4">Tổng tiền:</td>
                        <td style="background-color: grey; text-align: center;" id="total-price"></td>
                    </tr>
                </tfoot>
            </table>
            <div style="padding:10px;">
                <p>                    
                    Nếu bạn thấy đơn hàng của bạn có sai sót hoặc muốn xem chi tiết đơn hàng, vui lòng nhấn vào 
                    <a href="./Search_ticket.php" class="search-link">Đây!</a> và điền thông tin vé. Chúng tôi sẽ hỗ trợ bạn!
                </p>
            </div>
            <!--
                <div class="btn">
                    <input type="submit" class="purchase" name="btn-buy" value="Thanh toán"/>

                    <button id="delete-all" class="delete-all" name="btn-delAll">Xoá giỏ hàng</button>
                </div>
            -->
    </div>
    <div class="footer">
        <div class="footer-container">
            <div class="company_name">
                <a class="company-logo" href="./Concert_B.php">
                    <img id="logo" src="./img/logo_page.png" alt="">
                </a>
            </div>
        </div>
    </div>
    
    <script src="Event_shop.js"></script>
    <script src="PurchaseConfirm.js"></script>
</body>