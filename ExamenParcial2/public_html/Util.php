<?php
    function connectToDB(){
        $serverName = "localhost";
        $userName = "id15254879_sebastianadmin";
        $psswd = "";
        $dbName = 'id15254879_db';
    
        $con = mysqli_connect($serverName,$userName,$psswd,$dbName);
        // try {
        //     $con = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $psswd);
        //     // set the PDO error mode to exception
        //     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     echo "Connected successfully"; 
        //     } catch(PDOException $e) {    
        //     echo "Connection failed: " . $e->getMessage();
        //     }
        // return $con;
        
        //lets check the connection 
        if (!$con){
            http_response_code(500);
            die("Connection faled: " . mysqli_connect_error());
            echo "<br> no se pudo";
            return false;
        }
        return $con;
    }
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
    function getName($id){
        $con = connectToDB();
        $query = "CALL `getName`($id);";
        $res = mysqli_query($con,$query);
        closeDB($con);
        return $res;
    }
    function createZombie($name,$id_Zombie){
        $con = connectToDB();
        $query = "CALL `AddZombie`($name,$id_Zombie);";
        $res = mysqli_query($con,$query);
        closeDB($con);
        return $res;
    }
    function addZombie($name, $estado){
        $id_Zombie = uniqidReal();
        createZombie($name,$id_Zombie);
        $con = connectToDB();
        $query = "CALL `AddEstadoZombie`($id_Zombie,$estado);";
        $res = mysqli_query($con,$query);
        closeDB($con);
        return $res;
    }
    function uniqidReal($lenght = 9) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
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