<?php

require_once 'pdo.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginSTMT = $pdo->prepare(file_get_contents('../db/queries/login.sql'));
    $loginSTMT->execute(['username' => $_POST['username']]);
    $user = $loginSTMT->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['id'] = $user['id'];
        header('Location: ../view/page/index.php');
        exit();
    } else {
        header('Location: ../view/page/login.php?error=1');
        exit();
    }
}

?>