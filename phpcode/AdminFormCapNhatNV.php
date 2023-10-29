
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
    <title>Admin - Cập nhật nhân viên</title>
    <link rel="stylesheet" href="static/main.css">
</head>
<body>
    <div class="content">
        <?php 
            require('navbar.php');
            require_once('mysql_util.php');
            $idnv = $_REQUEST['IDNV'];
            $sql = "SELECT * FROM NhanVien WHERE IDNV='$idnv'";
            $result = $link->query($sql);
            if($result->num_rows < 1) {
                header('Location: AdminThongTinNV.php');
            }
            $row = $result->fetch_array(MYSQLI_NUM);
        ?>
        <script>
            console.log(submitButton);
            function valid_pb_id() {
                submitButton = document.getElementById("submit-button");
                let id = document.form.IDPB.value;
                if(!id) {
                    submitButton.disabled = false;
                    return;
                }
                var request = new XMLHttpRequest();

                request.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        elements = document.getElementsByClassName("info");
                        let response = JSON.parse(this.response);
                        console.log(response);
                        if(response.result == 0) {
                            submitButton.disabled = false;
                        } else {
                            submitButton.disabled = true;
                        }
                        document.getElementById("error").innerHTML = response.message;
                    }
                };
                request.open("GET", "AdminKiemTraIDPB.php?IDPB="+id, true);
                request.send(null);
            }
        </script>
        <div class="container-table100">
            <form name="form" action="AdminXuLyCapNhatNV.php" method="GET" class="wrap-search" style="flex-direction: column !important; height: 50%; width: 40%; justify-content: space-between;">
                <label for="IDNV">ID Nhân viên</label>
                <input class="field-text" name='IDNV' type="text" readonly value="<?php echo $idnv ?>">
                <label for="HoTen">Họ tên</label>
                <input class="field-text" name='HoTen' type="text" value="<?php echo $row[1] ?>">
                <label for="IDPB">ID Phòng ban</label>
                <input class="field-text" name='IDPB' type="text" value="<?php echo $row[2] ?>" onChange="valid_pb_id()">
                <p id="error"> </p>
                <label for="DiaChi">Địa chỉ</label>
                <input class="field-text" name='DiaChi' type="text" value="<?php echo $row[3] ?>">

                <input id="submit-button" class="submit-button" type="submit">
            </form>
        </div>

        <!-- <div class="container-table100">
            <div class="wrap-table100">
            </div>
        </div>  -->
    </div>
</body>
</html>