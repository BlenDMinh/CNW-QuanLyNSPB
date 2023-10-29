<?php 
    require_once('mysql_util.php');
    $id = $_REQUEST["IDNV"];

    $res = 1;

    if(strlen($id) != 4 && substr($id, 0, 2) != "NV" && !is_numeric(substr($id, 2, 2)))
        $res = -1;
    if($res == 1) {
        $sql = "SELECT * FROM NhanVien WHERE IDNV='$id'";
        $result = $link->query($sql);
        if($result->num_rows > 0)
            $res = "0";
    }

    $ret = [
        'result' => $res,
        'message' => $res == -1 ? "Định dạng IDNV không đúng" : ($res == 0 ? "IDNV đã có trong Database" : "IDNV chưa có trong Database")
    ];
    echo json_encode($ret, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>