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
    


?>