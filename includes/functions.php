<?php
// Salir si este archivo es llamado directamente.
if (!defined('WPINC')) {
    die;
}

// Incluir archivo de base de datos.
require_once plugin_dir_path(__FILE__) . 'database.php';

// Función para obtener la lista de tareas.
function tetoca_get_tasks()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tetoca_tasks';
    $tasks = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
    return $tasks;
}

// Función para agregar una nueva tarea.
function tetoca_add_task($title, $description, $deadline, $assigned_to, $image_url)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tetoca_tasks';
    $wpdb->insert(
        $table_name,
        array(
            'task_title' => $title,
            'task_description' => $description,
            'task_deadline' => $deadline,
            'task_assigned_to' => $assigned_to,
            'task_image' => $image_url,
            'task_status' => 'pending',
        )
    );
}

// Función para actualizar el estado de una tarea.
function tetoca_update_task_status($task_id, $status)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tetoca_tasks';
    $wpdb->update(
        $table_name,
        array('task_status' => $status),
        array('task_id' => $task_id)
    );
}

// Función para eliminar una tarea.
function tetoca_delete_task($task_id)
{
