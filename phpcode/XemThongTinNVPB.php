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
        <?php 
            require('navbar.php')
        ?>
        <div class="container-table100">
            <div class="wrap-table100">
                <?php
                    require_once("mysql_util.php");
                    $header = ["ID Nhân viên", "Họ tên", "ID Phòng ban", "Địa chỉ"];
                    $IDPB = $_REQUEST["IDPB"];
                    $sql = "SELECT * FROM NhanVien WHERE IDPB='".$IDPB."'";
                    echo "<script>console.log('".$sql."')</script>";
                    $result = $link->query($sql);
                    plot_table("nhan_vien", $result, $header);
                    $result->free();
                ?>
            </div>
        </div>  
    </div> 
</body>
</html>