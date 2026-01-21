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
        <h1>Enter the saloon</h1>
        <h2>Enter Your Credentials</h2>

        <form action="/controller/login.php" method="POST">
            <a href="./register.php">Ain't got a tab yet ? Enlist at the bar</a>
            <input type="text" name="username" id="enter-usr" placeholder="Username">
            <input type="password" name="password" id="enter-pass" placeholder="Password">
            <?php
                if (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case '1':
                            echo "<p title='The username or password is incorrect'>Invalid credentials</p>";
                            break;
                        case '2':
                            echo "<p title='Try signing in'>Session expired</p>";
                            break;
                        default:
                            echo "<p title='If you think this is an error please contact the developer'>Unknown error</p>";
                            break;
                    }
                }
            ?>
            <input type="submit" value="Enter" id="button-enter" disabled>
        </form>
    </main>

    <script src="/view/scripts/scripts.js"></script>
</body>

</html>