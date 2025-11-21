<?php 
require_once('config.php');
session_start();
$_SESSION['zalogowany'] = 'false';
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

/* REKLAMY */
.ad {
    position: fixed;
    top: 120px; /* żeby nie zasłaniały headera */
    width: 120px;
    height: 600px;
    background: #ddd;
    border: 1px solid #999;
    z-index: 500;
}

.left-ad {
    left: 10px;
}

.right-ad {
    right: 10px;
}

/* TREŚĆ */
body {
    background: #f4f4f9;
    color: #333;
    padding-left: 150px;
    padding-right: 150px;
    padding-top: 120px;   /* <--- ZAMIANA 40px na 120px */
}

/* FIX: aby header nie nachodził na tekst */
body.scrolled {
    padding-top: 120px; /* realne odsunięcie dopiero po załadowaniu */
}

/* HEADER */
header {
    width: 100%;
    background: #222;
    color: white;
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.4);

    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
}

header h1 {
    font-size: 32px;
    letter-spacing: 2px;
    transition: 0.3s;
}

header a {
    color: white;
    text-decoration: none;
}

#login p {
    background: #4CAF50;
    padding: 8px 16px;
    border-radius: 5px;
    transition: 0.3s;
}

#login p:hover {
    background: #45a049;
}

/* TABELA */
#tabela {
    width: 90%;
    max-width: 900px;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

body > p {
    width: 90%;
    max-width: 900px;
    margin: 20px auto;
    font-size: 18px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th {
    background: #333;
    color: white;
    padding: 12px;
    text-align: left;
}

table td {
    padding: 10px 12px;
    border-bottom: 1px solid #ddd;
}

/* LINK OTWÓRZ */
#otworz a {
    display: inline-block;
    padding: 8px 12px;
    background: #0077ff;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s;
}

#otworz a:hover {
    background: #005ccc;
}

table tr:hover {
    background: #f1f1f1;
}

/* RESPONSYWNOŚĆ */
@media(max-width: 1300px) {
    .ad {
        display: none;
    }
    body {
        padding-left: 0;
        padding-right: 0;
    }
}
h2 {
float: left;
}
    </style>
</head>
<body>
    <header>
        <a href="index.php"><h1>BLOG</h1></a>
        <a id="login" href="login.php"><p>zaloguj się</p></a>
    </header>
    <div class="ad left-ad">
        <a href="https://youtube.com">
    <img src="reklama1.png" width="120" height="600">
</a>
</div>

<div class="ad right-ad">
        <a href="https://wargaming.com">
    <img src="reklama2.webp" width="120" height="600">
</a>    
</div>
    <?php
    //$sql3 = "SELECT SUBSTRING(articles.content, 1, 40) AS fragment FROM articles;";
    ///$stmt3 = $mysqli->prepare($sql3);
///$stmt3 ->execute();
   // $wynik3 = $stmt3->get_result();
   // while($zaw = $wynik3->fetch_assoc()) {
   // $fragment= $zaw['fragment'];
   // echo $fragment;
   // }


    $sql2 = "SELECT COUNT(*) AS 'liczba' FROM articles;";
    $stmt2 = $mysqli->prepare($sql2);
    $stmt2 ->execute();
    $wynik2 = $stmt2->get_result();
    while($article2 = $wynik2->fetch_assoc()) {   
    echo "<p> Liczba artykułów na stronie: " . $article2['liczba'];
    }
    echo "</table>";
    ?>
    <section id="tabela">
    <?php
    $sql = "SELECT SUBSTRING(articles.content, 1, 40) AS fragment, articles.title, articles.article_id FROM articles;";
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    echo "<table> <tr> <th></th> <th>tytuł artykułu</th> <th>zawartość</th> </tr>";
    while($article = $wynik->fetch_assoc()) {
        echo '<tr> <td id="otworz"> <a href="artykul.php?id=' . $article['article_id'] . '">otwórz</a></td> <td>' . $article['title'] . "</td> <td>". $article['fragment'] . "...</td> </tr>";
    }
    echo "</table>";
    ?>
    </section>
</body>
</html>