<?php
// Salir si este archivo es llamado directamente.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Función para mostrar la página pública de visualización de tareas.
function tetoca_public_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'tetoca_tasks';
    $tasks = $wpdb->get_results( "SELECT * FROM $table_name WHERE task_status = 'pending'", ARRAY_A );
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Tareas Pendientes', 'tetoca' ); ?></h1>
        <!-- Aquí puedes agregar la lista de tareas pendientes -->
        <ul>
            <?php foreach ( $tasks as $task ) : ?>
                <li>
                    <strong><?php echo esc_html( $task['task_title'] ); ?></strong>
                    <p><?php echo esc_html( $task['task_description'] ); ?></p>
                    <p><?php printf( __( 'Fecha Límite: %s', 'tetoca' ), esc_html( $task['task_deadline'] ) ); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
}

// Shortcode para mostrar la página pública de visualización de tareas.
function tetoca_public_page_shortcode() {
    ob_start();
    tetoca_public_page();
    return ob_get_clean();
}
add_shortcode( 'tetoca_public_page', 'tetoca_public_page_shortcode' );


