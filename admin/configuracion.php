<?php

defined('ABSPATH') or die( "Bye bye" );

//Comprueba que tienes permisos para acceder a esta pagina
if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));
?>
	<div class="wrap">
		<h2><?php _e( 'Receptor', 'receptor' ) ?></h2>
		Bienvenido a la configuración de ejemplo de Receptor
	</div>
<?php
 ?>
