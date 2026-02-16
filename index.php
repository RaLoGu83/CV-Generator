<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Generator</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="formContent">
        <h3>CV Generator</h3>
        <p>Complete the form to generate your CV</p>

        <form action="app.php" method="POST">

            <h4>Personal Information</h4>
            <input class="formControl" type="text" name="name" placeholder="Full Name" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" required minlength="2" maxlength="30">
            <input class="formControl" type="email" name="email" placeholder="Email Address" required maxlength="30">
            <input class="formControl" type="text" name="pNum" placeholder="Phone Number" pattern="^\+?[0-9\s\-]{7,15}$" required maxlength="30">
            <input class="formControl" type="text" name="location" placeholder="City, Country" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" required maxlength="30">

            <h4>Work Experience</h4>
            <input class="formControl" type="text" name="job" placeholder="Job Title" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" required maxlength="80">
            <input class="formControl" type="text" name="comName" placeholder="Company Name" required maxlength="30">
            <textarea class="formControl" rows="4" name="description" placeholder="Job Description" required maxlength="300"></textarea>

            <h4>Education</h4>
            <input class="formControl" type="text" name="degree" placeholder="Degree" required maxlength="30">
            <input class="formControl" type="text" name="institution" placeholder="Institution" required maxlength="30">
            <input class="formControl" type="text" name="completionYear" min="1900" max="2099"  placeholder="Year of Completion" required maxlength="30">

            <h4>Skills</h4>
            <textarea class="formControl" rows="3" name="skills" placeholder="List your skills" required maxlength="300"></textarea>

            <h4>Languages</h4>
            <input class="formControl" type="text" name="language" placeholder="Language - Level" required maxlength="60">

            <button type="submit" class="btnGenerate">Generate CV</button>
            <button type="reset" class="btnClear">Clear</button>
            <a href="table.php" class="btnList">View created CVs</a>

        </form>
    </div>

</body>

</html>