<?php
    $link = mysqli_connect("localhost", "root", "") or die("Cannot connect to database");
    mysqli_select_db($link, "dulieu222");

    function plot_table(string $table_name, $result, array $header=NULL) {
        echo '<div class="table" name = "'.$table_name.'">';
        if ($header != NULL)
            echo "<div class=\"row header\">".implode(array_map(fn($e): string => "<div class='cell'>".$e."</div>", $header))."</div>";
        while($row = $result->fetch_array(MYSQLI_NUM)) {
            echo "<div class='row'>".implode(array_map(fn($e): string => "<div class='cell'>".($e == "" ? "NULL" : $e)."</div>", $row))."</div>";
        }
        echo "</div>";
    }
?>