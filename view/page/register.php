<?php require_once '../../controller/sessionReset.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild West Saloon</title>

    <link rel="stylesheet" href="/view/styles/styles.css">
</head>

<body class="login">
    <main class="centered">
        <h1>Welcome to the saloon</h1>
        <h2>Enter Your Credentials</h2>

        <form action="/controller/register.php" method="POST">
            <a href="./login.php">Got a tab here ? Swing on through the batwing doors</a>
            <input type="text" name="username" id="enlist-usr" placeholder="Username">
            <label for="username" id="enlist-usr-error"></label>
            <input type="text" name="displayName" id="enlist-nick" placeholder="Display name">
            <div>
                <input type="password" name="password" id="enlist-pass" placeholder="Password">
                <img src="/view/images/hidePassword.png" alt="Show Password" id="toggle-password" title="Show password">
            </div>
            <?php
                if (isset($_GET['error'])) {
                    echo "<p title='If you think this is an error contact the developer'>Unknwon error</p>";
                }
            ?>
            <input type="submit" value="Enlist" id="enlist-button" disabled>
        </form>
    </main>

    <script src="/view/scripts/scripts.js"></script>
</body>

</html>