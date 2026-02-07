<?php
$conn = new mysqli("localhost", "root", "", "cv_generator");

if ($conn->connect_error) {
    die("Error conexión");
}

$result = $conn->query("SELECT id, name, created_at FROM cvs ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Saved CVs</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<div class="formContent">

    <h3>Saved CVs</h3>
    <p>Manage your generated CVs</p>

    <table class="cvTable">
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                    <a href="cv.php?id=<?= $row['id'] ?>" class="btnView">View</a>
                    <a href="index.php?edit=<?= $row['id'] ?>" class="btnEdit">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btnDelete"
                       onclick="return confirm('Delete this CV?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="index.php" class="btnBack">Create new CV</a>

</div>

</body>
</html>

<?php $conn->close(); ?>
