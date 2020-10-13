<?php
    require_once("Util.php");
    

    $_POST["nameFruit2"]=htmlspecialchars($_POST["nameFruit2"]);
    $name = $_POST["nameFruit2"];
    $quantity = $_POST["cantFruit2"];
    $price = $_POST["costFruit2"];
    

    if(isset($_POST["nameFruit2"]) && !empty($_POST["nameFruit2"]) && isset($_POST["cantFruit2"]) && !empty($_POST["cantFruit2"]) && isset($_POST["costFruit2"]) && !empty($_POST["costFruit2"])){
        updateFruitInDB($name,$quantity,$price);
        
    }else{
        echo '<script>alert("Asegurate de ingresar todos los datos");</script>';
    }
        
    
?>