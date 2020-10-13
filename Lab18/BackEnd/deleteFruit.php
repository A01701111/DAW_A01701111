<?php
    require_once("Util.php");
 

    $_POST["nameFruit3"]=htmlspecialchars($_POST["nameFruit3"]);
    $name = $_POST["nameFruit3"];

    if(isset($_POST["nameFruit3"]) && !empty($_POST["nameFruit3"] && ctype_alpha($name)) ){
        deleteFruit($name);
        
    }else{
        echo '<script>alert("No se ingreso la informacion de la manera correcta");</script>';
    }
        
    
?>