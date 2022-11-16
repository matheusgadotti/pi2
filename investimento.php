<?php

include('protect.php');

require_once('config.php');

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
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">    
    <title>SIGEFI</title>
</head>
<div>
    <div class="box">
    <form action="" method="POST">
        <fieldset>
            <legend><b>Cadastro de Investimento</b></legend>
            <br><br>
            <div class="inputBox">
                <input type="text" name="nome_investimento" id="nome_investimento" class="inputUser" required>
                <label for="nome_investimento" class="labelInput">Nome do investimento</label>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="data_investimento">Data do Investimento</label>
                <input type="date" name="data_investimento" id="data_investimento" class="inputUser" required>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="number" name="valor_investimento" id="valor_investimento" class="inputUser" required>
                <label for="valor_investimento" class="labelInput">Valor</label>
            </div>
            <br><br>
            <a><input type="submit" name="submit" id="submit"></a>

        </fieldset>
    </form>

</div>
<div class="lado">
<p style="position: fixed; left: 46%; top: 92%; font-size: 30px;"><a style="color: black" href="consultaInvestimento.php"> Voltar </a></p>

<div style="position: fixed; background-color: white; width: 250px; height: 70px;"></div>

<?php

    if(isset($_POST['submit'])){

    include_once('config.php');

    $nomeinvestimento = $_POST['nome_investimento'];
    $datainvestimento = $_POST['data_investimento'];
    $valorinvestimento = $_POST['valor_investimento'];
    $idusuario = [7];

    $result = mysqli_query($conexao, "INSERT INTO investimento(nome_investimento,data_investimento,valor_investimento,idusuario) 
    VALUES ('$nomeinvestimento','$datainvestimento',$valorinvestimento,'$idusuario')");
}
?>
