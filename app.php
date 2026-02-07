<!-- https://www.w3schools.com/php/php_mysql_prepared_statements.asp -->

<?php
// Servidor, usuario root por defecto y contraseña vacía y nombre de la bbdd
$conn = new mysqli("localhost", "root", "", "cv_generator"); // Crea la conexión a la bbdd
// Devuelve el objeto con la conexión a la bbdd para poder hacer query(), prepare(), close()...

// Comprueba la conexión para que no de errores
if ($conn->connect_error) {
    die("Fallo en la conexión debido a: " . $conn->connect_error); // Muestra el error y apaga el script de la conexión a la bbdd
}

// Se recogen los datos con htmlspecialchars para que los caracteres como <, >, ", ', &, 
// los recoga como &lt; &gt; &quot; &#039; &amp; respectivamente
// Con esto se evitan las inyecciones SQL y evita ejecutar scripts
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']); // No da problemas ya que ni el punto "." ni el arroba "@" cuentan como caracteres especiales
$pNum = htmlspecialchars($_POST['pNum']); // El mas "+" tampoco cuenta como caracter especial
$location = htmlspecialchars($_POST['location']);
$job = htmlspecialchars($_POST['job']);
$comName = htmlspecialchars($_POST['comName']);
$description = htmlspecialchars($_POST['description']);
$degree = htmlspecialchars($_POST['degree']);
$institution = htmlspecialchars($_POST['institution']);
$completionYear = htmlspecialchars($_POST['completionYear']);
$skills = htmlspecialchars($_POST['skills']);
$language = htmlspecialchars($_POST['language']);

// Se comprueba que tenga ID para saber si usar update para editar o insert para crear en la bbdd
$id = $_POST['id'] ?? null;

// plantilla de preparación de la consulta SQL
if ($id) {

    $sql = "UPDATE cvs SET
    name=?,email=?,phone=?,location=?,job=?,company=?,description=?,degree=?,institution=?,year=?,skills=?,language=?
    WHERE id=?";

    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param(
            "ssssssssssssi",
            $name,
            $email,
            $pNum,
            $location,
            $job,
            $comName,
            $description,
            $degree,
            $institution,
            $completionYear,
            $skills,
            $language,
            $id
        );

        $stmt->execute();
        $lastId = $id;
        $stmt->close();

    } else {
        echo "Error: " . $conn->error;
    }

} else {

    $sql = "INSERT INTO cvs
    (name,email,phone,location,job,company,description,degree,institution,year,skills,language)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"; // Las "?" reservan los huecos de los valores

    if ($stmt = $conn->prepare($sql)) {

        // 12 strings son 12 "s", si fueran int seria "i" y si fuera double seria "d"
        $stmt->bind_param(
            "ssssssssssss",
            $name,
            $email,
            $pNum,
            $location,
            $job,
            $comName,
            $description,
            $degree,
            $institution,
            $completionYear,
            $skills,
            $language
        );

        $stmt->execute();
        $lastId = $stmt->insert_id;
        $stmt->close();

    } else {
        echo "Error: " . $conn->error;
    }
}

// Una vez guardado los datos en la tabla, se cierra la conexión
$conn->close();

// El navegador redirige al usuario a otra página gracias al cambio de cabezera del html
header("Location: cv.php?id=" . $lastId); // Si la ID es 3, manda al usuario a http://localhost/CV_Generator/cv.php?id=3

// Por último se detiene el script
exit();
?>
