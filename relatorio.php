<?php

include('protect.php');

require_once('cabecalho.php');

require_once('config2.php');

/*try {
    $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
  //  echo "Connected to $dbName at $dbHost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}*/


/////////////////


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div style="display: inline-block;">
  <div style="display: inline-block; margin-left: 200px">
    <h1 style="text-align: left;">Pesquisar por Data de Emissao</h1>
  
  <?php
  //Recebe dados do formulario
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


?>
    <form method="POST" action="">
      <?php
      $data_inicio = "";
      if (isset($dados['data_inicio'])) {
          $data_inicio = $dados['data_inicio'];
      }
      ?>

        <label>Data de inicio</label>
        <input type="date" name="data_inicio" value="<?php echo $data_inicio; ?>"><br><br>

        <?php
      $data_final = "";
      if (isset($dados['data_final'])) {
          $data_final = $dados['data_final'];
      }
      ?>

        <label>Data de final</label>
        <input type="date" name="data_final" value="<?php echo $data_final; ?>"><br><br>

        <input type="submit" value="Pesquisar" name="PesqEntreData">
        <br><br>

    </form>
</div>
<div style="display: inline-block; margin-left: 200px">
<h1 style="text-align: left;">Pesquisar por Data de Vencimento</h1>
  
<?php
  //Recebe dados do formulario
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


?>
    <form method="POST" action="">
      <?php
      $data_inicio = "";
      if (isset($dados['data_inicio'])) {
          $data_inicio = $dados['data_inicio'];
      }
      ?>

        <label>Data de inicio</label>
        <input type="date" name="data_inicio" value="<?php echo $data_inicio; ?>"><br><br>

        <?php
      $data_final = "";
      if (isset($dados['data_final'])) {
          $data_final = $dados['data_final'];
      }
      ?>

        <label>Data de final</label>
        <input type="date" name="data_final" value="<?php echo $data_final; ?>"><br><br>

        <input type="submit" value="Pesquisar" name="PesqVencData">
        <br><br>

    </form>
</div>
</div>
<hr>

    <?php
    //Verifica se o usu??rio clicou no bot??o
    if(!empty($dados['PesqEntreData'])){

      $query_receita = "SELECT idreceita, nome_receita, data_emissao_receita, data_vencimento_receita, forma_pagamento_receita, valor_receita FROM receita WHERE data_emissao_receita BETWEEN :data_inicio AND :data_final";
      $result_receita = $conexao->prepare($query_receita);
      $result_receita->bindParam(':data_inicio', $dados['data_inicio']);
      $result_receita->bindParam(':data_final', $dados['data_final']);
      $result_receita->execute();

      while($row_receita = $result_receita->fetch(PDO::FETCH_ASSOC)){

        extract($row_receita);

        echo "<br>";
        echo "Numero ID: $idreceita <br>";
        echo "Descricao: $nome_receita <br>";
        echo "Data Vencimento: ". date('d/m/Y', strtotime($data_vencimento_receita)) . " <br>";
        echo "Data Emissao: ". date('d/m/Y', strtotime($data_emissao_receita)) . " <br>";
        echo "Forma de Pagamento: $forma_pagamento_receita <br>";
        echo "Valor: R$ $valor_receita <br>";

        echo "<hr>";
      }

    }
    ?>

    <?php
    //Verifica se o usu??rio clicou no bot??o
    if(!empty($dados['PesqVencData'])){

      $query_receita = "SELECT idreceita, nome_receita, data_emissao_receita, data_vencimento_receita, forma_pagamento_receita, valor_receita FROM receita WHERE data_vencimento_receita BETWEEN :data_inicio AND :data_final";
      $result_receita = $conexao->prepare($query_receita);
      $result_receita->bindParam(':data_inicio', $dados['data_inicio']);
      $result_receita->bindParam(':data_final', $dados['data_final']);
      $result_receita->execute();

      while($row_receita = $result_receita->fetch(PDO::FETCH_ASSOC)){

        extract($row_receita);

        echo "<br>";
        echo "Numero ID: $idreceita <br>";
        echo "Descricao: $nome_receita <br>";
        echo "Data Vencimento: ". date('d/m/Y', strtotime($data_vencimento_receita)) . " <br>";
        echo "Data Emissao: ". date('d/m/Y', strtotime($data_emissao_receita)) . " <br>";
        echo "Forma de Pagamento: $forma_pagamento_receita <br>";
        echo "Valor: R$ $valor_receita <br>";

        echo "<hr>";
      }

    }
    ?>
</body>
</html>