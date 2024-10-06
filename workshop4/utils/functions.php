<?php

/**
 *  Gets the provinces from the database
 */
function getProvinces(): array {
  //select * from provinces
  return [1 => 'Alajuela', 2 => 'San Jose', 3 => 'Cartago', 80 => 'Heredia', 90 => 'Limon', 100 => 'Puntarenas', 200 => 'Guanacaste'];
}

function getConnection(): bool|mysqli {
  $connection = mysqli_connect('localhost:3306', 'root', '', 'workshop3');
  return $connection;
}

/**
 * Saves an specific user into the database
 */
function saveUser($user): bool{

  $firstname = $user['firstname'];
  $lastname = $user['lastname'];
  $username = $user['username'];
  $province_id = $user['province_id'];
  $password = md5($user['password']);
  $role_id = 2; 
  $sql = "INSERT INTO users (firstname, lastname, username, province_id, password, role_id) VALUES('$firstname', '$lastname', '$username', '$province_id', '$password', '$role_id')";

  try {
    $conn = getConnection();
    mysqli_query($conn, $sql);
  } catch (Exception $e) {
    echo $e->getMessage();
    return false;
  }
  return true;
}

/**
 * Get one specific student from the database
 *
 * @id Id of the student
 */
function authenticate($username, $password): bool|array|null{
  $conn = getConnection();
  $password = md5($password);
  $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
    
  }
  $results = $result->fetch_array();
  
  if ($results) {
    // Check ID for admin or standart user
    if ($results['role_id'] == 1) {
        $results['role'] = 'admin'; // Asign admin rol
    } else {
        $results['role'] = 'standard'; // Asign standart rol
    }
    $conn->close();
    return $results; // Return with roles added
}

return null; // If there's no user
}