<?php
include("conex.php");
$link=Conectarse();


$id=$_POST['id'];
mysqli_query($link,"delete from wp_receptor_data where id = $id");
header("Location: index.php");

?>