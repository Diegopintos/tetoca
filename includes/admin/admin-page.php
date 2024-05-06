<?php
// Salir si este archivo es llamado directamente.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Función para mostrar la página principal de administración.
function tetoca_admin_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Gestión de Tareas', 'tetoca' ); ?></h1>
        <!-- Aquí puedes agregar el contenido de la página principal de administración -->
        <p><?php esc_html_e( 'Bienvenido a la página de gestión de tareas.', 'tetoca' ); ?></p>
    </div>
    <?php
}

// Registrar la página principal de administración.
function tetoca_register_admin_page() {
    add_menu_page(
        __( 'TETOCA', 'tetoca' ),
        __( 'TETOCA', 'tetoca' ),
        'manage_options',
        'tetoca-admin',
        'tetoca_admin_page',
        'dashicons-clipboard',
        30
    );
}
add_action( 'admin_menu', 'tetoca_register_admin_page' );
