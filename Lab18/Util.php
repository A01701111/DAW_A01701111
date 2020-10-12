<?php 
function connectToDB(){
    $serverName = "localhost";
    $userName = "root";
    $psswd = "";
    $dbName = "fruits";

    $con = mysqli_connect($serverName,$userName,$psswd,$dbName);
    //lets check the connection 
    if (!$con){
        die("Connection failed: ". mysqli_connect_error());
    }
    return $con;
}
function closeDB($mysql){mysqli_close($mysql);}
function getFruits(){
    $con = connectToDB();
    $sql = "SELECT name,quantity, price FROM fruits";
    $res = mysqli_query($con, $sql);
    closeDB($con);
    return $res;
}
function getFruitsByName($fruitName){
    $con = connectToDB();
    $query = "SELECT name, quantity, price FROM fruits WHERE name LIKE '%".$fruitName."%'";
    $res = mysqli_query($con,$query);
    closeDB($con);
    return $res;
}
function getCheaperFruitThan($selectedPrice){
    $con = connectToDB();
    $query = "SELECT name, quantity, price FROM fruits WHERE pice <= '%".$selectedPrice."%'";
    $res = mysqli_query($con,$query);
    closeDB($con);
    return $res;
}
function getExpensierFruitThan($selectedPrice){
    $con = connectToDB();
    $query = "SELECT name, quantity, price FROM fruits WHERE pice >= '%".$selectedPrice."%'";
    $res = mysqli_query($con,$query);
    closeDB($con);
    return $res;
}
function insertFruit($name,$quantity,$cost){
    $con = connectToDB();
    $query = "INSERT INTO fruits (name,quantity,price)VALUES (\"".$name."\",\"". $quantity ."\",\"".$cost."\" ); ";
    if(mysqli_query($con, $query)){
        closeDb($con);
        return true;
    }else {
        echo "error: ".$query. "<br>" . mysqli_error($con);
        return false;
    }  
    closeDB($con);
}
function deleteFruit($fruitName){
    $con = connectToDB();
    $query = "DELETE FROM fruits WHERE name = '$fruitName'";
    if (mysqli_query($con,$query)){
        echo $fruitName . " has been deleted succesfully";
        closeDB($con);
    }
    else{
        echo "ERROR ". $query . " " . mysqli_errno($con);
        closeDB($con);
    }
    
}
function updateFruitInDB($name,$quantity,$price){

    $con = connectToDB();
    $query = "UPDATE fruits SET name='$name',quantity='$quantity',price='$price' WHERE name = '$name'";
    if(mysqli_query($con, $query)){
        echo "New data has been inserted succesfully";
        closeDB($con);
        return true;
    }
    else{
        echo "ERROR ".$query." ". mysqli_error($con);
        return false;
    }
    closeDB($con);
}
?>