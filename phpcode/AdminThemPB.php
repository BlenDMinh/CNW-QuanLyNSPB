<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cập nhật phòng ban</title>
    <link rel="stylesheet" href="static/main.css">
    <script>
        function valid_id() {
            id = (int) document.adminPB.IDPB.value;
            console.log(id);
        }
    </script>
</head>
<body>
    <div class="content">
        <?php 
            require('navbar.php');
            // require_once('mysql_util.php');
            // $idpb = $_REQUEST['IDPB'];
            // $sql = "SELECT * FROM PhongBan WHERE IDPB='$idpb'";
            // $result = $link->query($sql);
            // if($result->num_rows < 1) {
            //     header('Location: AdminThongTinPB.php');
            // }
            // $row = $result->fetch_array(MYSQLI_NUM);
        ?>
        
        <div class="container-table100">
            <form name="adminPB" action="AdminXuLyCapNhatPB.php" method="GET" class="wrap-search" style="flex-direction: column !important; height: 50%; width: 40%; justify-content: space-between;">
                <label for="IDPB">ID Phòng ban</label>
                <input class="field-text" name='IDPB' type="text" onChange="valid_id()">
                <label for="TenPhongBan">Tên Phòng ban</label>
                <input class="field-text" name='TenPhongBan' type="text">
                <label for="MoTa">Mô tả</label>
                <input class="field-text" name='MoTa' type="text">

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