<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration For Student Test</title>
    <link rel="shortcut icon" href="img/favicon.webp" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a href="login.php" class="loginLink">Login</a>
    </header>
    <main class="registratonMain">
        <div class="formWrapper">
            <form action="login.php" method="post">
                <h2>Registration</h2>
                <p>
                    <label for="studentName">Your name</label>
                    <input type="text" name="studentName" id="studentName" value="<?= $_POST['studentName'] ?? ""?>">
                </p>
                <p>
                    <label for="studentEmail">Email</label>
                    <input type="text" name="studentEmail" id="studentEmail" value="<?= $_POST['studentEmail'] ?? ""?>">
                </p>
                <p>
                    <label for="studentPhone">Phone</label>
                    <input type="text" name="studentPhone" id="studentPhone" value="<?= $_POST['studentPhone'] ?? ""?>">
                </p>
                <p>
                    <label for="studentPassword">Password</label>
                    <span>
                        <input type="password" name="studentPassword" id="studentPassword">
                        <input type="checkbox" class="passwordChanger visiblePassword">
                    </span>
                </p>
                <?= $_SESSION['regError'] ?? "" ?>
                <button type="submit" class="checkFormSubmit">registration</button>
            </form>
        </div>
    </main>
    <script src="script.js"></script>
</body>

</html>