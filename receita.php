<?php

include('protect.php');

require_once('cabecalho.php');

require_once('config.php');

/*try {
    $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
  //  echo "Connected to $dbName at $dbHost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}*/


/////////////////


?>
<div>
    <div class="box">
    <form action="" method="POST">
        <fieldset>
            <legend><b>Cadastro de Receita</b></legend>
            <br><br>
            <div class="inputBox">
                <input type="text" name="nomereceita" id="nomereceita" class="inputUser" required>
                <label for="nomereceita" class="labelInput">Nome da Receita</label>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="dataEmissaoreceita">Data de Emissão</label>
                <input type="date" name="dataEmissaoreceita" id="dataEmissaoreceita" class="inputUser" required>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="dataVencimentoreceita">Data de Vencimento</label>
                <input type="date" name="dataVencimentoreceita" id="dataVencimentoreceita" class="inputUser" required>
            </div>
            <br><br>
            <p>Forma de Pagamento:</p>
            <input type="radio" id="dinheiro" name="formapagamentoreceita" value="dinheiro" required>
            <label for="dinheiro">Dinheiro</label>
            <br>
            <input type="radio" id="pix" name="formapagamentoreceita" value="pix" required>
            <label for="pix">Pix</label>
            <br>
            <input type="radio" id="boleto" name="formapagamentoreceita" value="boleto" required>
            <label for="boleto">Boleto</label>
            <br>
            <input type="radio" id="credito" name="formapagamentoreceita" value="credito" required>
            <label for="credito">Cartão no Crédito</label>
            <br>
            <input type="radio" id="debito" name="formapagamentoreceita" value="debito" required>
            <label for="debito">Cartão no Débito</label>
            <br>
            <input type="radio" id="link" name="formapagamentoreceita" value="link" required>
            <label for="link">Link de pagamento</label>
            <br>
            <input type="radio" id="outro" name="formapagamentoreceita" value="outro" required>
            <label for="outro">Outro</label>
            <br><br><br>
            <div class="inputBox">
                <input type="number" name="valorreceita" id="valorreceita" class="inputUser" required>
                <label for="valorreceita" class="labelInput">Valor</label>
            </div>
            <br><br>
            <a><input type="submit" name="submit" id="submit"></a>

        </fieldset>
    </form>

</div>
<div class="lado">
<p style="position: fixed; left: 46%; top: 92%; font-size: 30px;"><a style="color: black" href="consultaReceita.php"> Voltar </a></p>

<div style="position: fixed; background-color: white; width: 250px; height: 500px;"></div>

<?php

    if(isset($_POST['submit'])){

    include_once('config.php');

    $nomereceita = $_POST['nomereceita'];
    $dataEmissaoreceita = $_POST['dataEmissaoreceita'];
    $dataVencimentoreceita = $_POST['dataVencimentoreceita'];
    $formapagamentoreceita = $_POST['formapagamentoreceita'];
    $valorreceita = $_POST['valorreceita'];
    $idusuario = [7];

    $result = mysqli_query($conexao, "INSERT INTO receita(nome_receita,data_emissao_receita,data_vencimento_receita,forma_pagamento_receita,valor_receita,id_usuario) 
    VALUES ('$nomereceita','$dataEmissaoreceita','$dataVencimentoreceita','$formapagamentoreceita',$valorreceita,'$idusuario')");
}
?>