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
    <title>EDYCJA</title>
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

/* Sekcja formularza */
#logowanie {
    display: flex;
    justify-content: center;
    margin-top: 50px;
}

/* Kontener */
#menu {
    width: 450px;
    background: white;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 0 12px rgba(0,0,0,0.15);
    text-align: center;
}

#menu h2 {
    margin-bottom: 25px;
    font-size: 22px;
}

/* Formularz */
form {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

label {
    text-align: left;
    font-size: 14px;
    font-weight: bold;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #bbb;
    font-size: 16px;
    outline: none;
    transition: 0.2s;
}

/* Lepszy wygląd textarea */
textarea {
    resize: vertical;
    min-height: 150px;
}

input:focus,
textarea:focus {
    border-color: #0077ff;
    box-shadow: 0 0 4px rgba(0,120,255,0.3);
}

/* Przycisk */
button {
    background: #0077ff;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
    transition: 0.3s;
}

button:hover {
    background: #005ccc;
}

/* Responsywność */
@media (max-width: 500px) {
    #menu {
        width: 90%;
        padding: 20px;
    }

    header h1 {
        font-size: 26px;
    }
}
</style>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
   

    $sql = "SELECT * FROM blog.articles WHERE article_id = $id";
    $stmt = $mysqli->prepare($sql);
    $stmt ->execute();
    $wynik = $stmt->get_result();
    while($article = $wynik->fetch_assoc()) {
       $title = $article['title'];
       $content = $article['content'];
    }
}
    ?>
    <header><a href="index.php"><h1>BLOG</h1></a></header>
    <section id="logowanie">
        <div id="menu">
    <h2>EDYTOWANIE "<?php echo $title; ?>"</h2>
    <form method="POST">
        <label for="tytul">tytuł:</label>
            <input type="text" name="tytul" value="<?php echo $title; ?>">
            <br>
            <br>
        <label for="zawart">zawartość:</label>
            <textarea name="zawart"><?php echo $content; ?></textarea>
            <br>
            <br>
        <button type="submit">zatwierdź</button>
        <?php 
            if(isset($_POST['tytul']) && isset($_POST['zawart'])){
            $tytul = $_POST['tytul'];
            $zawart = $_POST['zawart'];
      
             $id = $_GET['id'];
            //$sql2 = "UPDATE articles SET articles.title = ?, articles.content = ? WHERE article_id = ?";
            $sql2 = "UPDATE articles SET articles.title = " . "'" . $tytul . "'" . ", articles.content = ". "'" . $zawart . "'" . " WHERE article_id = " . $id;
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