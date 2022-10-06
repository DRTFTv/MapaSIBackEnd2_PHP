<?php 
  include_once "./app/services/connection.php";

  $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  date_default_timezone_set('America/Sao_Paulo');
  $year = date('Y', time());
  $dateTime = date('YYYY-MM-DD hh:mm:ss', time());

  $protocolo_cd = $_POST["protocolo_cd"];
  $solicitante_nm = $_POST["solicitante_nm"];
  $descricao_ds = $_POST["descricao_ds"];
  $email_ds = $_POST["email_ds"];
  $ano_dt = $_POST["ano_dt"];
  $status_st = $_POST["status_st"]; 
  $dataCadastro_dt = $_POST["dataCadastro_dt"];

  try {
    $sql = $connection->prepare('INSERT INTO protocolo_tb VALUES (null, ?, ?, ?, ?, ?, ?)')->execute([$solicitante_nm, $descricao_ds, $email_ds, $year, $status_st, $dateTime]);
  } catch(PDOException $err){
    print_r($err);
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de cadastro</title>
  </head>
  <body>
    <?php if(!isset($err)): ?>
      ID: <?= $protocolo_cd; ?> <br>
      Nome do soliciatante: <?= $solicitante_nm; ?> <br>
      Descrição: <?= $descricao_ds; ?> <br>
      E-mail: <?= $email_ds; ?> <br>
      Ano: <?= $ano_dt; ?> <br>
      Data/Hora Cadastro: <?= $dataCadastro_dt; ?> <br>
      Status: <?= $status_st; ?> <br>
    <?php else: ?>
      Erro ao cadastrar novo protocolo! <br>
    <?php endif; ?>
    <button onclick="location.href='<?= $baseURL.parse_url($currentURL, PHP_URL_PATH) ?>/..'">Voltar</button>
   </body>
</html>