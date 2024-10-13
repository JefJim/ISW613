<?php
require('../utils/functions.php');

if ($_POST) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    // Llamada a la función de autenticación
    $user = authenticate($username, $password);

    if ($user) {
        session_start();

        $_SESSION['user'] = $user; // Almacena los datos del usuario en la sesión
        //saved id when one user start session
        $user_id = $user['id'];
        //get date and hour current in the server
        $currentTimestamp = date('Y-m-d H:i:s');
        //sql to update last_login column

        $sql = "UPDATE users SET last_login_datetime = ? WHERE id = ?";
        $conn = getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $currentTimestamp, $user_id);
        if ($stmt->execute()) {
            echo "Fecha de último inicio de sesión actualizada correctamente.";
        } else {    
            echo "Error al actualizar: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
        // Verifica el rol del usuario
        if ($user['role'] == 'admin') {
            header('Location: /admin.php'); // Redirige a la página de administrador
        } else {
            header('Location: /users.php'); // Redirige a la página de usuario estándar
        }
    } else {
        header('Location: /index.php?error=login'); // Redirige en caso de error en el login
    }
}
?>





