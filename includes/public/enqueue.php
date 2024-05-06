<?php
// Salir si este archivo es llamado directamente.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Función para encolar scripts y estilos en la parte pública del sitio.
function tetoca_public_enqueue_scripts() {
    // Enqueue estilos.
    wp_enqueue_style( 'tetoca-public-style', TETOCA_PLUGIN_URL . 'assets/css/public-style.css', array(), TETOCA_VERSION );

    // Enqueue scripts.
    wp_enqueue_script( 'tetoca-public-script', TETOCA_PLUGIN_URL . 'assets/js/public-script.js', array( 'jquery' ), TETOCA_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'tetoca_public_enqueue_scripts' );
