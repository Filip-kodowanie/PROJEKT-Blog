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
    <header><h1>BLOG</h1></header>
    <section id="logowanie">
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
    </section>
</body>
</html>