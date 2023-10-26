<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin nhân viên</title>
    <link rel="stylesheet" href="static/main.css?12">
</head>
<body>
    <div class="content">
        <?php 
            require('navbar.php')
        ?>
        <div class="search-container">
            <form action="" class="wrap-search">
                <input class="field-text" type="text" placeholder="ID Nhân viên" id="IDNV" name="IDNV">
                <input class="field-text" type="text" placeholder="Họ tên" id="HoTen" name="HoTen">
                <input class="field-text" type="text" placeholder="ID Phòng ban" id="IDPB" name="IDPB">
                <input class="field-text" type="text" placeholder="Địa chỉ" id="DiaChi" name="DiaChi">
                <input class="submit-button" type="submit" value="Search">
            </form>
        </div>
        <div class="container-table100">
            <div class="wrap-table100">
                <?php
                    function IsNullOrEmptyString($str){
                        return ($str === null || trim($str) === '');
                    }
                    function console_log($msg) {
                        echo "<script>console.log(".$msg.")</script>";
                    }
                    $IDNV=$_REQUEST['IDNV'] ?? '';
                    $HoTen=$_REQUEST['HoTen'] ?? '';
                    $IDPB=$_REQUEST['IDPB'] ?? '';
                    $DiaChi=$_REQUEST['DiaChi'] ?? '';

                    $conditions = [];
                    if(!IsNullOrEmptyString($IDNV))
                        $conditions += ["IDNV='".$IDNV."'"];
                    if(!IsNullOrEmptyString(($HoTen)))
                        $conditions += ["HoTen LIKE '%".$HoTen."%'"];
                        if(!IsNullOrEmptyString($IDPB))
                        $conditions += ["IDPB='".$IDPB."'"];
                    if(!IsNullOrEmptyString(($DiaChi)))
                        $conditions += ["DiaChi LIKE '%".$DiaChi."%'"];


                    require_once("mysql_util.php");
                    $header = ["ID Nhân viên", "Họ tên", "ID Phòng ban", "Địa chỉ"];
                    $sql = "SELECT * FROM NhanVien".(count($conditions) == 0 ? "" : " WHERE ".implode(" AND ", $conditions));

                    console_log($sql);

                    $result = $link->query($sql);
                    echo '<div class="table" name = "nhan_vien">';
                    if ($header != NULL)
                        echo "<div class=\"row header\">".implode(array_map(fn($e): string => "<div class='cell'>".$e."</div>", $header))."</div>";
                    while($row = $result->fetch_array(MYSQLI_NUM)) {
                        echo "<div class='row'>".implode(array_map(fn($e): string => "<div class='cell'>".($e == "" ? "NULL" : $e)."</div>", $row))."</div>";
                    }
                    echo "</div>";
                    $result->free();
                ?>
            </div>
        </div>  
    </div>
</body>
</html>