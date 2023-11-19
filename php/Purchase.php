<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">

</head>
<body style="background-color: black;font-family: 'Roboto', sans-serif;color: white; margin: 0%;">
<div style="background-image: url(../img/warning.jpg); background-repeat: no-repeat; background-size: cover;">
    <div style="background-color: grey; text-align: center; height: auto; align-items: center; justify-content: center; display: flex; padding: 20px;">
        <div><img src="../img/logo_page.png" alt=""></div>
    </div>
    <div style="padding-top: 20px; padding-bottom: 20px;">
        <div style="margin-left: 10%;margin-right: 10%; font-size: 25px; line-height: 1.5; border-bottom: 1px solid #808080;padding-bottom: 20px;">
            <p style="font-size: 40px;">Cảm ơn đã đặt vé sự kiện của chúng tôi!</p>
            <p>Eventshop xin xác nhận lại thông tin của khách hàng: </p>
            <li>Họ và tên: <?php echo $final_fullname; ?></li>
            <li>Số điện thoại: <?php echo $final_telephone; ?></li>
            <li>Gmail: <?php echo $final_email ?></li>
            <li>Số lượng vé đã đặt: <?php echo $final_ticket; ?></li>
        </div>
    </div>
    <div style="margin-left: 10%; font-size: 25px; line-height: 1.5;">
        <div>
            <p>Vui lòng thanh toán số tiền <?php echo $money; ?> tới:  </p>
            <li>Số tài khoản: XXXXXXXXXXXXXXX</li>
            <li>Ngân hàng: YYYYY-bank</li>
            <li>Trước ngày: <?php $currentDate = date('Y-m-d'); 
            echo date('d-m-Y', strtotime($currentDate. ' + 4 days'));
             ?></li>
            <li>Xin lưu ý: Vui lòng thanh toán đúng thời hạn nếu không đơn vé sẽ bị huỷ!</li>
        </div>
        <div>
            <p>Rất mong đợi được thấy bạn có mặt tại sự kiện!</p>
            <p>Liên hệ với chúng tôi nếu cần hỗ trợ hoặc gặp vấn đề nhé!</p>
        </div>
    </div>
</div>
</body>
