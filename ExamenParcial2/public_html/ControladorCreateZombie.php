<?php
    include_once ("Util.php");
    $_POST["NombreZombie"]=htmlspecialchars($_POST["NombreZombie"]);
    $name = $_POST["NombreZombie"];
    
    $_POST["EstadoZombie"]=htmlspecialchars($_POST["EstadoZombie"]);
    $name = $_POST["EstadoZombie"];
    
    if(isset($_POST["EstadoZombie"]) && !empty($_POST["EstadoZombie"]) && isset($_POST["NombreZombie"]) && !empty($_POST["NombreZombie"])){
        addZombie($name,$estado);
        return displayZombies();   
    }

?>