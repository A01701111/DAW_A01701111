<?php
    function connectToDB(){
        $serverName = "localhost";
        $userName = "id15254879_sebastianadmin";
        $psswd = '';
        $dbName = 'id15254879_db';
    
        $con = mysqli_connect($serverName,$userName,$psswd,$dbName);
        //lets check the connection 
        if (!$con){
            http_response_code(500);
            return false;
        }
        return $con;
    }
?>