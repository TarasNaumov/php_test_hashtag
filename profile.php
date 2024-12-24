<?php require "functional/isLogin.php" ?>
<?php require_once "functional/checkLogin.php" ?>
<?php require_once "functional/changeAvatar.php" ?>
<?php require "functional/printAllResultReloadLastTest.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.webp" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <title>Test Profile</title>
</head>
<body>
<div class="profileWrapper">
    <div class="acountSetings">
        <p class="setingsTitle">Setings</p>
        <div class="userAvatar">
            <a href="avatar.php"><img src="img/<?= $_SESSION['avatar'] ?>"></a>
        </div>
        <div class="userData">
            <p class="userName"><?= $_SESSION['studentName']; ?></p>
            <p class="userEmail"><?= $_SESSION['studentEmail']; ?></p>
            <p class="userPhone"><?= $_SESSION['studentPhone']; ?></p>
        </div>
        <form action="unLogin.php" method="post">
            <input type="submit" class="logout" value="logout">
        </form>
    </div>
    <?php if ($_SESSION['studentEmail'] != "admin@gmail.com") { ?>
        <div class="allResults">
            <?php if (file_exists("csv/" . explode("@", $_SESSION['studentEmail'])[0] . ".csv")) { ?>
                <p class="resultTitle">all result</p>
                <table>
                    <tr>
                        <th>score</th>
                        <th>response rate</th>
                        <th>date</th>
                    </tr>
                    <?php foreach ($userResults as $result) { ?>
                        <tr <?= ($maxResponseRate == $result[1]) ? "class='maxResult'" : "" ?>>
                            <td><?= $result[0] ?> з 5</td>
                            <td><?= $result[1] ?>% з 100%</td>
                            <td><?= $result[2] ?></td>
                        </tr>
                        <?php $_SESSION['lastResult'] = $result ?>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <div class="emtyResult">
                    <p>take the test to see the results</p>
                </div>
            <?php } ?>
        </div>

        <div class="lastTestAndLink">
            <div class="lastTest">
                <?php if (file_exists("csv/" . explode("@", $_SESSION['studentEmail'])[0] . ".csv")) { ?>
                <p>Last Test</p>
                    <table>
                        <tr>
                            <td>Score</td>
                            <td><?= $_SESSION['lastResult'][1] ?? "0" ?> з 5</td>
                        </tr>
                        <tr>
                            <td>score in percentage</td>
                            <td><?= $_SESSION['lastResult'][2] ?? "0" ?>% з 100%</td>
                        </tr>
                        <tr>
                            <td>date</td>
                            <td><?= $_SESSION['lastResult'][3] ?? "" ?></td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <p>take the test to see the last results</p>
                <?php } ?>
            </div>
            <div class="goToTest">
                <a href="index.php">go to the test</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="allUsers">
            <p class="allUsersTitle">All users</p>
            <table>
                <thead>
                <tr>
                    <th>Аватарка</th>
                    <th>Ім'я</th>
                    <th>Email</th>
                    <th>Результати</th>
                </tr>
                </thead>
                <?php $allUser = readCvs("csv/userData.csv"); ?>
                <?php foreach ($allUser as $user) { ?>
                    <?php if ($user[1] != "admin@gmail.com") { ?>
                        <tr>
                            <td><img src='img/<?= $user[4] ?? "profile.jpg" ?>'></td>
                            <td><?= $user[0] ?></td>
                            <td><?= $user[1] ?></td>
                            <td>
                                <form method="get" action="view_results.php">
                                    <button type="submit" name="user" value="<?= $user[1] ?>">Переглянути</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
</div>
</body>
</html>