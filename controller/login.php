<?php

require_once './pdo.php';
require_once '../model/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginSTMT = $pdo->prepare(file_get_contents('../db/queries/login.sql'));
    $loginSTMT->execute(['username' => $username, 'password' => $password]);
    $id = $loginSTMT->fetchColumn();

    if ($id) {
        session_regenerate_id(true);
        $_SESSION['id'] = $id;
        header('Location: ../view/page/index.php');
        exit();
    } else {
        header('Location: ../view/page/login.php?error=1');
        exit();
    }
}

?>