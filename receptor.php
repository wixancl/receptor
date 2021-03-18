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


//Archivos externos


//include(RUTA.'/includes/opciones.php');

//Aqui se definen las constantes
define('RUTA',plugin_dir_path(__FILE__));
define('NOMBRE','Receptor');


// *************************************************************************************
// El hook admin_menu ejecuta la funcion rai_menu_administrador
add_action( 'admin_menu', 'menu_administrador' );
 
// Top level menu del plugin
function menu_administrador()
{

    add_menu_page(
        'Receptor',//Titulo de la pagina
        'Receptor Menu',// Titulo del menu
        'manage_options', // Capability
        plugin_dir_path(__FILE__).'admin/configuracion.php', //slug
        null, //function del contenido
         plugin_dir_url(__FILE__).'admin/img/icon.png',//icono
         '1' //priority
    );

	function Configuracion()
	{
		echo plugin_dir_path(__FILE__).'includes/configuracion.php';
	}



}
// *************************************************************************************

// *************************************************************************************
// Funciones para crear una tabla

function CrearTabla()
{
    global $wpdb;

/*
    $sql1 = 'CREATE TABLE '.$wpdb->prefix.'receptor_data ('
        .'col1 DATETIME NOT NULL,'
        .'col2 VARCHAR(256) NOT NULL,'
        .'col3 VARCHAR(64) NOT NULL'
        .');';
*/


    $sql1 = 'CREATE TABLE '.$wpdb->prefix.'receptor_data ('
    	.'id int (11) AUTO_INCREMENT, '
        .'fecha DATETIME NOT NULL,'
        .'datos VARCHAR(256) NOT NULL,'
        .'PRIMARY KEY (id)'
        .');';


    $sql2 = 'CREATE TABLE '.$wpdb->prefix.'receptor_config ('
        .'col1 DATETIME NOT NULL,'
        .'col2 VARCHAR(256) NOT NULL,'
        .'col3 VARCHAR(64) NOT NULL'
        .');';


    $sql3 = 'INSERT INTO '.$wpdb->prefix.'receptor_data (datos) VALUES (1);';


    $wpdb->get_results($sql1);
    $wpdb->get_results($sql2);
    $wpdb->get_results($sql3);
}

// Funcion para borrar una tabla
function BorrarTabla()
{
    global $wpdb;
    $sql3 = 'DROP TABLE '.$wpdb->prefix.'receptor_data;';
    $sql4 = 'DROP TABLE '.$wpdb->prefix.'receptor_config;';
    
    $wpdb->get_results($sql3);
 	$wpdb->get_results($sql4);
}

register_activation_hook(__FILE__, 'CrearTabla');
register_deactivation_hook(__FILE__, 'BorrarTabla');

// *************************************************************************************




































//Se filtran en el toolbar de TinyMCE nº2 los botones de seleccionar fuente, seleccionar tamano y subrayado.
/*
 function rai_nuevos_botones($botones) 
 {	
	$botones[] = 'fontselect';
	$botones[] = 'fontsizeselect';
	$botones[] = 'underline';
	return $botones;
}


add_filter( 'mce_buttons_2','rai_nuevos_botones');
*/




 ?>
