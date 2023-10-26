<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $link = mysqli_connect("localhost", "root", "") or die("Cannot connect to database");
        mysqli_select_db($link, "dulieu222");
        $table = "";
        $sql = "SELECT * FROM ".$table;
        $result = $link->query($sql);
        echo "<table>";
            
        echo "</table>";
        $link->free_result();
        $link->close();
    ?>
</body>
</html>