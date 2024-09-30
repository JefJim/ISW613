<?php
// Connect to BD
$conn = new mysqli("localhost", "root", "", "workshop3");

// GET users
$result = $conn->query("SELECT users.id, users.firstname, users.lastname, users.email, provinces.name AS province FROM users JOIN provinces ON users.province_id = provinces.id");
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Provincia</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['province']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
