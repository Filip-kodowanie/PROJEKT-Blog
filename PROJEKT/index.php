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
    <header>
        <a href="index.php"><h1>BLOG</h1></a>
        <a id="login" href="login.php"><p>zaloguj się</p></a>
    </header>
    <?php
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
    $sql = "SELECT * FROM blog.articles";
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    echo "<table> <tr> <th></th> <th>tytuł artykułu</th> <th>zawartość</th> </tr>";
    while($article = $wynik->fetch_assoc()) {
        echo '<tr> <td id="otworz"> <a href="artykul.php?id=' . $article['article_id'] . '">otwórz</a></td> <td>' . $article['title'] . "</td> <td>". $article['summary'] . "</td> </tr>";
    }
    echo "</table>";
    ?>
    </section>
</body>
</html>