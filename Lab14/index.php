<?php
    require_once "Util.php";
    include("index.html");
    $res = getFruits();
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>" . $row["name"]      . "</td>";
            echo "<td>" . $row["units"]     . "</td>";
            echo "<td>" . $row["quantity"]  . "</td>";
            echo "<td>" . $row["price"]     . "</td>";
            echo "<td>" . $row["country"]   . "</td>";
            echo "</tr>";
        }
    }
?>