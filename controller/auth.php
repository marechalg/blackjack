<?php

require_once 'pdo.php';

session_start();

if (isset($_SESSION['id'])) {
    $authSTMT = $pdo->prepare(file_get_contents('../../db/queries/auth.sql'));
    $authSTMT->execute(['id' => $_SESSION['id']]);
    $exists = $authSTMT->fetchColumn();
    if (!$exists) {
        header('Location: ./login.php?error=2');
        exit();
    }
} else {
    header('Location: ./login.php?error=2');
    exit();
}

?>