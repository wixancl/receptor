<?php
//Evita que un usuario malintencionado ejecute codigo php desde la barra del navegador
defined('ABSPATH') or die( "Bye bye" );

/*
 * Nuevo menu de administrador
 */
 
// El hook admin_menu ejecuta la funcion rai_menu_administrador
add_action( 'admin_menu', 'menu_administrador' );
 
// Top level menu del plugin
function menu_administrador()
{
	//add_menu_page(
	//NOMBRE,
	//NOMBRE,
	//'manage_options',
	//RUTA . '/admin/configuracion.php'

	//); 
 
//    add_options_page(
//    NOMBRE,
//    NOMBRE, 
//    'manage_options', 
//    'rai', 
//    'rai_options'
 //   ); //Crea la pagina de opciones



	add_menu_page( 
		'Receptor', 
		'Receptor', 
		'manage_options', 
		'recep_dato' 
		//'configuracion.php'
		//plugin_dir_url(__FILE__).'admin/img/icon.png',//icono
		//null
		);



function Contenido(){
	echo "<h1>Esto es un contenido</h1>";

}











}
 ?>
