<?php
include("conex.php");
$link=Conectarse();
echo $id=$_POST['id'];
echo "<br>";
echo $fecha=$_POST['Fecha'];
echo "<br>";
echo $datos=$_POST['Datos'];
echo "<br>";
echo $query ="update wp_receptor_datos set fecha ='$fecha', datos ='$datos' where id = $id";

mysqli_query($link,$query);
header("Location: index.php");

?>