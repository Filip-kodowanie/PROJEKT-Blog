<?php
require_once('config.php');
session_start();
$_SESSION['zalogowany'] = 'true';
header('Location: panel.php');
            exit();
?>
