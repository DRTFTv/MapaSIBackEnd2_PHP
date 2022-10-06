<?php
  include_once "./app/services/connection.php";

  $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $protocolo_cd = $_POST["protocolo_cd"];

  try {
    $sql = $connection->query('SELECT * FROM protocolo_tb WHERE protocolo_cd ='.$protocolo_cd.';');
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
    <title>Pesquisa</title>
  </head>
  <body>
    <?php if(!isset($err)): ?>
      <?php while ($linha = $sql->fetch(PDO::FETCH_ASSOC)): ?>
        ID: <?= $linha['protocolo_cd']; ?> <br>
        Nome do soliciatante: <?= $linha['solicitante_nm']; ?> <br>
        Descrição: <?= $linha['descricao_ds']; ?> <br>
        E-mail: <?= $linha['email_ds']; ?> <br>
        Ano: <?= $linha['ano_dt']; ?> <br>
        Data/Hora Cadastro: <?= $linha['dataCadastro_dt']; ?> <br>
        Status: <?= $linha['status_st']; ?> <br>
      <?php endwhile; ?>
    <?php else: ?>
      Erro ao pesquisar protocolo! <br>
    <?php endif; ?>
    <button onclick="location.href='<?= $baseURL.parse_url($currentURL, PHP_URL_PATH) ?>/..'">Voltar</button>
  </body>
</html>