<?php
session_start();
session_destroy();
//unset($_SESSION['studentName']);
header("Location: login.php");
?>