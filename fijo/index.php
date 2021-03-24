<?php
include("conex.php");
$link=Conectarse();
$result=mysqli_query($link,"select * from wp_receptor_data");
?>

<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
<H1>Ejemplo de uso de bases de datos con PHP y MySQL</H1>
<FORM ACTION="procesar.php">
<TABLE>
<TR>
<TD>Datos:</TD>
<TD><INPUT TYPE="text" NAME="Datos" SIZE="20" MAXLENGTH="30"></TD>
</TR>
<TR>
<TD>Fecha:</TD>
<TD><INPUT TYPE="text" NAME="Fecha" VALUE="<?php echo date('Y-m-d h:i:s');?>" SIZE="20" MAXLENGTH="30"></TD>
</TR>
</TABLE>
<INPUT TYPE="submit" NAME="accion" VALUE="Grabar">
</FORM>
<hr>

 
<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1>
<TR>
  <TD>&nbsp;<B>ID</B></TD> 
  <TD>&nbsp;<B>Fecha</B>&nbsp;</TD>
  <TD>&nbsp;<B>Datos</B>&nbsp;</TD>
  <TD>&nbsp;<B>Actualizar</B>&nbsp;</TD>
  <TD>&nbsp;<B>Borrar</B>&nbsp;</TD>
</TR>
<?php
while($row = mysqli_fetch_array($result)) 
{
echo "
 
  <tr>
  
    <FORM NAME=\"actualiza\" ACTION=\"actualiza.php\" METHOD=\"POST\"> 
    <td><INPUT TYPE=\"text\" NAME=\"id\" VALUE=\"".$row["id"]."\"></td>
    <td><INPUT TYPE=\"text\" NAME=\"Fecha\" VALUE=\"".$row["fecha"]."\"></td>
    <td><INPUT TYPE=\"text\" NAME=\"Datos\" VALUE=\"".$row["datos"]."\"></td>
    <td><INPUT TYPE=\"submit\" NAME=\"accion\" VALUE=\"actualizar\"></td>
    <INPUT TYPE=\"hidden\" NAME=\"id\" VALUE=\"".$row["id"]."\">
    </FORM> 
    
    
    
    <FORM NAME=\"borra\" ACTION=\"borra.php\" METHOD=\"POST\"> 
    <td><INPUT TYPE=\"submit\" NAME=\"accion\" VALUE=\"borrar\"></td>
    <INPUT TYPE=\"hidden\" NAME=\"id\" VALUE=\"".$row["id"]."\">
    </FORM>  
    
    
    


  </tr>
  


 
";
}

mysqli_free_result($result);
mysqli_close($link);
?>
</table>

</body>
</html>