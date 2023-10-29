<?php 
    require_once('mysql_util.php');
    $id = $_REQUEST["IDPB"];

    $res = 1;

    if(strlen($id) != 4 && substr($id, 0, 2) != "PB" && !is_numeric(substr($id, 2, 2)))
        $res = -1;
    if($res == 1) {
        $sql = "SELECT * FROM PhongBan WHERE IDPB='$id'";
        $result = $link->query($sql);
        if($result->num_rows > 0)
            $res = "0";
    }

    $ret = [
        'result' => $res,
        'message' => $res == -1 ? "Định dạng IDPB không đúng" : ($res == 0 ? "IDPB đã có trong Database" : "IDPB chưa có trong Database")
    ];
    echo json_encode($ret, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>