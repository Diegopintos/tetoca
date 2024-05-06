<?php
/**
 * Plugin Name: TE TOCA
 * Description: Plugin para gestionar las tareas de compañeros de casa en WordPress.
 * Version: 6.0
 * Author: Tu Nombre
 * Text Domain: TETOCA
 */

// Salir si este archivo es llamado directamente.
if (!defined('WPINC')) {
    die;
}

// Definir constantes del plugin.
define('TETOCA_VERSION', '1.0');
define('TETOCA_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('TETOCA_PLUGIN_URL', plugin_dir_url(__FILE__));

// Incluir archivos necesarios.
require_once TETOCA_PLUGIN_DIR . 'includes/functions.php';
require_once TETOCA_PLUGIN_DIR . 'includes/database.php';
require_once TETOCA_PLUGIN_DIR . 'includes/admin/enqueue.php';
require_once TETOCA_PLUGIN_DIR . 'includes/admin/admin-page.php';
require_once TETOCA_PLUGIN_DIR . 'includes/admin/add-task-page.php';
require_once TETOCA_PLUGIN_DIR . 'includes/admin/task-archive-page.php';
require_once TETOCA_PLUGIN_DIR . 'includes/public/enqueue.php';
require_once TETOCA_PLUGIN_DIR . 'includes/public/public-page.php';
require_once TETOCA_PLUGIN_DIR . 'includes/email/email-notifications.php';

// Función para registrar errores
function tetoca_log_error($error) {
    error_log('TETOCA: ' . $error);
}

try {
    // Aquí iría el código del plugin
} catch (Exception $e) {
    tetoca_log_error($e->getMessage());
}