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
    $sql = "select * from receita where id_usuario=:id_usuario";
    //statement - declaracao do sql
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    echo ('<pre>');
    $receitas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo('<br>');
    echo ('<div style="text-align: center">');
    echo('<h2 style="font-size: 20px; color: blue;">Receitas</h2><br>');
    echo('<h2><a href="receita.php" style="color: blue;">Cadastrar Receita</a></h2>');
    echo ('<table style="border: 1px solid black; margin-left: 250px;">');
    echo ('<tr style="border: 1px solid black;">            
    <th style="border: 1px solid black;"> Numero ID </th>
    <th style="border: 1px solid black;"> Descricao </th>
    <th style="border: 1px solid black;"> Data Vencimento </th>
    <th style="border: 1px solid black;"> Data Emissao </th>
    <th style="border: 1px solid black;"> Valor </th>
    <th style="border: 1px solid black;"> Ações </th>
    </tr>');
    
//    print(json_encode($despesas));
    foreach($receitas as $receita){
        echo ('<tr style="border: 1px solid black;">
        <td style="border: 1px solid black; text-align: center;"><p style="margin: 0 2px 0 2px">'.$receita['idreceita'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$receita['nome_receita'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$receita['data_vencimento_receita'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$receita['data_emissao_receita'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$receita['valor_receita'].' </p></td>
        <td style="border: 1px solid black;"><a style="color: red;" href="deletar.php?del='.$receita['idreceita'].'"> Apagar </a></tr>
        ');
    }
    echo ('</table>');
    echo ('</div>');


}catch(Exception $e){
    echo $e->getMEssage();
}
