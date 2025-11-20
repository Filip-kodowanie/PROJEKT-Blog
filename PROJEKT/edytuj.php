<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDYCJA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $sql = "SELECT * FROM blog.articles";
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    while($article = $wynik->fetch_assoc()) {
       $title = $article['title'];
       $content = $article['content'];
    }
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
    }
    ?>
    <header><a href="index.php"><h1>BLOG</h1></a></header>
    <section id="logowanie">
        <div id="menu">
    <h2>EDYTOWANIE "<?php echo $title; ?>"</h2>
    <form method="POST">
        <label for="tytul">tytuł:</label>
            <input type="text" name="tytul">
            <br>
            <br>
        <label for="zawart">zawartość:</label>
            <input type="text" name="zawart">
            <br>
            <br>
        <label for="summary">podsumowanie:</label>
            <input type="text" name="summary">
            <br>
            <br>
        <button type="submit">zatwierdź</button>
        <?php 
            if(isset($_POST['tytul']) && isset($_POST['zawart'])){
            $tytul = $_POST['tytul'];
            $zawart = $_POST['zawart'];
            $sum = $_POST['summary'];
             $id = $_GET['id'];
            //$sql2 = "UPDATE articles SET articles.title = ?, articles.content = ? WHERE article_id = ?";
            $sql2 = "UPDATE articles SET articles.title = " . "'" . $tytul . "'" . ", articles.content = ". "'" . $zawart . "'" . ", articles.summary = ". "'" . $sum . "'" . " WHERE article_id = " . $id;
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