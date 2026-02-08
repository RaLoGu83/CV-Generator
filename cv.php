<?php
// Conexión bbdd
$conn = new mysqli("localhost", "root", "", "cv_generator");

// Comprobación errores
if ($conn->connect_error) {
    die("Fallo en la conexión debido a: " . $conn->connect_error);
}

// Coger la ID desde la URL que se mandó a la cabecera
$id = $_GET['id'] ?? 0; // Si no existe se pone 0 para evitar errores

// Consulta preparada que busca un solo registro
$sql = "SELECT * FROM cvs WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // "i" es int
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc(); // Fetch_assoc() convierte el resultado en ['dato']

$stmt->close();
$conn->close();

// Si no hay CV se cierra
if (!$data) {
    die("Error CV not found");
}
?>

<!-- Estructura HTML para mostrar el CV con el mismo styles.css-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Your Curriculum Vitae</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="formContent">

        <h2><?= htmlspecialchars($data['name']) ?></h2>

        <p>
            <?= htmlspecialchars($data['email']) ?> |
            <?= htmlspecialchars($data['phone']) ?> |
            <?= htmlspecialchars($data['location']) ?>
        </p>

        <h3>Work Experience</h3>
        <b>
            <?= htmlspecialchars($data['job']) ?> -
            <?= htmlspecialchars($data['company']) ?>
        </b>
        <!-- nl2br respeta los saltos de línea (Línea <br> línea...) -->
        <p><?= nl2br(htmlspecialchars($data['description'])) ?></p>


        <h3>Education</h3>
        <p>
            <?= htmlspecialchars($data['degree']) ?> -
            <?= htmlspecialchars($data['institution']) ?>
            (<?= htmlspecialchars($data['year']) ?>)
        </p>


        <h3>Skills</h3>
        <p><?= nl2br(htmlspecialchars($data['skills'])) ?></p>


        <h3>Languages</h3>
        <p><?= htmlspecialchars($data['language']) ?></p>


        <a href="index.php" class="btnList">Create a new CV</a>

        <a href="table.php" class="btnList">View created CVs</a>

        <button onclick="downloadPDF()" class="btnPDF">Descargar PDF</button>

    </div>
    <script>
        function downloadPDF() {
            window.print();
        }
    </script>

</body>

</html>