<?php

include('protect.php');

require_once('cabecalho.php');

require_once('config.php');

try {
    $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
  //  echo "Connected to $dbName at $dbHost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}


/////////////////


?>
    <div>
    <div class="box">
    <form action="">
        <fieldset>
            <legend><b>Cadastro de Despesa</b></legend>
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
<h1>INSERÇÕES</h1>
<?php

$id_usuario = 7;
try{
    $sql = "select * from despesa where id_usuario=:id_usuario";
    
    //statement - declaracao do sql
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    echo ('<pre>');
    $despesas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo('<br>');
    echo ('<table style="border: 1px solid black;">');
    echo ('<tr style="border: 1px solid black;">            
    <th style="border: 1px solid black;"> Numero </th>
    <th style="border: 1px solid black;"> Descricao </th>
    <th style="border: 1px solid black;"> Data </th>
    <th style="border: 1px solid black;"> Valor </th></tr>');
    
//    print(json_encode($despesas));
    foreach($despesas as $despesa){
        echo ('<tr style="border: 1px solid black;">
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['iddespesa'].'</p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['nome_despesa'].'</p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['data_vencimento_despesa'].'</p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['valor_despesa'].'</p></td>
        ');
    }
    echo ('</table>');


}catch(Exception $e){
    echo $e->getMEssage();
}
    

?>
</div>
    </div>
</body>
</html>