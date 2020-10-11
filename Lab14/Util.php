<?php 
function connectToDB(){
    $serverName = "localhost";
    $userName = "root";
    $psswd = "";
    $dbName = "dbname";

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
    $sql = "SELECT name, units, quantity, price, country FROM fruit";
    $res = mysqli_query($con, $sql);
    closeDB($con);
    return $res;
}
function getFruitsByName($fruitName){
    $con = connectToDB();
    $query = "SELECT name, units, quantity, price, country FROM fruit WHERE name LIKE '%".$fruitName."%'";
    $res = mysqli_query($con,$query);
    closeDB($con);
    return $res;
}
function getCheaperFruitThan($selectedPrice){
    $con = connectToDB();
    $query = "SELECT name, units, quantity, price, country FROM fruit WHERE pice <= '%".$selectedPrice."%'";
    $res = mysqli_query($con,$query);
    closeDB($con);
    return $res;
}
function getExpensierFruitThan($selectedPrice){
    $con = connectToDB();
    $query = "SELECT name, units, quantity, price, country FROM fruit WHERE pice >= '%".$selectedPrice."%'";
    $res = mysqli_query($con,$query);
    closeDB($con);
    return $res;
}
function insertFruit($name,$quantity,$cost){
    $con = connectToDB();
    $query = "INSERT INTO Fruit (name,quantity,price)VALUES (\"".$name."\",\"". $quantity ."\",\"".$cost."\" ); ";
    if(mysqli_query($con, $query)){
        echo "new record created succesfully";
        closeDb($con);
        return true;
    }else {
        echo "error: ".$query. "<br>" . mysqli_error($con);
        return false;
    }  
    closeDB($con);
}
?>