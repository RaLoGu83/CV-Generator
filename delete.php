<?php
$conn = new mysqli("localhost", "root", "", "cv_generator");

if ($conn->connect_error) {
    die("Error conexión");
}

$id = $_GET['id'];

// Consulta para eliminar el CV por el id
$stmt = $conn->prepare("DELETE FROM cvs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.php");
exit();
?>
