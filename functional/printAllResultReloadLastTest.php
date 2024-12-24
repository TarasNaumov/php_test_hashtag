<?php require_once 'functions.php'; ?>

<?php
if (file_exists("csv/" . explode("@", $_SESSION['studentEmail'])[0] . ".csv")) {

$userResults = readCvs("csv/" . explode("@", $_SESSION['studentEmail'])[0] . ".csv");
    // знаходим максимальний бал
    $allResponseRate = [];
    foreach ($userResults as $result) {
        $allResponseRate[] = $result[1];
    }
    $maxResponseRate = (int) max($allResponseRate);
//    var_dump($maxResponseRate);
//    die;
}
?>


