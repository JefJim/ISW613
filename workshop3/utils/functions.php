<?php

/**
 *  Gets the provinces from the database
 */
function getProvinces() {
  //select * from provinces
  return [1 => 'Alajuela', 2 => 'San Jose', 3 => 'Cartago', 80 => 'Heredia', 90 => 'Limon', 100 => 'Puntarenas', 200 => 'Guanacaste'];
}

function getConnection() {
  $connection = mysqli_connect('localhost:3306', 'root', '', 'workshop3');
  return $connection;
}

/**
 * Saves an specific user into the database
 */
function saveUser($user){
$connection = getConnection();
// Insert data in table users
$firstname = $_REQUEST['firstName'];
$lastname = $_REQUEST['lastName'];
$email = $_REQUEST['email'];
$province_id = $_REQUEST['province'];
$password = $_REQUEST['password'];
$stmt = $connection->prepare("INSERT INTO users (firstname, lastname, email, province_id, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssis", $firstname, $lastname, $email, $province_id, $password);

if ($stmt->execute()) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$connection->close();
}

?>