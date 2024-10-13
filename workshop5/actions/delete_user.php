<?php 
include('../utils/functions.php');
function deleteUser($user_id): bool {
    $sql = "DELETE FROM users WHERE id = '$user_id'";
    
    try {
        $conn = getConnection();
        mysqli_query($conn, $sql);
        $conn->close();
        $_SESSION['success_message'] = "¡El cambio se realizó exitosamente!";
        header('Location: /admin.php'); 
        exit();    
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    return true;
}

?>