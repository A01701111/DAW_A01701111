<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab9</title>
</head>

<body>
    <h1>Lab 9: Introducción a php</h1>
    <div>
        <h2>Promedio array</h2>
        <p>Arreglo 1: &lsqb; 15, 54,63,87,69,99,33 &rsqb;</p>
        <?php arrayAve([15, 54,63,87,69,99,33])?>
        <p>Arreglo 2: &lsqb; 34,34,73,77,53,73,77,16 &rsqb;</p>
        <?php arrayAve([34,34,73,77,53,73,77,16])?>
    </div>
    <div>
        <h2>Mediana array</h2>
        <p>Arreglo 1: &lsqb; 15, 54,63,87,69,99,33 &rsqb;</p>
        <?php arrayMed([15, 54,63,87,69,99,33])?>
        <p>Arreglo 2: &lsqb; 34,34,73,77,53,73,77,16 &rsqb;</p>
        <?php arrayMed([34,34,73,77,53,73,77,16])?>
    </div>
        <h2>Lista, promedio, mediana y menor a mayor</h2>
        <p>Arreglo 1: &lsqb; 15, 54,63,87,69,99,33 &rsqb;</p>
        <?php arrayDis([15, 54,63,87,69,99,33])?>
        <p>Arreglo 2: &lsqb; 34,34,73,77,53,73,77,16 &rsqb;</p>
        <?php arrayDis([34,34,73,77,53,73,77,16])?>
    <div>
        <h2>Cuadrados y cubos</h2>
        <?php square(5)?>
    </div>
    <div>
        <h2>Problema CodeForces 122A</h2>
        <form action="index.php" method="get">
            <input type="number" name="num" value="0">
            <input type="submit" value="submit">
        </form>
    </div>
    <section>
        <h2>Preguntas</h2>
        <p>¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención. <br>
        La funcion de phpinfo imprime informacion acerca de la configuracion de php. <br>
        <ul>
            <li>INFO_VARIABLES: Muestra todas las variables predefinidas.</li>
            <li>INFO_ENVIRONMENT: Regresa la variables de enviroment</li>
            <li>INFO_CREDITS: Entrega la informacion de las personas que trabajaron en</li>
        </ul>
        </p>
    </section>
</body>

</html>
<?php
    function arrayAve(array $arr){
        $av = array_sum($arr)/count($arr);
        return $av;
    }
    function arrayMed(array $arr){
        sort($arr);
        $num = count($arr);
    
        $midVal = floor(($num - 1) / 2);
    
        if($num % 2) { 
            return $arr[$midVal];
        } 
        
        else {
            
            $low = $arr[$midVal];
            $high = $arr[$midVal + 1];
            return (($low + $high) / 2);
        }
    }
    function arrayDis(array $arr){
        echo "<ul>";
        echo "<li> Arreglo: [". implode(', ',$arr). "]</li>";
        echo "<li> Promedio: ". arrayAve($arr). "</li>"; 
        echo "<li> Mediana: ". arrayMed($arr). "</li>";
        sort($arr);
        echo "<li> Menor a mayor: [". implode(', ',$arr). "]</li>";
        rsort($arr);
        echo "<li> Mayor a menor: [". implode(', ',$arr). "]</li>";
        echo "</ul>";
    }
    function square($num){
        echo "<table>";
        echo "<tr>";
        echo "<td>Numero</td>";
        echo "<td>Cuadrado</td>";
        echo"<td>Cubo</td>";
        echo "</tr>";
        for($i = 1;$i<=$num;$i++){
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$i**2 ."</td>";
            echo "<td>". $i**3 ."</td>";
            echo "</tr>";


        }
        
	echo "</table>";
    }
    function luckyDiv(){
    $num = $_GET["num"];
    $str="NO";
    
    if($num%4==0 || $num%7==0 || $num%47==0 || $num%74==0||$num%444==0||$num%447==0|| $num%474==0|| $num%477==0|| $num%744==0|| $num%747==0|| $num%777==0){
     $str="YES";
    }
    else{
      $str="NO";
    }
    return $str;
    
  
    }
    if(isset($_GET["num"])):

?>
<script>alert("<?= luckyDiv() ?>")</script>
<?php endif; ?>