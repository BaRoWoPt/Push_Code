<?php
    require 'database/connect.php';

    $sql = "select * from `customersorders` ";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pages.</title>
    <link rel="icon" href="./img/icon.svg" type="image/x-icon">
    <link rel="icon" href="./img/icon.svg">
    <link rel="stylesheet" href="Admin.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="./icon/css/all.min.css">
</head>

<body>
    <div class="header">
        <a href="./Concert_B.php" class="icon">
            <img class="icon_page" src="./img/logo_page.png" alt="">
        </a>
        <div class="menu-items">
            <a href="Admin.php" class="items border_bottom">
                <span id="item">Khách Hàng</span>
            </a>
            <!--<a href="./Personnel.php" class="items">
                <span id="item">Nhân Sự</span>
            </a>-->
        </div>
        <div class="icon_left">
            <a id="icon_chart" class="fa-solid fa-bag-shopping" style="color: #ffffff;"></a>
            <a id="icon_open_sidebar" class=" icon_open_sidebar fa-solid fa-bars "></a>
        </div>
        <div class="sidebar">
            <i id="icon_close_sidebar" class="icon_close_sidebar fa-solid fa-xmark"></i>
            <main class="sidebar_items">
                <ul class="option">                    
                    <li class="option"><a href="Admin.php">Khách Hàng</a></li>
                    <li class="option"><a href="#">Đăng xuất</a></li>
                </ul>
            </main>
            <footer class="sidebar_footer">
                <footer class="sb_ft_sp">
                    <img class="icon_footer" src=".//img/logo_concert.png" alt="">
                    <ul class="footer_nav">
                        <li class="footer_link"><a href="https://www.facebook.com/profile.php?id=100022231063225"
                                class="navfooter">Contact</a></li>
                        <li class="footer_link"><a href="https://www.facebook.com/duyle215"
                                class="navfooter">Facebook</a></li>
                        <li class="footer_link"><a href="https://www.instagram.com/oaboad_29/"
                                class="navfooter">Instagram</a></li>
                    </ul>
                </footer>
            </footer>
        </div>
    </div>
    
    <div class="main-container">
        <div style="background-color:#404C5C; color:white";>
            <form class="button-control" method="get">
                <table>
                    <tr>
                        <td><button class="btn" id="pay-day" name="payday"><a href="Admin.php?sort=payday">Sắp xếp theo: Hạn thanh toán</a></button></td>
                        <td><button class="btn" id="paid" name="paid"><a href="Admin.php?sort=paid">Lọc: Đã thanh toán</a></button></td>
                        <td><button class="btn" id="cancel" name="cancel"><a href="Admin.php?sort=cancel">Lọc: Đã huỷ đơn/chờ hoàn tiền</a></button></td>
                        <td><button class="btn" id="unpaid" name="unpaid"><a href="Admin.php?sort=unpaid">Lọc: Chưa thanh toán</a></button></td>
                    </tr>
                </table>                
            </form>
            <div>
                <table>
                    <tr>
                        <td>Mã đơn vé</td>
                        <td>Tên khách hàng</td>
                        <td>Số điện thoại</td>
                        <td>Email</td>
                        <td>Số lượng vé</td>
                        <td>Thành tiền</td>
                        <td>Ngày đăng ký</td>
                        <td>Hạn cuối thanh toán</td>
                        <td>Tình trạng</td>
                        <td>Chức năng</td>
                    </tr>
                    <?php 
                        if(isset($_GET['sort'])){
                            if($_GET['sort'] =='payday'){
                                $sql .= " order by `payment_day` desc";
                            }
                            if($_GET['sort'] =='paid'){
                                $sql .= " where `status` = 'Đã thanh toán' order by `payment_day`";
                            }
                            if($_GET['sort'] =='cancel'){
                                $sql .= " where `status` = 'Đã huỷ đơn' order by `payment_day` ";
                            }
                            if($_GET['sort'] =='unpaid'){
                                $sql .= " where `status` = 'Chưa thanh toán' order by `payment_day` ";
                            }
                            $result = $conn->query($sql);
                            $sql = "select * from `customersorders` ";
                        }

                        while ($row = $result->fetch_assoc()) {
                    ?>
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
                        <td></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
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

</body>
<script src="./Event_shop.js"></script>
<script src="./Admin.js"></script>

</html>