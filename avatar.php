<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.webp" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <title>change avatar in test</title>
</head>
<body>
<header>
    <a href="register.php" class="registrationLink">Registration</a>
    <a href="register.php" class="loginLink">Login</a>
    <a href="register.php" class="profileLink">Profile</a>
</header>
<main>
    <div class="formWrapper">
        <form action="profile.php" method="post" enctype="multipart/form-data" class="avatarForm">
            <h2 class="avatarTitle">Сhoose a picture for your avatar</h2>
            <input type="file" name="avatar">
            <button type="submit">Зберегти</button>
        </form>
    </div>
</main>
</body>
</html>