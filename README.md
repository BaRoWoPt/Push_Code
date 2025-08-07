# Hệ thống đặt vé concert trực tuyến

Đây là một ứng dụng web hỗ trợ người dùng xem thông tin, lựa chọn và đặt vé tham dự các buổi hòa nhạc. Hệ thống được thiết kế với giao diện hiện đại, tương tác trực quan ở phía người dùng, đồng thời đảm bảo tính ổn định và bảo mật ở phía máy chủ. Mục tiêu chính là mang đến trải nghiệm mượt mà, dễ sử dụng trong toàn bộ quy trình đặt vé trực tuyến.

## Tổng quan

Ứng dụng bao gồm hai thành phần chính:

- **Frontend**: Tập trung vào hiệu ứng thị giác và các yếu tố tương tác, giúp người dùng dễ dàng duyệt thông tin và đặt vé.
- **Backend**: Phát triển bằng PHP và MySQL, đảm bảo việc xử lý dữ liệu, quản lý người dùng, xử lý logic đặt vé và duy trì tính toàn vẹn dữ liệu.

## Công nghệ sử dụng

### Giao diện người dùng (Frontend)

Giao diện được xây dựng với các công nghệ web hiện đại, tập trung vào hiệu năng và khả năng hiển thị đẹp mắt:

- **CSS**: Xây dựng bố cục và định dạng giao diện cơ bản (27.1%)
- **SCSS**: Mở rộng CSS với biến, lồng khối và mixin (21.8%)
- **Less**: Quản lý giao diện theo hướng mô-đun và tái sử dụng (20.9%)
- **JavaScript**: Xử lý hành vi tương tác, kiểm tra biểu mẫu và hiệu ứng động (15.6%)
- **HTML**: Xây dựng cấu trúc nội dung cho trang web (6.6%)

### Xử lý phía máy chủ (Backend)

- **PHP**: Xử lý logic phía máy chủ, quản lý phiên làm việc và tương tác với cơ sở dữ liệu (5.5%)
- **Hack**: Hỗ trợ một số tính năng mở rộng và kiểu tĩnh (2.5%)
- **MySQL**: Hệ quản trị cơ sở dữ liệu quan hệ, lưu trữ thông tin người dùng, concert và giao dịch đặt vé

## Tính năng chính

- Người dùng có thể duyệt danh sách concert và xem chi tiết từng sự kiện
- Giao diện đặt vé tương tác, cập nhật số lượng ghế và giá theo thời gian thực
- Hệ thống đăng ký và đăng nhập người dùng
- Xác nhận đặt vé và xử lý thông tin đầu vào phía máy chủ
- (Tùy chọn) Bảng điều khiển dành cho quản trị viên để quản lý sự kiện và theo dõi doanh thu

## Hiệu ứng và thiết kế thị giác

Giao diện người dùng được nâng cao với các hiệu ứng mượt và phản hồi trực quan:

- Hiệu ứng chuyển động mượt khi tương tác
- Chuyển trang và hiển thị popup nhẹ nhàng
- Giao diện đáp ứng với mọi kích thước màn hình
- Thành phần biểu mẫu và nút bấm được thiết kế đồng bộ, nhất quán

## Cơ sở dữ liệu

Cơ sở dữ liệu MySQL được thiết kế để hỗ trợ các chức năng đặt vé, bao gồm ba bảng chính:

- `users`: Lưu thông tin tài khoản người dùng
- `bookings`: Liên kết người dùng với các sự kiện đã đặt vé, ghi nhận số lượng ghế và trạng thái đơn hàng

## Triển khai hệ thống

Để triển khai ứng dụng:

1. Sao chép mã nguồn từ kho lưu trữ.
2. Tạo cơ sở dữ liệu MySQL và nhập lược đồ dữ liệu được cung cấp.
3. Cập nhật thông tin kết nối cơ sở dữ liệu trong tệp cấu hình.
4. Triển khai hệ thống phía máy chủ bằng một trong các nền tảng: Apache, Nginx kết hợp PHP-FPM hoặc PHP built-in server.
5. Truy cập ứng dụng bằng trình duyệt hiện đại để bắt đầu sử dụng.

