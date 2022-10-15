<?php
/**
 * Plugin Name: Elementor Box Favoritos
 * Description: Simple box para agregar productos o servicios favoritos en la home de una pagina web con Elementor.
 * Version:     1.0.0
 * Author:      Tato.pe
 * Author URI:  https://developers.elementor.com/
 */
function register_box_favoritos_precios_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/box-favoritos-precios.php' );
    $widgets_manager->register( new \Elementor_Box_Favoritos_Precios() );
}
add_action( 'elementor/widgets/register', 'register_box_favoritos_precios_widget' );