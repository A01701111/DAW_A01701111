<?php
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
    function addZombie($Nombre,$estado){
        require_once("Util.php");
        $con = connectToDB();
        $id_Zombie = uniqidReal();
        $query = "CALL `AddZombie` ($Nombre, $id_Zombie)";
        $res = mysqli_query($con, $query);
        $query2 = "CALL `AddEstadoZombie` ($id_Zombie,$estado)";
        $res2 = mysqli_query($con,$query2 );
        closeDB($con);
        return $res;
        
}

?>