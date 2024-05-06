<?php
// Salir si este archivo es llamado directamente.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Función para encolar scripts y estilos en el panel de administración.
function tetoca_admin_enqueue_scripts() {
    // Enqueue estilos.
    wp_enqueue_style( 'tetoca-admin-style', TETOCA_PLUGIN_URL . 'assets/css/admin-style.css', array(), TETOCA_VERSION );

    // Enqueue scripts.
    wp_enqueue_script( 'tetoca-admin-script', TETOCA_PLUGIN_URL . 'assets/js/admin-script.js', array( 'jquery' ), TETOCA_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'tetoca_admin_enqueue_scripts' );
