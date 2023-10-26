<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="static/main.css?2">
</head>
<body>
    <div class="content">
        <div class="navbar">
            <a href="XemThongTinNV.php">Nhân Viên</a>
            <a href="XemThongTinPB.php">Phòng Ban</a>
            <a href="timkiem.php">Tìm kiếm</a>
            <a href="login.php">Đăng nhập</a>
        </div>
        <div class="container-table100" style="flex-direction: column;">
            <?php 
                $message = $_REQUEST['message'] ?? '';
                echo "<p style='color: red'>".$message."</p>";
            ?>
            <form class="wrap-search" action="xulilogin.php" method="POST" style="flex-direction: column !important; height: 50%; width: 40%; justify-content: space-between;">
                <div style="padding: 20px; background-color: #6c7ae0;">
                    <p style="font-weight: bold; color: white; font-size: x-large;">Đăng nhập</p>
                </div>
                <div style="background-color: whitesmoke; height: 100%; border-radius: 7px; padding: 10px; display: flex; flex-direction: column; justify-content: space-between;">
                    <!-- <label for="username">Username: </label> -->
                    <input class="field-text" type="text" name="username" placeholder="Username">
                    <!-- <label for="password">Password: </label> -->
                    <input class="field-text" type="password" name="password" placeholder="Password">
                    <input style="font-size: large;" class="submit-button" type="submit" value="Đăng nhập">
                </div>
            </form>
        </div>
    </div>
</body>
</html>