<?php
    require_once '../../controller/auth.php';
    require_once '../../controller/pdo.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild West Saloon</title>

    <link rel="stylesheet" href="/view/styles/styles.css">
</head>

<body class="index">
    <main class="centered">
        <h1>BlackJack</h1>
        <h2>Wild West Saloon</h2>
        <ul>
            <li><button>Play</button></li>
            <li><button>How to play</button></li>
            <li><button>Carreer</button></li>
            <li><button>Statistics</button></li>
            <li><button>Settings</button></li>
        </ul>
        <article>
            <?php
                $balanceSTMT = $pdo->prepare(file_get_contents('../../db/queries/balanceFromUser.sql'));
                $balanceSTMT->execute(['id' => $_SESSION['id']]);
                $balance = $balanceSTMT->fetchColumn();
            ?>
            <p>Balance :</p><p class="franc"><?php echo $balance; ?> ₣</p>
        </article>
    </main>

    <script src="/view/scripts/scripts.js"></script>
</body>

</html>