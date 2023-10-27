<?php 
    require_once('mysql_util.php');
    $idpbs = $_REQUEST['IDPBS'];
    $idpbs_sql = "(".implode(",", array_map(function($value) {
        return "'" . $value . "'";
    }, $idpbs)).")";
    $nv_sql = "SELECT IDNV FROM NhanVien WHERE IDPB IN $idpbs_sql";
    $idnvs = array();
    $nv_result = $link->query($nv_sql);
    while($id = $nv_result->fetch_array(MYSQLI_BOTH)) {
        array_push($idnvs, $id[0]);
    }

    $idnvs_sql = "(".implode(",", array_map(function($value) {
        return "'" . $value . "'";
    }, $idnvs)).")";

    $update_nv_sql = "UPDATE NhanVien SET IDPB=NULL WHERE IDNV IN $idnvs_sql";
    $link->query($update_nv_sql);

    $sql = "DELETE FROM PhongBan WHERE IDPB IN $idpbs_sql";
    $link->query($sql);
    if(!$link->commit()) {
        echo "Transaction failed";
    } else {
        header("Location: AdminThongTinPB.php");
    }
?>