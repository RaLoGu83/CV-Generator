<?php
$conn = new mysqli("localhost", "root", "", "cv_generator");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_GET['id'] ?? null;
$cv = null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM cvs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cv = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
include "index.php";
?>