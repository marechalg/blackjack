<?php

require_once '../../model/User.php';
session_start();
session_unset();
session_destroy();
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild West Saloon</title>

    <link rel="stylesheet" href="/view/style/styles.css">
</head>

<body class="login">
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">Invalid username or password!</p>
    <?php endif; ?>
    <main class="centered">
        <h1>Enter the saloon</h1>
        <h2>Enter Your Credentials</h2>
        <form action="/controller/login.php" method="POST">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="submit" value="Enter">
        </form>
    </main>
</body>

</html>