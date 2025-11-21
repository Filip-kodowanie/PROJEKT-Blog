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
    <title>Panel Administratora</title>
    <style>
/* Reset */
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
    padding: 25px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.4);
}

header a {
    color: white;
    text-decoration: none;
}

header h1 {
    font-size: 28px;
    line-height: 1.2;
    letter-spacing: 2px;
}

#login p {
    background: #ff4747;
    padding: 8px 16px;
    border-radius: 6px;
    transition: 0.3s;
}

#login p:hover {
    background: #d63030;
}

/* Główna część panelu */
main {
    width: 90%;
    max-width: 1100px;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* Przycisk dodawania artykułu */
main > button {
    background: #0077ff;
    padding: 12px 20px;
    border-radius: 6px;
    border: none;
    margin-bottom: 20px;
    transition: 0.3s;
}

main > button:hover {
    background: #005ccc;
}

main > button a {
    color: white;
    text-decoration: none;
    font-size: 16px;
}

/* Tabela */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

table th {
    background: #333;
    color: white;
    padding: 12px;
    text-align: left;
}

table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Linki edytuj / usuń */
#edit, #usun {
    display: inline-block;
    padding: 6px 12px;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s;
}

#edit {
    background: #ffaa00;
}

#edit:hover {
    background: #cc8800;
}

#usun {
    background: #ff3333;
}

#usun:hover {
    background: #cc0000;
}

/* Link "otwórz" — ogólny */
#otworz a {
    background: #0077ff;
    padding: 6px 12px;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s;
}

#otworz a:hover {
    background: #005ccc;
}

/* Hover na wierszach tabeli */
table tr:hover {
    background: #f1f1f1;
}

/* Responsywność */
@media(max-width: 600px) {

    header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    main {
        width: 95%;
        padding: 15px;
    }

    table th, table td {
        font-size: 14px;
        padding: 8px;
    }

    #edit, #usun {
        font-size: 13px;
        padding: 5px 10px;
    }
}

    </style>
</head>
<body>
    <header>
        <a href="index.php"><h1>BLOG <br> PANEL ADMINISTRATORA</h1></a>
        <a id="login" href="wyloguj.php"><p>wyloguj się</p></a>
    </header>
    <main>
        <button href="dodaj.php"><a href="dodaj.php">DODAJ ARTYKUŁ</a></button>
    <?php
    $sql = "SELECT SUBSTRING(articles.content, 1, 40) AS fragment, articles.title, articles.article_id FROM articles;";
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    echo "<table> <tr> <th></th><th></th> <th>tytuł artykułu</th> <th>zawartość</th> </tr>";
    while($article = $wynik->fetch_assoc()) {
        echo '<tr> <td id="otworz"> <a href="edytuj.php?id=' . $article['article_id'] .'" id="edit">edytuj</a></td> <td id="otworz"><a href="usun.php?id=' . $article['article_id'] .'" id="usun">usuń</a> </td> <td>' . $article['title'] . "</td> <td>". $article['fragment'] . "...</td> </tr>";
    }
    echo "</table>";
    ?>
    </main>
</body>
</html>