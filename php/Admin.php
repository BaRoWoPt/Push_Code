<?php
session_start();
require '../database/connect.php';
if(isset($_SESSION['adminname']))
{
    $adminfullname = $_SESSION['adminname'];
} else {
    echo "<script>alert('Bạn cần đăng nhập!')</script>";
    echo "<script>window.location.href = 'Login_admin.php';</script>";
 }
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;
$sql = "select * from `customersorders` ";
$result = $conn->query($sql);
$records = $result->num_rows;
$total_page = ceil($records / $item_per_page);
$sql_paging = $sql." limit ".$item_per_page." offset ".$offset;
$result_per_page = $conn->query($sql_paging);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pages.</title>
    <link rel="icon" href="../img/icon.svg" type="image/x-icon">
    <link rel="icon" href="../img/icon.svg">
    <link rel="stylesheet" href="../css/Admin.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
</head>

<body>
    <div class="header">
        <a href="./Concert_B.php" class="icon">
            <img class="icon_page" src="../img/logo_page.png" alt="">
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
            <label>Xin chào <strong><?php echo $adminfullname; ?></strong></label>
            <a id="icon_chart" class="fa-solid fa-bag-shopping" style="color: #ffffff;"></a>
            <a id="icon_open_sidebar" class=" icon_open_sidebar fa-solid fa-bars "></a>

        </div>
        <div class="sidebar">
            <i id="icon_close_sidebar" class="icon_close_sidebar fa-solid fa-xmark"></i>
            <main class="sidebar_items">
                <ul class="option">
                    <li class="option"><a href="Admin.php">Khách Hàng</a></li>
                    <li class="option"><a href="Logout.php">Đăng xuất</a></li>
                </ul>
            </main>
            <footer class="sidebar_footer">
                <footer class="sb_ft_sp">
                    <img class="icon_footer" src="../img/logo_concert.png" alt="">
                    <ul class="footer_nav">
                        <li class="footer_link"><a href="https://www.facebook.com/profile.php?id=100022231063225" class="navfooter">Contact</a></li>
                        <li class="footer_link"><a href="https://www.facebook.com/duyle215" class="navfooter">Facebook</a></li>
                        <li class="footer_link"><a href="https://www.instagram.com/oaboad_29/" class="navfooter">Instagram</a></li>
                    </ul>
                </footer>
            </footer>
        </div>
    </div>

    <div class="main-container">
        <div style="color:white;">
            

            <form class="button-control" method="get">
                <table>
                    <tr>
                        <td>
                            <input type="text" class="search" name="search" />
                        </td>
                        <td>
                            <button class="btn-search" name="btn-search">Tìm Mã Vé</button>
                        </td>
                    </tr>
                </table>
            </form>
            
            
            <div>
                <table class=control_customer>
                    <tr>
                        <th>Mã đơn vé</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Số lượng vé</th>
                        <th>Thành tiền</th>
                        <th>Ngày đăng ký</th>
                        <th>Hạn cuối thanh toán</th>
                        <th>Tình trạng</th>
                        <th>Chức năng</th>
                    </tr>
                    <?php
                    include 'Pagination.php';
                    if (isset($_GET['btn-search']))
                    {
                        $search = $_GET['search'];
                        $sql = "select * from `customersorders` where `OrderID` = $search ";
                        $result_per_page = $conn->query($sql);
                    }
                    $sql = "select * from `customersorders` ";
                    $records = $result_per_page->num_rows;
                    if ($records == 0) {?>
                        <tr>
                            <td colspan="10">
                                <div class="not-found">Không tìm thấy đơn vé!</div>
                            </td>
                        </tr>
                    <?php } else {
                    while ($row = $result_per_page->fetch_assoc()) {
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
                            <td>
                                <form class="order-control" method="get">

                                    <?php if ($row["status"] === 'Chưa thanh toán') {
                                        $currentDate = date('Y-m-d');
                                        $payday = date($row["payment_day"]);
                                        if ($currentDate > $payday) { ?>

                                            <button class="btn-control" style="color: red" name="cancel" value="<?php echo $row["OrderID"]; ?>">Huỷ đơn vé</button>

                                        <?php } else { ?>

                                            <button class="btn-control" style="color: green" name="purchase" value="<?php echo $row["OrderID"]; ?>">Xác nhận thanh toán</button>

                                        <?php }
                                    } else if ($row["status"] === 'Đã huỷ đơn') { ?>

                                        <button class="btn-control" style="color: blue" name="refund" value="<?php echo $row["OrderID"]; ?>">Hoàn tiền</button>

                                    <?php } ?>

                                </form>
                            </td>
                        </tr>
                    <?php } }?>
                </table>
            </div>
            
        </div>
    </div>

    <?php
    if (isset($_GET['cancel'])) {
        $id = $_GET['cancel'];
        $sql1 = "delete from `customersorders` where `OrderId` = $id";

        $conn->query($sql1);

        echo "<script>alert('Xoá đơn vé thành công')</script>";
        echo "<script>window.location.href = 'admin.php';</script>";
    }
    if (isset($_GET['purchase'])) {
        $id = $_GET['purchase'];
        $sql1 = "update `customersorders` set `status` = 'Đã thanh toán' where `OrderId` = $id";

        $conn->query($sql1);

        echo "<script>alert('Cập nhật trạng thái thành công!')</script>";
        echo "<script>window.location.href = 'admin.php';</script>";
    }
    if (isset($_GET['refund'])) {
        $id = $_GET['refund'];
        $sql1 = "delete from `customersorders` where `OrderId` = $id";

        $conn->query($sql1);

        echo "<script>alert('Đã hoàn tiền cho khách!')</script>";
        echo "<script>window.location.href = 'admin.php';</script>";
    }
    ?>


    <div class="footer">
        <div class="footer-container">
            <div class="company_name">
                <a class="company-logo" href="./Concert_B.php">
                    <img id="logo" src="../img/logo_page.png" alt="">
                </a>
            </div>
        </div>
    </div>
</body>
<script src="../js/Admin.js"></script>

</html>