<?php
include 'config/db_config.php';
$sql = "SELECT * FROM book";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Libros</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Lista de Libros</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Fecha de Publicación</th>
        <th>ISBN</th>
        <th>Disponible</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["author"]. "</td><td>" . $row["publishedDate"]. "</td><td>" . $row["ISBN"]. "</td><td>" . ($row["available"] ? 'Sí' : 'No'). "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay libros disponibles</td></tr>";
    }
    ?>
</table>
</body>
</html>
<?php
$conn->close();
?>
