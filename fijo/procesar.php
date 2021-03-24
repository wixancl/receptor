<?php
include("conex.php");
$link=Conectarse();
echo $datos=$_GET['Datos'];
echo $fecha=$_GET['Fecha'];
echo mysqli_query($link,"insert into wp_receptor_data (fecha,datos) values ('$fecha','$datos')");
//header("Location: index.php");
?>