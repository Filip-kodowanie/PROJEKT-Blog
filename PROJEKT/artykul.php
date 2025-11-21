<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTYKUŁ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
    }
    $sql = "SELECT * FROM blog.articles WHERE articles.article_id =" . $id;
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    while($article = $wynik->fetch_assoc()) {
       $title = $article['title'];
       $content = $article['content'];
       $sum = $article['summary'];
    }
    ?>
<header><a href="index.php"><h1>BLOG</h1></a></header>
 <main>
    <h2><?php echo $title; ?></h2>
    <h3><?php echo $sum; ?></h3>
    <p><?php echo $content; ?></p>
</main>
</body>
</html>