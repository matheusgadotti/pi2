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
            <legend><b>Cadastro de Despesa</b></legend>
            <br><br>
            <div class="inputBox">
                <input type="text" name="nomedespesa" id="nomedespesa" class="inputUser" required>
                <label for="nomedespesa" class="labelInput">Nome da despesa</label>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="dataEmissaodespesa">Data de Emissão</label>
                <input type="date" name="dataEmissaodespesa" id="dataEmissaodespesa" class="inputUser" required>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="dataVencimentodespesa">Data de Vencimento</label>
                <input type="date" name="dataVencimentodespesa" id="dataVencimentodespesa" class="inputUser" required>
            </div>
            <br><br>
            <p>Forma de Pagamento:</p>
            <input type="radio" id="dinheiro" name="formapagamentodespesa" value="dinheiro" required>
            <label for="dinheiro">Dinheiro</label>
            <br>
            <input type="radio" id="pix" name="formapagamentodespesa" value="pix" required>
            <label for="pix">Pix</label>
            <br>
            <input type="radio" id="boleto" name="formapagamentodespesa" value="boleto" required>
            <label for="boleto">Boleto</label>
            <br>
            <input type="radio" id="credito" name="formapagamentodespesa" value="credito" required>
            <label for="credito">Cartão no Crédito</label>
            <br>
            <input type="radio" id="debito" name="formapagamentodespesa" value="debito" required>
            <label for="debito">Cartão no Débito</label>
            <br>
            <input type="radio" id="link" name="formapagamentodespesa" value="link" required>
            <label for="link">Link de pagamento</label>
            <br>
            <input type="radio" id="outro" name="formapagamentodespesa" value="outro" required>
            <label for="outro">Outro</label>
            <br><br><br>
            <div class="inputBox">
                <input type="number" name="valordespesa" id="valordespesa" class="inputUser" required>
                <label for="valordespesa" class="labelInput">Valor</label>
            </div>
            <br><br>
            <a><input type="submit" name="submit" id="submit"></a>

        </fieldset>
    </form>

</div>
<div class="lado">
<p style="position: fixed; left: 46%; top: 92%; font-size: 30px;"><a style="color: black" href="consultadespesa.php"> Voltar </a></p>

<div style="position: fixed; background-color: white; width: 250px; height: 70px;"></div>

<?php

    if(isset($_POST['submit'])){

    include_once('config.php');

    $nomedespesa = $_POST['nomedespesa'];
    $dataEmissaodespesa = $_POST['dataEmissaodespesa'];
    $dataVencimentodespesa = $_POST['dataVencimentodespesa'];
    $formapagamentodespesa = $_POST['formapagamentodespesa'];
    $valordespesa = $_POST['valordespesa'];
    $idusuario = [7];

    $result = mysqli_query($conexao, "INSERT INTO despesa(nome_despesa,data_emissao_despesa,data_vencimento_despesa,forma_pagamento_despesa,valor_despesa,id_usuario) 
    VALUES ('$nomedespesa','$dataEmissaodespesa','$dataVencimentodespesa','$formapagamentodespesa',$valordespesa,'$idusuario')");
}
?>