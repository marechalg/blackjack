<?php require_once '../../controller/sessionReset.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild West Saloon</title>

    <link rel="stylesheet" href="/view/style/styles.css">
</head>

<body class="login">
    <main class="centered">
        <h1>Enter the saloon</h1>
        <h2>Enter Your Credentials</h2>

        <form action="/controller/login.php" method="POST">
            <a href="./register.php">Don't have an account yet ? Register to the Saloon</a>
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
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
            <input type="submit" value="Enter">
        </form>
    </main>
</body>

</html>