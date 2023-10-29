<?php 
    session_start();
    $login = $_SESSION['login'] ?? '';
    if($login != 'admin') {
        header("Location: XemThongTinPB.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cập nhật phòng ban</title>
    <link rel="stylesheet" href="static/main.css">
    <script type="text/javascript">
        function valid_id() {
            let id = document.adminPB.IDPB.value;
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
                    document.getElementById("error").innerHTML = response.message;
                }
            };
            request.open("GET", "AdminKiemTraIDPB.php?IDPB="+id, true);
            request.send(null);
        }
    </script>
</head>
<body>
    <div class="content">
        <?php 
            require('navbar.php');
        ?>
        
        <div class="container-table100">
            <form name="adminPB" action="AdminXuLyThemPB.php" method="POST" class="wrap-search" style="flex-direction: column !important; height: 50%; width: 40%; justify-content: space-between;">
                <label for="IDPB">ID Phòng ban</label>
                <input class="field-text" name='IDPB' type="text" onChange="valid_id()">
                <p id="error"> </p>
                <label for="TenPhongBan">Tên Phòng ban</label>
                <input class="field-text info" name='TenPhongBan' type="text">
                <label for="MoTa">Mô tả</label>
                <input class="field-text info" name='MoTa' type="text">
                <input class="submit-button" type="submit">
            </form>
        </div>

        <!-- <div class="container-table100">
            <div class="wrap-table100">
            </div>
        </div>  -->
    </div>
</body>
</html>