<?php

include('protect.php');

require_once('cabecalho.php');

require_once('config.php');

require_once('voltar.php');

try {
    $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
  //  echo "Connected to $dbName at $dbHost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}


/////////////////
$id_usuario = 0;




/////////
try{
    $sql = "select * from despesa where id_usuario=:id_usuario";
    //statement - declaracao do sql
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    echo ('<pre>');
    $despesas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo('<br>');
    echo ('<div>');
    echo('<h2 style="font-size: 30px; color: red; text-align: center;"><strong>Despesas</strong></h2><br>');
    echo('<h2><a href="despesa.php" style="color: Black; font-size: 18px;"><strong style="color: Green;"> +</strong> Cadastrar Despesa</a></h2>');
    echo ('<div style="">');
    echo ('<table style="border: 1px solid black;">');
    echo ('<tr style="border: 1px solid black;">            
    <th style="border: 1px solid black;"> Numero ID </th>
    <th style="border: 1px solid black;"> Descricao </th>
    <th style="border: 1px solid black;"> Data Vencimento </th>
    <th style="border: 1px solid black;"> Data Emissao </th>
    <th style="border: 1px solid black;"> Valor </th>
    <th style="border: 1px solid black;"> Ações </th>
    </tr>');
    
//    print(json_encode($despesas));
    foreach($despesas as $despesa){
        echo ('<tr style="border: 1px solid black;">
        <td style="border: 1px solid black; text-align: center;"><p style="margin: 0 2px 0 2px">'.$despesa['iddespesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['nome_despesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['data_vencimento_despesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['data_emissao_despesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['valor_despesa'].' </p></td>
        <td style="border: 1px solid black;"><a style="color: red;" href="deletar2.php?del='.$despesa['iddespesa'].'"> Apagar </a></tr>
        ');
    }
    echo ('</table>');
    echo ('</div>');


}catch(Exception $e){
    echo $e->getMEssage();
}