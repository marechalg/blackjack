<?php

require_once '../../model/User.php';
session_start();

if (!isset($_SESSION['user']) || !($_SESSION['user'] instanceof User)) {
    header('Location: ./login.php');
    exit();
}

?>