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
define('RUTA',plugin_dir_path(__FILE__));
define('NOMBRE','Receptor');

//Archivos externos
//include(RUTA.'/includes/opciones.php');
require_once plugin_dir_path(__FILE__) . '/includes/configuracion.php';



//Se filtran en el toolbar de TinyMCE nº2 los botones de seleccionar fuente, seleccionar tamano y subrayado.
 function rai_nuevos_botones($botones) 
 {	
	$botones[] = 'fontselect';
	$botones[] = 'fontsizeselect';
	$botones[] = 'underline';
	return $botones;
}

add_filter( 'mce_buttons_2','rai_nuevos_botones');

// ***************************************************************************
// Funciones para crear una tabla
// Funcion para crear una tabla
function jnj_activation()
{
    global $wpdb;
    $sql = 'CREATE TABLE '.$wpdb->prefix.'receptor ('
        .'col1 DATETIME NOT NULL,'
        .'col2 VARCHAR(256) NOT NULL,'
        .'col3 VARCHAR(64) NOT NULL'
        .');';
    $wpdb->get_results($sql);
}

// Funcion para borrar una tabla
function jnj_deactivation()
{
    global $wpdb;
    $sql = 'DROP TABLE '.$wpdb->prefix.'receptor;';
    $wpdb->get_results($sql);
}

register_activation_hook(__FILE__, 'jnj_activation');
register_deactivation_hook(__FILE__, 'jnj_deactivation');
// ****************************************************************************


 ?>
