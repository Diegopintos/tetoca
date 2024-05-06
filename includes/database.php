<?php
// Salir si este archivo es llamado directamente.
if (!defined('WPINC')) {
    die;
}

// Función para establecer la conexión a la base de datos y crear las tablas necesarias.
function tetoca_database_setup()
{
    global $wpdb;

    $tasks_table_name = $wpdb->prefix . 'tetoca_tasks';
    $assigned_users_table_name = $wpdb->prefix . 'tetoca_assigned_users';

    // Crear la tabla de tareas si no existe.
    if ($wpdb->get_var("SHOW TABLES LIKE '$tasks_table_name'") != $tasks_table_name) {
        $sql = "CREATE TABLE $tasks_table_name (
            task_id INT AUTO_INCREMENT PRIMARY KEY,
            task_title VARCHAR(100) NOT NULL,
            task_description TEXT,
            task_deadline DATE,
            task_status VARCHAR(20) DEFAULT 'pending',
            task_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            task_image VARCHAR(255),
            UNIQUE KEY task_image (task_image)
        )";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    // Crear la tabla de asignación de usuarios si no existe.
    if ($wpdb->get_var("SHOW TABLES LIKE '$assigned_users_table_name'") != $assigned_users_table_name) {
        $sql = "CREATE TABLE $assigned_users_table_name (
            task_id INT,
            user_id INT,
            FOREIGN KEY (task_id) REFERENCES $tasks_table_name(task_id),
            FOREIGN KEY (user_id) REFERENCES {$wpdb->prefix}users(ID),
            UNIQUE KEY task_user (task_id, user_id)
        )";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

// Ejecutar la función para establecer la conexión a la base de datos y crear las tablas cuando se active el plugin.
register_activation_hook(__FILE__, 'tetoca_database_setup');
