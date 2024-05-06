<?php
// Salir si este archivo es llamado directamente.
if (!defined('WPINC')) {
    die;
}

// Función para mostrar la página de añadir nueva tarea.
function tetoca_add_task_page()
{
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Añadir Nueva Tarea', 'tetoca'); ?></h1>
        <!-- Formulario para añadir nuevas tareas -->
        <form method="post" enctype="multipart/form-data">
            <label for="task-title"><?php esc_html_e('Título de la Tarea:', 'tetoca'); ?></label><br>
            <input type="text" id="task-title" name="task-title"><br><br>
            <label for="task-description"><?php esc_html_e('Descripción de la Tarea:', 'tetoca'); ?></label><br>
            <textarea id="task-description" name="task-description"></textarea><br><br>
            <label for="task-deadline"><?php esc_html_e('Fecha Límite:', 'tetoca'); ?></label><br>
            <input type="date" id="task-deadline" name="task-deadline"><br><br>
            <label for="task-status"><?php esc_html_e('Estado:', 'tetoca'); ?></label><br>
            <select id="task-status" name="task-status">
                <option value="pending"><?php esc_html_e('Pendiente', 'tetoca'); ?></option>
                <option value="completed"><?php esc_html_e('Completado', 'tetoca'); ?></option>
                <option value="in_progress"><?php esc_html_e('En Progreso', 'tetoca'); ?></option>
            </select><br><br>
            <label for="task-image"><?php esc_html_e('Imagen de la Tarea:', 'tetoca'); ?></label><br>
            <input type="button" id="upload-task-image-button" class="button" value="<?php esc_attr_e('Seleccionar Imagen', 'tetoca'); ?>">
            <input type="hidden" id="task-image" name="task-image">
            <div id="task-image-preview"></div><br><br>
            <label for="task-assigned-users"><?php esc_html_e('Usuarios Asignados:', 'tetoca'); ?></label><br>
            <?php
            // Obtener todos los usuarios de WordPress
            $users = get_users();
            ?>
            <select id="task-assigned-users" name="task-assigned-users[]" multiple>
                <?php foreach ($users as $user) : ?>
                    <option value="<?php echo esc_attr($user->ID); ?>"><?php echo esc_html($user->display_name); ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <input type="submit" value="<?php esc_attr_e('Añadir Tarea', 'tetoca'); ?>" class="button button-primary">
        </form>
    </div>
<?php
}
