<?php

require_once 'pdo.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $display_name = isset($_POST['display-name']) && trim($_POST['display-name']) != '' ? $_POST['display-name'] : $_POST['username'];

    $registerSTMT = $pdo->prepare(file_get_contents('../db/queries/register.sql'));
    $registerSTMT->execute(['username' => $_POST['username'], 'display_name' => $display_name, 'password' => password_hash($_POST['password'], PASSWORD_ARGON2ID)]);

    $verifSTMT = $pdo->prepare(file_get_contents('../db/queries/user_exists.sql'));
    $verifSTMT->execute(['username' => $_POST['username']]);
    $id = $verifSTMT->fetchColumn();

    if ($id) {
        session_regenerate_id(true);
        $_SESSION['id'] = $id;
        header('Location: ../view/page/index.php');
        exit();
    } else {
        header('Location: ../view/page/register.php?error=0');
        exit();
    }
}

?>