<?php 
    require_once('mysql_util.php');
    $idnvs = $_REQUEST['IDNVS'] ?? [];
    $idnvs_sql = "(".implode(",", array_map(function($value) {
        return "'" . $value . "'";
    }, $idnvs)).")";

    $sql = "DELETE FROM NhanVien WHERE IDNV IN $idnvs_sql";
    $link->query($sql);
    echo $sql;
    if(!$link->commit()) {
        echo "Transaction failed";
    } else {
        header("Location: AdminThongTinNV.php");
    }
?>