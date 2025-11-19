<?php

require_once './pdo.php';
require_once '../model/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database
    $stmt = $pdo->prepare("SELECT password FROM blackjack._user WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $hashedPassword = $stmt->fetchColumn();

    // Verify the password using password_verify()
    if ($hashedPassword && password_verify($password, $hashedPassword)) {
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