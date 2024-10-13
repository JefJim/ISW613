<?php
function updateUser($user): bool {
    // Verify checkbox
    if (!isset($user['checkbox']) || $user['checkbox'] !== 'on') {
        // If checkbox not on, changes nothing
        return false;
    }
    // If checkbox on, changes the values on that row
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $username = $user['username'];
    $province_id = $user['province_id'];
    $password = md5($user['password']);
    $user_id = $user['id'];

    $sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', username = '$username', province_id = '$province_id', password = '$password' WHERE id = '$user_id'";

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
