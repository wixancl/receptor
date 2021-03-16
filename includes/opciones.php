<?php

defined('ABSPATH') or die( "Bye bye" );

/*
 * Nuevo menu de administrador
 */
 
// El hook admin_menu ejecuta la funcion rai_menu_administrador
add_action( 'admin_menu', 'rai_menu_administrador' );
 
// Top level menu del plugin
function rai_menu_administrador()
{
	add_menu_page(RAI_NOMBRE,RAI_NOMBRE,'manage_options',RAI_RUTA . '/admin/configuracion.php'); //Crea el menu
    add_options_page(RAI_NOMBRE,RAI_NOMBRE, 'manage_options', 'rai', 'rai_options'); //Crea la pagina de opciones
}
 ?>
