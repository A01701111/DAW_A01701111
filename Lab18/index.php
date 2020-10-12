<?php
    require_once "Util.php";
    include("index.html");


    $res = getFruits();
    if(mysqli_num_rows($res)>0){
        echo "<div class='bx col-auto'>";
        echo "<table class='table table-light'>";
        echo "<thead class='thead-dark'>";
        echo "<tr class='hdth'>";
        echo "<th scope='col'>Fruit Name</th>";
        echo "<th scope='col'>Quantity</th>";
        echo "<th scope='col'>Price</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td scope='row'>" . $row["name"]      . "</td>";
            echo "<td>" . $row["quantity"]  . "</td>";
            echo "<td>" . $row["price"]     . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    if(isset($_POST["subFruit"]) && !empty($_POST["subFruit"])){

        $_POST["nameFruit1"]=htmlspecialchars($_POST["nameFruit1"]);
        $name = $_POST["nameFruit1"];
        $quantity = $_POST["cantFruit1"];
        $price = $_POST["costFruit1"];

        if(isset($_POST["nameFruit1"]) && !empty($_POST["nameFruit1"]) && isset($_POST["cantFruit1"]) && !empty($_POST["cantFruit1"]) && isset($_POST["costFruit1"]) && !empty($_POST["costFruit1"])){
           
            insertFruit($name, $quantity, $price);
            header('Location: '.$_SERVER['REQUEST_URI']);
        }else{
            echo '<script>alert("ingresa los datos de la manera correcta"); </script>';
        }

    }
    if(isset($_POST["delFruit"]) && !empty($_POST["delFruit"])){

        $_POST["nameFruit3"]=htmlspecialchars($_POST["nameFruit3"]);
        $name = $_POST["nameFruit3"];

        if(isset($_POST["nameFruit3"]) && !empty($_POST["nameFruit3"] && ctype_alpha($name)) ){
     
            echo $name . " has been deleted";
            deleteFruit($name);
            header('Location: '.$_SERVER['REQUEST_URI']);
            
        }else{
            echo '<script>alert("No se ingreso la informacion de la manera correcta");</script>';
        }
        
    }
    if(isset($_POST["upDte"]) && !empty($_POST["upDte"])){

        $_POST["nameFruit2"]=htmlspecialchars($_POST["nameFruit2"]);
        $name = $_POST["nameFruit2"];
        $quantity = $_POST["cantFruit2"];
        $price = $_POST["costFruit2"];
       

        if(isset($_POST["nameFruit2"]) && !empty($_POST["nameFruit2"]) && isset($_POST["cantFruit2"]) && !empty($_POST["cantFruit2"]) && isset($_POST["costFruit2"]) && !empty($_POST["costFruit2"]) && ctype_alpha($name)){
            
            
            updateFruitInDB($name,$quantity,$price);
            header('Location: '.$_SERVER['REQUEST_URI']);
            
        }else{
            echo '<script>alert("Asegurate de ingresar todos los datos");</script>';
        }
        
    }
?>