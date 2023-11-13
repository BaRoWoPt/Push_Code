<?php
require 'database/connect.php';

if (isset($_POST['btn-search'])) {
    $fullname = $_POST['fullname'];
    $telephone = $_POST['thongtin'];
    $email = $_POST['gmail'];
    $sql = "select * from `customersorders` where 
                `fullname` like '$fullname' and
                `telephone` like '$telephone' and
                `email` like '$email'";

    $result = $conn->query($sql);
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin vé</title>
    <link rel="icon" href="./img/icon.svg" type="image/x-icon">
    <link rel="icon" href="./img/icon.svg">
    <link rel="stylesheet" href="search_result.css">
    <link rel="stylesheet" href="./responsive.css">
    <link rel="stylesheet" href="./icon/css/all.min.css">
</head>

<body>
    <div class="header">
        <a href="./Concert_B.php" class="icon">
            <img class="icon_page" src="./img/logo_page.png" alt="">
        </a>
        <div class="menu-items">
            <a href="Concert_B.php" class="items">
                <span id="item">Trang Chủ</span>
            </a>
            <a href="./Layout_concert.php" class="items">
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
                <button onclick="window.location.href='PurchaseConfirm.php'" class="check_nav">
                    Check
                </button>
            </footer>
        </div>
    </div>


    <div class="page_blank">
        <div class="text-result">
            <?php if ($result->num_rows == 0) { ?>
            <!-- Thông báo khi không tìm thấy đơn vé -->
            <div class="text-note">
                <p class="notifi">Không tìm thấy đơn vé của bạn!</p>
            </div>
            <?php } else { ?>
            <!-- Bảng thông tin đơn vé -->
            <table id="table-result-id">
                <thead>
                    <tr>
                        <th>Mã đơn vé</th>
                        <th>Họ và Tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Số lượng vé</th>
                        <th>Thành tiền</th>
                        <th>Ngày đăng ký</th>
                        <th>Hạn cuối thanh toán</th>
                        <th>Tình trạng</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tbody id="table-body-id">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["OrderID"]; ?></td>
                        <td><?php echo $row["fullname"]; ?></td>
                        <td><?php echo $row["telephone"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["ticket"]; ?></td>
                        <td><?php echo number_format($row["ticket"] * 1000000, 0, ',', '.') . ' VNĐ'; ?></td>
                        <td><?php echo $row["regis_day"]; ?></td>
                        <td><?php echo $row["payment_day"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td class="custom-column">
                            <form action="Update_Order.php" method="get">
                                <input type="hidden" name="Order" value="<?php echo $row["OrderID"]; ?>">
                                <button type="submit" class="btn-client" name="btn-update">Cập nhật</button>
                            </form>
                        </td>
                        <td>
                            <form action="Cancel_Order.php" method="get"
                                onsubmit="return confirm('Bạn có chắc muốn hủy đơn này không?')">
                                <input type="hidden" name="Order" value="<?php echo $row["OrderID"]; ?>">
                                <button type="submit" class="btn-client" name="btn-delete">Huỷ đơn</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
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
    <script>
    function DeleteAlert() {
        alert("Đơn hàng của bạn đã được huỷ thành công!");
    }
    </script>
</body>
<script src="search_result.js"></script>
<script src="Event_shop.js"></script>

</html>