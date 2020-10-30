<?php
$serverName = "localhost";
$userName = "id15254879_sebastianadmin";
$psswd = "";
$dbName = 'id15254879_db';

$con = mysqli_connect($serverName,$userName,$psswd,$dbName);
try {
    $con = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $psswd);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
?>