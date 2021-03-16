<?php

defined('ABSPATH') or die( "Bye bye" );

/*
 * Nuevo menu de administrador
 */
 
// El hook admin_menu ejecuta la funcion rai_menu_administrador
add_action( 'admin_menu', 'menu_administrador' );
 
// Top level menu del plugin
function menu_administrador()
{
	add_menu_page(
	NOMBRE,
	NOMBRE,
	'manage_options',
	RUTA . '/admin/configuracion.php'

	); //Crea el menu




    add_options_page(
    NOMBRE,
    NOMBRE, 
    'manage_options', 
    'rai', 
    'rai_options'
    ); //Crea la pagina de opciones
}
 ?>
