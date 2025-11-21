<?php
$mysqli = new mysqli("localhost","root","","blog");

if ($mysqli -> connect_errno) {
  echo "Błąd połączenia z bazą: " . $mysqli -> connect_error;
  exit();
}
$mysqli->set_charset('utf8mb4')

?>