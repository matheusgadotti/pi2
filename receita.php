<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>SIGEFI - Receita</title>
</head>
<body>
<header>
        <div class="cabeca">
            <nav>
                <section class="sessao1">
                    <div class="blocoLado_a_Lado">
                        <a href="home.php">Home </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="consulta.php">Consulta </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="">Receita </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="despesa.php">Despesa </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="investimento.php">Investimento </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="relatorio.php">Relatorio </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="logout.php">Sair</a>
                    </div>
                </section>
            </nav>
        </div>
    </header>
<div>
    <div class="box">
    <form action="testes.php" method="POST">
        <fieldset>
            <legend><b>Cadastro de Receita</b></legend>
            <br>
            <div class="inputBox">
                <input type="number" name="identificacaoreceita" id="identificacaoreceita" class="inputUser" required>
                <label for="identificacaoreceita" class="labelInput">Nº Id. Receita</label>
            </div>
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
            <input type="submit" name="submit" id="submit">
        </fieldset>
    </form>
</div>
<div class="lado">
<h1>ÚLTIMAS INSERÇÕES</h1>
<p>Aqui ficara todos os registros recentes da página, ele não passara das margens pré definidas </p>
<?php

    if(isset($_POST['submit'])){
        /*print_r('Id: ' . $_POST['identificacaoreceita']);
        print_r('<br>');
        print_r('Nome: ' . $_POST['nomereceita']);
        print_r('<br>');
        print_r('Data Emissao: ' . $_POST['dataEmissaoreceita']);
        print_r('<br>');
        print_r('Data Vencimento: ' . $_POST['dataVencimentoreceita']);
        print_r('<br>');
        print_r('Forma de Pagamento: ' . $_POST['formapagamentoreceita']);
        print_r('<br>');
        print_r('Valor Receita: ' . $_POST['valorreceita']);
        print_r('<br>');*/
   

    include_once('config.php');

    $identificacaoreceita = $_POST['identificacaoreceita'];
    $nomereceita = $_POST['nomereceita'];
    $dataEmissaoreceita = $_POST['dataEmissaoreceita'];
    $dataVencimentoreceita = $_POST['dataVencimentoreceita'];
    $formapagamentoreceita = $_POST['formapagamentoreceita'];
    $valorreceita = $_POST['valorreceita'];

    $result = mysqli_query($conexao, "INSERT INTO receita(idreceita,nome_receita,data_emissao_receita,data_vencimento_receita,forma_pagamento_receita,valor_receita) 
    VALUES ('$identificacaoreceita','$nomereceita','$dataEmissaoreceita','$dataVencimentoreceita','$formapagamentoreceita','$valorreceita')");
    
}
    

?>
</div>
    </div>
</body>
</html>