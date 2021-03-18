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




      if(isset($_POST['btnguardar'])){
        
          $nombre = $_POST['txtdato'];
          $query = "SELECT id FROM $tabla ORDER BY id DESC limit 1";
          $resultado = $wpdb->get_results($query,ARRAY_A);
          $proximoId = $resultado[0]['id'] + 1;
          $shortcode = "[ENC id='$proximoId']";

          $datos = [
              'id' => null,
              'fecha' => $nombre,
              'dato' => $shortcode
          ];
          $respuesta =  $wpdb->insert($tabla,$datos);

    
      }




    
 ?>


<!-- Modal -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php echo "<h1 class='wp-heading-inline'>" . get_admin_page_title() . "</h1>"; ?>
      </div>
        <form method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="txtnombre" class="col-sm-4 col-form-label">llave</label>
              <div class="col-sm-8">
                <input type="text" id="txtdato" name="txtnombre" style="width:50%">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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