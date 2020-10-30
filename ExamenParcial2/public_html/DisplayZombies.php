<?php
    require_once("Util.php");
    $res = ZombieByDate();
    if(mysqli_num_rows($res) > 0)
    {
        echo "<div class='bx col-auto'>";
        echo "<table class='table table-light'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Estado</th>";
        echo "<th scope='col'>Fecha</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($row = mysqli_fetch_assoc($res)){
            $name=getName($row["id_Zombies"]);
            $result =mysqli_fetch_array($name); 
            echo "<tr>";
            echo "<td scope='row'>" . $result[0] . "</td>";
            echo "<td>" . $row["Estado"]  . "</td>";
            echo "<td>" . $row["Fecha"]     . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";


    }

?>