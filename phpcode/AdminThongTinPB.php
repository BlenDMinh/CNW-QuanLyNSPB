<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Thông tin phòng ban</title>
    <link rel="stylesheet" href="static/main.css">
</head>
<body>
    <div class="content">
        <?php 
            require('navbar.php');
        ?>
        <div class="container-table100">
            <div class="wrap-table100">
                <?php
                    require_once("mysql_util.php");
                    $header = ["ID Phòng ban", "Tên", "Mô tả", "Thông tin", "Chức năng"];
                    $sql = "SELECT * FROM PhongBan";
                    $result = $link->query($sql);
                    echo '<div class="table" name = "phong_ban">';
                    if ($header != NULL)
                        echo "<div class=\"row header\">".implode(array_map(fn($e): string => "<div class='cell'>".$e."</div>", $header))."</div>";
                    while($row = $result->fetch_array(MYSQLI_NUM)) {
                        echo "<div class='row'>".implode(array_map(fn($e): string => "<div class='cell'>".($e == "" ? "NULL" : $e)."</div>", $row))."<div class='cell'><a href='XemThongTinNVPB.php?IDPB=".$row[0]."'>Xem</a></div>"."<div class='cell'><a href='AdminFormCapNhatPB.php?IDPB=".$row[0]."'>Cập nhật</a></div>"."</div>";
                    }
                    echo "</div>";
                    $result->free();
                ?>
            </div>
        </div> 
    </div>
</body>
</html>