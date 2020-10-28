<?php
    require_once("ConnectToDB.php");
    function closeDB($mysql){mysqli_close($mysql);}
    function cantidadZombies(){
        $con = connectToDB();
        $query = "SELECT sum(Zombie.id_Zombie), SUM(EstadoZombie.Estado)
        FROM Zombie, EstadoZombie";
        $res = mysqli_query($con,$query);
        closeDB($con);
        return $res;
    }
    function ZombieByDate(){
        $con = connectToDB();
        $query = "CALL `byDate`();";
        $res = mysqli_query($con,$query);
        closeDB($con);
        return $res;
    }
    function displayZombies(){
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
            while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td scope='row'>" . $row["Nombre"]      . "</td>";
                echo "<td>" . $row["Estado"]  . "</td>";
                echo "<td>" . $row["Fecha"]     . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        
        
        }

    }

?>