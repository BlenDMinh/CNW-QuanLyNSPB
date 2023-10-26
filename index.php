<?php
    session_start();
    $login = $_SESSION['login'] ?? '';
    if($login != 'admin') {
        header("Location: phpcode/XemThongTinNV.php");
    } else {
        header("Location: phpcode/AdminThongTinNV.php");
    }
?>