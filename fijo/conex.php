<?php
function Conectarse()
{
if (!($link=mysqli_connect("localhost","root","","wordpress")))
{
echo "Error conectando a la base de datos.";
exit();
}
return $link;
}
?>