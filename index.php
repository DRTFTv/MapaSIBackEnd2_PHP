<?php
  include_once "./app/services/connection.php";

  $sql = $connection->query("SELECT * FROM protocolo_tb ORDER BY protocolo_cd DESC LIMIT 1;");

  $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
  </head>
  <body>
    <h1>Registrar protocolo</h1>
    <form action="<?= $baseURL.parse_url($currentURL, PHP_URL_PATH) ?>cadastrar.php" method="post">
      <label for="protocolo_cd">ID: </label>
      <input type="number" name="protocolo_cd" id="protocolo_cd" value="<?= $sql->fetch(1)['protocolo_cd'] + 1; ?>" readonly>
      <br>

      <label for="solicitante_nm">Nome do soliciatante: </label>
      <input type="text" name="solicitante_nm" id="solicitante_nm" required>
      <br>

      <label for="descricao_ds">Descrição: </label>
      <textarea name="descricao_ds" id="descricao_ds" cols="30" rows="10" required></textarea>
      <br>

      <label for="email_ds">E-mail: </label>
      <input type="email" name="email_ds" id="email_ds" required>
      <br>

      <?php
        date_default_timezone_set('America/Sao_Paulo');
        $year = date('Y', time());
        $dateTime = date('Y-m-d\TH:i:s', time());
      ?>

      <label for="ano_dt">Ano: </label>
      <input type="text" name="ano_dt" id="ano_dt" value="<?= $year; ?>" readonly>
      <br>

      <label for="dataCadastro_dt">Data/Hora Cadastro: </label>
      <input type="datetime-local" name="dataCadastro_dt" id="dataCadastro_dt" value="<?= $dateTime; ?>" readonly> 
      <br>

      <label for="status_st">Status: </label>
      <input type="number" name="status_st" id="status_st" value="1" readonly>
      <br>

      <button type="submit">CADASTRAR</button>
    </form>

    <form action="<?= $baseURL.parse_url($currentURL, PHP_URL_PATH) ?>pesquisar.php" method="post">
      <h1>Pesquisar protocolo</h1>
      <label for="protocolo_cd">ID</label>
      <input type="number" name="protocolo_cd" id="protocolo_cd" required>
      <button type="submit">Pesquisar</button>
    </form>
  </body>
</html>