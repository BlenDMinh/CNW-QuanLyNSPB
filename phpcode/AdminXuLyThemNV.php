<?php 
    require_once('mysql_util.php');
    $idnv = $_REQUEST['IDNV'];
    $hoten = $_REQUEST["HoTen"];
    $idpb = $_REQUEST["IDPB"] ?? '';
    $diachi = $_REQUEST['DiaChi'];

    if(strlen($idpb) != 4 && substr($idpb, 0, 2) != "PB" && !is_numeric(substr($idpb, 2, 2)))
        header("Location: AdminThongNV.php");
    $sql = "SELECT * FROM PhongBan WHERE IDPB='$id'";
    $result = $link->query($sql);
    if($result->num_rows > 0)
        header("Location: AdminThongNV.php");

    if(strlen($idnv) != 4 && substr($idnv, 0, 2) != "NV" && !is_numeric(substr($idnv, 2, 2)))
        header("Location: AdminThongNV.php");
    $sql = "SELECT * FROM NhanVien WHERE IDNV='$id'";
    $result = $link->query($sql);
    if($result->num_rows > 0)
        header("Location: AdminThongNV.php");

    $sql = "INSERT INTO NhanVien VALUES ('$idnv', '$hoten', '$idpb', '$diachi')";
    $link->query($sql);
    if(!$link->commit()) {
        echo "Transaction failed";
    } else {
        header("Location: AdminThongTinNV.php");
    }
?>