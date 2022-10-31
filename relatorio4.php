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
<h1 style="text-align: left;">Pesquisar por Data de Investimento</h1>
  
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

        <input type="submit" value="Pesquisar" name="PesqInvestimento">
        <br><br>

    </form>
</div>
</div>
<hr>

    <?php
    //Verifica se o usuário clicou no botão
    if(!empty($dados['PesqInvestimento'])){

      $query_investimento = "SELECT idinvestimento, nome_investimento, data_investimento, valor_investimento FROM investimento WHERE data_investimento BETWEEN :data_inicio AND :data_final";
      $result_investimento = $conexao->prepare($query_investimento);
      $result_investimento->bindParam(':data_inicio', $dados['data_inicio']);
      $result_investimento->bindParam(':data_final', $dados['data_final']);
      $result_investimento->execute();

      while($row_investimento = $result_investimento->fetch(PDO::FETCH_ASSOC)){

        extract($row_investimento);

        echo "<br>";
        echo "Numero ID: $idinvestimento <br>";
        echo "Descricao: $nome_investimento <br>";
        echo "Data Investimento: ". date('d/m/Y', strtotime($data_investimento)) . " <br>";
        echo "Valor: R$ $valor_investimento <br>";

        echo "<hr>";
      }

    }
    ?>
</body>
</html>