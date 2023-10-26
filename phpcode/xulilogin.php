<?php
    session_start();
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if($username == '' && $password == '')
        header('Location: login.php?message=Username và Password trống');
    require_once('mysql_util.php');
    $sql = "SELECT * FROM Admin WHERE username='".$username."' AND password='".$password."'";
    $result = $link->query($sql);
    if($result->num_rows > 0) {
        $_SESSION['login'] = 'admin';
        header('Location: ../index.php');
        // function alert($msg) {
        //     echo "<script type='text/javascript'>alert('$msg');</script>";
        // }
        // header('Location: ');
    } else {
        header('Location: login.php?message=Không tìm thấy Username hoặc Password không chính xác');
    }
?>