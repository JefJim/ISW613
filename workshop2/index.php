<?php
//Connection to BD
$conn = new mysqli('localhost', 'root', '', 'workshop2');
//Verify connection
if ($conn->connect_error){
    die("Connection Failed: ". $conn->connect_error);
}
//Get data from form

$name = mysqli_real_escape_string($conn, $_POST['name']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

//insert data
$sql= "INSERT INTO cliente (Nombre, Apellido, Telefono, Correo) values ($name,$lastname,$telephone, $email)";

if ($conn->query($sql) === TRUE){
    echo "Data inserted correctly";

}
else{
    echo "Error: ". $sql. "<br>". $conn->error;
}
//Close connection
$conn->close();
?>