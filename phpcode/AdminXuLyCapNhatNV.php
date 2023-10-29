<?php 
    require_once('mysql_util.php');
    $idnv = $_REQUEST['IDNV'];
    $hoten = $_REQUEST["HoTen"];
    $idpb = $_REQUEST["IDPB"] ?? '';
    $diachi = $_REQUEST['DiaChi'];
    
    $sql = "UPDATE NhanVien ".
        "SET HoTen='$hoten',".
        ($idpb ? "IDPB='$idpb'," : "IDPB=NULL,").
        "DiaChi='$diachi' ".
        "WHERE IDNV='$idnv'";
    echo $sql;
    $link->query($sql);
    if(!$link->commit()) {
        echo "Transaction failed";
    } else {
        header('Location: AdminThongTinNV.php');
    }
?>