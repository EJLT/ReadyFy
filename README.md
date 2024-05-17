### PARTE HECHA CON INTELLIJ
Crear una carpeta PHP

### config
### db_config.php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


### css
### style.css
A/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    color: #343a40;
    margin-top: 20px;
}

/* Navigation Styles */
nav {
    margin: 20px 0;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
    padding: 10px 20px;
    border: 2px solid #007bff;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

nav ul li a:hover {
    background-color: #007bff;
    color: white;
}

/* Table Styles */
table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 2px 3px rgba(0,0,0,0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #007bff;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}

/* Utility Styles */
.center {
    text-align: center;
}




### views
### books.php
<?php
include '../config/db_config.php';
$sql = "SELECT * FROM book";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<h1></h1>
<table>
    <tr>
        <th>ID</th>
        <th>Tittle</th>
        <th>Author</th>
        <th>Publication date</th>
        <th>ISBN</th>
        <th>Available</th>
        <th>Number of pages</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["author"]. "</td><td>" . $row["publishedDate"]. "</td><td>" . $row["ISBN"]. "</td><td>" . ($row["available"] ? 'Sí' : 'No'). "</td><td>" . $row["pageCount"]. "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No books available</td></tr>";
    }
    ?>
</table>
</body>
</html>
<?php
$conn->close();
?>


### users.php
<?php
include '../config/db_config.php';
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Users List</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
    <h1></h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>MemberShipDate</th>
            <th>Active</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["membershipDate"]. "</td><td>" . ($row["active"] ? 'Sí' : 'No'). "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>There aren´t no registered users</td></tr>";
        }
        ?>
    </table>
    </body>
    </html>
<?php
$conn->close();
?>
<?php


### index.php

<!DOCTYPE html>
<html>
<head>
    <title>Start</title>
    <link rel="stylesheet" type="text/css" href= "../php/css/styles.css">
</head>
<body>
<h1>Welcome to the ReadyFy library</h1>
<nav>
    <ul>
        <li><a href="../php/views/users.php">Users List</a></li>
        <li><a href="../php/views/books.php">Books List</a></li>
    </ul>
</nav>
</body>
</html>
