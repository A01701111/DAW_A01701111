<?php
    require_once("Util.php");
    

    $_POST["nameFruit1"]=htmlspecialchars($_POST["nameFruit1"]);
    $name = $_POST["nameFruit1"];
    $quantity = $_POST["cantFruit1"];
    $price = $_POST["costFruit1"];

    if(isset($_POST["nameFruit1"]) && !empty($_POST["nameFruit1"]) && isset($_POST["cantFruit1"]) && !empty($_POST["cantFruit1"]) && isset($_POST["costFruit1"]) && !empty($_POST["costFruit1"])){
    
        insertFruit($name, $quantity, $price);
    }else{
        echo '<script>alert("ingresa los datos de la manera correcta"); </script>';
    }

?>