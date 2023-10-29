<?php 
    require_once('mysql_util.php');
    $idpb = $_REQUEST["IDPB"];
    $tenPhongBan = $_REQUEST["TenPhongBan"];
    $moTa = $_REQUEST["MoTa"];

    if(strlen($idpb) != 4 && substr($idpb, 0, 2) != "PB" && !is_numeric(substr($idpb, 2, 2)))
        header("Location: AdminThongPB.php");
    $sql = "SELECT * FROM PhongBan WHERE IDPB='$id'";
    $result = $link->query($sql);
    if($result->num_rows > 0)
        header("Location: AdminThongPB.php");

    $sql = "INSERT INTO PhongBan VALUES ('$idpb', '$tenPhongBan', '$moTa')";
    $link->query($sql);
    if(!$link->commit()) {
        echo "Transaction failed";
    } else {
        header("Location: AdminThongTinPB.php");
    }
?>