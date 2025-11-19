<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><a href="index.php"><h1>BLOG</h1></a></header>
    <section id="logowanie">
        <div id="menu">
    <h2>LOGOWANIE</h2>
    <form method="POST">
        <label for="login">login:</label>
            <input type="text" name="login">
            <br>
            <br>
        <label for="haslo">haslo:</label>
            <input type="password" name="login">
            <br>
            <br>
        <button type="submit">zaloguj</button>
    </form>
    <?php
    $sql = "SELECT * FROM blog.user";
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    while($user = $wynik->fetch_assoc()) {
    $haslo =  $user['haslo'];
    $login = $user['login'];
    $hashhaslo = password_hash($haslo, PASSWORD_BCRYPT);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $w_password = $_POST['haslo'];
    $w_login = $_POST['login'];
    if (password_verify($w_login , $hashhaslo)) {
        header('Location: panel.php');
            exit();
    }else {
        header('Location: blad.html');
            exit();
    }

    }
    }
    ?>
    </div>
    </section>
</body>
</html>