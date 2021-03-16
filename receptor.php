<?php
/*
Plugin Name: Receptor
Plugin URI: https://wixan.cl
Description: Plugin para la recepcion de informaion de un servidor externo
Version: 1.0
Author: Guido
Author URI: https://guidorios.cl
License: GPL2
*/

//Evita que un usuario malintencionado ejecute codigo php desde la barra del navegador
defined('ABSPATH') or die( "Bye bye" );

//Aqui se definen las constantes
define('RAI_RUTA',plugin_dir_path(__FILE__));
define('RAI_NOMBRE','Receptor');

//Archivos externos
include(RAI_RUTA.'/includes/opciones.php');

//Se filtran en el toolbar de TinyMCE nº2 los botones de seleccionar fuente, seleccionar tamano y subrayado.
 function rai_nuevos_botones($botones) 
 {	
	$botones[] = 'fontselect';
	$botones[] = 'fontsizeselect';
	$botones[] = 'underline';
	return $botones;
}
add_filter( 'mce_buttons_2','rai_nuevos_botones');

 ?>
