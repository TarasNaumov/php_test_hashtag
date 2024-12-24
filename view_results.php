<?php require_once "functional/viewResultFunctional.php"; ?>
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
    <title>User all results</title>
</head>
<body>
<header>
    <a href="profile.php" class="profileLink">Profile</a>
</header>
<main>
    <div class="wrapper">
        <div class="allResults">
            <?php if (isset($_GET)) { ?>
                <p class="allResultsTitle">Всі результати користувача з поштою: <?= $_GET['user'] ?></p>
                <table>
                    <tr>
                        <th>Бали</th>
                        <th>Бали в відсотказ</th>
                        <th>Дата</th>
                    </tr>
                    <?php foreach ($userData as $user) { ?>
                        <tr class="<?= ($user[1] == $maxResult)? 'maxResult' : '' ?>">
                            <td><?= $user[0] ?> з 5</td>
                            <td><?= $user[1] ?>% з 100%</td>
                            <td><?= $user[2] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</main>
</body>
</html>