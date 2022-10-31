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
    //Verifica se o usuário clicou no botão
    if(!empty($dados['PesqEntreData'])){

      $query_despesa = "SELECT iddespesa, nome_despesa, data_emissao_despesa, data_vencimento_despesa, forma_pagamento_despesa, valor_despesa FROM despesa WHERE data_emissao_despesa BETWEEN :data_inicio AND :data_final";
      $result_despesa = $conexao->prepare($query_despesa);
      $result_despesa->bindParam(':data_inicio', $dados['data_inicio']);
      $result_despesa->bindParam(':data_final', $dados['data_final']);
      $result_despesa->execute();

      while($row_despesa = $result_despesa->fetch(PDO::FETCH_ASSOC)){

        extract($row_despesa);

        echo "<br>";
        echo "Numero ID: $iddespesa <br>";
        echo "Descricao: $nome_despesa <br>";
        echo "Data Vencimento: ". date('d/m/Y', strtotime($data_vencimento_despesa)) . " <br>";
        echo "Data Emissao: ". date('d/m/Y', strtotime($data_emissao_despesa)) . " <br>";
        echo "Forma de Pagamento: $forma_pagamento_despesa <br>";
        echo "Valor: R$ $valor_despesa <br>";

        echo "<hr>";
      }

    }
    ?>

    <?php
    //Verifica se o usuário clicou no botão
    if(!empty($dados['PesqVencData'])){

      $query_despesa = "SELECT iddespesa, nome_despesa, data_emissao_despesa, data_vencimento_despesa, forma_pagamento_despesa, valor_despesa FROM despesa WHERE data_vencimento_despesa BETWEEN :data_inicio AND :data_final";
      $result_despesa = $conexao->prepare($query_despesa);
      $result_despesa->bindParam(':data_inicio', $dados['data_inicio']);
      $result_despesa->bindParam(':data_final', $dados['data_final']);
      $result_despesa->execute();

      while($row_despesa = $result_despesa->fetch(PDO::FETCH_ASSOC)){

        extract($row_despesa);

        echo "<br>";
        echo "Numero ID: $iddespesa <br>";
        echo "Descricao: $nome_despesa <br>";
        echo "Data Vencimento: ". date('d/m/Y', strtotime($data_vencimento_despesa)) . " <br>";
        echo "Data Emissao: ". date('d/m/Y', strtotime($data_emissao_despesa)) . " <br>";
        echo "Forma de Pagamento: $forma_pagamento_despesa <br>";
        echo "Valor: R$ $valor_despesa <br>";

        echo "<hr>";
      }

    }
    ?>
</body>
</html>