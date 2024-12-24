<?php
    session_start();
    if (!isset($_SESSION['studentName']) || !isset($_SESSION['studentEmail']) || !isset($_SESSION['studentPassword']) || !isset($_SESSION['studentPhone'])) {
        header('location: login.php');
    }