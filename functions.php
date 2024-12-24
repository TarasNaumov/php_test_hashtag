<?php

// Повернення даних з csv
function readCvs($fileName, $mode = "a+")
{
    $userData = [];
    $stream = fopen($fileName, $mode);
    while (($row = fgetcsv($stream)) !== false) {
        $userData[] = $row;
    }
    fclose($stream);
    return $userData;
}

// Добавляє нову інформацію в csv
function writeCvs($fileName, $data, $mode = "a+")
{
    $cvsFile = fopen($fileName, $mode);
    fputcsv($cvsFile, $data);
    fclose($cvsFile);
    $result = true;
}

// Перевіряє регестрацію якщо некоректна тоді повертає помилку
function checkRegistration()
{
    if (isset($_POST['studentName'])) {
        try {
            $studentName = strip_tags(trim($_POST['studentName']));
            $studentEmail = strip_tags(trim($_POST['studentEmail']));
            $studentPhone = strip_tags(trim($_POST['studentPhone']));
            $studentPassword = $_POST['studentPassword'];

            $usersData = readCvs("csv/userData.csv");
            $usersEmail = [];
            foreach ($usersData as $user) {
                $usersEmail[] = $user[1];
            }

            if (!in_array($studentEmail, $usersEmail)) {

                if ($studentName != "" && $studentEmail != "" && $studentPassword != "" && $studentPhone != "") {
                    if (preg_match("#^[a-zA-Z][a-zA-Z0-9._%+-]*[a-zA-Z0-9]@[a-zA-Z0-9-]*[a-zA-Z0-9](\.[a-zA-Z]{2,}){1,2}$#", $studentEmail)) {
                        if (preg_match("#^\+[0-9]{1,4}[ -]?(( [0-9]{1,3} )|\([0-9]{1,3}\)|[0-9]{1,3})[ -]?([0-9][ -]?){6}[0-9]$#", $studentPhone)) {
                            if (strlen($studentPassword) >= 6 && strlen($studentPassword) <= 30) {
                                $studentPassword = password_hash($studentPassword, PASSWORD_BCRYPT, ["cost" => 12]);
                                $_SESSION['studentName'] = $studentName;
                                $_SESSION['studentEmail'] = $studentEmail;
                                $_SESSION['studentPhone'] = $studentPhone;
                                $_SESSION['studentPassword'] = $studentPassword;
                                writeCvs("csv/userData.csv", [$studentName, $studentEmail, $studentPassword, $studentPhone]);
                                // header("Location: login.php");
                            } else {
                                throw new Exception("Your password must be between 6 and 30 characters long.");
                            }
                        } else {
                            throw new Exception("Invalid phone format. Please enter a valid email address.");
                        }
                    } else {
                        throw new Exception("Invalid email format. Please enter a valid email address.");
                    }
                } else {
                    throw new Exception("You must enter data in all fields.");
                }
            } else {
                throw new Exception("This email is already being used for another account.");
            }
        } catch (Exception $e) {
            $e = $e->getMessage();
            return $e;
        } finally {
            if (isset($e)) {
                header("Location: register.php");
            }
        }
    }
}

// Перевіряє логін якщо некоректний тоді повертає помилку
function checkLogin()
{
    if (isset($_POST['studentEmailLog'])) {

        $studentEmail = strip_tags(trim($_POST['studentEmailLog']));
        $usersData = readCvs("csv/userData.csv");
        try {
            foreach ($usersData as $user) {
                if ($user[1] == $studentEmail && password_verify($_POST['studentPassword'], $user[2])) {
                    $_SESSION['studentName'] = $user[0];
                    $_SESSION['studentEmail'] = $user[1];
                    $_SESSION['studentPassword'] = $user[2];
                    $_SESSION['studentPhone'] = $user[3];
                    $_SESSION['login'] = true;
                }
            }
            if (!$_SESSION['login']) {
                throw new Exception("Password and email do not match the registered data");
            }

        } catch (Exception $e) {
            $e = $e->getMessage();
            $_SESSION['login'] = false;
            return $e;
        } finally {
            if (isset($e)) {
                header("Location: login.php");
            }
        }
    }
}

// Добавляє аватарку в profile
function addAvatar()
{
    if (isset($_FILES['avatar'])) {
        if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $fileName = explode("@", $_SESSION['studentEmail'])[0] . "." . explode("/", $_FILES["avatar"]["type"])[1];
            $destinationPath = 'img/' . $fileName;
            $_SESSION['avatar'] = $fileName;

            $fileContent = $_FILES['avatar']['tmp_name'];
            if ($fileContent != false) {
                if (move_uploaded_file($fileContent, $destinationPath)) {
                    $file = "csv/userData.csv";
                    $userData = readCvs($file);
                    foreach ($userData as $userId => $user) {
                        if ($user[0] == $_SESSION['studentName'] && $user[1] == $_SESSION['studentEmail']) {
                            $user[4] = $_SESSION['avatar'];
                            $userData[$userId] = $user;
                        }
                    }

                    if (($stream = fopen($file, 'w+')) !== false) {
                        foreach ($userData as $user) {
                            fputcsv($stream, $user);
                        }
                        fclose($stream);
                    }
                }
            } else {
                header("Location: avatar.php");
            }
        }
    }
}

// Перевіряє чи є аватарка в користувача при запуску profile
function checkAvatar()
{
    $userData = readCvs("csv/userData.csv");
    foreach ($userData as $userId => $user) {
        if ($user[0] == $_SESSION['studentName'] && $user[1] == $_SESSION['studentEmail']) {
            return $user[4] ?? "profile.jpg";
        }
    }
}

// Створює новий файл з назваю імені користувача куди записується: ім'я, результат, результат в відсотках, дата
function addResultInUserFile()
{
    require 'questions.php';
    $_SESSION['score'] = 0;
    $max_score = 5;
    $maxBal = 5;

    if (isset($_POST['answers'])) {
        foreach ($_POST['answers'] as $index => $answer) {
            $questionIndex = str_replace('question_', '', $index);
            if ($quiz[$questionIndex]['correct_answer'] == $answer) {
                $_SESSION['score']++;
            }
        }
        $_SESSION['response_rate'] = ($_SESSION['score'] / $max_score) * 100;
    }

//    $stream = fopen("csv/" . $_SESSION['studentName'] . ".csv", "a");
//    fputcsv($stream, [$_SESSION['studentName'], $_SESSION['score'], $_SESSION['response_rate'], $_SESSION['date']]);
//    fclose($stream);
    writeCvs("csv/". explode("@", $_SESSION['studentEmail'])[0] . ".csv", [$_SESSION['score'], $_SESSION['response_rate'], $_SESSION['date']]);
}
