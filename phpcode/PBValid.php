<?php 
    require_once('mysql_util.php');
    $id = $_REQUEST["IDPB"] ?? '';
    $sql = "SELECT * FROM PhongBan WHERE IDPB='$id'";
    $result = $link->query($sql);
    echo ($result->num_rows > 0 ? "1" : "0");
?>
