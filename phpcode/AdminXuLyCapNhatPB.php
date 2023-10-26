<?php 
    require_once('mysql_util.php');
    $idpb = $_REQUEST['IDPB'];
    $tenPhongBan = $_REQUEST['TenPhongBan'];
    $moTa = $_REQUEST['MoTa'];
    $sql = "UPDATE PhongBan WHERE IDPB='$idpb' ".
        "SET TenPhongBan='$tenPhongBan',".
        "MoTa='$moTa'";
    
    $link->query($sql);
    if(!$link->commit()) {
        echo "Transaction failed";
    }
?>