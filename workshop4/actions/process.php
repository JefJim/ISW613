<?php
include('index.php');
include('update_user.php');
include('delete_user.php');
session_start();

if ($_POST) {
    $hasChanges = false;
    
        if (isset($_POST['delete'])) {
        foreach ($_POST['users'] as $user) {
            if (isset($user['checkbox']) && $user['checkbox'] == 'on') {
                deleteUser($user['id']);
                }
            }   
        }
        elseif (isset($_POST['update'])) {
        foreach ($_POST['users'] as $user) {
            if (isset($user['checkbox']) && $user['checkbox'] == 'on') {
                updateUser($user);
                }
            }
        }
        elseif (isset($_POST['exit'])) {
            session_start();
            session_destroy();
            header('Location: /index.php');
            exit();
            }
     
    if ($hasChanges) {
        $_SESSION['success_message'] = "¡El cambio se realizó exitosamente!";   
    } else {
        $_SESSION['warning_message'] = "El checkbox no está activado, no se generará ningún cambio.";
    }
    header( "Location: /admin.php");
    exit();
} 



?>


