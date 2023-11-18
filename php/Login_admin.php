<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chúng tôi có âm nhạc - Thứ giúp bạn thoải mái.</title>
    <link rel="icon" href="../img/icon.svg" type="image/x-icon">
    <link rel="icon" href="../img/icon.svg">
    <link rel="stylesheet" href="../css/Login_amin.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
</head>
<div class="header">
    <a href="./Concert_B.php" class="icon">
        <img class="icon_page" src="../img/logo_page.png" alt="">
    </a>
    <div class="menu-items">
        <a href="Concert_B.php" class="items border_bottom">
            <span id="item">Trang Chủ</span>
        </a>
        <a href="./Layout_concert.php" class="items">
            <span id="item">Sự Kiện</span>
        </a>
        <a href="About_us.php" class="items">
            <span id="item">Về Chúng Tôi </span>
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
                <li class="option"><a href="#">Quản lí</a></li>
            </ul>
        </main>
        <footer class="sidebar_footer">
            <footer class="sb_ft_sp">
                <img class="icon_footer" src="../img/logo_concert.png" alt="">
                <ul class="footer_nav">
                    <li class="footer_link"><a href="https://www.facebook.com/profile.php?id=100022231063225"
                            class="navfooter">Contact</a></li>
                    <li class="footer_link"><a href="https://www.facebook.com/duyle215" class="navfooter">Facebook</a>
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
            <button onclick="window.location.href='PurchaseConfirm.php' " class="check_nav">
                Check
            </button>
        </footer>
    </div>
</div>
<div class="notificate">
    <div class="noti_warning">
        <h2>Chào Bạn! Trang này chỉ dành cho người quản lý, vui lòng đăng nhập tài khoản admin!</h2>
    </div>
    <section class="sign_up" id="sign_up">
        <form id="form_2" class="form" action="Admin.php" method="POST">
            <div class="content_form">
                <div class="form_sign">
                    <div class="info">
                        <label for="adminname" class="label-form">Tên đăng nhập</label>
                        <input id="adminname" placeholder="Tên đăng nhập" type="text" class="item_form"
                            name="adminname">
                        <span class="form_message error" id="adminname-error"></span>
                    </div>
                    <div id="eyes" class="info">
                        <label for="password" class="label-form">Mật Khẩu</label>
                        <input id="password" placeholder="Vui lòng nhập mật khẩu" type="password" class="item_form"
                            name="password">
                        <span class="form_message error" id="password-error"></span>
                        <div class="eye-icon" onclick="togglePassword()">
                            <i id="eyeIcon" class="fa-solid fa-eye-slash"></i>
                        </div>
                    </div>
                    <div class="submit_form">
                        <button class="done" type="button" id="done">Đăng Nhập</button>
                        <div id="error-container" class="error-container">
                            <span id="error-message" class="error-message"></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<footer class="foooter_page1">
    <div class="lg_end">
        <a href="./Concert_B.php">
            <img id="lg_ft" src="../img/logo_page.png" alt=""></a>

    </div>
</footer>

<body>

</body>
<script src="../js/form_test.js"></script>
<script>
//Output 
validator({
    form: '#form_2',
    errorSelector: '.form_message',
    rules: [
        validator.isUsername('#adminname'),
        validator.isPassword('#password'),
    ],

});
</script>
<script>
document.querySelector('#done').addEventListener('click', function(event) {
    var inputs = document.querySelectorAll('.item_form');
    inputs.forEach(function(input) {
        var errorElement = document.getElementById(input.id + '-error');
        if (!input.value.trim()) {
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của nút submit
            errorElement.innerHTML = 'Vui lòng nhập thông tin.';
            input.classList.add('error'); // Thêm lớp error để định dạng viền
        } else {
            errorElement.innerHTML = ''; // Xóa thông báo lỗi nếu đã nhập đủ thông tin
            input.classList.remove('error'); // Loại bỏ lớp error nếu có
        }
    });
});
</script>
<script src="../js/Event_shop.js"></script>
<script src="../js/Login_admin.js"></script>


</html>