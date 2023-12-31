<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu vé</title>
    <link rel="icon" href="../img/icon.svg" type="image/x-icon">
    <link rel="icon" href="../img/icon.svg">
    <link rel="stylesheet" href="../css/Search_ticket.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
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
            <a href="Search_ticket.php" class="items border_bottom">
                <span id="item">Kiểm tra vé </span>
            </a>
            <a href="../php/Layout_concert.php#sign_up" class="items ">
                <span id="item">Đặt Vé </span>
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
    <section class="sign_up" id="sign_up">
        <form id="form_3" class="form" action="Search_Result.php" method="post">
            <div class="content_form">
                <div class="text_search">
                    <h2>Kiểm tra đơn vé bạn đã mua.</h2>
                </div>
                <div class="form_sign">
                    <div class="info">
                        <label for="fullname" class="label-form">Họ Và Tên</label>
                        <input id="fullname" placeholder="Họ Và Tên" type="text" class="item_form" name="fullname" required>
                        <span class="form_message" id="fullname-error"></span>
                    </div>
                    <div class="info">
                        <label for="thongtin" class="label-form">Số Điện Thoại</label>
                        <input id="thongtin" placeholder="Số điện thoại" type="text" class="item_form" name="thongtin" required>
                        <span class="form_message" id="thongtin-error"></span>
                    </div>
                    <div class="info">
                        <label for="gmail" class="label-form">Email</label>
                        <input id="gmail" placeholder="VD: abcdxyz@gmail.com" type="text" class="item_form" name="gmail" required>
                        <span class="form_message" id="gmail-error"></span>
                    </div>
                    <div class="submit_form">
                        <button class="done" type="submit" name="btn-search">Tìm Kiếm</button>
                    </div>
                </div>
            </div>
        </form>

    </section>
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
<script src="../js/form_test.js"></script>
<script>
    //Output 
    validator({
        form: '#form_3',
        errorSelector: '.form_message',
        rules: [
            validator.isRequired('#fullname'),
            validator.isNumberPhone('#thongtin'),
            validator.isEmail('#gmail'),
        ],
        onSubmit: function(data) {
            console.log(data)
        }
    });
</script>
<script>
    document.querySelector('.done').addEventListener('click', function(event) {
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