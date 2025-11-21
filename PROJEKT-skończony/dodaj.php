<?php 
require_once('config.php');
session_start();
if ($_SESSION['zalogowany'] !== 'true') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DODAWANIE</title>
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
    font-size: 30px;
    letter-spacing: 2px;
}

/* Sekcja formularza */
#logowanie {
    display: flex;
    justify-content: center;
    margin-top: 50px;
}

/* Kontener formularza */
#menu {
    width: 500px;
    background: white;
    padding: 35px 45px;
    border-radius: 10px;
    box-shadow: 0 0 12px rgba(0,0,0,0.15);
}

#menu h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
}

/* Formularz */
form {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

label {
    font-size: 15px;
    font-weight: bold;
}

/* Pola tekstowe */
input,
textarea {
    width: 100%;
    padding: 12px;
    border-radius: 6px;
    border: 1px solid #bbb;
    outline: none;
    font-size: 16px;
    transition: 0.25s;
}

/* Tekstarea dla treści */
textarea {
    min-height: 180px;
    resize: vertical;
}

input:focus,
textarea:focus {
    border-color: #0077ff;
    box-shadow: 0 0 5px rgba(0,120,255,0.3);
}

/* Guzik */
button {
    background: #0077ff;
    color: white;
    border: none;
    padding: 14px;
    font-size: 17px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 10px;
}

button:hover {
    background: #005ccc;
}

/* Responsywność */
@media (max-width: 550px) {
    #menu {
        width: 90%;
        padding: 25px;
    }

    header h1 {
        font-size: 26px;
    }
}
    </style>
</head>
<body>

    <header><a href="index.php"><h1>BLOG</h1></a></header>
    <section id="logowanie">
        <div id="menu">
    <h2>DODAWANIE</h2>
    <form method="POST">
        <label for="tytul">tytuł:</label>
            <input type="text" name="tytul">
            <br>
            <br>
        <label for="zawart">zawartość:</label>
             <textarea name="zawart"></textarea>
        <button type="submit">zatwierdź</button>
        <?php 
            if(isset($_POST['tytul']) && isset($_POST['zawart'])){
            $tytul = $_POST['tytul'];
            $zawart = $_POST['zawart'];
          
            
            //$sql2 = "UPDATE articles SET articles.title = ?, articles.content = ? WHERE article_id = ?";
            //$sql2 = "INSERT INTO articles SET articles.title = " . "'" . $tytul . "'" . ", articles.content = ". "'" . $zawart . "'" . ", articles.summary = ". "'" . $sum;
            $sql2 = "INSERT INTO articles (`article_id`, `title`, `content`) VALUES (NULL, '" . $tytul . "', '" . $zawart . "' )";
            $sql3 = $sql2;
            $stmt2 = $mysqli->prepare($sql3);
            //$stmt2->bind_param("ssi", $_POST['tytul'], $_POST['zawart'], $_POST['zawart']);
            $stmt2->execute();
            header('Location: panel.php');
            exit();
           
        }
        ?>
    </form>
    </div>
    </section>
</body>
</html>