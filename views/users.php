<?php
include 'config/db_config.php';
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Lista de Usuarios</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <h1>Lista de Usuarios</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Membresía</th>
            <th>Activo</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["membershipDate"]. "</td><td>" . ($row["active"] ? 'Sí' : 'No'). "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay usuarios registrados</td></tr>";
        }
        ?>
    </table>
    </body>
    </html>
<?php
$conn->close();
?>
<?php