<?php 
require_once('config.php');
session_start();
if ($_SESSION['zalogowany'] !== 'true') {
    header('Location: login.php');
    exit;
}
?>
<?php
 if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $sql = "DELETE FROM articles WHERE article_id =" . $id . ";";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        header('location: panel.php');
        exit();

    }

?>