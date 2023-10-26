<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin nhân viên</title>
    <link rel="stylesheet" href="static/main.css">
</head>
<body>
    <div class="content">
        <div class="navbar">
            <a href="XemThongTinNV.php">Nhân Viên</a>
            <a href="XemThongTinPB.php">Phòng Ban</a>
            <a href="timkiem.php">Tìm kiếm</a>
            <a href="login.php">Đăng nhập</a>
        </div>
        <div class="container-table100">
            <div class="wrap-table100">
                <?php
                    require_once("mysql_util.php");
                    $header = ["ID Nhân viên", "Họ tên", "ID Phòng ban", "Địa chỉ"];
                    $sql = "SELECT * FROM NhanVien";
                    $result = $link->query($sql);
                    plot_table("nhan_vien", $result, $header);
                    $result->free();
                ?>
            </div>
        </div>  
    </div>
</body>
</html>