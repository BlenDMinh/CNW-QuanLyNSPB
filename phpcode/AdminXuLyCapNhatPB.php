<?php 
    require_once('mysql_util.php');
    $idpb = $_REQUEST['IDPB'];
    $tenPhongBan = $_REQUEST['TenPhongBan'];
    $moTa = $_REQUEST['MoTa'];
    $sql = "UPDATE PhongBan ".
        "SET TenPB='$tenPhongBan',".
        "MoTa='$moTa' ".
        "WHERE IDPB='$idpb'";
    
    $link->query($sql);
    if(!$link->commit()) {
        echo "Transaction failed";
    } else {
        header('Location: AdminThongTinPB.php');
    }
?>