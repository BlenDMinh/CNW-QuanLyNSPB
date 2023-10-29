
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
        ?>
        <script>
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
                        document.getElementById("error-pb").innerHTML = response.message;
                    }
                };
                request.open("GET", "AdminKiemTraIDPB.php?IDPB="+id, true);
                request.send(null);
            }
            function valid_nv_id() {
                let id = document.form.IDNV.value;
                var request = new XMLHttpRequest();

                request.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        elements = document.getElementsByClassName("info");
                        let response = JSON.parse(this.response);
                        console.log(response);
                        if(response.result == 1) {
                            for(i in elements) {
                                elements[i].readOnly = false;
                            }
                        } else {
                            for(i in elements) {
                                elements[i].readOnly = true;
                            }
                        }
                        document.getElementById("error-nv").innerHTML = response.message;
                    }
                };
                request.open("GET", "AdminKiemTraIDNV.php?IDNV="+id, true);
                request.send(null);
            }
        </script>
        <div class="container-table100">
            <form name="form" action="AdminXuLyThemNV.php" method="POST" class="wrap-search" style="flex-direction: column !important; height: 50%; width: 40%; justify-content: space-between;">
                <label for="IDNV">ID Nhân viên</label>
                <input class="field-text" name='IDNV' type="text" onChange="valid_nv_id()">
                <p id="error-nv"> </p>
                <label for="HoTen">Họ tên</label>
                <input class="field-text info" name='HoTen' type="text">
                <label for="IDPB">ID Phòng ban</label>
                <input class="field-text info" name='IDPB' type="text" onChange="valid_pb_id()">
                <p id="error-pb"> </p>
                <label for="DiaChi">Địa chỉ</label>
                <input class="field-text info" name='DiaChi' type="text">

                <input id="submit-button" class="submit-button" type="submit">
            </form>
        </div>
    </div>
</body>
</html>