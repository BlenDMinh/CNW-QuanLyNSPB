<?php 
    session_start();
    $login = $_SESSION['login'] ?? '';
    if($login != 'admin') {
        header("Location: XemThongTinNV.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Thông tin nhân viên</title>
    <link rel="stylesheet" href="static/main.css?v=2">
</head>
<body>
    <div class="content">
        <?php 
            require('navbar.php');
        ?>
        <script>
            function confirm_popup(id) {
                if(confirm("Bạn có muốn xoá Nhân viên " + id + " không?")) {
                    window.open("AdminXoaNV.php?IDNVS[]=" + id, "_self");
                }
                return false;
            }

            function confirm_popup_all() {
                if(confirm("Bạn có muốn xoá những Nhân viên này không?")) {
                    document.form.submit();
                }
            }
        </script>
        <form name="form" class="container-table100" action="AdminXoaNV.php">
            <div style="display:flex; flex-direction:column; padding: 10px; gap: 10px;">
                <input type="button" class="submit-button" onclick="window.open('AdminThemNV.php')" value="Thêm"/>
                <input type="button" class="submit-button" onclick="confirm_popup_all()" value="Xoá"/>
            </div>
            <div class="wrap-table100">
                <?php
                    require_once("mysql_util.php");
                    $header = ["ID Nhân viên", "Họ tên", "ID Phòng ban", "Địa chỉ", "Chức năng"];
                    $sql = "SELECT * FROM NhanVien";
                    $result = $link->query($sql);
                    echo '<div class="table" name = "nhan_vien">';
                    if ($header != NULL)
                        echo "<div class=\"row header\">"."<div class='cell select'>Chọn</div>".implode(array_map(fn($e): string => "<div class='cell'>".$e."</div>", $header))."</div>";
                    while($row = $result->fetch_array(MYSQLI_NUM)) {
                        echo "<div class='row'>"
                            ."<div class='cell select'><input type='checkbox' name='IDNVS[]' value='".$row[0]."'/></div>"
                            .implode(array_map(fn($e): string => "<div class='cell'>".($e == "" ? "NULL" : $e)."</div>", $row))
                            ."<div class='cell' style='display: flex; gap: 10px;'>"
                                ."<a href='AdminFormCapNhatNV.php?IDNV=".$row[0]."'>Cập nhật</a>"
                                ."<a href='#' onclick='confirm_popup(\"".$row[0]."\")'>Xoá</a>"
                            ."</div>"
                        ."</div>";
                    }
                    echo "</div>";
                    $result->free();
                ?>
            </div>
        </form> 
    </div>
</body>
</html>