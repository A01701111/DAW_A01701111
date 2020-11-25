<?php
    require_once("Util.php");
    $res = getFruits();
    if(mysqli_num_rows($res)>0){
        echo "<div class='bx col-auto'>";
        echo "<table class='table table-light'>";
        echo "<thead class='thead-dark'>";
        echo "<tr class='hdth'>";
        echo "<th scope='col'>Fruit Name</th>";
        echo "<th scope='col'>Quantity</th>";
        echo "<th scope='col'>Price</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td scope='row'>" . $row["name"]      . "</td>";
            echo "<td>" . $row["quantity"]  . "</td>";
            echo "<td>" . $row["price"]     . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    else{
        echo "<p>Table is empty</p>";
    }
?>