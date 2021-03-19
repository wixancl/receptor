<?php
    global $wpdb;

    $tabla = "{$wpdb->prefix}receptor_data";
    $tabla2 = "{$wpdb->prefix}receptor_config";


   // Datos para seleccionar 
    $query = "SELECT * FROM $tabla";
    $lista_datos = $wpdb->get_results($query,ARRAY_A);
    if(empty($lista_datos)){
        $lista_datos = array();
    }


    if(isset($_POST['txtdato'])){
        
      $ingreso =$_POST['txtdato']; 
      

     // $sql3 = 'INSERT INTO '.$wpdb->prefix.'receptor_data (datos) VALUES (\''.$ingreso.'\');';
     // $wpdb->get_results($sql3);

      //$wpdb->insert($tabla, array('datos' => 'prueba') );

      $post_date = date('Y-m-d h:i:s');

      $wpdb->insert($tabla, array('fecha' => $post_date,'datos' => $ingreso) );



    }







    
 ?>


<!-- Modal -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php echo "<h1 class='wp-heading-inline'>" . get_admin_page_title() . "</h1>"; ?>
        <?php 
//$post_date = get_the_date();
//$post_date = date('l jS \of F Y h:i:s A');
        $post_date = date('Y-m-d h:i:s');
echo 'esta es una dato de fecha'.$post_date;
?>
      </div>
        <form method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="txtnombre" class="col-sm-4 col-form-label"><?php echo $sql3; ?></label>
              </br>
              <label for="txtnombre" class="col-sm-4 col-form-label"><?php echo $fecha; ?></label>
              <div class="col-sm-8">
                <input type="text" id="txtdato" name="txtdato" style="width:25%">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="btnguardar" id="btnguardar">Guardar</button>
          </div>
        </form>
    </div>
  </div>
</div>



<div class="wrap">
  <table class="wp-list-table widefat fixed striped pages">
    <thead>
      <th >ID</th>
      <th >Fecha</th>
      <th >Datos</th>
    </thead>
    <tbody id="the-list">
    <?php 
      foreach ($lista_datos as $key => $value) 
      {
        $id = $value['id'];
        $fecha = $value['fecha'];
        $datos = $value['datos'];
      
      echo "
        <tr>
          <td>$id</td>
          <td>$fecha </td>
          <td>$datos </td>
        </tr>
      ";
      }
    ?>
    </tbody>
  </table>
</div>