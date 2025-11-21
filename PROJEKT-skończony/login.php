<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

/* Tło */
body {
    background: #f4f4f9;
    color: #333;
    height: 100vh;
}

/* Nagłówek */
header {
    width: 100%;
    background: #222;
    color: white;
    padding: 20px 40px;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.4);
}

header a {
    text-decoration: none;
    color: white;
}

header h1 {
    font-size: 32px;
    letter-spacing: 2px;
    transition: 0.3s;
}

header h1:hover {
    opacity: 0.7;
}

/* Sekcja logowania */
#logowanie {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 60px;
}

/* Boks logowania */
#menu {
    background: white;
    padding: 30px 40px;
    border-radius: 10px;
    width: 350px;
    box-shadow: 0 0 12px rgba(0,0,0,0.15);
    text-align: center;
}

#menu h2 {
    margin-bottom: 25px;
}

/* Form */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    width: 100%;
    text-align: left;
    font-size: 15px;
    margin-bottom: 6px;
}

input {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #bbb;
    outline: none;
    transition: 0.2s;
}

input:focus {
    border-color: #0077ff;
    box-shadow: 0 0 4px rgba(0,120,255,0.3);
}

/* Przycisk */
button {
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background: #0077ff;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #005ccc;
}

/* Responsywność */
@media(max-width: 500px) {
    #menu {
        width: 90%;
        padding: 25px;
    }
}
</style>
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
        header('Location: logowanie.php');
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