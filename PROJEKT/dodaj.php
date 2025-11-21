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
            
            //$sql2 = "UPDATE articles SET articles.title = ?, articles.content = ? WHERE article_id = ?";
            //$sql2 = "INSERT INTO articles SET articles.title = " . "'" . $tytul . "'" . ", articles.content = ". "'" . $zawart . "'" . ", articles.summary = ". "'" . $sum;
            $sql2 = "INSERT INTO articles (`article_id`, `title`, `content`, `summary`) VALUES (NULL, '" . $tytul . "', '" . $tresc . "', '" . $sum . "')";
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