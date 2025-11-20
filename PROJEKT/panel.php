<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php"><h1>BLOG <br> PANEL ADMINISTRATORA</h1></a>
        <a id="login" href="login.php"><p>zaloguj się</p></a>
    </header>
    <?php
    $sql = "SELECT * FROM blog.articles";
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    echo "<table> <tr> <th></th><th></th> <th>tytuł artykułu</th> <th>zawartość</th> </tr>";
    while($article = $wynik->fetch_assoc()) {
        echo '<tr> <td id="otworz"> <a href="edytuj.php?id=' . $article['article_id'] .'" id="edit">edytuj</a></td> <td id="otworz"><a href="usun.php?id=' . $article['article_id'] .'" id="usun">usuń</a> </td> <td>' . $article['title'] . "</td> <td>". $article['summary'] . "</td> </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>