<?php
// Verificar que se haya pasado el parámetro de horas al script
if ($argc < 2) {
    die("Uso: php validateActiveSessions.php <horas>\n");
}

// get parameter inserted by user
$hours_limit = (int) $argv[1];
$conn = mysqli_connect('localhost:3306', 'root', '', 'workshop3');


// sql for get all users with status active and last login 
$sql = "SELECT id, last_login_datetime FROM users WHERE status = 'active'";
$result = $conn->query($sql);

// check if there's a results 
if ($result->num_rows > 0) {
    $users_inactive = []; // save's id of users who's need to change status to inactive 

    // check users and verify if they exceed the limit of hours 
    while ($row = $result->fetch_assoc()) {
        $last_login = strtotime($row['last_login_datetime']);
        $hours_elapsed = (time() - $last_login) / 3600;

        if ($hours_elapsed > $hours_limit) {
            $users_inactive[] = $row['id'];
        }
    }

    // Si hay usuarios que deben ser inactivados, ejecutar la actualización
    if (!empty($users_inactive)) {
        $ids_inactive= implode(',', $users_inactive);
        $update_sql = "UPDATE users SET status = 'inactive' WHERE id IN ($ids_inactive)";

        if ($conn->query($update_sql) === TRUE) {
            echo "Usuarios marcados como 'inactive': " . count($users_inactive) . "\n";
        } else {
            echo "Error al actualizar usuarios: " . $conn->error . "\n";
        }
    } else {    
        echo "No hay usuarios que superen el límite de horas.\n";
    }
} else {
    echo "No se encontraron usuarios activos.\n";
}

// Cerrar la conexión
$conn->close();
?>
