<?php session_start() ?>
<?php require "functional/addResultInUserFile.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <a href="profile.php" class="profileLink">Profile</a>
</header>
<main>
    <div class="resultWrapper">
        <div class="result">
            <table>
                <tr>
                    <td>Ваш бал:</td>
                    <td><?= $_SESSION['score'] ?> з 5</td>
                </tr>
                <tr>
                    <td>Ваш бал у відсотках:</td>
                    <td><?= $_SESSION['response_rate'] ?>% з 100%</td>
                </tr>
                <tr>
                    <td>Дата проходження:</td>
                    <td><?= $_SESSION['date'] ?></td>
                </tr>
            </table>
        </div>
    </div>
</main>
</body>
</html>