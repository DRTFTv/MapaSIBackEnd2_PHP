 <?php
  try {
    $connection = new PDO("mysql:host=localhost; dbname=mapasibackend2_bd", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->exec("set names utf8");
  } catch (PDOException $err) {
    print_r($err);
  }
 ?>