Đồ án nhóm 9 - IS201.K22

Các bước khởi tạo project:
- Login vào trang phpMyAmin ở localhost, chọn loại database là MySQL.
- Vào thư mục /sql , tìm sql tên init_db.sql sau đó import vào MySQL
- Vào thư mục /config/database.php , kiểm tra lại config kết nối vào database vừa tạo:
    + Port 3308 (trong trường hợp wamp chỉ có MySQL và Không có MariaDB, thì chọn port 3306)
    + tên database phải giống tên vừa chọn ở trên
    + hostname là localhost
    + username/password tùy vào username và password mà thầy sử dụng khi đăng nhập phpMyAdmin