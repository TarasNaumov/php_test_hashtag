<?php
$stream = fopen("csv/" . explode("@", $_GET['user'])[0] .".csv", "r");
$results = [];

$userData = [];
while (($row = fgetcsv($stream)) !== false) {
    $userData[] = $row;
    $results[] = $row[1];
}
$maxResult = max($results);
?>