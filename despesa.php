<?php

include('protect.php');

require_once('cabecalho.php');

?>
    <div>
    <div class="box">
    <form action="">
        <fieldset>
            <legend><b>Cadastro de Despesa</b></legend>
            <br>
            <div class="inputBox">
                <input type="number" name="identificacaodespesa" id="identificacaodespesa" class="inputUser" required>
                <label for="identificacaodespesa" class="labelInput">Nº Id. Despesa</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="nomedespesa" id="nomedespesa" class="inputUser" required>
                <label for="nomedespesa" class="labelInput">Nome da Despesa</label>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="dataEmissao">Data de Emissão</label>
                <input type="date" name="dataEmissaodespesa" id="dataEmissaodespesa" class="inputUser" required>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="dataVencimento">Data de Vencimento</label>
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
            <input type="submit" name="submit" id="submit">
        </fieldset>
    </form>
</div>
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