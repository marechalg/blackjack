<?php

require_once './pdo.php';
require_once '../model/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT count(*) FROM blackjack._user WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $valid = $stmt->fetchColumn();

    if ($valid) {
        session_regenerate_id(true);
        $_SESSION['user'] = new User($username);
        header('Location: ../view/page/index.php');
        exit();
    } else {
        header('Location: ../view/page/login.php?error=invalid_credentials');
        exit();
    }
}

?>