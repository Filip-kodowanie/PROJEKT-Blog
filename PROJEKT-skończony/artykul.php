<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTYKUŁ</title>
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
    transition: 0.3s;
}

header h1:hover {
    opacity: 0.7;
}

/* Artykuł */
main {
    width: 75%;
    max-width: 900px;
    margin: 50px auto;
    background: white;
    padding: 35px 45px;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0,0,0,0.12);
}

/* Tytuł artykułu */
main h2 {
    font-size: 32px;
    margin-bottom: 25px;
    text-align: center;
}

/* Treść artykułu */
main p {
    line-height: 1.8;
    font-size: 18px;
    white-space: pre-line; /* obsługa nowych linii */
    margin-bottom: 20px;
}

/* Opcjonalny podsumowanie */
.summary {
    font-size: 16px;
    font-style: italic;
    color: #666;
    margin-bottom: 20px;
}

/* Responsywność */
@media (max-width: 700px) {
    main {
        width: 90%;
        padding: 25px;
    }

    main h2 {
        font-size: 26px;
    }

    main p {
        font-size: 16px;
    }
}
    </style>
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
    <p><?php echo $content; ?></p>
</main>
</body>
</html>