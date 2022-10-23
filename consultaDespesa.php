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
$id_usuario = 0;

try{
    $sql = "select * from despesa where id_usuario=:id_usuario";
    //statement - declaracao do sql
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    echo ('<pre>');

    $despesas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo ('<div style="text-align: center">');
    echo('<h2 style="font-size: 20px; color: Red; text-align: center;">Despesas</h2><br>');
    echo('<h2><a href="despesa.php">Cadastrar Despesa</a></h2>');
    echo ('<table style="border: 1px solid black; margin-left: 250px;">');
    echo ('<tr style="border: 1px solid black;">
        <th style="border: 1px solid black;"> Numero ID </th>
        <th style="border: 1px solid black;"> Descricao </th>
        <th style="border: 1px solid black;"> Data Vencimento </th>
        <th style="border: 1px solid black;"> Data Emissao </th>
        <th style="border: 1px solid black;"> Valor </th>'
        );
    
//    print(json_encode($despesas));
    foreach($despesas as $despesa){
        echo ('<tr style="border: 1px solid black;">
        <td style="border: 1px solid black; text-align: center;"><p style="margin: 0 2px 0 2px; text-align: center;">'.$despesa['iddespesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['nome_despesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['data_vencimento_despesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['data_emissao_despesa'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$despesa['valor_despesa'].' </p></td>
        ');
    }
    echo ('</table>');
    echo ('</div>');

}catch(Exception $e){
    echo $e->getMEssage();
}