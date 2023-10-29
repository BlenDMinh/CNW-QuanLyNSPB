<div class="navbar">
    <?php
        $login = $_SESSION['login'] ?? '';

        // echo '<a href="XemThongTinNV.php">Nhân Viên</a>';
        // echo '<a href="XemThongTinPB.php">Phòng Ban</a>';
        // echo '<a href="timkiem.php">Tìm kiếm</a>';
        if ($login != 'admin') {
            echo '<a href="XemThongTinNV.php">Nhân Viên</a>';
            echo '<a href="XemThongTinPB.php">Phòng Ban</a>';
            echo '<a href="timkiem.php">Tìm kiếm</a>';
            echo '<a href="login.php">Đăng nhập</a>';
        } else {
            echo '<a href="AdminThongTinNV.php">Nhân Viên</a>';
            echo '<a href="AdminThongTinPB.php">Phòng Ban</a>';
            echo '<a href="logout.php">Đăng xuất</a>';
        }
    ?>
</div>